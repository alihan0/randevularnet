<?php



class Notification {

    public $notification = [];

    public function __construct(){
        $this->notification = [
            "type" => "SMS",
            "sender" => "08503801229",
            "url" => "https://metatige.mobikob.com/sms/bulk/api/",
            "user" => "alihan@metatige.com",
            "pass" => "alihan12",
        ];
    }

    public function send_sms($to, $msg){
        require_once("../../app/class/database.php");
        $db = new Database;
        $setting = $db->selectAnd("settings",["id"=>1]);
        //print_r($this->notification);

        // $this->notification["sender"];

            $payload = array(
                'api_user' => $this->notification["user"],
                'api_pass' => $this->notification["pass"],
                'head' => $this->notification["sender"],
                'messages' =>array(
                    array(
                        'to'       => $to,
                        'msg'      => $msg,
                    )
                )
            );

            if($setting[0]["sms_balance"] > 0){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                curl_setopt($ch, CURLOPT_URL,$this->notification["url"]);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                    $error_msg = curl_error($ch);
                }
                curl_close($ch);
    
                if (isset($error_msg)) {
                    echo $error_msg;
                }else{
                    //echo "sms send!";
                
                 $new_balance = $setting[0]["sms_balance"] -1;
                 $update = $db->update("settings",1,["sms_balance"=>$new_balance]);
                }
                
            }else{
                echo json_encode(["type"=>"info","msg"=>"Yetersiz SMS!"]);
                exit;
            }
           
           


       
    }

}