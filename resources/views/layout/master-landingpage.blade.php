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
                    <div class=" col-lg-3 col-md-6">
                        <a class="logo_bottom"><img src="images/logo_bottom.png" alt="#" /></a>
                        <p class="many">
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humou
                        </p>
                    </div>
                    <div class="col-lg-2 offset-lg-1 col-md-6">
                        <h3>QUICK LINKS</h3>
                        <ul class="link_menu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html"> About</a></li>
                            <li><a href="project.html">Projects</a></li>
                            <li><a href="staff.html">Staff</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class=" col-lg-3 col-md-6">
                        <h3>INSTAGRAM FEEDS</h3>
                        <ul class="insta text_align_left">
                            <li><img src="images/inst1.png" alt="#" /></li>
                            <li><img src="images/inst2.png" alt="#" /></li>
                            <li><img src="images/inst3.png" alt="#" /></li>
                            <li><img src="images/inst4.png" alt="#" /></li>
                        </ul>
                    </div>
                    <div class=" col-lg-3 col-md-6 ">
                        <h3>SIGN UP TO OUR NEWSLETTER </h3>
                        <form class="bottom_form">
                            <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                            <button class="sub_btn">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html
                                    Templates</a></p>
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
