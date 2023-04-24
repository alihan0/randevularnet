<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    


    // Response all post
    protected $response = ["type" => "warning", "message" => "MainController", "Response", "status" => false];

    public function __construct()
    {
        View::addLocation(resource_path("views/rell/layout/auth"));
    }

    public function login(){
        return view('login');
    }

    public function login_control(Request $request){
        return $this->response;
    }


}
