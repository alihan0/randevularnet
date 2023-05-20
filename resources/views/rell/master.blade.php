<!doctype html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}">
<head>
    <meta charset="utf-8" />
    <title>{{__('text.title.home')}} - {{Auth::user()->company}} | {{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{env('APP_NAME')}}" name="description" />
    <meta content="Metatige Dijital" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/static/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="/static/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/static/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/static/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="
https://cdn.jsdelivr.net/npm/font-awesome-animation@1.1.1/css/font-awesome-animation.min.css
" rel="stylesheet">
</head>

<body data-layout="detached" data-topbar="colored">



    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="container-fluid">
                    <div class="float-end">

                        
                        
                        <div class="dropdown d-none d-lg-inline-block ">
                            
                                <div class="btn  form-check form-switch theme-switch">
                                    <input class="form-check-input waves-effec theme-choice " type="checkbox" role="switch" id="dark-mode-switch"
                                    data-bsStyle="/static/assets/css/bootstrap-dark.min.css" data-appStyle="/static/assets/css/app-dark.min.css" >
                                  </div>
                        
                              
                        </div>

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img class="" src="/static/assets/images/flags/{{LaravelLocalization::getCurrentLocale()}}.png" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode, null, [], true)}}" class="dropdown-item notify-item theme-choice"
                                    {{$properties["align"] == "right" ? 'id="rtl-mode-switch"
                                    data-appStyle="/static/assets/css/app-rtl.min.css"' : ''}}
                                    >
                                        <img src="/static/assets/images/flags/{{$localeCode}}.png" alt="user-image" class="me-1" height="12">
                                        <span>
                                            {{$properties['native']}}
                                            {{$properties['align']}}
                                        </span>
                                    </a>
                                @endforeach
                                
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        <div  id="notification-menu" class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <input type="hidden" id="notification-count" value="{{$notifications->count()}}">
                               

                                <i class="fas fa-bell {{$notifications->count() > 0 ? 'faa-ring animated':''}}"></i><span class="badge rounded-pill bg-danger notification-count {{$notifications->count() > 0 ? '':'d-none'}}">{{$notifications->count()}}</span>

                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> {{__('text.menu.notifications')}} </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small"> {{__('text.menu.view-all')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="notification-list" data-simplebar style="max-height: 230px;">
                                    <div id="new-notification-line"></div>
                                    @if ($notifications->count() > 0)
                                    @foreach($notifications as $notification)
                                    <a href="javascript:void(0)" data-id="{{$notification->id}}" data-url="{{$notification->redirect === 1 ? $notification->url : '' }}" class="text-reset notification-item notification-check">
                                        <div class="d-flex align-items-start">
                                            
                                            <img src="/static/assets/icons/notification/{{$notification->icon}}.png" alt="" class="img-fluid me-3" width="50">
                                              
                                            
                                            <div class="flex-1">
                                                <h6 class="mt-1 mb-1">{{ $notification->message }}</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i>{{ $notification->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                    @else
                                    <div class="text-center notification-item empty-notification-list">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-1">
                                                <h6 class="mt-0 mb-1 text-muted"><i>Hiç yeni bildirim yok...</i></h6>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 " href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> {{__('text.menu.view-more')}}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="/static/assets/images/users/avatar-2.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{Auth::user()->firstname.' '.Auth::user()->lastname}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                                    {{__('text.menu.profile')}}</a>
                                
                                <a class="dropdown-item d-block" href="#"><i
                                        class="bx bx-wrench font-size-16 align-middle me-1"></i> {{__('text.menu.settings')}}</a>
                                <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i>
                                    {{__('text.menu.lock')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="/auth/logout"><i
                                        class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> {{__('text.menu.logout')}}</a>
                            </div>
                        </div>

                        

                    </div>
                    <div>
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/static/assets/images/logo-sm.png" alt="" height="20">
                                </span>
                                <span class="logo-lg">
                                    <img src="/static/assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/static/assets/images/logo-sm.png" alt="" height="20">
                                </span>
                                <span class="logo-lg">
                                    <img src="/static/assets/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                            id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        

                        
                    </div>

                </div>
            </div>
        </header> <!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="/static/assets/images/users/avatar-2.jpg" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark fw-medium font-size-16">{{Auth::user()->firstname.' '.Auth::user()->lastname}}</a>
                <p class="text-body mt-1 mb-0 font-size-13">{{Auth::user()->company}}</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">{{__('text.menu.menu')}}</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>{{__('text.menu.dashboard')}}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fas fa-calendar-alt"></i>
                        <span>{{__('text.menu.calendar')}}</span>
                    </a>
                </li>

                

                

                

                

                

                <li class="menu-title">{{__('text.menu.manage')}}</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span>{{__('text.menu.customers')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">{{__('text.menu.customer-groups')}}</a></li>
                        <li><a href="ui-buttons.html">{{__('text.menu.customer-list')}}</a></li>
                        <li><a href="ui-cards.html">{{__('text.menu.directory')}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-tie"></i>
                        <span>{{__('text.menu.staff')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">{{__('text.menu.departments')}}</a></li>
                        <li><a href="ui-buttons.html">{{__('text.menu.staff-list')}}</a></li>
                        <li><a href="ui-buttons.html">{{__('text.menu.staff-access')}}</a></li>
                    </ul>
                </li>

                

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-cash-register"></i>
                        <span>{{__('text.menu.accounting')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html">{{__('text.menu.balance')}}</a></li>
                        <li><a href="tables-datatable.html">{{__('text.menu.invoices')}}</a></li>
                        <li><a href="tables-responsive.html">{{__('text.menu.income-reports')}}</a></li>
                        <li><a href="tables-editable.html">{{__('text.menu.expense-reports')}}</a></li>
                        <li><a href="tables-editable.html">{{__('text.menu.new-invoice')}}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-percent"></i>
                        <span>{{__('text.menu.promotion')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.html">{{__('text.menu.offers')}}</a></li>
                        <li><a href="charts-chartjs.html">{{__('text.menu.discount-coupons')}}</a></li>
                        <li><a href="charts-flot.html">{{__('text.menu.birthday-discount')}}</a></li>
                        <li><a href="charts-knob.html">{{__('text.menu.discount-groups')}}</a></li>
                    </ul>
                </li>

                <li class="menu-title">{{__('text.menu.system')}}</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-cog"></i>
                        <span>{{__('text.menu.general-settings')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-boxicons.html">{{__('text.menu.system-settings')}}</a></li>
                        <li><a href="icons-materialdesign.html">{{__('text.menu.notification-settings')}}</a></li>
                        <li><a href="icons-dripicons.html">{{__('text.menu.default-settings')}}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-layer-group"></i>
                        <span>{{__('text.menu.advanced-settings')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html">{{__('text.menu.api')}}</a></li>
                        <li><a href="maps-vector.html">{{__('text.menu.configuration')}}</a></li>
                        <li><a href="maps-vector.html">{{__('text.menu.localization')}}</a></li>
                        <li><a href="maps-vector.html">{{__('text.menu.export-import')}}</a></li>
                        <li><a href="maps-vector.html">{{__('text.menu.maintance')}}</a></li>
                        <li><a href="maps-vector.html">{{__('text.menu.backup')}}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fas fa-thermometer-three-quarters"></i>
                        <span>{{__('text.menu.system-status')}}</span>
                    </a>
                </li>

                <li class="menu-title">{{__('text.menu.help')}}</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fas fa-info-circle"></i>
                        <span>{{__('text.menu.how-to-use')}}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fas fa-question-circle"></i>
                        <span>{{__('text.menu.faq')}}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-life-ring"></i>
                        <span>{{__('text.menu.support')}}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">{{__('text.menu.new-ticket')}}</a></li>
                        <li><a href="javascript: void(0);">{{__('text.menu.my-tickets')}}</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">Starter Page</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Starter Page</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            Copright © <script>document.write(new Date().getFullYear())</script> -  {{env('APP_NAME')}} | {{__('text.copy')}}
                        </div>
                        
                        <div class="col-sm-6 float-end">
                            <div class="text-sm-end d-none d-sm-block float-end">
                                <a href="#" data-bs-toggle="tooltip" title="{{__('text.menu.patch-notes')}}">{{env('APP_VERSION')}}</a>
                            </div>
                            <div class="text-sm-end d-none d-sm-block float-end me-2 border-end">
                                <a href="#">{{__('text.menu.contracts')}}</a>
                            </div>
                            <div class="text-sm-end d-none d-sm-block float-end me-2 border-end">
                                <a href="#">{{__('text.menu.time-line')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-end">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="/static/assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
            </div>

            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="/static/assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
            </div>

            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                    data-bsStyle="/static/assets/css/bootstrap-dark.min.css" data-appStyle="/static/assets/css/app-dark.min.css" />
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="/static/assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-5">
                <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                    data-appStyle="/static/assets/css/app-rtl.min.css" />
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

        </div>

    </div>
    <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>



@include('rell.src.modal')
  


<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/fontawesome.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
<script src="/static/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/static/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/static/assets/libs/node-waves/waves.min.js"></script>
<script src="/static/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="/static/assets/js/app.js"></script>
<script src="/static/assets/js/pages/dashboard-2.init.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('ce5b02c6455dc752d04b', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('notifirell');
    channel.bind('notifirell', function(data) {
        var count = $("#notification-count").val()

        if(count == 0){
            count++
            $(".fa-bell").addClass('faa-ring animated')
            $(".notification-count").removeClass('d-none').text(count)
            $("#notification-count").val(count)
            $(".empty-notification-list").remove()
        }else{
            count++
            $("#notification-count").val(count)
            $(".notification-count").text(count)
        }

        

        axios.post('/notification/push', data).then(res=>{
            console.log('new notificaiton!')


            var newNotification = '<a href="javascript:void(0)" data-id="'+res.data+'" data-url="'+data.url+'" class="text-reset notification-item notification-check"' +
                            '<div class="d-flex align-items-start">' +
                                '<img src="/static/assets/icons/notification/'+data.icon+'.png" alt="" class="img-fluid me-3" width="50">' +
                                '<div class="flex-1">' +
                                    '<h6 class="mt-1 mb-1">'+data.message+'</h6>' +
                                    '<div class="font-size-12 text-muted">' +
                                        '<p class="mb-0"><i class="mdi mdi-clock-outline"></i>Şimdi</p>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</a>';

        $("#new-notification-line").prepend(newNotification)

        })
    });

    $(document).on("click", ".notification-check", function(){
        let url = $(this).attr('data-url')
        let id = $(this).attr('data-id')
        let count = $("#notification-count").val()
        
        axios.post('notification/read', {id:id}).then(res=>{
            $(this).remove()
            count--;

            if(count == 0){
                $(".fa-bell").removeClass('faa-ring animated')
                $(".notification-count").remove()

                $("#notification-list").append('<div class="text-center notification-item">'+
                                        '<div class="d-flex align-items-start">'+
                                            '<div class="flex-1">'+
                                                '<h6 class="mt-0 mb-1 text-muted"><i>Hiç yeni bildirim yok...</i></h6>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>')
            }else{
                $(".fa-bell").addClass('faa-ring animated')
                $("#notification-count").val(count)
                $(".notification-count").text(count)
            }

            if(url !== ""){
                window.location.assign('/'+url)
            }
        })
    })
  </script>
<script>


  toastr.options.progressBar = true;
  toastr.options.timeOut = 1500;

    $(document).on("input", "#companyname", function(){
        let name = $(this)

            if(name.val().length < 6){
                name.addClass('border border-2 border-danger')
                $("#choosePlan").addClass("d-none")
            }else{
                name.removeClass('border border-2 border-danger')
                name.addClass('border border-2 border-success')
                $("#choosePlan").removeClass("d-none")
                $(document).on("click", "#choosePlan", function(){
                $(this).html('').addClass('btn-warning').html('<i class="fas fa-spin fa-spinner"></i>')
                
                
            })
            }

            
    })
    
    $(document).on("click", "#choosePlan", function(){
        let company = $("#companyname").val();
        $("#companyModalBody").hide();
        $("#choosePlanModalBody").removeClass('d-none');
        $("#modalDialog").addClass('modal-lg')
    })

    $(document).on("click", ".choosePlanBtn", function(){
        let company = $("#companyname").val();
        let plan = $(this).attr('id');
        $("#choosePlanModalBody").addClass('d-none');
        $("#choosePeriodModalBody").removeClass('d-none');
        $("#modalDialog").addClass('modal-xl')
        $("#companyNameVal").html(company)
        

        axios.post('/data/plan-detail', {plan:plan}).then(res=>{

            let price = parseFloat(res.data.price);
            let ucaylik = (price * 3) - ((price * 3) * (parseFloat(res.data.discount_per3) / 100)) 
            let altiaylik = (price * 6) - ((price * 6) * (parseFloat(res.data.discount_per6) / 100))
            let year = (price * 12) - ((price * 12) * (parseFloat(res.data.discount_peryear) / 100))

            $("#planVal").html(res.data.title);
            $("#aylik").html(price.toFixed(2))
            $("#ucaylik").html(ucaylik.toFixed(2))
            $("#altiaylik").html(altiaylik.toFixed(2))
            $("#yillik").html(year.toFixed(3))
            $("#PlanIdData").val(res.data.id)

            if(res.data.discount_per3 > 0){
                $("#ucaylikbadge").addClass('bg-success').html('-'+res.data.discount_per3+'%')
            }

            if(res.data.discount_per6 > 0){
                $("#altiaylikbadge").addClass('bg-success').html('-'+res.data.discount_per6+'%')
            }

            if(res.data.discount_peryear > 0){
                $("#yillikbadge").addClass('bg-success').html('-'+res.data.discount_peryear+'%')
            }
            

        })

        $(document).on("click", ".choosePeriodBtn", function(){
            let period = $(this).attr('id');
            $(".choosePeriodBtn").removeClass('btn-primary text-white')
            $(this).addClass('btn-primary text-white');
          
            $("#companyNameData").val(company)
            
            $("#PeriodData").val(period)

            if(period == 1) {
                $("#PriceData").val($("#aylik").text())
            }else if(period == 2) {
                $("#PriceData").val($("#ucaylik").text())
            }else if(period == 3) {
                $("#PriceData").val($("#altiaylik").text())
            }else if(period == 4) {
                $("#PriceData").val($("#yillik").text())
            }

            $("#companyCreate").removeClass('d-none');
        })

        $(document).on("click", "#companyCreate", function(){
            let formData = $("#companyCreateForm").serialize();

            axios.post('/company/check', formData)
                .then(res => {
                    if(!res.data.status){
                        $(this).html('').removeClass('btn-warning').addClass('btn-success').html('Oluştur')
                    }else{
                        window.location.reload();
                        $("#companyModal").modal('hide');
                    }
                })
        })
    })
</script>
@yield('script')


@if(session('showCompanyModal'))
    <script>
        $(document).ready(function(){
            $("#companyModal").modal('show');
        })
    </script>
@endif

<!-- App js -->


</body>

</html>