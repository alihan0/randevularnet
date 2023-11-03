<?php
session_start();
require("../../app/class/database.php");
require("../../src/lang/".$_SESSION['LANG'].".php");
$db = new Database;
$setting = $db->selectAnd("settings",["id"=>1]);
$admin_count = $db->count("accounts",["type"=>"ADMIN"]);
$customer_count = $db->count("accounts",["type"=>"CUSTOMER"]);
switch ($_POST["req"]) {
    case 'login':
       
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hash = md5(sha1($password)).sha1(md5($password));
            
            if(empty($username) || empty($password)){
                echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
            }else{
                
                $sec = $db->selectAnd("accounts", ["username"=>$username,"password"=>$hash]);
                if($sec){
                    $_SESSION["LOGIN"] = true;
                    $_SESSION["uid"] = $sec[0]["id"];
                    echo json_encode(["type"=>"success","msg"=>$lang["success"]["login_success"],"ok"=>true]);
                }else{
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["incorrect_datas"]]);
                }
               
            }
        break;
    case 'addAdmin':

        $username = $_POST["data"][0]["value"];
        $password = $_POST["data"][1]["value"];
        $fname =    $_POST["data"][2]["value"];
        $lname =    $_POST["data"][3]["value"];
        $email =    $_POST["data"][4]["value"];
        $phone =    $_POST["data"][5]["value"];
        $date = date("Y-m-d H:i:s");
        $hash = md5(sha1($password)).sha1(md5($password));

        if($admin_count < $setting[0]["admin_limit"]){
            if(empty($username) || empty($password) || empty($fname) || empty($lname) || empty($email) || empty($phone) ){
                echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
            }else{
                if( !filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["incorrect_email"]]);
                }else{
                    $pattern = '/^0[0-9]{10}/';
    
                    if(!preg_match($pattern, $phone)){
                        echo json_encode(["type"=>"warning","msg"=>$lang["error"]["incorrect_phone"]]);
                    }else{
                        $s1 = $db->selectAnd("accounts", ["username"=>$username]);
                        $s2 = $db->selectAnd("accounts", ["email"=>$email]);
                        $s3 = $db->selectAnd("accounts", ["phone"=>$phone]);
                        if($s1){
                            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["already_username"]]);
                        }elseif($s2){
                            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["already_email"]]);
                        }elseif($s3){
                            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["already_phone"]]);
                        }else{
                            $data = [
                                "type" => "ADMIN",
                                "username" => $username,
                                "password" => $hash,
                                "fname" => $fname,
                                "lname" => $lname,
                                "email" => $email,
                                "phone" => $phone,
                                "status" => 1,
                                "updated_at" => $date,
                                "created_at" => $date
                            ];
                            $insert = $db->insert("accounts",$data);
                            if($insert){
                                echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                            }else{
                                echo json_encode(["type"=>"error","msg"=>$lang["error"]["system_error"]]);
                            }
                        }
                    }
                }
            }
        }else{
            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["max_admin"]]);
            exit;
        }
        

       
        break;
    case 'addStaff':

        $username = $_POST["data"][0]["value"];
        $password = $_POST["data"][1]["value"];
        $fname =    $_POST["data"][2]["value"];
        $lname =    $_POST["data"][3]["value"];
        $email =    $_POST["data"][4]["value"];
        $phone =    $_POST["data"][5]["value"];
        $date = date("Y-m-d H:i:s");
        $hash = md5(sha1($password)).sha1(md5($password));
        

        if(empty($username) || empty($password) || empty($fname) || empty($lname) || empty($email) || empty($phone) ){
            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
        }else{
            if( !filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo json_encode(["type"=>"warning","msg"=>$lang["error"]["incorrect_email"]]);
            }else{
                $pattern = '/^0[0-9]{10}/';

                if(!preg_match($pattern, $phone)){
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["incorrect_phone"]]);
                }else{
                    $s1 = $db->selectAnd("accounts", ["username"=>$username]);
                    $s2 = $db->selectAnd("accounts", ["email"=>$email]);
                    $s3 = $db->selectAnd("accounts", ["phone"=>$phone]);
                    if($s1){
                        echo json_encode(["type"=>"warning","msg"=>$lang["error"]["already_username"]]);
                    }elseif($s2){
                        echo json_encode(["type"=>"warning","msg"=>$lang["error"]["already_email"]]);
                    }elseif($s3){
                        echo json_encode(["type"=>"warning","msg"=>$lang["error"]["already_phone"]]);
                    }else{
                        $data = [
                            "type" => "STAFF",
                            "username" => $username,
                            "password" => $hash,
                            "fname" => $fname,
                            "lname" => $lname,
                            "email" => $email,
                            "phone" => $phone,
                            "status" => 1,
                            "updated_at" => $date,
                            "created_at" => $date
                        ];
                        $insert = $db->insert("accounts",$data);
                        if($insert){
                            echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                        }else{
                            echo json_encode(["type"=>"error","msg"=>$lang["error"]["system_error"]]);
                        }
                    }
                }
            }
        }
        break;
    case 'addCustomer':


        $fname =    $_POST["data"][0]["value"];
        $lname =    $_POST["data"][1]["value"];
        $email =    $_POST["data"][2]["value"];
        $phone =    $_POST["data"][3]["value"];
        $tc =       $_POST["data"][4]["value"];
        $birthdate =    $_POST["data"][5]["value"];
        $address =    $_POST["data"][6]["value"];
        $date = date("Y-m-d H:i:s");
        $hash = md5(sha1($password)).sha1(md5($password));


        if($admin_count < $setting[0]["admin_limit"]){
            if(empty($tc) || empty($birthdate) || empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($address) ){
                echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
            }else{
                if( !filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["incorrect_email"]]);
                }else{
                    $pattern = '/^0[0-9]{10}/';
    
                    if(!preg_match($pattern, $phone)){
                        echo json_encode(["type"=>"warning","msg"=>$lang["error"]["incorrect_phone"]]);
                    }else{
                        $s1 = $db->selectAnd("accounts", ["tckn"=>$tc]);
                        $s2 = $db->selectAnd("accounts", ["email"=>$email]);
                        $s3 = $db->selectAnd("accounts", ["phone"=>$phone]);
                        if($s1){
                            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["already_tc"]]);
                        }elseif($s2){
                            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["already_email"]]);
                        }elseif($s3){
                            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["already_phone"]]);
                        }else{
                            $data = [
                                "type" => "CUSTOMER",
                            
                                "fname" => $fname,
                                "lname" => $lname,
                                "email" => $email,
                                "phone" => $phone,
                                "birthdate" => $birthdate,
                                "tckn" => $tc,
                                "adress" => $address,
                                "status" => 1,
                                "updated_at" => $date,
                                "created_at" => $date
                            ];
                            $insert = $db->insert("accounts",$data);
                            if($insert){
                                echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                            }else{
                                echo json_encode(["type"=>"error","msg"=>$lang["error"]["system_error"]]);
                            }
                        }
                    }
                }
            }
        }else{
            echo json_encode(["type"=>"warning","msg"=>$lang["error"]["max_customer"]]);
            exit;
        }
        

        
        break;
    case 'updateCustomer':

        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $birthdate = $_POST['birthdate'];
        $tckn = $_POST['tckn'];
        $adress = $_POST['adress'];
        $date = date("Y-m-d H:i:s");

        if(!empty($id)){
            if(empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($birthdate) || empty($tckn) || empty($adress) ){
                echo json_encode(["type"=>"warning","msg"=>$lang["error"]["empty_fields"]]);
            }else{
                $update = $db->update("accounts",$id,[
                    "fname" => $fname,
                    "lname" => $lname,
                    "email" => $email,
                    "phone" => $phone,
                    "birthdate" => $birthdate,
                    "tckn" => $tckn,
                    "adress" => $adress,
                    "updated_at" => $date
                ]);

                if($update){
                    echo json_encode(["type"=>"success","msg"=>$lang["success"]["successfull"],"ok"=>true]);
                }else{
                    echo json_encode(["type"=>"error","msg"=>$lang["error"]["system_error"]]);
                }

            }
        }

        break;
}