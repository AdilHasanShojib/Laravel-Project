<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span style="font-size: 40px;">
            Q R I O U S
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('dashboard')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('shops')}}">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('why')}}">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('testimonial')}}">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('contacts')}}">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">

          @if(Route::has('login'))

            @auth

            
           <a href="{{url('mycart')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              [{{ $count }}]
            </a>
            
            <a href="{{url('myorders')}}">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
             Orders
            </a>

             <!-- Log out               --> 
            <div class="list-inline-item logout">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
                </form>

              <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout <i class="icon-logout"></i> </a>
           </div>



          @else
            <a href="{{url('/login')}}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
               <a href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>
                Register
              </span>
            </a>
            @endauth
        @endif
            


            
          </div>
        </div>
      </nav>
    </header>