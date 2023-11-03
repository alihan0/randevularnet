<?php 

switch ($request[3]) {
    case 'all':
        ?>

        <div class="card">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div> <!-- end col -->
<?php 

break;
case 'day':
    $times = [
        "08:00",
        "09:00",
        "10:00",
        "11:00",
        "12:00",
        "13:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00",
        "20:00",
        "21:00"
    ];
    $count = count($times);
?>
<style>

    .td:hover{
        background:#eee
    }
    .thisdaysession{
        cursor:pointer;
    }
    .thisdaysession span{
        font-weight:bold;
        font-size :14px
    }
    .thisdaysession sub{
        font-weight:bold;
    
    }
    .thisdaysession:hover span{
        color:#444
    }
</style>

<div class="row">
</div class="col-7">
 <div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4"><?=Lang::line("title","date").': '.$request[4]?></h4>
        <input type="hidden" value="<?=$request[4]?>" id="thisdate">
        <div class="table-responsive">
            <table class="table table-nowrap align-middle mb-0">
                <tbody>
                    
                    <?php 
                        for($i=0;$i<$count;$i++){
                    ?>
                    <tr  class="td">
                        <td>
                            <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark"><i class="fa-solid fa-clock"></i>   <?=$times[$i]?></a></h5>
                        </td>
                        <td>
                            <a class="btn btn-success addSession" id="<?=$times[$i]?>"><i class="fas fa-plus"></i></a>
                        </td>
                        <td>
                            <ul>
                            <?php
                            $events  = $db->selectAnd("appointments",[
                                "session_date" => $request[4],
                                "session_time" => $times[$i]
                            ]);
                              $sayevent = count($events);
                            if($sayevent > 0){
                                for($a=0;$a<$sayevent;$a++){
                                    ?><li id="<?=$events[$a]["id"]?>" class="thisdaysession" style="margin-bottom:15px;width:150px;z-index:99;list-style:none;"><span class="p-4 display-4 badge <?php if($events[$a]["status"] == 0){echo"bg-danger";}elseif($events[$a]["status"] == 1){echo"bg-warning";}elseif($events[$a]["status"]==2){echo"bg-success";}else{echo"bg-primary";}?>"><?php
                                    $users = $db->selectAnd("accounts",["id"=>$events[$a]["customer"]]);
                                    $packs = $db->selectAnd("service_packages",["id"=>$events[$a]["package"]]);
                                    echo $users[0]["fname"].' '.$users[0]['lname'];
                                    echo '<br><sub>'.$packs[0]['package_name'].'</sub></span>';
                                    ?></li><?php
                                }
                               
                            }
                            ?>
                        </ul>
                        </td>
                    </tr>
                <?php 
                    }
                ?>
                </tbody>
            </table>
        </div>
        <!-- end table responsive -->
    </div>
    </div>
    </div>
<?php
    break;
}
