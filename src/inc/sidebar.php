<div class="vertical-menu">

                <div data-simplebar class="h-100">
<?php 
if($user[0]["type"] == "ADMIN"){
?>
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu"><?=Lang::line("menu","menu")?></li>

        <li>
            <a href="/" class="waves-effect">
                <i class="fa-solid fa-home"></i>
                <span key="t-dashboards"> <?=Lang::line("menu","dashboard")?></span>
            </a>
        </li>
        <li>
            <a href="/home/appointments/all" class="waves-effect">
            <i class="fa-solid fa-calendar"></i>
                <span key="t-dashboards"> <?=Lang::line("menu","appointments")?></span>
            </a>
        </li>

        <li class="menu-title" key="t-menu"><?=Lang::line("menu","manage")?></li>


        <li>
            <a href="javascript: void(0);" class="waves-effect">
            <i class="fa-solid fa-user-secret"></i>
                <span key="t-dashboards"><?=Lang::line("menu","admins")?></span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="/home/admin/all" key="t-default"><?=Lang::line("menu","admins_all")?></a></li>
                <li><a href="/home/admin/add" key="t-default"><?=Lang::line("menu","admins_add")?></a></li>
            </ul>
        </li>
        
        <li>
            <a href="javascript: void(0);" class="waves-effect">
            <i class="fa-solid fa-users"></i>
                <span key="t-dashboards"><?=Lang::line("menu","customers")?></span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="/home/customer/all" key="t-default"><?=Lang::line("menu","customers_all")?></a></li>
                <li><a href="/home/customer/add" key="t-default"><?=Lang::line("menu","customers_add")?></a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="waves-effect">
            <i class="fa-solid fa-cart-shopping"></i>
                <span key="t-dashboards"><?=Lang::line("menu","services")?></span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="/home/service/all" key="t-default"><?=Lang::line("menu","services_all")?></a></li>
                <li><a href="/home/service/add" key="t-default"><?=Lang::line("menu","services_add")?></a></li>
            </ul>
        </li>

        
        <li class="menu-title" key="t-menu"><?=Lang::line("menu","settings")?></li>
        <li>
            <a href="javascript: void(0);" class="waves-effect">
            <i class="fa-solid fa-gear"></i>
                <span key="t-dashboards"><?=Lang::line("menu","settings")?></span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                
                <li><a href="/home/settings/sms" key="t-default"><?=Lang::line("menu","buy_sms")?></a></li>
                <li><a href="/home/settings/plan" key="t-default"><?=Lang::line("menu","upgrade_plan")?></a></li>
            </ul>
        </li>

    </ul>
</div>
<?php
}elseif($user[0]["type"] == "STAFF"){
?>
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>

        <li>
            <a href="javascript: void(0);" class="waves-effect">
                <i class="fa-solid fa-home"></i><span class="badge rounded-pill bg-info float-end">04</span>
                <span key="t-dashboards">Dashboards</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="index-2.html" key="t-default">Default</a></li>
                <li><a href="dashboard-saas.html" key="t-saas">Saas</a></li>
                <li><a href="dashboard-crypto.html" key="t-crypto">Crypto</a></li>
                <li><a href="dashboard-blog.html" key="t-blog">Blog</a></li>
            </ul>
        </li>
    </ul>
</div>
<?php
}
?>
                    <!--- Sidemenu -->
                    
                    <!-- Sidebar -->
                </div>
            </div>