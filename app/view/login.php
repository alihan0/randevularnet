<!doctype html>
<html lang="en">
    <head>
        
        <meta charset="utf-8" />
        <title><?=$GLOBALS["config"]["project_name"]?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">



        <?=addCss();?>
    </head>

    <body style="background:url('<?=IMG?>bg.jpg'); background-size:cover"> 
        <div class="account-pages my-5 pt-sm-5" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="text-white p-4">
                                            <h5 class="text-white"><?=Lang::line("text","welcome")?> !</h5>
                                            <p><?=Lang::line("text","login_required")?></p>
                                        </div>
                                    </div>
                                    <div class="col-4 align-self-end">
                                        <img src="<?=IMG?>profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    <a href="i/" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?=IMG?>metatige-vdark.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="/" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?=IMG?>metatige-vdark.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" action="">
        
                                        <div class="mb-3">
                                            <label for="username" class="form-label"><?=Lang::line("form","username")?></label>
                                            <input type="text" class="form-control" id="inputUsername" placeholder="<?=Lang::line("form","enter_username")?>">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label"><?=Lang::line("form","password")?>:</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="<?=Lang::line("form","enter_password")?>" aria-label="Password" aria-describedby="password-addon" id="inputPassword">
                                                
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" id="btnLogin"><?=Lang::line("button","login")?></button>
                                        </div>
            
                                        

                                        <div class="row mt-4">
                                            <div class="col-5">
                                            <a href="/reset-password" class="text-muted"><i class="mdi mdi-lock me-1"></i><?=Lang::line("form","forget_password")?></a>
                                             </div>
                                             <div class="col-7">
                                           
                            
                            
                                
                                <p>Copyright © <script>document.write(new Date().getFullYear())</script> <a href="https//metatige.com">Metatige</a></p>
                           
                                             </div>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
         <?=addJs()?>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>
</html>
