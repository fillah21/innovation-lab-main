  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center shadow-sm">
      <div class="container d-flex align-items-center justify-content-between">

          <div class="logo">
              <h1><a href="{{ route('home') }}">Innovation Lab</a></h1>
          </div>

          <nav id="navbar" class="navbar">
              <ul>
                  @auth
                      <li class="nav-item dropdown no-arrow">
                          <a class="nav-link dropdown-toggle py-0" href="#" id="userDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span
                                  class="mr-2 d-none d-lg-inline text-gray-600 small">{{ '@'.(auth()->user()->username) }}</span>
                              @if (auth()->user()->image_path)
                              <img class="img-profile rounded-circle" src="/storage/{{auth()->user()->image_path}}" style="height: 35px; width: 35px; object-fit: cover;"> 
                              @else
                              <img class="img-profile rounded-circle" src="/img/undraw_profile.svg" style="height: 35px">
                              @endif
                          </a>
                          <!-- Dropdown - User Information -->
                          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item text-sm-start" href="{{ route('profil') }}">
                                    <span>
                                        <i class="fas fa-user"></i>
                                        Profile
                                    </span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <span>
                                        <i class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </span>
                                </a>
                            </div>
                      </li>
                  @else
                      <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                      <li><a class="getstarted scrollto ml-2" href="{{ route('register') }}">Register</a></li>
                  @endauth
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
              </div>
          </div>
      </div>
  </div>
