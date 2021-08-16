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
        $query = Person::query();

        if ($login = $request->input('login')){
            $query->where('properties.login', $login);
        }
        if ($email = $request->input('email')){
            $query->where('properties.email', $email);
        }
        if ($first_name = $request->input('first_name')){
            $query->where('properties.first_name', $first_name);
        }
        if ($last_name = $request->input('last_name')){
            $query->where('properties.last_name', $last_name);
        }
        if ($age = $request->input('age')){
            $query->where('properties.age', $age);
        }
        if ($gender = $request->input('gender')){
            $query->where('properties.gender', $gender);
        }
        if ($mobile_number = $request->input('mobile_number')){
            $query->where('properties.mobile_number', $mobile_number);
        }
        if ($city = $request->input('city')){
            $query->where('properties.city', $city);
        }
        if ($car_model = $request->input('car_model')){
            $query->where('properties.car_model', $car_model);
        }
        if ($salary = $request->input('salary')){
            $query->where('properties.salary', $salary);
        }

        $sort_order = $request->input('sort_order', 'asc');
        if ($sort_by = $request->input('sort_by')){
            $query->orderBy('properties.'.$sort_by, $sort_order);
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
