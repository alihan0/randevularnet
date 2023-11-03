<?php 


switch ($request[3]) {
    case 'all':
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","customer")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","customer")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/customer/all"><?=Lang::line("page","customer")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","customer_all")?></li>
                           
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item active"><a class="page-link" href="javscript:void(0)"><?=Lang::line("page","customer_all")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/customer/add"><?=Lang::line("page","customer_add")?></a></li>

            </ul>
        </nav>

        <table id="customerTable" class="table table-bordered dt-responsive  nowrap w-100">
            <thead>
            <tr>   
                <th><?=Lang::line("table","id")?></th>
                <th><?=Lang::line("table","name")?></th>
                <th><?=Lang::line("table","username")?></th>
                <th><?=Lang::line("table","contact")?></th>
                <th><?=Lang::line("table","status")?></th>
                <th><?=Lang::line("table","query")?></th>
            </tr>
            </thead>


            <tbody>
            <?php 
                $select = $db->selectAnd("accounts",["type"=>"CUSTOMER"]);
                $count = count($select);
                for($i=0;$i<$count;$i++){
                    ?>
                    <tr>
                        <td><b>#<?=$select[$i]["id"]?></b></td>
                        <td><?=$select[$i]["fname"].' '.$select[$i]["lname"]?></td>
                        <td><?=$select[$i]["username"]?></td>
                        <td><?=$select[$i]["email"]?><br><?=$select[$i]["phone"]?></td>
                        <td><?php 
                        if($select[$i]["status"] == 0){
                            echo '<span class="badge bg-warning">'.Lang::line("status","passive").'</span>';
                        }elseif($select[$i]["status"] == 1){
                            echo '<span class="badge bg-success">'.Lang::line("status","active").'</span>';
                        }
                        ?></td>
                        <td>
                            <a href="/home/customer/show/<?=$select[$i]["id"]?>" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=Lang::line("button","show")?>"><i class="fa-solid fa-eye fa-sm"></i></a>

                            <a href="/home/customer/edit/<?=$select[$i]["id"]?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=Lang::line("button","edit")?>"><i class="fa-solid fa-edit fa-sm"></i></a>

                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=Lang::line("button","del")?>"><i class="fa-solid fa-trash fa-sm"></i></a>
                        </td>    
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        
        
        
        <?php
        break;
    case 'add':
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","customer")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","home")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/customer/all"><?=Lang::line("page","customer")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","customer_add")?></li>
                           
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home/customer/all"><?=Lang::line("page","customer_all")?></a></li>
                <li class="page-item active"><a class="page-link" href="javscript:void(0)"><?=Lang::line("page","customer_add")?></a></li>
            </ul>
        </nav>

        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><?=Lang::line("page","customer_add")?></h4>

                                        <form id="formAddCustomer">
                                            

                                            
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputFirstName" class="form-label"><?=Lang::line("form","first_name")?></label>
                                                        <input type="text" class="form-control" name="fname" id="inputFirstName" placeholder="<?=Lang::line("form","enter_first_name")?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputLastName" class="form-label"><?=Lang::line("form","last_name")?></label>
                                                        <input type="text" class="form-control" name="lastname" id="inputLastName" placeholder="<?=Lang::line("form","enter_last_name")?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputEmail" class="form-label"><?=Lang::line("form","email")?></label>
                                                        <input type="text" class="form-control" name="email" id="inputEmail" placeholder="<?=Lang::line("form","enter_email")?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputPhone" class="form-label"><?=Lang::line("form","phone")?></label>
                                                        <input type="text" class="form-control" name="phone" id="inputPhone" placeholder="<?=Lang::line("form","enter_phone")?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputTc" class="form-label"><?=Lang::line("form","tc")?></label>
                                                        <input type="text" class="form-control" name="tc" id="inputTc" placeholder="<?=Lang::line("form","enter_tc")?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputBirthdate" class="form-label"><?=Lang::line("form","birthdate")?></label>
                                                        <input type="date" class="form-control" name="birthdate" id="inputBirthdate" placeholder="<?=Lang::line("form","enter_birthdate")?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="inputAddress" class="form-label"><?=Lang::line("form","adress")?></label>
                                                        <input type="text" class="form-control" name="address" id="inputAddress" placeholder="<?=Lang::line("form","enter_address")?>">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            

                                            

                                            
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" id="btnAddCustomer"><?=Lang::line("button","save")?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>




        <?php
        break;
    case 'show':
        $users = $db->selectAnd("accounts",["id"=>$request[4]]);
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","customer")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","customer")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/customer/all"><?=Lang::line("page","customer")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","show_customer")?></li>
                            <li class="breadcrumb-item active"> #<?=$request[4]?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary"><?=$users[0]["fname"].' '.$users[0]["lname"]?></h5>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><?=Lang::line("title","personel_information")?></h4>

                        
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row"><?=Lang::line("form","full_name")?> :</th>
                                        <td><?=$users[0]["fname"].' '.$users[0]["lname"]?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?=Lang::line("form","phone")?> :</th>
                                        <td><?=$users[0]["phone"]?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?=Lang::line("form","email")?> :</th>
                                        <td><?=$users[0]["email"]?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><?=Lang::line("form","adress")?> :</th>
                                        <td><?=$users[0]["adress"]?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5"><?=Lang::line("title","actions")?></h4>
                       
                        <ul class="list-group">
                                <li class="btnAddPayment btn bg-success list-group-item btn text-white mt-2" id="<?=$request[4]?>">
                                    <?=Lang::line("button","add_payment")?>
                                </li>
                                <li class="btnAddPackage btn bg-success list-group-item btn text-white mt-2" id="<?=$request[4]?>">
                                    <?=Lang::line("button","add_package")?>
                                </li>
                                <li class="redirectCustomerEdit btn bg-secondary list-group-item btn text-white mt-2"  id="<?=$request[4]?>">
                                    <?=Lang::line("button","edit")?>
                                </li>
                 
                               
                                <li class="btnAddNoteCustomer list-group-item btn bg-warning btn text-white mt-2"  id="<?=$request[4]?>">
                                    <?=Lang::line("button","add_note")?>   
                                </li>
                                <li class="btnAddFile list-group-item btn bg-warning btn text-white mt-2"  id="<?=$request[4]?>"> 
                                    <?=Lang::line("button","add_file")?>   
                                </li>
                     
                            </ul>
                   

                    </div>
                </div>  

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5"><?=Lang::line("title","payments")?></h4>
                       
                        <ul class="list-group">
                            <?php 
                            $payments = $db->query("SELECT * FROM payments WHERE customer = '{$request[4]}' ORDER by id DESC");
                            foreach ($payments as $pay) {
                               ?>
                               <li class="  list-group-item   mt-2">
                                    <?=$pay["amount"]?>₺
                                    <span class="float-end"><?=$pay["created_at"]?></span>
                                    <hr>
                                    <sup>
                                    <span class="float-start">
                                        <?php 
                                            if($pay["type"] == 1){
                                                echo Lang::line("title","cash");
                                            }elseif($pay["type"] == 2){
                                                echo Lang::line("title","transfer");
                                            }elseif($pay["type"] == 3){
                                                echo Lang::line("title","credit_card");
                                            }
                                        ?>
                                        </span>
                                        <span class="float-end">
                                    
                                   
                                        <?php 
                                            if($pay["status"] == 0){
                                                echo Lang::line("status","reject");
                                            }elseif($pay["status"] == 1){
                                                echo Lang::line("status","wait");
                                            }elseif($pay["status"] == 2){
                                                echo Lang::line("status","confirmed");
                                            }
                                        ?>
                                    </span>
                                    </sup>
                                </li>
                               <?php
                            }
                            ?>
                                
                               
                            </ul>
                   

                    </div>
                </div>
                <!-- end card -->
            </div>         
                            
            <div class="col-xl-8">



                            





                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2"><?=Lang::line("card","total_session")?></p>
                                        <h4 class="mb-0"><?=$db->count("appointments",["customer"=>$request[4]])?></h4>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2"><?=Lang::line("card","active_session")?></p>
                                        <h4 class="mb-0"><?=$db->count("appointments",["customer"=>$request[4],"status"=>1])?></h4>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2"><?=Lang::line("card","complated_session")?></p>
                                        <h4 class="mb-0"><?=$db->count("appointments",["customer"=>$request[4],"status"=>2])?></h4>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    <div class="row">
                 
                    <div class="col-md-6">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2"><?=Lang::line("card","total_dept")?></p>
                                        <h4 class="mb-0">
                                            <?php 
                                            $Fiyat=$db->query("SELECT SUM(price) AS borc FROM sales WHERE customer = '{$request[4]}'");
                                            $Fiyat->execute();
                                            $FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);


                                            $Fiyat2=$db->query("SELECT SUM(amount) AS odeme FROM payments WHERE customer = '{$request[4]}' && status = 2");
                                            $Fiyat2->execute();
                                            $FiyatYaz2= $Fiyat2->fetch(PDO::FETCH_ASSOC);



                                            $kalan = $FiyatYaz['borc'] - $FiyatYaz2['odeme'];
                                            echo number_format($kalan,2,",",".").' ₺';
                
                                            ?>
                                        </h4>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2"><?=Lang::line("card","total_payment")?></p>
                                        <h4 class="mb-0">
                                        <?php 
                                            
                                            if($FiyatYaz2['odeme'] > 0){echo number_format($FiyatYaz2['odeme'],2,",",".").' ₺';}else{echo "0,00 ₺";}
                                            ?>
                                        </h4>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><?=Lang::line("card","purchased_packages")?></h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?=Lang::line("table","service_name")?></th>
                                        <th scope="col"><?=Lang::line("table","package_name")?></th>
                                        <th scope="col"><?=Lang::line("table","area")?></th>
                                        <th scope="col"><?=Lang::line("table","price")?></th>
                                        <th scope="col"><?=Lang::line("table","date")?></th>
                                        <th scope="col"><?=Lang::line("table","status")?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sessions = $db->selectAnd("sales",["customer"=>$request[4],"status"=>1]);
                                        foreach ($sessions as $session) {
                                            $packages = $db->selectAnd("service_packages",["id"=>$session["package"]]);
                                            $services = $db->selectAnd("services",["id"=>$packages[0]["service"]]);
                                          ?>
                                          <tr>
                                            <th scope="row"><?=$session["id"]?></th>
                                            <td><?=$services[0]["service_name"]?></td>
                                            <td><?=$packages[0]["package_name"]?></td>
                                            <td>
                                                <?php 
                                               $packarea = json_decode($packages[0]["areas"]);
                                               $count = count($packarea);
                                                for($i=0;$i<$count;$i++){
                                                    $area = $db->selectAnd("service_areas",["id"=>$packarea[$i]]);
                                                    ?>
                                                    <span style="float:left" class="m-1 badge bg-primary"><?=$area[0]["area"];?></span>
                                                    <?php
                                             
                                                }
                                                ?>
                                            </td>
                                            <td><?=$session["price"]?>₺</td>
                                            <td><center><?=$session["created_at"]?></center></td>
                                            <td><?php 
                        if($session["status"] == 0){
                            echo '<span class="badge bg-danger">'.Lang::line("status","cancelled").'</span>';
                        }elseif($session["status"] == 1){
                            echo '<span class="badge bg-warning">'.Lang::line("status","continued").'</span>';
                        }elseif($session["status"] == 2){
                            echo '<span class="badge bg-success">'.Lang::line("status","complated").'</span>';
                        }
                        ?></td>
                                        </tr>
                                          <?php
                                        }
                                    ?>
                                    

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><?=Lang::line("card","active_sessions")?></h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?=Lang::line("table","service_name")?></th>
                                        <th scope="col"><?=Lang::line("table","package_name")?></th>
                                        <th scope="col"><?=Lang::line("table","area")?></th>
                                        <th scope="col"><?=Lang::line("table","price")?></th>
                                        <th scope="col"><?=Lang::line("table","date")?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sessions = $db->selectAnd("appointments",["customer"=>$request[4],"status"=>1]);
                                        foreach ($sessions as $session) {
                                            $packages = $db->selectAnd("service_packages",["id"=>$session["package"]]);
                                            $services = $db->selectAnd("services",["id"=>$packages[0]["service"]]);
                                          ?>
                                          <tr>
                                            <th scope="row"><?=$session["id"]?></th>
                                            <td><?=$services[0]["service_name"]?></td>
                                            <td><?=$packages[0]["package_name"]?></td>
                                            <td>
                                                <?php 
                                               $packarea = json_decode($packages[0]["areas"]);
                                               $count = count($packarea);
                                                for($i=0;$i<$count;$i++){
                                                    $area = $db->selectAnd("service_areas",["id"=>$packarea[$i]]);
                                                    ?>
                                                    <span style="float:left" class="m-1 badge bg-primary"><?=$area[0]["area"];?></span>
                                                    <?php
                                             
                                                }
                                                ?>
                                            </td>
                                            <td><?=$packages[0]["price"]?>₺</td>
                                            <td><center><?=$session["session_date"].'<br>'.$session["session_time"]?></center></td>
                                        </tr>
                                          <?php
                                        }
                                    ?>
                                    

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><?=Lang::line("card","complated_sessions")?></h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?=Lang::line("table","service_name")?></th>
                                        <th scope="col"><?=Lang::line("table","package_name")?></th>
                                        <th scope="col"><?=Lang::line("table","area")?></th>
                                        <th scope="col"><?=Lang::line("table","price")?></th>
                                        <th scope="col"><?=Lang::line("table","date")?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sessions = $db->selectAnd("appointments",["customer"=>$request[4],"status"=>2]);
                                        foreach ($sessions as $session) {
                                            $packages = $db->selectAnd("service_packages",["id"=>$session["package"]]);
                                            $services = $db->selectAnd("services",["id"=>$packages[0]["service"]]);
                                          ?>
                                          <tr>
                                            <th scope="row"><?=$session["id"]?></th>
                                            <td><?=$services[0]["service_name"]?></td>
                                            <td><?=$packages[0]["package_name"]?></td>
                                            <td>
                                                <?php 
                                               $packarea = json_decode($packages[0]["areas"]);
                                               $count = count($packarea);
                                                for($i=0;$i<$count;$i++){
                                                    $area = $db->selectAnd("service_areas",["id"=>$packarea[$i]]);
                                                    ?>
                                                    <span style="float:left" class="m-1 badge bg-primary"><?=$area[0]["area"];?></span>
                                                    <?php
                                             
                                                }
                                                ?>
                                            </td>
                                            <td><?=$packages[0]["price"]?>₺</td>
                                            <td><center><?=$session["session_date"].'<br>'.$session["session_time"]?></center></td>
                                        </tr>
                                          <?php
                                        }
                                    ?>
                                    

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><?=Lang::line("card","total_sessions")?></h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?=Lang::line("table","service_name")?></th>
                                        <th scope="col"><?=Lang::line("table","package_name")?></th>
                                        <th scope="col"><?=Lang::line("table","area")?></th>
                                        <th scope="col"><?=Lang::line("table","price")?></th>
                                        <th scope="col"><?=Lang::line("table","date")?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sessions = $db->selectAnd("appointments",["customer"=>$request[4]]);
                                        foreach ($sessions as $session) {
                                            $packages = $db->selectAnd("service_packages",["id"=>$session["package"]]);
                                            $services = $db->selectAnd("services",["id"=>$packages[0]["service"]]);
                                          ?>
                                          <tr>
                                            <th scope="row"><?=$session["id"]?></th>
                                            <td><?=$services[0]["service_name"]?></td>
                                            <td><?=$packages[0]["package_name"]?></td>
                                            <td>
                                                <?php 
                                               $packarea = json_decode($packages[0]["areas"]);
                                               $count = count($packarea);
                                                for($i=0;$i<$count;$i++){
                                                    $area = $db->selectAnd("service_areas",["id"=>$packarea[$i]]);
                                                    ?>
                                                    <span style="float:left" class="m-1 badge bg-primary"><?=$area[0]["area"];?></span>
                                                    <?php
                                             
                                                }
                                                ?>
                                            </td>
                                            <td><?=$packages[0]["price"]?>₺</td>
                                            <td><center><?=$session["session_date"].'<br>'.$session["session_time"]?></center></td>
                                        </tr>
                                          <?php
                                        }
                                    ?>
                                    

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><?=Lang::line("card","user_notes")?></h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?=Lang::line("table","note")?></th>
                                        <th scope="col"><?=Lang::line("table","adding")?></th>
                                        <th scope="col"><?=Lang::line("table","date")?></th>
                               
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $notes = $db->selectAnd("customer_notes",["customer"=>$request[4]]);
                                        foreach($notes as $not){
                                            $users = $db->selectAnd("accounts",["id"=>$not["user"]]);
                                            ?>
                                            <tr>
                                        <th scope="row"><?=$not["id"]?></th>
                                        <td scope="row"><?=$not['note']?></td>
                                        <td><?=$users[0]["fname"].' '.$users[0]['lname']?></td>
                                        <td><?=$not["created_at"]?></td>
                                   
                                    </tr>
                                            <?php
                                        }
                                    ?>
                                    

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><?=Lang::line("card","files")?></h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?=Lang::line("table","file_type")?></th>
                                        <th scope="col"><?=Lang::line("table","file_name")?></th>
                                        <th scope="col"><?=Lang::line("table","date")?></th>
                                        <th scope="col"><?=Lang::line("table","status")?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $files = $db->selectAnd("files",["customer"=>$request[4]]);

                                        foreach ($files as $file) {

                                           
                                            ?>
                                         
                                            <tr>
                                                <th scope="row"><?=$file['id']?></th>
                                                <td>
                                                    <?php 
                                                        if($file['type'] == 1){
                                                          echo  Lang::line("file","agreement");
                                                        }elseif($file["type"] == 2){
                                                            echo  Lang::line("file","receipt");
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                <a class="image-popup-no-margins btn btn-info" href="<?=$GLOBALS["config"]["url"]."src/uploads/".$file["file"]?>">
                                                        <i class="fas fa-eye img-fluid" src="<?=$GLOBALS["config"]["url"]."src/uploads/".$file["file"]?>"></i>
                                                        <img class="" alt=""  width="10">
                                                    </a>
                                                    <a class=" btn btn-success" download="<?=$GLOBALS["config"]["basename"].'-'.$file["file"]?>" href="<?=$GLOBALS["config"]["url"]."src/uploads/".$file["file"]?>">
                                                        <i class="fas fa-download"></i>
                                                        
                                                    </a>
                                                    </td>
                                                    
                                                    
                                                
                                                <td><?= $file["created_at"]?></td>
                                                <td>
                                                    <?php
                                                        if($file["status"] == 0){
                                                            echo '<span class="badge bg-danger">'.Lang::line("status","reject").'</span>';
                                                        }elseif($file["status"] == 1){
                                                            echo '<span class="badge bg-warning">'.Lang::line("status","wait").'</span>';
                                                        }elseif($file["status"] == 2){
                                                            echo '<span class="badge bg-success">'.Lang::line("status","active").'</span>';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                        </div>
                        <!-- end row -->
        <?php
        break;
    case 'edit':

        $customers = $db->selectAnd("accounts",["id"=>$request[4]]);
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","customer")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","home")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/customer/all"><?=Lang::line("page","customer")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","customer_edit")?></li>
                            
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home/customer/all"><i class="fas fa-reply"></i> <?=Lang::line("page","back")?></a></li>
                
            </ul>
        </nav>

        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><?=Lang::line("page","customer_edit")?></h4>

                                        <form id="formAddCustomer">
                                        <input type="hidden" id="customerID" value="<?=$request[4]?>">

                                            
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="putFirstName" class="form-label"><?=Lang::line("form","first_name")?></label>
                                                        <input type="text" class="form-control" name="fname" id="putFirstName" value="<?=$customers[0]["fname"]?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="putLastName" class="form-label"><?=Lang::line("form","last_name")?></label>
                                                        <input type="text" class="form-control" name="lastname" id="putLastName" value="<?=$customers[0]["lname"]?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="putEmail" class="form-label"><?=Lang::line("form","email")?></label>
                                                        <input type="text" class="form-control" name="email" id="putEmail" value="<?=$customers[0]["email"]?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="putPhone" class="form-label"><?=Lang::line("form","phone")?></label>
                                                        <input type="text" class="form-control" name="phone" id="putPhone" value="<?=$customers[0]["phone"]?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="putTc" class="form-label"><?=Lang::line("form","tc")?></label>
                                                        <input type="text" class="form-control" name="tc" id="putTc" value="<?=$customers[0]["tckn"]?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="putBirthdate" class="form-label"><?=Lang::line("form","birthdate")?></label>
                                                        <input type="date" class="form-control" name="birthdate" id="putBirthdate" value="<?=$customers[0]["birthdate"]?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="putAddress" class="form-label"><?=Lang::line("form","address")?></label>
                                                        <input type="text" class="form-control" name="address" id="putAddress" value="<?=$customers[0]["adress"]?>">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            

                                            

                                            
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" id="btnUpdateCustomer"><?=Lang::line("button","save")?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>




        <?php
        break;
}