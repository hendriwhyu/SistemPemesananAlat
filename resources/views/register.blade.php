@extends('layout.master')
@section('title', 'Register')

@section('content')

    <body class="app app-signup p-0">
        <div class="row g-0 app-auth-wrapper">
            <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
                <div class="d-flex flex-column align-content-end">
                    <div class="app-auth-body mx-auto">
                        <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2"
                                    src="assets/images/app-logo.svg" alt="logo"></a></div>
                        <h2 class="auth-heading text-center mb-4">Sign up to Portal</h2>
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="auth-form-container text-start mx-auto">
                            <form class="auth-form auth-signup-form" method="POST" novalidate>
                                @csrf
                                <div class="email mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input id="username" name="username" type="text"
                                        class="form-control username @error('username')
                                        is-invalid
                                    @enderror"
                                        placeholder="Full name" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="email mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input id="email" name="email" type="email"
                                        class="form-control email  @error('email')
                                        is-invalid
                                    @enderror"
                                        placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="password mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input placeholder="Masukkan Password"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                        type="password" name="password" id="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="password mb-3">
                                    <div class="password-confirm mb-3">
                                        <label class="form-label" for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" name="password_confirmation" type="password"
                                            class="form-control  @error('password')
                                        is-invalid
                                    @enderror"
                                            placeholder="Confirm your password">
                                    </div>
                                </div>
                                <div class="extra mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="RememberPassword">
                                        <input type="hidden" value="2" id="role" name="role">
                                        <label class="form-check-label" for="RememberPassword">
                                            I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and
                                            <a href="#" class="app-link">Privacy Policy</a>.
                                        </label>
                                    </div>
                                </div>

                                <!--//extra-->

                                <div class="text-center">
                                    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                        Up</button>
                                </div>
                            </form>
                            <!--//auth-form-->

                            <div class="auth-option text-center pt-5">Already have an account? <a class="text-link"
                                    href="{{ url('login') }}">Log in</a></div>
                        </div>
                        <!--//auth-form-container-->



                    </div>
                    <!--//auth-body-->

                    <footer class="app-auth-footer">
                        <div class="container text-center py-3">
                            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                                    style="color: #fb866a;"></i> by <a class="app-link"
                                    href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for
                                developers</small>

                        </div>
                    </footer>
                    <!--//app-auth-footer-->
                </div>
                <!--//flex-column-->
            </div>
            <!--//auth-main-col-->
            <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
                <div class="auth-background-holder">
                </div>
                <div class="auth-background-mask"></div>
                <div class="auth-background-overlay p-3 p-lg-5">
                    <div class="d-flex flex-column align-content-end h-100">
                        <div class="h-100"></div>
                        <div class="overlay-content p-3 p-lg-4 rounded">
                            <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
                            <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the
                                template license <a
                                    href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.
                            </div>
                        </div>
                    </div>
                </div>
                <!--//auth-background-overlay-->
            </div>
            <!--//auth-background-col-->

        </div>
        <!--//row-->


    </body>
@endsection
