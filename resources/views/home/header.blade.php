<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <!-- <img src="assets/images/logo.png" alt=""> -->
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.html" class="active">Home</a></li>
                        <li><a href="explore.html">Explore</a></li>
                        <li><a href="details.html">Item Details</a></li>
                        
                        <li><a href="create.html">Create Yours</a></li>

                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                
                                <li>
                                    <a href="{{url('book_history')}}">My Order History</a>
                                </li>

                                <li>
                                <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: white;">Logout</a>
                                </li>

                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    

                                    @if (Route::has('register'))
                                       <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            </nav>
                        @endif















                        <!-- <li><a href="{{ route('login') }}">Login</a></li> -->
                        <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->