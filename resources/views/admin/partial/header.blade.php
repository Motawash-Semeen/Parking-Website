<!--**********************************
            Nav header start
        ***********************************-->
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
                    <a href="{{ url('/') }}" title="View Page">
                        <i class="fa-solid fa-display"></i>
                    </a>
                </li>
                <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="badge badge-pill gradient-1">3</span>
                    </a>
                    <div class="drop-down animated fadeIn dropdown-menu">
                        <div class="dropdown-content-heading d-flex justify-content-between">
                            <span class="">3 New Messages</span>
                            <a href="javascript:void()" class="d-inline-block">
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li class="notification-unread">
                                    <a href="javascript:void()">
                                        <img class="float-left mr-3 avatar-img"
                                            src="{{ asset('backend') }}/images/avatar/1.jpg" alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">Saiful Islam</div>
                                            <div class="notification-timestamp">08 Hours ago</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-unread">
                                    <a href="javascript:void()">
                                        <img class="float-left mr-3 avatar-img"
                                            src="{{ asset('backend') }}/images/avatar/2.jpg" alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">Adam Smith</div>
                                            <div class="notification-timestamp">08 Hours ago</div>
                                            <div class="notification-text">Can you do me a favour?</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <img class="float-left mr-3 avatar-img"
                                            src="{{ asset('backend') }}/images/avatar/3.jpg" alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">Barak Obama</div>
                                            <div class="notification-timestamp">08 Hours ago</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <img class="float-left mr-3 avatar-img"
                                            src="{{ asset('backend') }}/images/avatar/4.jpg" alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">Hilari Clinton</div>
                                            <div class="notification-timestamp">08 Hours ago</div>
                                            <div class="notification-text">Hello</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </li>
                <li class="icons dropdown d-none d-md-flex">
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
                </li>
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
