<?php 
$setting = $db->selectAnd("settings",["id"=>1]);
?>
<div class="row">

<div class="col-md-3">
    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium"><?=Lang::line("card","customers")?></p>
                    <h4 class="mb-0"><?=$db->count("accounts",["type"=>"CUSTOMER"])?>/<?=$setting[0]["customer_limit"]?></h4>
                </div>

                <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                        <span class="avatar-title">
                            <i class="fa-solid fa-users"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium"><?=Lang::line("card","admins")?></p>
                    <h4 class="mb-0"><?=$db->count("accounts",["type"=>"ADMIN"])?>/<?=$setting[0]["admin_limit"]?></h4>
                </div>

                <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                        <span class="avatar-title">
                            <i class="fa-solid fa-user-secret"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium"><?=Lang::line("card","services")?></p>
                    <h4 class="mb-0"><?=$db->count("services",["status"=>1])?></h4>
                </div>

                <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                        <span class="avatar-title">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium"><?=Lang::line("card","packages")?></p>
                    <h4 class="mb-0"><?=$db->count("service_packages",["status"=>1])?></h4>
                </div>

                <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                        <span class="avatar-title">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<div class="row">
    <div class="col-md-9">
        <?php
      $date = date("Y-m-d");
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
        float:left;
        margin-left:25px;
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
        <h4 class="card-title mb-4"><?=Lang::line("card","coming_events").' <small>('.$date.')</small>'?></h4>
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
                            <ul>
                            <?php
                            $events  = $db->selectAnd("appointments",[
                                "session_date" => $date,
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
    <div class="col-md-3">
    
    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium"><?=Lang::line("card","total_active_session")?></p>
                    <h4 class="mb-0"><?=$db->count("appointments",["status"=>1])?></h4>
                </div>

                <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                        <span class="avatar-title">
                        <i class="fa-solid fa-calendar-plus"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium"><?=Lang::line("card","total_complated_session")?></p>
                    <h4 class="mb-0"><?=$db->count("appointments",["status"=>2])?></h4>
                </div>

                <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                        <span class="avatar-title">
                        <i class="fa-solid fa-calendar-check"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium"><?=Lang::line("card","total_cancelled_session")?></p>
                    <h4 class="mb-0"><?=$db->count("appointments",["status"=>0])?></h4>
                </div>

                <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                        <span class="avatar-title">
                        <i class="fa-solid fa-calendar-times"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium"><?=Lang::line("card","total_incoming")?></p>
                    <h4 class="mb-0">
                        <?php 
                        $Fiyat=$db->query("SELECT SUM(amount) AS gelir FROM payments");
                        $Fiyat->execute();
                        $FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);

                        echo $FiyatYaz["gelir"].' ₺';
                        ?>
                    </h4>
                </div>

                <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                        <span class="avatar-title">
                        <i class="fa-solid fa-wallet"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium"><?=Lang::line("card","total_debt")?></p>
                    <h4 class="mb-0">
                        <?php 
                        $Fiyat=$db->query("SELECT SUM(price) AS borc FROM sales WHERE status = 1");
                        $Fiyat->execute();
                        $FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);

                        echo $FiyatYaz["borc"].' ₺';
                        ?>
                    </h4>
                </div>

                <div class="flex-shrink-0 align-self-center">
                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                        <span class="avatar-title">
                        <i class="fa-solid fa-wallet"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
   
</div>