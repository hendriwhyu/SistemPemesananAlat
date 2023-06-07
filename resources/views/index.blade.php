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
                                                    <a class="nav-link" href="index.html">Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="about.html">About</a>
                                                </li>
                                                <li class="nav-item ">
                                                    <a class="nav-link" href="project.html">project</a>
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
                                <h1>Alat Berat</h1>
                                <p>Alat berat adalah jenis mesin atau peralatan mekanis yang digunakan dalam pekerjaan
                                    konstruksi, pertambangan, dan industri lainnya untuk melaksanakan tugas-tugas yang
                                    membutuhkan tenaga, kekuatan, atau kapasitas yang besar.</p>
                                <a class="read_more conatct_btn" href="contact.html" role="button">Contact
                                    Us</a>
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
                        <a class="read_more" href="Javascript:void(0)"> Read More</a>
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
    <!-- end about -->
    <!-- projects -->
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
                    <a class="read_more" href="Javascript:void(0)"> See More</a>
                </div>
            </div>
        </div>
    </div>
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
                                <i><img src="{{  asset('rhino-master/images/ch1.png')  }}" alt="#" />
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
    <!-- staff -->

    <!-- end staff -->
    <!--  contact -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 padding_right0">
                    <form id="request" class="main_form">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Name" type="type" name="Name">
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Phone" type="type" name="Phone">
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Email" type="type" name="Email">
                            </div>
                            <div class="col-md-12">
                                <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message</textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="send_btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 padding_left0">
                    <div class="map_main">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France"
                                width="600" height="463" frameborder="0" style="border:0; width: 100%;"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
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
    <!-- clients -->
    <div class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Clients Words</h2>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="testimo_ban_bg">
                        <div id="testimo" class="carousel slide testimo_ban" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#testimo" data-slide-to="0" class="active"></li>
                                <li data-target="#testimo" data-slide-to="1"></li>
                                <li data-target="#testimo" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="container parile0">
                                        <div class="carousel-caption relative2">
                                            <div class="row d_flex">
                                                <div class="col-md-12">
                                                    <i><img class="qusright" src="images/t.png" alt="#" /><img
                                                            src="images/tes.png" alt="#" /><img class="qusleft"
                                                            src="images/t.png" alt="#" /></i>
                                                    <div class="consect">
                                                        <span>consectetur</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniamLorem ipsum dolor sit amet,
                                                            consectetur adipiscing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container parile0">
                                        <div class="carousel-caption relative2">
                                            <div class="row d_flex">
                                                <div class="col-md-12">
                                                    <i><img class="qusright" src="images/t.png" alt="#" /><img
                                                            src="images/tes.png" alt="#" /><img class="qusleft"
                                                            src="images/t.png" alt="#" /></i>
                                                    <div class="consect">
                                                        <span>consectetur</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniamLorem ipsum dolor sit amet,
                                                            consectetur adipiscing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container parile0">
                                        <div class="carousel-caption relative2">
                                            <div class="row d_flex">
                                                <div class="col-md-12">
                                                    <i><img class="qusright" src="images/t.png" alt="#" /><img
                                                            src="images/tes.png" alt="#" /><img class="qusleft"
                                                            src="images/t.png" alt="#" /></i>
                                                    <div class="consect">
                                                        <span>consectetur</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            consectua. Ut enim ad minim veniamLorem ipsum dolor sit
                                                            amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#testimo" role="button" data-slide="prev">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#testimo" role="button" data-slide="next">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end clients -->
@endsection
