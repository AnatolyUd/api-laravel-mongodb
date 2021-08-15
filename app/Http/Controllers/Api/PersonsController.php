<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\LoadCsvService;

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
        ], 201);
    }
}
