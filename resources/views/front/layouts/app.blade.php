<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="@yield('seo_meta_description')" />
    <title>@yield('seo_title')</title>

    @include('front.layouts.styles')

    @include('front.layouts.scripts')

</head>

<body>
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 left-side">
                    <ul>
                        <li class="phone-text">111-222-3333</li>
                        <li class="email-text">contact@arefindev.com</li>
                    </ul>
                </div>
                <div class="col-md-6 right-side">
                    <ul class="right">
                        @if (!Auth::guard('company')->check() && !Auth::guard('candidate')->check())
                        <li class="menu">
                            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                        <li class="menu">
                            <a href="{{ route('signup') }}"><i class="fas fa-user"></i> Sign Up</a>
                        </li>
                        @else
                        @if (Auth::guard('company')->check())
                        <li class="menu">
                            <a href="{{ route('company_dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                                Dashboard</a>
                        </li>
                        @else
                        <li class="menu">
                            <a href="{{ route('candidate_dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                                Dashboard</a>
                        </li>
                        @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include('front.layouts.nav')

    @yield('main_content')

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h2 class="heading">For Candidates</h2>
                        <ul class="useful-links">
                            <li><a href="">Browser Jobs</a></li>
                            <li><a href="">Browse Candidates</a></li>
                            <li><a href="">Candidate Dashboard</a></li>
                            <li><a href="">Saved Jobs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h2 class="heading">For Companies</h2>
                        <ul class="useful-links">
                            <li><a href="">Post Job</a></li>
                            <li><a href="">Browse Jobs</a></li>
                            <li><a href="">Company Dashboard</a></li>
                            <li><a href="">Applications</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h2 class="heading">Contact</h2>
                        <div class="list-item">
                            <div class="left">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="right">
                                34 Antiger Lane, USA, 12937
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="left">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="right">contact@arefindev.com</div>
                        </div>
                        <div class="list-item">
                            <div class="left">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="right">122-222-1212</div>
                        </div>
                        <ul class="social">
                            <li>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <h2 class="heading">Newsletter</h2>
                        <p>
                            To get the latest news from our website, please
                            subscribe us here:
                        </p>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Subscribe Now" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.layouts.footer')

    @include('front.layouts.scripts_footer')

    @stack('scripts')

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ $error }}',
                });
    </script>
    @endforeach
    @endif

    @if (session()->get('error'))
    <script>
        iziToast.error({
                position: 'topRight',
                message: '{{ session()->get('error') }}',
            });
    </script>
    @endif


    @if (session()->get('success'))
    <script>
        iziToast.success({
                position: 'topRight',
                message: '{{ session()->get('success') }}',
            });
    </script>
    @endif
</body>

</html>