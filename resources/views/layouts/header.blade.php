<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="{{ url('img/logo.png') }} " alt="">Tienda de Maquillaje</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('Inicio') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Contacto') }}">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Inicio') }}">Inico de sesion / Registro</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
   
</header>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>{{  Route::currentRouteName()   }}</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Inicio<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">{{  Route::currentRouteName()   }}</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->