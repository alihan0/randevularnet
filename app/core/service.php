<?php
session_start();
require("../../app/class/database.php");
require("../../src/lang/".$_SESSION['LANG'].".php");
$db = new Database;
switch ($_POST["req"]) {

    case 'addService':

        $service_name = $_POST["data"][0]["value"];
     
       
        

        if(empty($service_name)){
            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
        }else{
                $data = ["service_name" => $service_name,"status"=>1];
                 $insert = $db->insert("services",$data);
                 if($insert){
                    echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                 }else{
                    echo json_encode(["type"=>"error","msg"=>$lang["error"]["system_error"]]);
                 }
            
        }
        break;
    case 'addServiceAreas':

        $service = $_POST["data"][0]["value"];
        $area = $_POST["data"][1]["value"];
        
    
        if($service == 0){
            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["select_service"]]);
        }else{
            if(empty($area)){
                echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
            }else{
                    $data = [
                        "service" => $service,
                        "area" => $area,
                        "status" => 1
                    ];
                        $insert = $db->insert("service_areas",$data);
                        if($insert){
                        echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                        }else{
                        echo json_encode(["type"=>"error","msg"=>$lang["error"]["system_error"]]);
                        }
                
            }
        }
       
        
        break;
    case 'addServicePackages':

        $package_name = $_POST["package_name"];
        $service = $_POST["service"];
        $area = $_POST["areas"];
        $session = $_POST["session"];
        $price = $_POST["price"];
        $areas = json_encode($area);
        if($service == 0){
            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["select_service"]]);
        }else{
            if(empty($area) || empty($package_name) || empty($session) || empty($price)){
                echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
            }else{
                    $data = [
                        "package_name" => $package_name,
                        "service" => $service,
                        "areas" => $areas,
                        "session" => $session,
                        "price" => $price,
                        "status" => 1
                    ];
                        $insert = $db->insert("service_packages",$data);
                        if($insert){
                        echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                        }else{
                        echo json_encode(["type"=>"danger","msg"=>$lang["error"]["system_error"]]);
                        }
                
            }
        }
        
        
        break;
    
}