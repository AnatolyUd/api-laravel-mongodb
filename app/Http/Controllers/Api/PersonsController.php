<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\LoadCsvService;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    /*
      |-------------------------------------------------------------------------------
      | Load csv file to database
      |-------------------------------------------------------------------------------
      | URL:            /api/v1/persons
      | Method:         POST
      | Description:    Load csv file to database
    */
    public function load(LoadCsvService $service)
    {
        $loaded = $service->loadCsv();

        return response()->json([
            'count' => $loaded
        ], 200);
    }

    /*
      |-------------------------------------------------------------------------------
      | Get data from a persons collection
      |-------------------------------------------------------------------------------
      | URL:            /api/v1/persons
      | Method:         GET
      | Description:    Get data from a persons collection
    */
    public function list(Request $request)
    {
        $properties = array_intersect_key($request->input(), array_fill_keys(Person::PROPERTY_NAMES, 0));

        $whereProperties = [];
        foreach ($properties as $key => $value) {
            if (in_array($key, Person::PROPERTY_HAS_INT_VALUES)) {
                $value = intval($value);
            }

            $whereProperties[Person::PROPERTIES_KEY.'.'.$key] = $value;
        }

        $query = Person::query();
        $query->where($whereProperties);

        $sort_order = $request->input('sort_order', 'asc');
        if ($sort_by = $request->input('sort_by')){
            $query->orderBy(Person::PROPERTIES_KEY.'.'.$sort_by, $sort_order);
        }

        if ($offset = $request->input('offset')){
            $query->offset(intval($offset));
        }

        if ($limit = $request->input('limit')){
            $query->limit(intval($limit));
        }

        $persons = $query->get();

        return response()->json($persons, 200);
    }

}
