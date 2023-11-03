<?php 


switch ($request[3]) {
    case 'all':
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","service")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/service/all"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","service_all")?></li>
                           
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item active"><a class="page-link" href="/home/service/all"><?=Lang::line("page","service_all")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/add"><?=Lang::line("page","service_add")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/areas"><?=Lang::line("page","service_areas")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/add_areas"><?=Lang::line("page","service_add_areas")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/packages"><?=Lang::line("page","service_packages")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/addpackages"><?=Lang::line("page","service_add_packages")?></a></li>
            </ul>
        </nav>

        <table id="serviceTable" class="table table-bordered dt-responsive  nowrap w-100">
            <thead>
            <tr>   
                <th><?=Lang::line("table","id")?></th>
                <th><?=Lang::line("table","service_name")?></th>
                <th><?=Lang::line("table","status")?></th>
                <th><?=Lang::line("table","query")?></th>
            </tr>
            </thead>


            <tbody>
            <?php 
                $select = $db->selectAnd("services");
                $count = count($select);
                for($i=0;$i<$count;$i++){
                    ?>
                    <tr>
                        <td><b>#<?=$select[$i]["id"]?></b></td>
                        <td><?=$select[$i]["service_name"]?></td>
                        <td><?php 
                        if($select[$i]["status"] == 0){
                            echo '<span class="badge bg-warning">'.Lang::line("status","passive").'</span>';
                        }elseif($select[$i]["status"] == 1){
                            echo '<span class="badge bg-success">'.Lang::line("status","active").'</span>';
                        }
                        ?></td>
                        <td>
                            
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
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","service")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/service/all"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","service_add")?></li>
                           
                        </ol>
                    </div>

                </div>
            </div>
        </div>

   
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home/service/all"><?=Lang::line("page","service_all")?></a></li>
                <li class="page-item active" ><a class="page-link" href="/home/service/add"><?=Lang::line("page","service_add")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/areas"><?=Lang::line("page","service_areas")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/add_areas"><?=Lang::line("page","service_add_areas")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/packages"><?=Lang::line("page","service_packages")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/addpackages"><?=Lang::line("page","service_add_packages")?></a></li>
            </ul>
        </nav>
  

        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><?=Lang::line("page","service_add")?></h4>

                                        <form id="formAddService">
                                            

                                            
                                            
                                            
                                            
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="inputService" class="form-label"><?=Lang::line("form","service_name")?></label>
                                                        <input type="text" class="form-control" name="service" id="inputService" placeholder="<?=Lang::line("form","enter_service_name")?>">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            

                                            

                                            
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" id="btnAddService"><?=Lang::line("button","save")?></button>
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
    case 'areas':
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","service")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/service/all"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","service_areas")?></li>
                            
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home/service/all"><?=Lang::line("page","service_all")?></a></li>
                <li class="page-item " ><a class="page-link" href="/home/service/add"><?=Lang::line("page","service_add")?></a></li>
                <li class="page-item active"><a class="page-link" href="/home/service/areas"><?=Lang::line("page","service_areas")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/add_areas"><?=Lang::line("page","service_add_areas")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/packages"><?=Lang::line("page","service_packages")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/addpackages"><?=Lang::line("page","service_add_packages")?></a></li>
            </ul>
        </nav>

        <table id="serviceAreasTable" class="table table-bordered dt-responsive  nowrap w-100">
            <thead>
            <tr>   
                <th><?=Lang::line("table","id")?></th>
                <th><?=Lang::line("table","service_name")?></th>
                <th><?=Lang::line("table","area")?></th>
                <th><?=Lang::line("table","status")?></th>
                <th><?=Lang::line("table","query")?></th>
            </tr>
            </thead>


            <tbody>
            <?php 
                $select = $db->selectAnd("service_areas");
                $count = count($select);
                for($i=0;$i<$count;$i++){
                    ?>
                    <tr>
                        <td><b>#<?=$select[$i]["id"]?></b></td>
                        <td><?php
                        $sec = $db->selectAnd("services", ["id"=>$select[$i]["service"]]);
                        
                        echo $sec[0]["service_name"];
                        ?></td>
                        <td><?=$select[$i]["area"]?></td>
                        <td><?php 
                        if($select[$i]["status"] == 0){
                            echo '<span class="badge bg-warning">'.Lang::line("status","passive").'</span>';
                        }elseif($select[$i]["status"] == 1){
                            echo '<span class="badge bg-success">'.Lang::line("status","active").'</span>';
                        }
                        ?></td>
                        <td>
                            
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
    case 'add_areas':
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","service")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/service/all"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/service/areas"><?=Lang::line("page","service_areas")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","service_add_areas")?></li>
                            
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home/service/all"><?=Lang::line("page","service_all")?></a></li>
                <li class="page-item " ><a class="page-link" href="/home/service/add"><?=Lang::line("page","service_add")?></a></li>
                <li class="page-item "><a class="page-link" href="/home/service/areas"><?=Lang::line("page","service_areas")?></a></li>
                <li class="page-item active"><a class="page-link" href="/home/service/add_areas"><?=Lang::line("page","service_add_areas")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/packages"><?=Lang::line("page","service_packages")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/addpackages"><?=Lang::line("page","service_add_packages")?></a></li>
            </ul>
        </nav>

        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><?=Lang::line("page","service_add_areas")?></h4>

                                        <form id="formAddServiceAreas">
                                            

                                            
                                        <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="inputService" class="form-label"><?=Lang::line("form","select_service")?></label>
                                                        <select class="form-select" name="service">
                                                            <option value="0"><?=Lang::line("form","select")?></option>
                                                            <?php 
                                                                $services = $db->selectAnd("services");
                                                                $count = count($services);
                                                                for($i=0;$i<$count;$i++){
                                                                    ?>
                                                                    <option value="<?=$services[$i]["id"]?>"><?=$services[$i]["service_name"]?></option>
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
                                                        <label for="inputArea" class="form-label"><?=Lang::line("form","area_name")?></label>
                                                        <input type="text" class="form-control" name="area" id="inputArea" placeholder="<?=Lang::line("form","enter_area_name")?>">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            

                                            

                                            
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" id="btnAddServiceAreas"><?=Lang::line("button","save")?></button>
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
    case 'packages':
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","service")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/service/all"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","service_packages")?></li>
                            
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home/service/all"><?=Lang::line("page","service_all")?></a></li>
                <li class="page-item " ><a class="page-link" href="/home/service/add"><?=Lang::line("page","service_add")?></a></li>
                <li class="page-item "><a class="page-link" href="/home/service/areas"><?=Lang::line("page","service_areas")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/add_areas"><?=Lang::line("page","service_add_areas")?></a></li>
                <li class="page-item active"><a class="page-link" href="/home/service/packages"><?=Lang::line("page","service_packages")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/addpackages"><?=Lang::line("page","service_add_packages")?></a></li>
            </ul>
        </nav>

        <table id="servicePackagesTable" class="table table-bordered dt-responsive  nowrap w-100">
            <thead>
            <tr>   
                <th><?=Lang::line("table","id")?></th>
                <th><?=Lang::line("table","package_name")?></th>
                <th><?=Lang::line("table","service_name")?></th>
                <th><?=Lang::line("table","area")?></th>
                <th><?=Lang::line("table","price")?></th>
                <th><?=Lang::line("table","status")?></th>
                <th><?=Lang::line("table","query")?></th>
            </tr>
            </thead>


            <tbody>
            <?php 
                $select = $db->selectAnd("service_packages");
                $count = count($select);
                for($i=0;$i<$count;$i++){
                    ?>
                    <tr>
                        <td><b>#<?=$select[$i]["id"]?></b></td>
                        <td><?=$select[$i]["package_name"]?></td>
                        <td><?php
                        $sec = $db->selectAnd("services", ["id"=>$select[$i]["service"]]);
                        
                        echo $sec[0]["service_name"];
                        ?></td>
                        <td>
                            <?php 
                            $areas = json_decode($select[$i]["areas"]);
                            $say = count($areas);
                            for($a=0;$a<$say;$a++){
                                
                                $area = $db->selectAnd("service_areas",["id"=>$areas[$a]]);
                                ?>
                                <span class="badge bg-primary"><?=$area[0]["area"]?></span>
                                <?php
                            }
                            ?>
                        </td>
                        <td><?=$select[$i]["price"]?> ₺</td>
                        <td><?php 
                        if($select[$i]["status"] == 0){
                            echo '<span class="badge bg-warning">'.Lang::line("status","passive").'</span>';
                        }elseif($select[$i]["status"] == 1){
                            echo '<span class="badge bg-success">'.Lang::line("status","active").'</span>';
                        }
                        ?></td>
                        <td>
                            
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
    case 'addpackages':
        ?>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?=Lang::line("page","service")?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/service/all"><?=Lang::line("page","service")?></a></li>
                            <li class="breadcrumb-item"><a href="/home/service/areas"><?=Lang::line("page","service_packages")?></a></li>
                            <li class="breadcrumb-item active"> <?=Lang::line("page","service_add_packages")?></li>
                            
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home/service/all"><?=Lang::line("page","service_all")?></a></li>
                <li class="page-item " ><a class="page-link" href="/home/service/add"><?=Lang::line("page","service_add")?></a></li>
                <li class="page-item "><a class="page-link" href="/home/service/areas"><?=Lang::line("page","service_areas")?></a></li>
                <li class="page-item "><a class="page-link" href="/home/service/add_areas"><?=Lang::line("page","service_add_areas")?></a></li>
                <li class="page-item"><a class="page-link" href="/home/service/packages"><?=Lang::line("page","service_packages")?></a></li>
                <li class="page-item active"><a class="page-link" href="/home/service/addpackages"><?=Lang::line("page","service_add_packages")?></a></li>
            </ul>
        </nav>

        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><?=Lang::line("page","service_add_packages")?></h4>

                                        <form id="formAddServicePackages">
                                            
                                        <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="inputPackagename" class="form-label"><?=Lang::line("form","package_name")?></label>
                                                        <input type="text" class="form-control" name="package_name" id="inputPackagename" placeholder="<?=Lang::line("form","enter_package_name")?>">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="inputService" class="form-label"><?=Lang::line("form","select_service")?></label>
                                                        <select class="form-select" id="inputService">
                                                            <option value="0"><?=Lang::line("form","select")?></option>
                                                            <?php 
                                                                $services = $db->selectAnd("services");
                                                                $count = count($services);
                                                                for($i=0;$i<$count;$i++){
                                                                    ?>
                                                                    <option value="<?=$services[$i]["id"]?>"><?=$services[$i]["service_name"]?></option>
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
                                                        <label for="inputArea" class="form-label"><?=Lang::line("form","select_areas")?></label>
                                                        <select class="select2 form-control select2-multiple"
                                                            multiple="multiple" id="inputAreas" data-placeholder="<?=Lang::line("form","select")?>">
                                                            <?php 
                                                                $service_areas = $db->selectAnd("service_areas");
                                                                $count = count($service_areas);
                                                                for($i=0;$i<$count;$i++){
                                                                    ?>
                                                                    <option value="<?=$service_areas[$i]["id"]?>"><?=$service_areas[$i]["area"]?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>

                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputSession" class="form-label"><?=Lang::line("form","session")?></label>
                                                        <input type="text" class="form-control" name="session" id="inputSession" placeholder="<?=Lang::line("form","enter_session")?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputPrice" class="form-label"><?=Lang::line("form","price")?></label>
                                                        <input type="text" class="form-control" name="price" id="inputPrice" placeholder="<?=Lang::line("form","enter_price")?>">
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            

                                            
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" id="btnAddServicePackages"><?=Lang::line("button","save")?></button>
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