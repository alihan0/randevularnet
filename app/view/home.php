<?php 
//require("app/connect/api.php");
$db = new Database;

$user = $db->selectAnd("accounts",["id"=>$_SESSION['uid']]);  
?>
<!doctype html>
<html lang="<?=Lang::current_lang()?>">
<head>
        
        <meta charset="utf-8" />
        <title><?=$GLOBALS["config"]["project_name"]?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta charset="UTF-8">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <?=addCss()?>

        <link href='https://queen.metatige.com/src/libs/calendar/main.css' rel='stylesheet' />
       
    <script src='https://queen.metatige.com/src/libs/calendar/main.js'></script>
    <script src='https://queen.metatige.com/src/libs/calendar/tr.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var eColor;
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'tr',
          selectable: true,
          
        dateClick: function(info) {
            //alert('Clicked on: ' + info.dateStr);
           window.location.assign("/home/appointments/day/"+info.dateStr);
         
        },
        events: {
            url: 'https://queen.metatige.com/app/connect/events.php',
            failure: function() {
            document.getElementById('script-warning').style.display = 'block'
            }
           
        },
        eventClick: function(info) {
            $("#eventModal"+info.event.id).modal("show");
            // change the border color just for fun
            info.el.style.borderColor = 'black';
        },
    });
        
        calendar.render();

      });

    </script>
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            
            <?php 
                include 'src/inc/topbar.php';
                include 'src/inc/sidebar.php';
            ?>
            <!-- ========== Left Sidebar Start ========== -->
            
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                       <?php 
                        $request_uri = $_SERVER['REQUEST_URI'];
                        $request = explode("/",$request_uri);
                            if($request[1] == "home"){
                                if($request[2]){
                                     $path = "app/view/".$request[1]."/".$request[2].".php";

                                    if(file_exists($path)){
                                        require($path);
                                    }else{
                                        require("404.php");
                                    }
                                }else{
                                    require($request[1].'/dashboard.php');
                                }
                              
                            }
                       ?>
                       
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Transaction Modal -->
                
                <!-- end modal -->

                <!-- subscribeModal -->
                
                <!-- end modal -->

                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <?php 
        include 'src/inc/rightbar.php';
        include 'src/inc/footer.php';
        include 'src/inc/eventmodal.php';
        ?>

        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <?=addJs()?>

    
    </body>

</html>