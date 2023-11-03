<?php
include '../class/database.php';

$db = new Database;
$randevular = $db->selectAnd("appointments");

//echo json_encode($randevular);
$events = [];
foreach ($randevular as $randevu) {
        $users = $db->selectAnd("accounts",["id"=>$randevu["customer"]]);
        $packs = $db->selectAnd("service_packages",["id"=>$randevu["package"]]);
        $pack = $packs[0]["package_name"];
        $name = $users[0]["fname"].' '.$users[0]["lname"];

        if($randevu["status"] == 0){
          $color = "#f46a6a";
        }elseif($randevu["status"] == 1){
          $color = "#f1b44c";
        }elseif($randevu["status"] == 2){
          $color = "#34c38f";
        }else{
          $color = "#556ee6";
        }


        $event = [
            "id" => $randevu[0],
            "title" => $name.' - '.$pack,
            "start" => $randevu["session_date"],
           // "status" => $randevu["status"],
            "color" => $color
        ];
        array_push($events,$event);
 
    
  }

echo json_encode($events);