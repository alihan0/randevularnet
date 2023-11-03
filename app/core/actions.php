<?php
session_start();
require("../../app/class/database.php");
require("../../src/lang/".$_SESSION['LANG'].".php");
require("../../app/class/notification.php");
$notification = new Notification;
$db = new Database;
switch ($_POST["req"]) {

    case 'addPayment':
        $cid = $_POST['cid'];
        $type = $_POST['type'];
        $amount = number_format($_POST['amount'],2,".",",");
        
        $date = date("Y-m-d H:i:s");

            if(!empty($cid)){
                if($type == 0){
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
                }elseif(empty($amount)){
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
                }else{
                    $data = [
                        "type" => $type,
                        "customer" => $cid,
                        "amount" => $amount,
                        "created_at" => $date,
                        "status" => 2
                    ];
                    $insert = $db->insert("payments",$data);
                    if($insert){
                        $customers = $db->selectAnd("accounts",["id"=>$cid]);
                        $msg = 'SN. '.$customers[0]["fname"].' '.$customers[0]["lname"].' '.$date.' \'de toplam '.$amount.' TL tutarındaki ödemeniz onaylanmıştır. Ödemeniz için teşekkür ederiz.';
                        $to = "9".trim($customers[0]["phone"]);
                        
                        $notification->send_sms($to, $msg);


                        echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"danger","msg"=>$lang["error"]["system_error"]]);
                    }
                    
                }
            }
        break;
    case'addSalesPackage':

        $cid = $_POST['cid'];
        $pid = $_POST['pid'];
        $price = number_format($_POST['price'],2,".","");
        $date = date("Y-m-d H:i:s");

            if(!empty($cid)){
                if($pid == 0){
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
                }else{
                    $data  = [
                        "customer" => $cid,
                        "package" => $pid,
                        "price" => $price,
                        "created_at" => $date,
                        "status" => 1
                    ];
                    $insert = $db->insert("sales",$data);
                    if($insert){

                        $customers = $db->selectAnd("accounts",["id"=>$cid]);
                        $packages = $db->selectAnd("service_packages",["id"=>$pid]);
                        $msg = 'SN. '.$customers[0]["fname"].' '.$customers[0]["lname"].' '.$packages[0]["package_name"].' paketiniz, '.$price.' TL karşılığında hesabınıza tanımlanmıştır. Bizi tercih ettiğiniz için teşekkür ederiz.';
                        $to = "9".trim($customers[0]["phone"]);
                        
                        $notification->send_sms($to, $msg);
                        
                        echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"danger","msg"=>$lang["error"]["system_error"]]);
                    }
                }
            }

        break;
    case 'add_note':
        $cid = $_POST['cid'];
        $user = $_POST['user'];
        $note = $_POST['note'];
        $date = date("Y-m-d H:i:s");
            if(!empty($cid) || !empty($user)){
                if(empty($note)){
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
                }else{
                    $data = [
                        "customer" => $cid,
                        "user" => $user,
                        "note" => $note,
                        "created_at"=> $date,
                        "status" =>1
                    ];

                    $insert = $db->insert("customer_notes",$data);

                    if($insert){
                        
                        echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"danger","msg"=>$lang["error"]["system_error"]]);
                    }


                }
            }
        break;
    
    case 'add_file':
        $cid = $_POST['cid'];
        $file = $_POST['file'];
        $type = $_POST['type'];
        $date = date("Y-m-d H:i:s");
            if(!empty($cid)){
                if($type == 0 || empty($file)){
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
                }else{
                    $data = [
                        "customer" =>$cid,
                        "type" =>$type,
                        "file" => $file,
                        "created_at" => $date,
                        "status" => 1
                    ];
                    $insert = $db->insert("files",$data);
                    if($insert){
                        
                        echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"danger","msg"=>$lang["error"]["system_error"]]);
                    }

                }
            }
        break;
}