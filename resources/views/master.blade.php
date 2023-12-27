<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ParKing</title>

    @include('frontend.partials.style')

</head>

<body class="loading" style="width: 100vw; overflow-x: hidden;">
    <div class="wrapper">

        @yield('frontend.content')

        @if (request()->is('login') || request()->is('register'))
        @else      
        @include('frontend.partials.footer')      
        @endif
        
    </div>

    @include('frontend.partials.custom')

</body>

</html>
