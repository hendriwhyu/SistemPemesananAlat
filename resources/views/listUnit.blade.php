@extends('layout.master-landingpage')
@section('content-landingpage')
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('rhino-master/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header class="full_bg">
        <!-- header inner -->
        <div class="header">
            <div class="header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="contat_infoma">
                                <li><i class="fa fa-phone" aria-hidden="true"></i> Call : +01 12345678909</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="social_icon_top text_align_center  ">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="contat_infoma text_align_right">
                                <li><a href="Javascript:void(0)"> <i class="fa fa-phone" aria-hidden="true"></i>
                                        demo@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header_bottom">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                                    <div class="full">
                                        <div class="center-desk">
                                            <div class="logo">
                                                <a href="index.html">Rhino</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarsExample04">
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('about') }}">About</a>
                                                </li>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="{{ route('unit') }}">Unit</a>
                                                </li>
                                                <li class="nav-item ">
                                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <ul class="search">
                                            <li><a href="Javascript:void(0)"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
        <!-- end header -->
        <!-- banner -->
    </header>
    <!-- end banner -->
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Our Expert Staff</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- staff -->
    @if (isset($DataUnit))
        <div class="staff_main mb-5">
            <div class="container_staff">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>List Unit</h2>
                            <span>There are many variations of passages of Lorem Ipsum available, but the </span>
                        </div>
                    </div>
                    @foreach ($DataUnit as $item)
                        <div class="col-md-4 col-sm-6">
                            <div class="staff">
                                <div class="man">
                                    <img src="image/{{ $item->detailUnit->image }}" alt="{{ $item->name_alat }}" />
                                </div>
                                <div class="social_icon_main">
                                    <h4>{{ $item->name_alat }}</h4>
                                    <p class="text-white text-capitalize">{{ $item->status }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif
@endsection
