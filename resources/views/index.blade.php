@extends('layout.master-landingpage')
@section('content-landingpage')
    <!-- loader  -->
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
                                <li><i class="fa fa-phone" aria-hidden="true"></i> Call : +01 xxxxxx</li>
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
                                                <a href="index.html">PUPR</a>
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
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('about') }}">About</a>
                                                </li>
                                                <li class="nav-item ">
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
        <section class="banner_main">
            <div class="container">
                <div class="carousel-caption  banner_po">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="build_box">
                                <h1>Konstruksi</h1>
                                <p>Kegiatan membangun sarana atau prasarana yang berdasarkan desain dan rencana
                                    terperinci untuk membuat struktur untuk lokasi tertentu.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- end banner -->
    <!-- three_box -->
    <div class="three_box">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="text_hover" class="const text_align_center">
                        <i><img src="images/ser1.png" alt="#" /></i>
                        <span>construction services</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="text_hover" class="const text_align_center">
                        <i><img src="images/ser2.png" alt="#" /></i>
                        <span>RECONSTRUCTION</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="text_hover" class="const text_align_center">
                        <i><img src="images/ser3.png" alt="#" /></i>
                        <span>ELECTRICAL services</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end three_box -->
    <!-- about -->
    <div class="about">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class="col-md-7">
                    <div class="titlepage">
                        <h2>Dinas PUPR</h2>
                        <span>Tugas utama Dinas PUPR adalah merencanakan, membangun, memelihara, dan
                            mengawasi infrastruktur publik seperti jalan, jembatan, gedung-gedung,
                            saluran air, dan fasilitas umum lainnya.</span>
                        <a class="read_more" href="{{ route('about') }}"> Read More</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about_img">
                        <figure><img src="{{ asset('rhino-master/images/about.png') }}" alt="#" /></figure>
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
    <!-- projects -->
    @if (isset($DataUnit))
        <div class="staff_main">
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
                    <div class="col-md-12">
                        <a class="read_more" href="{{ route('unit') }}"> See More</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- end projects -->
    <!-- choose -->
    <div class="choose">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 ">
                    <div class="titlepage">
                        <h2>Keunggulan</h2>
                        <p>Dinas PUPR bertanggung jawab untuk membangun, memelihara, dan mengelola infrastruktur publik
                            seperti jalan, jembatan, saluran air, dan fasilitas umum lainnya. Jika ada kebutuhan yang
                            signifikan dalam pengembangan atau pemeliharaan infrastruktur di suatu daerah, memilih dinas
                            PUPR dapat memberikan manfaat yang besar bagi masyarakat dan pertumbuhan ekonomi daerah.</p>
                        <div class="award">
                            <div id="awa_ho" class="award_icon text_align_center">
                                <i><img src="{{ asset('rhino-master/images/ch1.png') }}" alt="#" />
                                </i>
                                <strong>Pengawasan dan Pemeliharaan</strong>
                            </div>
                            <div id="awa_ho" class="award_icon text_align_center">
                                <i><img src="{{ asset('rhino-master/images/ch2.png') }}" alt="#" /></i>
                                <strong>Koordinasi dengan Instansi </strong>
                            </div>
                            <div id="awa_ho" class="award_icon text_align_center">
                                <i><img src="{{ asset('rhino-master/images/ch3.png') }}" alt="#" /></i>
                                <strong>Ketersediaan Sumber Daya</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end choose -->

    <!-- end contact -->

    <!-- clients -->
    <!-- end clients -->
@endsection
