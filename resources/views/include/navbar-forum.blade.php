@include('pages.thread-create')

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="{{ route('home') }}">Innovation Lab</a></h1>

        </div>

        <nav id="navbar" class="navbar">
            <form action="{{ route('forum') }}" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <ul>
                    <li>
                        <div class="form-group">
                            <select class="mx-3 select-category" id="selectCategoryThread" name="category_id">
                                <option value="" selected>Semua Kategori</option>
                                @foreach (App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == request('category_id') ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-1 small" name="search"
                                value="{{ request('search') }}" placeholder="Cari Thread" aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="background: #3498db;" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                    @auth
                        <li>
                            <a class="getstarted scrollto" href="#" type="button" id="threadModalLink"
                                data-toggle="modal" data-target="#threadModal">
                                <iconify-icon icon="jam:write-f" class="mr-2"></iconify-icon>
                                Buat Thread</a>
                        </li>
                    @else
                        <li>
                            <a class="getstarted scrollto" href="{{ route('login') }}" type="button" id="threadModalLink">
                                <iconify-icon icon="jam:write-f" class="mr-2"></iconify-icon>
                                Buat Thread</a>
                        </li>

                    @endauth
                    <li class="nav-item dropdown no-arrow">
                        @auth
                            <a class="nav-link dropdown-toggle py-0" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ '@'.(auth()->user()->username) }}</span>
                                @if (auth()->user()->image_path)
                                    <img class="img-profile rounded-circle" src="/storage/{{ auth()->user()->image_path }}"
                                        style="height: 35px; width: 35px; object-fit: cover;">
                                @else
                                    <img class="img-profile rounded-circle" src="/img/undraw_profile.svg"
                                        style="height: 35px">
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
                        @else
                            <a class="getstarted scrollto" href="{{ route('login') }}">Login</a>
                        @endauth

                    </li>
                </ul>
            </form>
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
