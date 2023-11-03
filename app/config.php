<?php

#   COPYRIGHT © 2022   
#   METATIGE DIGITAL
#   www.metatige.com
#   info@metatige.com
#   -----------------
#   Bu sayfa yazılımın tanımlama dosyasıdır. 


$config["url"] = "https://queen.metatige.com/";     //SİSTEMİN KURULU OLDUĞU URL
$config["basename"] = "quuenguzellik";             // SİSTEMİN BASE ADI
$config["project_name"] = "Queen Güzellik Randevu Sistemi";        // PROJENİN GÖRÜNEN ADI
$config["lang"] = "tr";                             // SİSTEMİN VARSAYILAN DİLİ
$config["libs"] = [
    "jquery",
    "bootstrap",
    
    "font-awesome",
    "toastr",
    "metismenu",
    "simplebar",
    "node-waves",
    "datatable",
    "select2",
    "magnific-popup",
    
    "app",
];


if(!defined("APP")){
    define("APP",$config["url"]."app/");
}
if(!defined("SRC")){
    define("SRC",$config["url"]."src/");
}
if(!defined("ASSET")){
    define("ASSET",SRC."assets/");
}
if(!defined("IMG")){
    define("IMG",SRC."images/");
}
global $config;