<header class="header">
  <div class="container-lg">
      <div class="row nav-design">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-3">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('frontend') }}/assets/landowner/img/logo.png" alt="Logo" height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon navbar-inverse "></span>
            </button>
        
            <div class=" collapse navbar-collapse" id="navbarNavDropdown header-menu">
              <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                  <a class="nav-link mx-2" aria-current="page" href="#home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-2" href="{{ url('service') }}">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-2" href="#about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-2" href="#contact">Conatct & Help</a>
                </li>
                
              </ul>
              <ul class="navbar-nav ms-auto d-inline-flex justify-content-center btn-main">
                  @if (Auth::user())
                  <li class="nav-item dropdown">
                      <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background: rgba(255, 255, 255, 0.2);
                      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                      backdrop-filter: blur(5px);
                      -webkit-backdrop-filter: blur(5px);">
                        <li><a class="dropdown-item nav-link" href="{{ url('dashboard') }}">Profile</a></li>
                        <li><a class="dropdown-item nav-link" href="{{ url('logout') }}">Logout</a></li>
                      </ul>
                    </li>
                  @else
                  <li class="nav-item mx-lg-2 top-btn">
                      <a class="nav-link text-dark h5 btn-nav " href="{{ url('login') }}">Login</a>
                    </li>
                    <li class="nav-item mx-lg-2 top-btn">
                      <a class="nav-link text-dark h5 btn-nav" href="{{ url('register') }}">Signup</i></a>
                    </li>
                  @endif
               
               
              </ul>
            </div>
          </div>
        </nav>
      
      </div>

      <div class="row my-3 my-lg-5">
          <div class="col-md-6 pe-lg-5 px-4">
              <div class="banner-img">
                  <a href="#"><img src="{{ asset('frontend') }}/assets/img/driver.jpg"
                          alt="Driver image" class="w-100"></a>
                  <!-- <iframe src="https://www.youtube.com/embed/bM4G1Toe3h0" frameborder="0" allowfullscreen></iframe> -->
              </div>
          </div>
          <div class="col-md-6 ps-lg-5 px-4">
              <div class="text">
                  <h3>Want to enjoy easy parking? </h3>
                  <h6>
                      <p>Fed up of overpaying for parking and getting tickets for parking violations? </p>
                      <p>Get directions to the nearest parking space.</p>
                  </h6>
                  <a class="button white" href="#">F A Q <sub>s</sub></a>
                  <a class="button" href="signup">Get Started</a>
              </div>
          </div>
      </div>

      <div class="row my-5">
          <div class="col-md-6 pe-lg-5 px-4">
              <div class="banner-img">
                  <a href="#"><img src="{{ asset('frontend') }}/assets/landowner/img/park_1.jpg"
                          alt="Parking space image" class="w-100"></a>
                  <!-- <iframe src="https://www.youtube.com/embed/bM4G1Toe3h0" frameborder="0" allowfullscreen></iframe> -->
              </div>
          </div>
          <div class="col-md-6 ps-lg-5 px-4">
              <div class="text">
                  <h3>Ready to earn from your bare land?</h3>
                  <h6>
                      <p>Have a bare land of no use?</p>
                      <p>Earn a thousands of rupees a year by renting out your empty land as a parking space
                      </p>
                  </h6>
                  <a class="button white" href="#">F A Q <sub>s</sub></a>
                  <a class="button" href="signup" background-color="yellow">Get Started</a>
              </div>
          </div>
      </div>

  </div>
</header>