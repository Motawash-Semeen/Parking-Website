<div class="nk-sidebar" >           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{ url('admin/dashboard') }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Parking Slots</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/all-slots') }}">Manage Slots</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Transaction</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/all-transaction') }}">Show Transaction</a></li>
                </ul>
            </li>
            <li class="nav-label">Apps</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./email-inbox.html">Inbox</a></li>
                    <li><a href="./email-read.html">Read</a></li>
                    <li><a href="./email-compose.html">Compose</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>