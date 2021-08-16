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
        ], 201);
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
        $query = Person::query();

        if ($request->login){
            $query->where('properties.login', $request->login);
        }
        if ($request->email){
            $query->where('properties.email', $request->email);
        }
        if ($request->first_name){
            $query->where('properties.first_name', $request->first_name);
        }
        if ($request->last_name){
            $query->where('properties.last_name', $request->last_name);
        }
        if ($request->age){
            $query->where('properties.age', $request->age);
        }
        if ($request->gender){
            $query->where('properties.gender', $request->gender);
        }
        if ($request->mobile_number){
            $query->where('properties.mobile_number', $request->mobile_number);
        }
        if ($request->city){
            $query->where('properties.city', $request->city);
        }
        if ($request->car_model){
            $query->where('properties.car_model', $request->car_model);
        }
        if ($request->salary){
            $query->where('properties.salary', $request->salary);
        }

        if ($request->order_by){
            $query->orderBy('properties.'.$request->order_by);
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
