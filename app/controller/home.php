<?php 

class home{

    public function main(){
       
        if(isset($_SESSION['LOGIN'])){
            redirect("/home/");
        }else{
            redirect("/login");
        }
    }

    public function dashboard(){
        if(!isset($_SESSION['LOGIN'])){
            redirect("/");
        }else{
            view("home");
        }
        
    }

    

}