<?php 


switch ($request[3]) {
    case 'all':
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","staff")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","home")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/staff/all"><?=Lang::line("page","staff")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","staff_all")?></li>
                           
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item active"><a class="page-link" href="javscript:void(0)"><?=Lang::line("page","staff_all")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/staff/add"><?=Lang::line("page","staff_add")?></a></li>

            </ul>
        </nav>

        <table id="staffTable" class="table table-bordered dt-responsive  nowrap w-100">
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
                $select = $db->selectAnd("accounts",["type"=>"STAFF"]);
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
                            <a href="javascript:void(0)" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=Lang::line("button","show")?>"><i class="fa-solid fa-eye fa-sm"></i></a>

                            <a href="javascript:void(0)" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=Lang::line("button","edit")?>"><i class="fa-solid fa-edit fa-sm"></i></a>

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
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","staff")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","home")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/staff/all"><?=Lang::line("page","staff")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","staff_add")?></li>
                           
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home/staff/all"><?=Lang::line("page","staff_all")?></a></li>
                <li class="page-item active"><a class="page-link" href="javscript:void(0)"><?=Lang::line("page","staff_add")?></a></li>
            </ul>
        </nav>

        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><?=Lang::line("page","staff_add")?></h4>

                                        <form id="formAddStaff">
                                            

                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputUsername" class="form-label"><?=Lang::line("form","username")?></label>
                                                        <input type="text" class="form-control" name="username" id="inputUsername" placeholder="<?=Lang::line("form","enter_username")?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputPassword" class="form-label"><?=Lang::line("form","password")?></label>
                                                        <input type="text" class="form-control" name="password" id="inputPassword" placeholder="<?=Lang::line("form","enter_password")?>">
                                                    </div>
                                                </div>
                                            </div>
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

                                            

                                            

                                            
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" id="btnAddStaff"><?=Lang::line("button","save")?></button>
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