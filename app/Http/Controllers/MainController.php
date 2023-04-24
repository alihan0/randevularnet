<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    

    // Response all post
    protected $response = ["type" => "warning", "message" => "MainController", "Response", "status" => false];

    public function __construct()
    {
        View::addLocation(resource_path("views/rell/layout/Home"));
    }


    public function home(){
        return view('dashboard');
    }
}
