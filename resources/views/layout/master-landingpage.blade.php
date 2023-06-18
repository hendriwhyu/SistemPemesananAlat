<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Dinas PUPR</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('rhino-master/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('rhino-master/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('rhino-master/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href=" https://pbs.twimg.com/profile_images/461342847065542657/dfNOu95E_400x400.jpeg"
        type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('rhino-master/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    @yield('content-landingpage')

    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class=" col-lg-8 col-md-8">
                        <a class="logo_bottom"><img src="https://webpupredesign.github.io/assets/images/Logo_PU_(RGB).jpg" alt="#" width="60px" /></a>
                        <p class="many">
                            Kegiatan membangun sarana atau prasarana yang berdasarkan desain dan rencana
                            terperinci untuk membuat struktur untuk lokasi tertentu.
                        </p>
                    </div>
                    <div class="col-lg-2 offset-lg-1 col-md-6">
                        <h3>QUICK LINKS</h3>
                        <ul class="link_menu">
                            <li><a href="{{ route('welcome') }}">Home</a></li>
                            <li><a href="{{ route('about') }}"> About</a></li>
                            <li><a href="{{ route('unit') }}">List Unit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <p>© 2023 All Rights Reserved. Design by Politeknik Negeri Cilacap</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Javascript files-->
    <script src="{{ asset('rhino-master/js/jquery.min.js') }}"></script>
    <script src="{{ asset('rhino-master/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('rhino-master/js/jquery-3.0.0.min.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('rhino-master/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('rhino-master/js/custom.js') }}"></script>
</body>

</html>
