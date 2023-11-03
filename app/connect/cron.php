<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../../app/class/database.php");
require("../../app/class/notification.php");
$db = new Database;
$notification = new Notification;

$bugun = date("Y-m-d");
$cevir = strtotime('+1 day',strtotime($bugun));
$yarin = date("Y-m-d",$cevir); // dünün tarihi elimizde 

    //$notification->send_sms("905464971229","cron");

$events = $db->selectAnd("appointments");

$phones = [];
foreach ($events as $event) {


        if($event["session_date"] == $yarin){
            if($event["reminding_tomorrow"] == 0 && $event["status"] == 1){
                $customers = $db->selectAnd("accounts",["id"=>$event["customer"]]);
                $phone = "9".$customers[0]["phone"];
                array_push($phones,$phone);
        
                $say = count($phones);
                $msg = "HATIRLATMA: SN. ".$customers[0]["fname"].' '.$customers[0]["lname"].' yarın saat '.$event["session_time"].'\'de randevunuz bulunmaktadır.'; 

                for($i=0;$i<$say;$i++){
                
                    $sms = $notification->send_sms($phones[$i],$msg);

                    $up = $db->update("appointments", $event["id"], [
                        "reminding_tomorrow" => 1
                    ]);
                }
        
            }
        }


        if($event["session_date"] == $bugun){
            if($event["reminding_today"] == 0 && $event["status"] == 1){
                $customers = $db->selectAnd("accounts",["id"=>$event["customer"]]);
                $phone = "9".$customers[0]["phone"];
                array_push($phones,$phone);
        
                $say = count($phones);
                $msg = "HATIRLATMA: SN. ".$customers[0]["fname"].' '.$customers[0]["lname"].' bugün saat '.$event["session_time"].'\'de randevunuz bulunmaktadır.'; 

                for($i=0;$i<$say;$i++){
                
                    $sms = $notification->send_sms($phones[$i],$msg);

                    $up = $db->update("appointments", $event["id"], [
                        "reminding_today" => 1
                    ]);
                }
        
            }
        }
} 
