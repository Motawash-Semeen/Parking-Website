<!--**********************************
            Nav header start
        ***********************************-->
<style>
    .menu-toggle .custom_img{
        width: 100% !important; 
        height: 30px !important;
    }
</style>
<div class="nav-header" style="background-color: #fff">
    <div class="brand-logo"   style="text-align: center">
        <a href="index.html">
            <img src="{{ asset('backend') }}/images/pk-logo.png" alt="Logo" style="width: 35%; height: 53px" class="custom_img">
            <span class="brand-title">
                <img src="{{ asset('backend') }}/images/pk-logo.png" alt="Logo" style="width: 100%; height: 50px" >
            </span>
        </a>
    </div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                            class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down animated flipInX d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons">
                    <a href="{{ url('/') }}" title="View Page" target="_blank">
                        <i class="fa-solid fa-display"></i>
                    </a>
                </li>
                
                {{-- <li class="icons dropdown d-none d-md-flex">
                    <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                        <span>English</span> <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                    </a>
                    <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="javascript:void()">English</a></li>
                                <li><a href="javascript:void()">Bangla</a></li>
                            </ul>
                        </div>
                    </div>
                </li> --}}
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative d-flex" data-toggle="dropdown">
                        
                        <div class="position-relative mr-2">
                            <span class="activity active"></span>
                            <img src="{{ asset('backend') }}/images/user/1.png" height="40" width="40"
                            alt="">
                        </div>
                            <div>{{ Auth::user()->name }}</div>
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{ url('/admin/profile') }}"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                <li><a href="{{ url('logout') }}"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->
