<?php


Route::run("", "home@main");

Route::run("home", "home@dashboard");

Route::run("login", "auth@login");
Route::run("logout", "auth@logout");

Route::run("lang", function(){

  $req = explode("/",$_SERVER['REQUEST_URI']);

 Lang::switch($req[2]);
 redirect("/");
});


Route::run("sessions", function(){
   print_r($_SESSION);
});

Route::run("randevular", function(){
   
});