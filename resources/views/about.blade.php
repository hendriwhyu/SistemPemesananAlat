@extends('layout.master-landingpage')
@section('content-landingpage')
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('rhino-master/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
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
                                                    <a class="nav-link" href="index.html">Home</a>
                                                </li>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="about.html">About</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="project.html">project</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="staff.html">staff</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="contact.html">Contact Us</a>
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
                        <h2>About</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about -->
    <div class="about">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class="col-md-7">
                    <div class="titlepage">
                        <h2>About Our Company</h2>
                        <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomisedThere are many variations of passages
                            of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected
                            humour, or randomised</span>
                        <a class="read_more" href="Javascript:void(0)"> Read More</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about_img">
                        <figure><img src="{{ asset('rhino-master/images/about.png ') }}" alt="#" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="truck">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 jkhgkj">
                    <div class="truck_img1">
                        <img src="{{ asset('rhino-master/images/truck.png') }}" alt="#" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="truck_img1">
                        <img src="{{ asset('rhino-master/images/jcb.png') }}" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->
@endsection
