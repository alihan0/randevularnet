<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

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
    public function register(){
        return view('register');
    }

    public function login_control(Request $request){

        if(empty($request->email)){
            $this->response["message"] = __('auth.messages.empty-field', ['field' => __('auth.fields.email')]);
        }elseif(empty($request->password)){
            $this->response["message"] = __('auth.messages.empty-field', ['field' => __('auth.fields.password')]);
        }else{
            if(Auth::attempt(["email" => $request->email, "password" => $request->password])){
                if(Auth::user()->status == 1){

                    $request->session()->regenerate();
                    Auth::login(Auth::user());

                    $this->response["type"] = "success";
                    $this->response["message"] = __('auth.messages.success_login');
                    $this->response["status"] = true;
                }else{
                    $this->response["type"] = "error";
                    $this->response["message"] = __('auth.messages.login_permission_denied');
                }
            }else{
                $this->response["message"] = __('auth.messages.incorrect_login');
            }
        }

        return $this->response;
    }

    public function register_control(Request $request){


        if(empty($request->firstname)){
            $this->response["message"] = __('auth.messages.empty-field', ['field' => __('auth.fields.firstname')]);
        }elseif(empty($request->lastname)){
            $this->response["message"] = __('auth.messages.empty-field', ['field' => __('auth.fields.lastname')]);
        }elseif(empty($request->email)){
            $this->response["message"] = __('auth.messages.empty-field', ['field' => __('auth.fields.email')]);
        }elseif(empty($request->password)){
            $this->response["message"] = __('auth.messages.empty-field', ['field' => __('auth.fields.password')]);
        }else{
            if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                $this->response["message"] = __('auth.messages.incorrect-email');
            }elseif(strlen($request->password) < 6){
                $this->response["message"] = __('auth.messages.low-password');
            }else{
                $find = User::where('email', $request->email)->first();
                if($find){
                    $this->response["message"] = __('auth.messages.email-already-exist');
                }else{
                    $user = new User;
                    $user->firstname = trim($this->pre_up($request->firstname));
                    $user->lastname = trim($this->pre_up($request->lastname));
                    $user->email = trim($request->email);
                    $user->password = Hash::make($request->password);
                    $user->status = 1;

                        if($user->save()){
                            $this->response["type"] = "success";
                            $this->response["message"] = __('auth.messages.account-created');
                            $this->response["status"] = true;
                        }else{
                            $this->response["type"] = "error";
                            $this->response["message"] = "SYSTEM_ERROR";
                        }

                }
            }
        }

        return $this->response;
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }


    function pre_up($str) {
        $lowercaseTurkishChars = array('ı', 'i', 'ş', 'ğ', 'ü', 'ö', 'ç');
        $firstChar = mb_substr($str, 0, 1, 'UTF-8');
        $restOfString = mb_substr($str, 1, null, 'UTF-8');
        
        if (in_array($firstChar, $lowercaseTurkishChars)) {
          $firstChar = mb_strtoupper($firstChar, 'UTF-8');
        } else {
          $firstChar = mb_strtoupper($firstChar, 'UTF-8');
          $restOfString = mb_strtolower($restOfString, 'UTF-8');
        }
        
        return $firstChar . $restOfString;
      }
      
    
}
