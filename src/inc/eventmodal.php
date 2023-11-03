<?php 

$randevular = $db->selectAnd("appointments");


foreach ($randevular as $randevu) {
        $users = $db->selectAnd("accounts",["id"=>$randevu["customer"]]);
        
        $packs = $db->selectAnd("service_packages",["id"=>$randevu["package"]]);
        
        $pack = $packs[0]["package_name"];
        $packarea = json_decode($packs[0]["areas"]);
        $count = count($packarea);
        $packid = $packs[0]["service"];


        $service = $db->selectAnd("services",["id"=>$packid]);
        $name = $users[0]["fname"].' '.$users[0]["lname"];


        $notes = $db->selectAnd("session_notes",["appointment"=>$randevu[0]]);

       

   // echo $randevu[0];



    
        ?>
        
<div id="eventModal<?=$randevu[0]?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","appointment_detail")?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <?php 
                if($randevu["status"] == 0){
                ?>
                 <div class="alert alert-warning" role="alert">
                    <?=Lang::line("alert","session_is_cancelled")?>
                </div>
                <?php
                }elseif($randevu["status"] == 2){
                    ?>
                    <div class="alert alert-success" role="alert">
                    <?=Lang::line("alert","session_is_complated")?>
                   </div>
                   <?php
                }
            ?>
                <?=Lang::line("title","customer")?>: <a href="/home/customer/show/<?=$users[0]["id"]?>"><?=$name?></a><br>
                <?=Lang::line("title","service")?>: <?=$service[0]["service_name"];?> | <?=Lang::line("title","package")?>: <?=$pack?><br>
                <?=Lang::line("title","areas")?>: <?php 
                    for($i=0;$i<$count;$i++){
                        $area = $db->selectAnd("service_areas",["id"=>$packarea[$i]]);
                        ?>
                        <span class="badge bg-primary"><?=$area[0]["area"];?></span>
                        <?php
                 
                    }
                ?><br>
                <?=Lang::line("title","session")?>: <?=$randevu["session"]?>/<?=$packs[0]["session"]?><br>
                <?=Lang::line("title","price")?>: <?=$packs[0]['price']?>₺
                <hr><b>
                <?=Lang::line("title","date")?>: <?=$randevu["session_date"]?> <?=Lang::line("title","time")?>: <?=$randevu['session_time']?></b>
                <a  class="btn btn-info float-end btnNotes <?php if(!$notes){echo "disabled";} ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=Lang::line("title","notes")?>"><i class="far fa-clipboard"></i></a>
                    <br><br>
                <div class="collapse notes hide">
                <div class="card  border  card-body text-muted mb-0">
                  <ul class="list-group">
                    <?php 
                       
                        
                        foreach ($notes as $not) {
                            $user = $db->selectAnd("accounts",["id"=>$not["user"]]);
                         ?>
                         <li class="mt-4  card-body shadow-sm list-group-item"><b><?=$user[0]["fname"].' '.$user[0]["lname"]?></b>
                         <span class="float-end"><?=$not['created_at']?></span>
                         <hr><?=$not["note"]?></li>
                         <?php
                        }
                    ?>
                    
                  </ul>
                </div>
            </div>
            </div>
            <div class="modal-footer">

            <button type="button" class="btn btn-warning waves-effect waves-light add_note" id="<?=$randevu[0]?>"><?=Lang::line("button","add_note")?></button>
            
            
                <button type="button" class="btn btn-info waves-effect waves-light"><?=Lang::line("button","send_reminding")?></button>
                
                <!--<button type="button" class="btn btn-secondary waves-effect waves-light postpone_session" id="<?=$randevu[0]?>"><?=Lang::line("button","postpone")?></button>-->
                <button type="button" class="btn btn-danger waves-effect waves-light cancelled_session" id="<?=$randevu[0]?>"><?=Lang::line("button","cancel_session")?></button>
                <button type="button" class="btn btn-success waves-effect waves-light complate_session" id="<?=$randevu[0]?>"><?=Lang::line("button","complate_session")?></button>


            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





        
        <?php
   
 
    
  }


  ?>


