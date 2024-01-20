@extends('master')
@section('frontend.content')
@include('frontend.partials.header')
<section class="project" id="about" data-aos="fade-up" data-aos-duration="1500">
    <div class="text">
        <h2>Parking Made Easy</h2>
        <h4>Best Parking Management, Searching and Reservation Tool</h4>
        <p>Get a guaranteed parking spot in advance. Now you don't have to go and check whether the paking is
            available. We will do that for you. </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 project_icon">
                <div class="single_project">
                    <i class="icofont icofont-samsung-galaxy"></i>
                    <h3><a href="#">Create your listing for free</a></h3>
                    <p>It will only take 5 minutes for you to signup and register your bare land in our system.
                    </p>
                    <p> And it is totally free.</p>
                </div>
            </div>
            <div class="col-md-4 project_icon">
                <div class="single_project">
                    <i class="icofont icofont-car"></i>
                    <h3><a href="#">Drivers Book your space</a></h3>
                    <p>One of our 1000+ drivers will book your parking space or will navigate to your parking.
                    </p>
                </div>
            </div>
            <div class="col-md-4 project_icon">
                <div class="single_project">
                    <i class="icofont icofont-team"></i>
                    <h3><a href="#">Watch your Earnings roll in</a></h3>
                    <p>You can earn as often as you like by choosing when your parking space is available to
                        rent..</p>
                </div>
            </div>
            <div class="col-md-12">
                <p class="button"><a class="button" href="{{ url('/register') }}">Get started</a></p>
            </div>
        </div>
    </div>
</section>
<section class="user_part" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="useres_part">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 user_part_part">
                            <div class="user_text row align-items-center">
                                <div class="col-4">
                                    <i class="bi bi-pen"></i>
                                </div>
                                <div class="col-8">
                                    <h4>Create your listing<br>for free</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 user_part_part">
                            <div class="user_text row align-items-center">
                                <div class="col-4">
                                    <i class="bi bi-pin-map"></i>
                                </div>
                                <div class="col-8">
                                    <h4><span class="counter-install">{{ $total_slots.'+' }} </span><br>Parking Listed</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 user_part_part">
                            <div class="user_text row align-items-center">
                                <div class="col-4">
                                    <i class="bi bi-download"></i>
                                </div>
                                <div class="col-8">
                                    <h4><span class="counter-download">{{$total_trans}}+ </span><br>Transaction</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 user_part_part">
                            <div class="user_text row align-items-center">
                                <div class="col-4">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="col-8">
                                    <h4><span class="counter-user">{{ $total_user.'+' }} </span><br>Users</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services" data-aos="fade-up" data-aos-duration="1500">
    <div class="text">
        <h2>Services</h2>
        <p> We provides matching platform service for vehicle drivers who need parking service and parking lot
            owners a platform to rent out their parking spaces.
        </p>
    </div>
    <div class="container-accordion">
        <div class="row">
            <div class="col-12 pe-0">
                <div class="services_area">
                    <div class="accordion" id="accordionPanelsStayOpenExample accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    WHEREVER AND WHENEVER
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="{{ asset('frontend') }}/assets/img/landing_wherever.png"
                                                alt="" class="w-100" height="150">
                                        </div>
                                        <div class="col-sm-8">
                                            <p>Landowners can rent out their land wherever in Sri Lanka. Drivers
                                                can choose from
                                                millions of parking spaces available across Sri Lanka, whenever
                                                and wherever</p>
                                            <p>Best platform for you to find the best parking option for your
                                                every journey </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    FLEXIBLE
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="{{ asset('frontend') }}/assets/img/flexible.jpg"
                                                alt="" class="w-100" height="150">
                                        </div>
                                        <div class="col-sm-8">
                                            <p>The most flexible reservation system you'll ever find. You can
                                                reserve in advance
                                                over thousands of locations.</p>
                                            <p>You can veiw information on availability, price and any
                                                restrictions available,
                                                before making the reservation. Landowners can have the full
                                                profit since
                                                everything is displayed and recorded.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    ZERO MARKETING
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="{{ asset('frontend') }}/assets/img/Marketing.jpg"
                                                alt="" class="w-100" height="150">
                                        </div>
                                        <div class="col-sm-8">
                                            <p>You don't need to be afraid whether drivers will not come. We
                                                will take care of
                                                it.</p>
                                            <p>You don't have to worry about marketing your parking space. We
                                                will suggest your
                                                place to nearby Drivers. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                    SMOOTH EXPERIENCE
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('frontend') }}/assets/img/experience.jpg"
                                                alt="" class="w-100" height="150">
                                        </div>
                                        <div class="col-md-8">
                                            <p>Since you can veiw the time that you have been parked at the
                                                particular parking
                                                space, you can pay only for the time you parked. Landowners can
                                                avoid drivers
                                                overstaying as well.</p>
                                            <p>Easy directions will be provided for you to navigate to the
                                                parking space.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section class="customer_area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="customer_say">
                    <h3>What our customers <br> have to say about us.</h3>
                    <p>We value our customers.</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="vertical_main" id="vertical_main">
                    <div class="verticalCarousel">
                        <a href="#" class="vc_goDown"><i class="fa fa-fw fa-angle-down"></i></a>
                        <a href="#" class="vc_goUp"><i class="fa fa-fw fa-angle-up"></i></a>
                        <div class="vc_container" style="height: 285px;">
                            <ul class="verticalCarouselGroup vc_list" style="transform: translateY(-135px);">
                                <li>
                                    <div class="vertical_text">
                                        <img src="{{ asset('frontend') }}/assets/img/vertical_text_images.jpg"
                                            alt="">
                                        <h4>Kasun Perera</h4>
                                        <p> It was really easy, seamless from the start.I earn a lot of money as
                                            a landowner.I decided to let the money I make from JustPark build up
                                            so I could use it for something nice.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="vertical_text">
                                        <img src="{{ asset('frontend') }}/assets/img/vertical_text_images1.jpg"
                                            alt="">
                                        <h4>Malmi Soysa</h4>
                                        <p>using this application i can get to where i want to be sooner. No
                                            more parking headaches. Parking ia an ideal paeking companion. Thank
                                            you parking. No parking hassales now.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="vertical_text">
                                        <img src="{{ asset('frontend') }}/assets/img/vertical_text_images.jpg"
                                            alt="">
                                        <h4>John Doe</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="vertical_text">
                                        <img src="{{ asset('frontend') }}/assets/img/vertical_text_images1.jpg"
                                            alt="">
                                        <h4>Khalessi</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="vertical_text">
                                        <img src="{{ asset('frontend') }}/assets/img/vertical_text_images.jpg"
                                            alt="">
                                        <h4>Kasun Perera</h4>
                                        <p> It was really easy, seamless from the start.I earn a lot of money as
                                            a landowner.I decided to let the money I make from JustPark build up
                                            so I could use it for something nice.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="vertical_text">
                                        <img src="{{ asset('frontend') }}/assets/img/vertical_text_images1.jpg"
                                            alt="">
                                        <h4>Malmi Soysa</h4>
                                        <p>using this application i can get to where i want to be sooner. No
                                            more parking headaches. Parking ia an ideal paeking companion. Thank
                                            you parking. No parking hassales now.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="vertical_text">
                                        <img src="{{ asset('frontend') }}/assets/img/vertical_text_images.jpg"
                                            alt="">
                                        <h4>John Doe</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="vertical_text">
                                        <img src="{{ asset('frontend') }}/assets/img/vertical_text_images1.jpg"
                                            alt="">
                                        <h4>Khalessi</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> --}}

@include('frontend.partials.contact')
@endsection