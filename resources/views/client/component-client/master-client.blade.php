@extends('layout.master')

@section('content')

    <body class="app">
        <header class="app-header fixed-top">
            <div class="app-header-inner">
                <div class="container-fluid py-2">
                    <div class="app-header-content">
                        <div class="row justify-content-between align-items-center">

                            <div class="col-auto">
                                <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 30 30" role="img">
                                        <title>Menu</title>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                            stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                    </svg>
                                </a>
                            </div>
                            <!--//col-->
                            <div class="search-mobile-trigger d-sm-none col">
                                <i class="search-mobile-trigger-icon fas fa-search"></i>
                            </div>
                            <!--//col-->
                            <div class="app-search-box col">
                                <form class="app-search-form">
                                    <input type="text" placeholder="Search..." name="search"
                                        class="form-control search-input">
                                    <button type="submit" class="btn search-btn btn-primary" value="Search"><i
                                            class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <!--//app-search-box-->

                            <div class="app-utilities col-auto">
                                <!--//app-utility-item-->
                                <div class="app-utility-item">
                                    <a href="{{ route('admin.profile') }}" title="Settings">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear icon"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                                            <path fill-rule="evenodd"
                                                d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                                        </svg>
                                    </a>
                                </div>
                                <!--//app-utility-item-->

                                <div class="app-utility-item app-user-dropdown dropdown">
                                    <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#" role="button" aria-expanded="false"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path
                                                d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z">
                                            </path>
                                        </svg></a>
                                    <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                        <li>
                                            <div class="logo text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <b class="dropdown-item text-center text-capitalize text-bold"
                                                style="margin-bottom: 0%; padding-bottom:0%">{{ Auth::user()->username }}</b>
                                            <small class="dropdown-item text-center text-capitalize text-bold"
                                                style="margin-bottom: 0%; padding-bottom:0%; padding-top:0%">{{ Auth::user()->role->role }}</small>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Settings</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="post" class="dropdown-item">
                                                @csrf
                                                <button style="border:none; background-color:transparent" type="submit">Log
                                                    Out</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <!--//app-user-dropdown-->
                            </div>
                            <!--//app-utilities-->
                        </div>
                        <!--//row-->
                    </div>
                    <!--//app-header-content-->
                </div>
                <!--//container-fluid-->
            </div>
            <!--//app-header-inner-->
            <div id="app-sidepanel" class="app-sidepanel">
                <div id="sidepanel-drop" class="sidepanel-drop"></div>
                <div class="sidepanel-inner d-flex flex-column">
                    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                    <div class="app-branding">
                        <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg"
                                alt="logo"><span class="logo-text">PORTAL</span></a>

                    </div>
                    <!--//app-branding-->

                    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                        <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link" href="{{ route('client.dashboard') }}">
                                    <span class="nav-icon">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                            <path fill-rule="evenodd"
                                                d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                                <!--//nav-link-->
                            </li>
                            <!--//nav-item-->
                            <!--//nav-item-->

                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link" href="{{ route('client.pemesanan') }}">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path
                                                d="M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921zM17.307 15h-6.64l-2.5-6h11.39l-2.25 6z">
                                            </path>
                                            <circle cx="10.5" cy="19.5" r="1.5"></circle>
                                            <circle cx="17.5" cy="19.5" r="1.5"></circle>
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Pemesanan</span>
                                </a>
                                <!--//nav-link-->
                            </li>
                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link" href="{{ route('client.historyrental') }}">
                                    <span class="nav-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path d="M12 8v5h5v-2h-3V8z"></path>
                                            <path
                                                d="M21.292 8.497a8.957 8.957 0 0 0-1.928-2.862 9.004 9.004 0 0 0-4.55-2.452 9.09 9.09 0 0 0-3.626 0 8.965 8.965 0 0 0-4.552 2.453 9.048 9.048 0 0 0-1.928 2.86A8.963 8.963 0 0 0 4 12l.001.025H2L5 16l3-3.975H6.001L6 12a6.957 6.957 0 0 1 1.195-3.913 7.066 7.066 0 0 1 1.891-1.892 7.034 7.034 0 0 1 2.503-1.054 7.003 7.003 0 0 1 8.269 5.445 7.117 7.117 0 0 1 0 2.824 6.936 6.936 0 0 1-1.054 2.503c-.25.371-.537.72-.854 1.036a7.058 7.058 0 0 1-2.225 1.501 6.98 6.98 0 0 1-1.313.408 7.117 7.117 0 0 1-2.823 0 6.957 6.957 0 0 1-2.501-1.053 7.066 7.066 0 0 1-1.037-.855l-1.414 1.414A8.985 8.985 0 0 0 13 21a9.05 9.05 0 0 0 3.503-.707 9.009 9.009 0 0 0 3.959-3.26A8.968 8.968 0 0 0 22 12a8.928 8.928 0 0 0-.708-3.503z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">History Rental</span>
                                </a>
                                <!--//nav-link-->
                            </li>
                            <!--//nav-item-->

                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link" href="help.html">
                                    <span class="nav-icon">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-question-circle" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Help</span>
                                </a>
                                <!--//nav-link-->
                            </li>
                            <!--//nav-item-->
                        </ul>
                        <!--//app-menu-->
                    </nav>
                    <!--//app-nav-->
                    <div class="app-sidepanel-footer">
                        <nav class="app-nav app-nav-footer">
                            <ul class="app-menu footer-menu list-unstyled">
                                <li class="nav-item">
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <a class="nav-link" href="{{ route('admin.profile') }}">
                                        <span class="nav-icon">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                                                <path fill-rule="evenodd"
                                                    d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-text">Settings</span>
                                    </a>
                                    <!--//nav-link-->
                                </li>
                                <!--//nav-item-->
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="nav-link" type="submit"
                                            style="border: none; background-color:transparent;">
                                            <span class="nav-icon">
                                                <svg fill="#000000" width="1.3em" height="1.3em" viewBox="0 0 16 16"
                                                    xmlns="http://www.w3.org/2000/svg" style=" padding-left: 5px">
                                                    <path
                                                        d="M12.207 9H5V7h7.136L11.05 5.914 12.464 4.5 16 8.036l-3.536 3.535-1.414-1.414L12.207 9zM10 4H8V2H2v12h6v-2h2v4H0V0h10v4z"
                                                        fill-rule="evenodd" />
                                                </svg>
                                            </span>
                                            <span class="nav-link-text">Logout</span>
                                        </button>
                                    </form>
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <!--//nav-link-->
                                </li>
                                <!--//nav-item-->
                            </ul>
                            <!--//footer-menu-->
                        </nav>
                    </div>
                    <!--//app-sidepanel-footer-->

                </div>
                <!--//sidepanel-inner-->
            </div>
            <!--//app-sidepanel-->
        </header>
        <!--//app-header-->

        @yield('content-client')
        <!--//app-wrapper-->
        <footer class="app-footer">
            <div class="container text-center py-3">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                        style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com"
                        target="_blank">Xiaoying Riley</a> for developers</small>

            </div>
        </footer>

        <!-- Javascript -->
        <script src="{{ asset('template/assets/plugins/popper.min.js') }}"></script>
        <script src="{{ asset('template/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
            integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
        </script>
        <!-- Charts JS -->
        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <script src="assets/js/index-charts.js"></script>

        <!-- Page Specific JS -->
        <script src="{{ asset('template/assets/js/app.js') }}"></script>

    </body>
@endsection
