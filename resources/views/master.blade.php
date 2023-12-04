<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ParKing</title>

    @include('frontend.partials.style')

</head>

<body class="loading">
    <div class="wrapper">

        @yield('frontend.content')

        @include('frontend.partials.footer')

    </div>

    @include('frontend.partials.custom')


</body>

</html>
