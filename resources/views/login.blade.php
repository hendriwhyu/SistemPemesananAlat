@extends('layout.master')
@section('title', 'Login')

@section('content')

    <body class="app app-login p-0">
        <div class="row g-0 app-auth-wrapper">
            <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
                <div class="d-flex flex-column align-content-end">
                    <div class="app-auth-body mx-auto">
                        <div class="app-auth-branding mb-4"><a class="app-logo" href="{{ route('welcome') }}"><img
                                    class="logo-icon me-2"
                                    src="https://th.bing.com/th/id/OIP.KkGriirdxCNzvoZhmBImDAHaHa?pid=ImgDet&rs=1"
                                    alt="logo"></a></div>
                        <h2 class="auth-heading text-center mb-5">Dinas PUPR</h2>
                        @if (session('status') == 'failed')
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @elseif (session('status') == 'success')
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="auth-form-container text-start">
                            <form class="auth-form login-form" action="{{ url('/login-proses') }}" method="POST"
                                novalidate>
                                @csrf
                                <div class="username mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" name="username" id="username"
                                        class="form-control @error('username')
                                        is-invalid
                                    @enderror"
                                        placeholder="Username anda" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!--//form-group-->
                                <div class="password mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input name="password" type="password" id="password"
                                        class="form-control signin-password
                                    @error('password')
                                        is-invalid
                                    @enderror"
                                        placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <!--//extra-->
                                </div>
                                <!--//form-group-->
                                <div class="text-center">
                                    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log
                                        In</button>
                                </div>
                            </form>

                            <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link"
                                    href="{{ url('register') }}">here</a>.</div>
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
                            <h5 class="mb-3 overlay-title">Ketahui tentang Dinas PUPR</h5>
                            <div>Dinas PUPR bertanggung jawab untuk membangun, memelihara, dan mengelola infrastruktur
                                publik seperti jalan, jembatan, saluran air, dan fasilitas umum lainnya.<a
                                    href="{{ route('about') }}">About</a>.
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
