<header class="w-100">
      <div class="nav-design w-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-yellow py-3">
          <div class="container-lg">
            <a class="navbar-brand" href="#"><img src="{{ asset('frontend') }}/assets/landowner/img/logo.png" alt="Logo" height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon navbar-inverse "></span>
            </button>
        
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                  <a class="nav-link mx-2 active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-2" href="#">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-2" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-2" href="#">Conatct & Help</a>
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
</header>