<div id="addEventModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","new_event")?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
       
            <div class="row">
                                                
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="inputFirstName" class="form-label"><?=Lang::line("form","select_customer")?></label>
                        <select id="selectCustomer" class="form-select">
                            <option><?=Lang::line("form","select")?></option>
                            <?php 
                                $customers = $db->selectAnd("accounts", [
                                    "type" => "CUSTOMER",
                                    "status" => 1
                                ]);
                                foreach ($customers as $customer) {
                                    ?>
                                    <option value="<?=$customer['id']?>"><?=$customer['fname'].' '.$customer['lname']?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
            </div>

            <div class="row">
                                                
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="inputFirstName" class="form-label"><?=Lang::line("form","select_package")?></label>
                        <select id="selectPackage" class="form-select">
                            <option><?=Lang::line("form","select_customer")?></option>
                        </select>
                    </div>
                </div>
                
            </div>

            
            


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("button","close")?></button>
                <button type="button" id="btnAddEvent" class="btn btn-primary waves-effect waves-light"><?=Lang::line("button","add_event")?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<div id="addNoteModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","add_note")?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
       
            <div class="row">
                    <input type="hidden" value="<?=$_SESSION['uid']?>" id="user">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="inputFirstName" class="form-label"><?=Lang::line("form","your_note")?>:</label>
                        <textarea rows="5" class="form-control" cols="" id="inputNote"></textarea>
                    </div>
                </div>
                
            </div>

            
            


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("button","close")?></button>
                <button type="button" id="btnAddNote" class="btn btn-primary waves-effect waves-light"><?=Lang::line("button","save")?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div id="postponeModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","postpone")?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
       
            <div class="row">
                    <input type="hidden" value="<?=$_SESSION['uid']?>" id="user">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="inputFirstName" class="form-label"><?=Lang::line("form","your_note")?>:</label>
                        <input type="date" class="form-control">
                    </div>
                </div>
                
            </div>

            
            


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("button","close")?></button>
                <button type="button" id="btnAddNote" class="btn btn-primary waves-effect waves-light"><?=Lang::line("button","save")?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<div id="addPaymentModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","add_payment")?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
       
            <div class="row">
            <div class="col-md-12">
                    <div class="mb-3">
                        <label for="selectPaymentType" class="form-label"><?=Lang::line("form","select_payment_type")?></label>
                        <select id="selectPaymentType" class="form-select">
                            <option value="0"><?=Lang::line("form","select")?></option>
                            <option value="1"><?=Lang::line("title","cash")?></option>
                            <option value="2"><?=Lang::line("title","transfer")?></option>
                            <option value="3"><?=Lang::line("title","credit_card")?></option>
                        </select>
                    </div>
                </div>
                
                
            </div>

            <div class="row">
            <div class="col-md-12">
                    <div class="mb-3">
                        <label for="inputPaymentAmount" class="form-label"><?=Lang::line("form","amount")?></label>
                        <input id="inputPaymentAmount" type="text" class="form-control" placeholder="0,00">
                    </div>
                </div>
                
                
            </div>

            
            


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("button","close")?></button>
                <button type="button" id="btnAddPayment" class="btn btn-primary waves-effect waves-light"><?=Lang::line("button","save")?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div id="addPackageModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","add_package")?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
       
            <div class="row">
            <div class="col-md-12">
                    <div class="mb-3">
                        <label for="selectSalesPackage" class="form-label"><?=Lang::line("form","select_service")?></label>
                        <select id="selectSalesPackage" class="form-select">
                        <option value="0"><?=Lang::line("form","select")?></option>
                        <?php 
                            $services = $db->selectAnd("services");
                            foreach ($services as $service) {
                                ?>
                              
                                <optgroup label="<?=$service["service_name"]?>">

                                    <?php 
                                        $packages = $db->selectAnd("service_packages",["service"=>$service["id"]]);
                                        foreach ($packages as $package) {
                                            ?>
                                            <option value="<?=$package["id"]?>"><?=$package["package_name"]?></option>
                                            <?php
                                        }
                                    ?>
                                </optgroup>
                                <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                
                
            </div>

<hr>
            <div class="row" id="packageDetail" style="display:none">
            <div class="col-md-6">
                   <!-- <div class="mb-3">
                        <label for="inputSalesSession" class="form-label"><?=Lang::line("form","session")?></label>
                        <input type="text" class="form-control" id="inputSalesSession">
                    </div>-->
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputSalesPrice" class="form-label"><?=Lang::line("form","price")?></label>
                        <input type="text" class="form-control" id="inputSalesPrice">
                        
                    </div>
                </div>
                
                
            </div>

            

            
            


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("button","close")?></button>
                <button type="button" id="btnAddSalesPackage" class="btn btn-primary waves-effect waves-light"><?=Lang::line("button","save")?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<div id="addFilesModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","add_package")?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
       
            <div class="row">
            <div class="col-md-12">
                    <div class="mb-3">
                        <label for="inputFileType" class="form-label"><?=Lang::line("form","select_file_type")?></label>
                        <select id="inputFileType" class="form-select">
                            <option value="0"><?=Lang::line("form","select")?></option>
                            <option value="2"><?=Lang::line("file","receipt")?></option>
                            <option value="1"><?=Lang::line("file","agreement")?></option>
                            <option value="3"><?=Lang::line("file","picture")?></option>
                        </select>
                    </div>
                </div>
                
                
            </div>

            <div class="row">
            <div class="col-md-12">
                    <div class="mb-3">
                    <div class="mb-3">
                                <label for="resimInput" class="form-label"><?=Lang::line("form","select_file")?></label>
                                <div class="row">
                                    <div class="col-12">
                                <input type="file" accept="image/*" class="form-control col-8" id="resimInput">
                                </div>
                                <a class="col-4 btn btn-success d-none" id="uploadBtn"><?=Lang::line("form","upload")?></a>
                                <input type="hidden" id="resim_path">
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <div  id="showImage" style="display:none;width:50px;height:50px;border:2px solid #ddd;border-radius:4px;margin-top:20px"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                
                
            </div>


            

            

            
            


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("button","close")?></button>
                <button type="button" id="btnAddFile" class="btn btn-primary waves-effect waves-light"><?=Lang::line("button","save")?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>