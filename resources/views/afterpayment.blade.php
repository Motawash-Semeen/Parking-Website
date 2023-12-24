@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .congratulations-container {
            text-align: center;
            padding: 50px;
            margin: 50px auto;
            max-width: 600px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .directions-btn,
        .home-btn {
            margin-top: 20px;
        }
    </style>

    <div class="congratulations-container">
        <h1>Congratulations!</h1>
        <p>Your parking slot has been booked successfully.</p>
        <a href="{{ url('direction/'.session()->get('id')) }}" class="btn btn-primary directions-btn">Directions</a>
        <a href="{{ url('/') }}" class="btn btn-secondary home-btn">Home</a>
    </div>


    <!-- Delayed redirection script -->
    <script>
        // Delay in milliseconds (e.g., 5000 for 5 seconds)
        const delay = 5000;

        // Redirect after the specified delay
        setTimeout(() => {
            window.location.href = '{{ url('direction/'.session()->get('id')) }}';
        }, delay);
    </script>
@endsection
