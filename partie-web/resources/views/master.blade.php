@extends("layouts.master_layout")

{{--@section( "dashboard-active" , "active" )--}}

@section("links")
    <link rel="icon" href="{{ asset('assets/img/avatars/wwww.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("assets")}}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset("assets")}}/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset("assets")}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset("assets")}}/plugins/aos/aos.css">
    <link rel="stylesheet" href="{{asset("assets")}}/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{asset("assets")}}/plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="{{asset("assets")}}/style.css">
@endsection

@section("main")

    <div class="main-wrapper">
        <header class="header-eight min-header">
            <div class="header-fixed header-fixed-wrap">
                <nav class="navbar navbar-expand-lg header-nav header-nav-eight">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
          <span class="bar-icon bar-icon-eight">
            <span></span>
            <span></span>
            <span></span>
          </span>
                        </a>
                        <a href="{{route("master")}}" class="navbar-brand navbar-brand-eight logo">
                            <img src="{{ asset('assets/img/avatars/wwww.jpg') }}" class="img-fluid" alt="Logo">
                        </a>
                    </div>
                    <div class="main-menu-wrapper main-menu-wrapper-eight">
                        <div class="menu-header menu-header-eight">
                            <a href="{{route("master")}}" class="menu-logo">
                                <img src="{{ asset('assets/img/estfbs_test1.png') }}" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav main-nav-eight">
                            <li class="active has-submenu">
                                <a href="">Accueil</a>
                            </li>

                            <li class=" has-submenu">
                                <a href="">Professeur<i class="fas fa-chevron-circle-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="{{route("showLogin")}}">ِConnextion</a></li>
                                </ul>
                            </li>
                            <li class=" has-submenu">
                                <a href="{{route("showLogin")}}">Administrateur</a>
                            </li>
                            <li class=" has-submenu">
                                <a href="#contact">Contactez nous</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav header-navbar-rht header-navbar-rht-eight">
                        <li class="nav-item">
                            <a class="nav-link btn btn-register" href="{{route("showLogin")}}"><i class="fas fa-lock"></i>CONNEXION</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <section class="section section-search-eight">
            <div class="container">
                <div class="banner-wrapper-eight m-auto text-center">
                    <div id="accueil" class="banner-header aos" data-aos="fade-up">
                        <h1>Portail de pré-candidature en ligne aux formations<span> <br> licences professionnelles <br> </span>
                            2023-2024</h1>
                        <p>Bienvenue sur le Portail de pré-candidature en ligne aux formations licences professionnelles de L'école
                            Supérieure de Technologie – Fkih Ben Salah.
                        </p>
                    </div>

                    <div class="row  aos" data-aos="fade-up">
                        <div class="statistics-list-eight">
                            <div class="statistics-content-eight">
                                <h3>La plateforme de pré-candidature aux formations licences professionnelles permet aux
                                    candidats de postuler
                                    aux formations licences professionnelles accréditées dans établissements relevant de L'école
                                    Supérieure de Technologie – Fkih Ben Salah en ligne.</h3>
                            </div>
                        </div>

                    </div>

                    <a href="#procedure" class="go-down-lin" style="color: #FE9445"><i class="fas fa-arrow-down"></i></a>
                </div>
            </div>
        </section>

        <footer class="footer footer-eight">

            <div class="footer-top aos" data-aos="fade-up">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget footer-about">
                                <div class="footer-logo">
                                    <img style="box-shadow: 20px 16px 5px 0px #2f266b;"
                                         src="{{ asset('assets/img/avatars/wwww.jpg') }}" alt="logo">
                                </div>
                                <div class="footer-about-content">
                                    <p>Ecole Supérieure de Technologie – Essaouira </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">CONNEXION</h2>
                                <ul>
                                    <li><a href="{{route("showLogin")}}">Professeur</a></li>
                                    <li><a href="{{route("showLogin")}}">Administrateur</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">Liens outils</h2>
                                <ul>
                                    <li><a href="{{ url('/') }}">Accueil</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div id="contact" class="footer-widget footer-contact">
                                <h2 class="footer-title">Contact </h2>
                                <div class="footer-contact-info">
                                    <div class="footer-address">
                                        <p> Km 9, Route d'Agadir, Essaouira Aljadida BP.<br>383, Essaouira, MAROC </p>
                                    </div>
                                    <p>
                                        +212 434 5465
                                    </p>
                                    <p class="mb-0">
                                        usms@example.com
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container-fluid">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="copyright-text">
                                    <p class="mb-0">&copy; 2023 USMS. <span style="color: #FF9800;">Créé par Belkadi Ahmed & Khaoula achabi
                </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="social-icon text-md-end">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

    </div>

@endsection

@section("scripts")
    <!-- jQuery -->
    <script src="{{asset("assets")}}/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="{{asset("assets")}}/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 JS -->
    <script src="{{asset("assets")}}/plugins/select2/js/select2.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="{{asset("assets")}}/plugins/slick/slick.js"></script>

    <!-- Aos JS -->
    <script src="{{asset("assets")}}/plugins/aos/aos.js"></script>

    <!-- Custom JS -->
    <script src="{{asset("assets")}}/script.js"></script>
@endsection
