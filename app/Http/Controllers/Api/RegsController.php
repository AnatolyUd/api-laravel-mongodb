<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\LoadCsvRegsService;
use App\Models\Reg;
use Illuminate\Http\Request;

class RegsController extends Controller
{
    /*
      |-------------------------------------------------------------------------------
      | Load csv file to database
      |-------------------------------------------------------------------------------
      | URL:            /api/v1/regs
      | Method:         POST
      | Description:    Load csv file to database
    */
    public function load(LoadCsvRegsService $service)
    {
        $loaded = $service->loadCsv();

        return response()->json([
            'count' => $loaded
        ], 200);
    }

    /*
      |-------------------------------------------------------------------------------
      | Get data from a regs collection
      |-------------------------------------------------------------------------------
      | URL:            /api/v1/regs
      | Method:         GET
      | Description:    Get data from a regs collection
    */
    public function list(Request $request)
    {
        $properties = array_intersect_key($request->input(), array_fill_keys(Reg::PROPERTY_NAMES, 0));

        $whereProperties = [];
        foreach ($properties as $key => $value) {
            if (in_array($key, Reg::PROPERTY_HAS_INT_VALUES)) {
                $value = intval($value);
            }

            $whereProperties[Reg::PROPERTIES_KEY.'.'.$key] = $value;
        }

        $query = Reg::query();
        $query->where($whereProperties);

        $sort_order = $request->input('sort_order', 'asc');
        if ($sort_by = $request->input('sort_by')){
            $query->orderBy(Reg::PROPERTIES_KEY.'.'.$sort_by, $sort_order);
        }

        if ($offset = $request->input('offset')){
            $query->offset(intval($offset));
        }

        if ($limit = $request->input('limit')){
            $query->limit(intval($limit));
        }

        $regs = $query->get();

        return response()->json($regs, 200);
    }
}
