<?php
session_start();
require("../../app/class/database.php");
require("../../src/lang/".$_SESSION['LANG'].".php");
$db = new Database;

if($_POST){
    switch ($_POST["req"]) {
        case 'show_sales':
            $cid = $_POST['cid'];

            if(!empty($cid)){
                $select = $db->selectAnd("sales",["customer"=>$cid]);
                if($select){
                   
                   
                    $datas = [];
                    $sales = $db->selectAnd("sales", ["customer"=>$cid]);
                    foreach ($sales as $sale) {

                        $packages = $db->selectAnd("service_packages",["id"=>$sale["package"]]);

                        array_push($datas, ["id"=>$packages[0]["id"],"name"=>$packages[0]["package_name"]]);
                        
                    
                    }
               
                    
                    echo json_encode(["type"=>"success","options"=>$datas]);
                }else{
                    echo json_encode(["type"=>"warning","msg"=>$lang["error"]["package_not_found"]]);
                }
            }

            break;
        case 'show_values':
            $pid = $_POST['pid'];
            if(!empty($pid)){
                $packages = $db->selectAnd("service_packages",["id"=>$pid]);
                echo json_encode(["type"=>"success","session"=>$packages[0]["session"],"price"=>$packages[0]["price"]]);
            }
            break;
    }
}