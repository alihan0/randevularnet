<?php 

class auth{
    
    public function login(){
        if(!isset($_SESSION["LOGIN"])){
            view("login");
        }else{
            redirect("/home/");
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        redirect("/");
    }

    

}