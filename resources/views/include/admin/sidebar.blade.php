<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="background: #3D4B64" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-lightbulb"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Innovation Lab Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Admin
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">
            <i class="fa fa-users"></i>
            <span>User</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">
            <i class="fa fa-list-alt"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Nav Item - Threads -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('thread.index')}}">
            <i class="fas fa-at"></i>
            <span>Thread</span></a>
    </li>

     <!-- Nav Item - Comment -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">
            <i class="far fa-comments"></i>
            <span>Komentar</span></a>
    </li>

     <!-- Nav Item - Home -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    

</ul>
<!-- End of Sidebar -->