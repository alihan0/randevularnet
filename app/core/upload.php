<?php
    require("../../engine.php");
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
 
        if($_FILES["file"]["type"] == "image/jpeg"){
            $son = ".jpg";
        }elseif($_FILES["file"]["type"] == "image/png"){
            $son = ".png";
        }
        $name = time().$son;

        
        if(move_uploaded_file($_FILES['file']['tmp_name'], '../../src/uploads/' . $name)){
            echo json_encode(["type"=>"success","msg"=>"Resim Yüklendi","img"=>$name]);
        }else{
            echo json_encode(["type"=>"warnig","msg"=>"Resim yüklenemedi"]);
        }
    }