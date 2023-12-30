<div class="nk-sidebar" >           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{ url('admin/dashboard') }}" aria-expanded="false">
                    <i class="fa-solid fa-gauge"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-map-location-dot"></i><span class="nav-text">Parking Slots</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/all-slots') }}">Manage Slots</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-file-contract"></i><span class="nav-text">Transaction</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/all-transaction') }}">Show Transaction</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-user-group"></i><span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/all-users') }}">Show Users</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-comments"></i><span class="nav-text">Review</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/all-review') }}">Show Reviews</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-address-book"></i><span class="nav-text">Contact Message</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/all-message') }}">Show Contact Message</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-person-circle-question"></i><span class="nav-text">FAQ</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/all-faq') }}">Show FAQ</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-share-nodes"></i><span class="nav-text">Social Links</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/all-links') }}">Show Social Links</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>