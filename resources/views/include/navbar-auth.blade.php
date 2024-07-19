  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="{{route('home')}}">Innovation Lab</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="getstarted scrollto" href="{{route('login')}}">Login</a></li>
          <li><a class="getstarted scrollto ml-2" href="{{route('register')}}">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->