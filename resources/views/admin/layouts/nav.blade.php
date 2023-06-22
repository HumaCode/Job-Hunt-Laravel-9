<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3 ">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>

    <div class="container-fluid">

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-link">
                    <a href="{{ route('home') }}" class="btn btn-warning">Frontend</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img alt="image"
                            src="{{ (auth()->user()->photo == null) ? asset('dist/img/user.png') : \Storage::url(auth()->user()->photo) }}"
                            class="rounded-circle-custom">
                        <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin_profile') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Edit Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin_logout') }}" class="dropdown-item has-icon">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>