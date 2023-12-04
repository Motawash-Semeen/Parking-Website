<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
  
    <title>Admin Dashboard</title>

    @include('admin.partial.style')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" style="min-height: 100vh">

        @include('admin.partial.header')
        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.partial.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('admin_content')
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.partial.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    @include('admin.partial.custom')
<script>
    $(document).ready(function(){
        $('.hamburger').click(function(){
            $('#main-wrapper').toggleClass('menu-toggle');
        });
    });
    function addClassBasedOnWidth() {
        var body = document.body;
        
        // Check if the viewport width is less than 768 pixels
        if (window.innerWidth < 768) {
            // Add the class for small screens
            document.querySelector('#main-wrapper').classList.add('menu-toggle');
        } else {
            // Remove the class for larger screens
            document.querySelector('#main-wrapper').classList.remove('menu-toggle');
        }
    }

    // Call the function on page load and resize
    window.addEventListener('load', addClassBasedOnWidth);
    window.addEventListener('resize', addClassBasedOnWidth);
</script>
</body>

</html>
