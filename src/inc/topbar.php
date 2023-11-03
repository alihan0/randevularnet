<?php 
$setting = $db->selectAnd("settings",["id"=>1]);
$admin_count = $db->count("accounts",["type"=>"ADMIN"]);
$customer_count = $db->count("accounts",["type"=>"CUSTOMER"]);
?>
<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                  
                            <a href="/  " class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?=IMG?>metatige-vlight.png" alt="" height="35">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?=IMG?>metatige-hlight.png" alt="" height="35">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fas fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        

                        
                    </div>

                    <div class="d-flex">

                    <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-comment-sms"></i>
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">

                                <?=$setting[0]["sms_balance"]?>
                                </span>
                               
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                               
                              
                         
                                <div class="p-3">
                                    <div class="row align-items-center">
                              
                                            <h6 class="m-0" key="t-notifications"> <?=Lang::line("title","sms")?> </h6>
                                  
                                      
                                    </div>
                                </div>
                                <a class="dropdown-item text-primary" href="#"><i class="fa-solid fa-cart-shopping"></i> <span key="t-logout"><?=Lang::line("text","buy_sms")?></span></a>
                            </div>
                        </div>



                    <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user-tie"></i>
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?=$admin_count?>/<?=$setting[0]["admin_limit"]?></span>
                               
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                               
                                <div class="p-3">
                                    <div class="row align-items-center">
                              
                                            <h6 class="m-0" key="t-notifications"> <?=Lang::line("title","staff")?>  </h6>
                                  
                                      
                                    </div>
                                </div>  
                         
                
                                <a class="dropdown-item text-primary" href="#"><i class="fa-solid fa-repeat"></i> <span key="t-logout"><?=Lang::line("text","upgrade_plan")?></span></a>
                            </div>
                        </div>

                    <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-users"></i>
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?=$customer_count?>/<?=$setting[0]["customer_limit"]?></span>
                               
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                               
                                <div class="p-3">
                                    <div class="row align-items-center">
                              
                                            <h6 class="m-0" key="t-notifications"> <?=Lang::line("title","customer")?>  </h6>
                                  
                                      
                                    </div>
                                </div>
                         
                
                                <a class="dropdown-item text-primary" href="#"><i class="fa-solid fa-repeat"></i> <span key="t-logout"><?=Lang::line("text","upgrade_plan")?></span></a>
                            </div>
                        </div>
                        

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="<?=IMG?>flags/<?=LANG::current_lang()?>.jpg" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">

                                <?php 
                                $folder = "src/lang/";
                                if(file_exists($folder)){
                                    $dosyalar = scandir($folder);
                        
                                    foreach ($dosyalar as $dosya) {
                                    
                                      if ($dosya =='.' || $dosya == '..') continue;
                                    
                                        $exp = explode(".",$dosya);

                                        if($exp[0] != Lang::current_lang()){
                                            echo '<a href="/lang/'.$exp[0].'" class="dropdown-item notify-item language" data-lang="en">
                                            <img src="'.IMG.'flags/'.$exp[0].'.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">'.Lang::line("langs",$exp[0]).'</span>
                                        </a>';
                                        }
                                  
                                        
                                    }
                                }
                                ?>
                              
                            
                            </div>
                        </div>

                        

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                            <i class="fa-solid fa-expand"></i>
                            </button>
                        </div>


                        






                        

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?=IMG?>users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?=$user[0]['fname'].' '.$user[0]['lname']?></span>
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                
                                <a class="dropdown-item text-danger" href="/logout"><i class="fa-solid fa-power-off"></i> <span key="t-logout"><?=Lang::line("button","logout")?></span></a>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </header>