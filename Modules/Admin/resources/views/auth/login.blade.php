{{--@extends('admin::layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ "Admin Login Form"  }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('admin.dashboard.login') }}">--}}
{{--                            @csrf--}}

{{--                            <div class="row mb-3">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-end"> Email </label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-3">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('Login') }}--}}
{{--                                    </button>--}}

{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot Your Password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}


@include("admin::layouts.header")

<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
{{--                                        <div class="mb-4">--}}
{{--                                            <a href="index.html" class="d-block">--}}
{{--                                                <img src="{{ asset("assets/auth/images/site") }}" alt="" height="18">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
                                        <div class="mt-auto">
{{--                                            <div class="mb-3">--}}
{{--                                                <i class="ri-double-quotes-l display-4 text-success"></i>--}}
{{--                                            </div>--}}

{{--                                            <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">--}}
{{--                                                <div class="carousel-indicators">--}}
{{--                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>--}}
{{--                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
{{--                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
{{--                                                </div>--}}
{{--                                                <div class="carousel-inner text-center text-white-50 pb-5">--}}
{{--                                                    <div class="carousel-item active">--}}
{{--                                                        <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="carousel-item">--}}
{{--                                                        <p class="fs-15 fst-italic">" The theme is really great with an amazing customer support."</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="carousel-item">--}}
{{--                                                        <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <!-- end carousel -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to Mozayen .</p>
                                    </div>

                                    <div class="mt-4">
                                        <form method="post" action="{{  route('admin.dashboard.login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="">
                                                      <input id="email" type="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                         @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                         @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>

                                                <div class="">
                                                    <input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">--}}
{{--                                                <label class="form-check-label" for="auth-remember-check">Remember me</label>--}}
{{--                                            </div>--}}

                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" type="submit">Sign In</button>
                                            </div>

{{--                                            <div class="mt-4 text-center">--}}
{{--                                                <div class="signin-other-title">--}}
{{--                                                    <h5 class="fs-13 mb-4 title">Sign In with</h5>--}}
{{--                                                </div>--}}

{{--                                                <div>--}}
{{--                                                    <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>--}}
{{--                                                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>--}}
{{--                                                    <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>--}}
{{--                                                    <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                        </form>
                                    </div>

{{--                                    <div class="mt-5 text-center">--}}
{{--                                        <p class="mb-0">Don't have an account ? <a href="auth-signup-cover.html" class="fw-semibold text-primary text-decoration-underline"> Signup</a> </p>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer galaxy-border-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">&copy;
                            <script>document.write(new Date().getFullYear())</script> Tailors DEV Crafted with <i class="mdi mdi-heart text-danger"></i> by Mohamed Khaled
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->




@include("admin::layouts.scripts")
