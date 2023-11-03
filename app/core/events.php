<?php
session_start();
require("../../app/class/database.php");
require("../../app/class/notification.php");
require("../../src/lang/".$_SESSION['LANG'].".php");
$notification = new Notification;
//require("../connect/api.php");
$db = new Database();
switch ($_POST["req"]) {

    case 'addEvent':

        $customer = $_POST['customer'];
        $package = $_POST['package'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        if($customer == 0){
            echo json_encode(["type" => "warning","msg"=>$lang["error"]["select_customer"]]);
        }elseif($package == 0){
            echo json_encode(["type" => "warning","msg"=>$lang["error"]["select_package"]]);
        }else{
            $packages = $db->selectAnd("service_packages",["id"=>$package]);
            $total_session = $packages[0]["session"];

            $events = $db->selectAnd("appointments",[
                "customer" => $customer,
                "package" => $package 
            ]);
            $count_session = count($events);

            $customers = $db->selectAnd("accounts",["id"=>$customer]);

            if($total_session > $count_session){
                $new_session = $count_session +1;

                $insert = $db->insert("appointments",[
                    "customer" => $customer,
                    "package" => $package,
                    "session" =>$new_session,
                    "session_date" => $date,
                    "session_time" => $time,
                    "status" => 1
                ]);
                if($insert){
                    $msg = 'SN. '.$customers[0]["fname"].' '.$customers[0]["lname"].' '.$date.' tarihinde saat '.$time.' \'de randevunuz oluşturulmuştur.';
                    $to = "9".trim($customers[0]["phone"]);
                    
                    $notification->send_sms($to, $msg);
                    echo json_encode(["type" => "success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                }else{
                    echo json_encode(["type" => "error","msg"=>$lang["error"]["system_error"]]);
                }

            }else{
                echo json_encode(["type" => "warning","msg"=>$lang["error"]["max_session"]]);
            }


         // echo json_encode(["type" => "warning","msg"=>$count_session]);
        }

        break;
    case 'complate_session':
        $id = $_POST['id'];

            if($id){
                $select = $db->selectAnd("appointments", ["id"=>$id]);
                if($select){

                    $customers = $db->selectAnd("accounts",["id"=>$select[0]["customer"]]);
                  //  echo json_encode(["type" => "warning","msg"=>$select[0]["status"]]);
                    if($select[0]["status"] == 2){
                        echo json_encode(["type" => "warning","msg"=>$lang["error"]["already_complated"]]);
                    }else{
                        $update = $db->update("appointments",$id,["status"=>2]);
                        if($update){

                            $msg = 'SN. '.$customers[0]["fname"].' '.$customers[0]["lname"].' bugünkü randevunuz tamamlanmıştır. Bizi tercih ettiğiniz için teşekkür ederiz.';
                    $to = "9".trim($customers[0]["phone"]);
                    
                    $notification->send_sms($to, $msg);


                            echo json_encode(["type" => "success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                        }else{
                            echo json_encode(["type" => "error","msg"=>$lang["error"]["system_error"]]);
                        }
                    }
                }else{
                    echo json_encode(["type" => "error","msg"=>$lang["error"]["system_error"]]);
                }
            }else{
                echo json_encode(["type" => "error","msg"=>$lang["error"]["system_error"]]);
            }
        break;
    case 'cancelled_session':
        $id = $_POST['id'];

            if($id){
                $select = $db->selectAnd("appointments", ["id"=>$id]);
                $customers = $db->selectAnd("accounts",["id"=>$select[0]["customer"]]);
                if($select){
                    //  echo json_encode(["type" => "warning","msg"=>$select[0]["status"]]);
                    if($select[0]["status"] == 0){
                        echo json_encode(["type" => "warning","msg"=>$lang["error"]["already_cancelled"]]);
                    }else{
                        $update = $db->update("appointments",$id,["status"=>0]);
                        if($update){

                    $msg = 'SN. '.$customers[0]["fname"].' '.$customers[0]["lname"].' '.$select[0]["session_date"].' tarihindeki randevunuz iptal edilmiştir. Tekrar randevu almak için bizimle iletişime geçiniz.';
                    $to = "9".trim($customers[0]["phone"]);
                    
                    $notification->send_sms($to, $msg);


                            echo json_encode(["type" => "success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                        }else{
                            echo json_encode(["type" => "error","msg"=>$lang["error"]["system_error"]]);
                        }
                    }
                }else{
                    echo json_encode(["type" => "error","msg"=>$lang["error"]["system_error"]]);
                }
            }else{
                echo json_encode(["type" => "error","msg"=>$lang["error"]["system_error"]]);
            }
        break;
    case 'add_note':
        $id = $_POST['id'];
        $user = $_POST['user'];
        $note = $_POST['note'];
        $date = date("Y-m-d H:i:s");

            if(empty($id) || empty($user)){
                echo json_encode(["type" => "error","msg"=>$lang["error"]["system_error"]]);
            }elseif(empty($note)){
                echo json_encode(["type" => "warning","msg"=>$lang["error"]["empty_fields"]]);
            }else{
                $data = [
                    "appointment" => $id,
                    "user" => $user,
                    "note" => $note,
                    "created_at" => $date,
                    "status" => 1
                ];
                $insert = $db->insert("session_notes",$data);
                if($insert){
                    echo json_encode(["type" => "success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                }else{
                    echo json_encode(["type" => "error","msg"=>$lang["error"]["system_error"]]);
                }
            }
        break;
}