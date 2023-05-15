<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plans;

class DataController extends Controller
{
    protected $response = [];

    public function plan_detail(Request $request){

        return Plans::find($request->plan);
        
    }
}
