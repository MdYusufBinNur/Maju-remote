<header class="card bg-white pl-2 pr-3 text-dark text-uppercase px-18">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="{{ asset('/') }}" class="navbar-brand"><img src="{{ asset('web/img/logo-dark.png') }}" alt="Maju Curated" /></a>
        <ul class="nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/') }}">home</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/web_photography') }}">photography</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/web_videography/all') }}">videography</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/web_design') }}">design</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/web_shop') }}">shop</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/web_about') }}">about us</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/web_blog') }}">blog</a></li>
        </ul>
        <a onclick=toggleNav() id="navToggle"><img src="{{ asset('web/img/menu-dark.png') }}" alt="Menu" /></a>
    </div>
</header>
<div id="menu" class="fixed-top p-5 w-100 h-100 bg-white text-dark d-none flex-column justify-content-between">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between p-2">
            <a href="{{ asset('/') }}" class="navbar-brand"><img src="{{ asset('web/img/logo-dark.png') }}" alt="Maju Curated" /></a>
            <a onclick=toggleNav() id="navToggle"><i class="fas fa-times fa-2x" ></i></a>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 d-flex justify-content-md-center">
                    <div class="d-flex flex-column">
                        <a href="{{ url('/') }}" class="menu-header text-uppercase">home</a>
                    </div>
                </div>
                <div class="col-12 col-md-3 d-flex justify-content-md-center">
                    <div class="d-flex flex-column">
                        <a class="menu-header text-uppercase">production</a>
                        <a href="{{ url('/web_photography') }}" class="menu-item pl-4 text-capitalize">photography</a>
                        <a href="{{ url('web_videography/all') }}" class="menu-item pl-4 text-capitalize">videography</a>
                    </div>
                </div>
                <div class="col-12 col-md-3 d-flex justify-content-md-center">
                    <div class="d-flex flex-column">
                        <a href="{{ url('/web_design') }}" class="menu-header text-uppercase">design</a>
                        <a class="menu-item pl-4 text-capitalize">digital design</a>
                        <a class="menu-item pl-4 text-capitalize">branding</a>
                        <a class="menu-item pl-4 text-capitalize">marketing strategy</a>
                    </div>
                </div>
                <div class="col-12 col-md-3 d-flex justify-content-md-center">
                    <div class="d-flex flex-column">
                        <a href="{{ url('/web_about') }}" class="menu-header text-uppercase">about us</a>
                        <a href="{{ url('/web_blog') }}" class="menu-item pl-4 text-capitalize">blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container border-top border-dark d-flex justify-content-center py-4 py-md-0">
            @if(!empty($linkers))
                @foreach($linkers as $linker)
                    <a href="{{ $linker->social_link }}" class="mx-2 mt-md-5 mx-md-5"><img src="{{ $linker->social_icon }}" class="img-fluid"  /></a>
                @endforeach
            @endif

        </div>
    </div>
</div>
