<!-- header -->
<header>
    <!-- header inner -->
    <div class="header">
       <div class="container">
          <div class="row mg">
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                   <div class="center-desk">
                      <div class="logo mt-1">
                         <a href="{{ route('home') }}"><img src="assets/img/logo-01.png" width="90%" alt="#" /></a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <nav class="navigation navbar navbar-expand-md navbar-dark ">
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarsExample04">
                      <ul class="navbar-nav mr-auto">
                         <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link {{ Request::is('our-room') ? 'active' : '' }}" href="{{ route('our.room') }}">Our Room</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link {{ Request::is('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                         </li>
                         @auth
                         <li class="nav-item">
                           <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                         </li>
                         @endauth
                         @guest
                         <li class="nav-item">
                           <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">Sign Up</a>
                        </li>
                         @endguest
                      </ul>
                   </div>
                </nav>
             </div>
          </div>
       </div>
    </div>
 </header>
 <!-- end header inner -->
 <!-- end header -->