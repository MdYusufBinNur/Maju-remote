
{{--
<header class="px-18 d-none d-md-flex align-items-center justify-content-around position-absolute bg-transparent p-2 text-light text-uppercase border-bottom border-white">
    <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('web/img/logo-light.png') }}" alt="Maju Curated" /></a>
    <ul class="nav d-none d-md-flex">

        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/') }}">home</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_photography') }}">photography</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_videography') }}">videography</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_design') }}">design</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_shop') }}">shop</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_about') }}">about us</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_blog') }}">blog</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="#?">blog single</a></li>
    </ul>
    <a onclick=toggleNav() id="navToggle"> <img src="{{ asset('web/img/menu-light.png') }}" alt="Menu" /></a>
</header>
<div id="menu" class="fixed-top p-5 w-100 h-100 bg-white text-dark d-none flex-column justify-content-between">

    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between p-2">
            <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('web/img/logo-dark.png') }}" alt="Maju Curated" /></a>
            <a onclick=toggleNav() id="navToggle"><i class="fas fa-times fa-2x" ></i></a>
        </div>
    </div>

    <div>
        <div class="container">
            <div class="row">

                <div class="col-3 d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <a class="menu-header text-uppercase">home</a>
                    </div>
                </div>

                <div class="col-3 d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <a class="menu-header text-uppercase">production</a>
                        <a class="menu-item text-capitalize">photography</a>
                        <a class="menu-item text-capitalize">videography</a>
                    </div>
                </div>

                <div class="col-3 d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <a class="menu-header text-uppercase">design</a>
                        <a class="menu-item text-capitalize">digital design</a>
                        <a class="menu-item text-capitalize">branding</a>
                        <a class="menu-item text-capitalize">marketing strategy</a>
                    </div>
                </div>

                <div class="col-3 d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <a class="menu-header text-uppercase">about us</a>
                        <a class="menu-item text-capitalize">contact us</a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div>
        <div class="container border-top border-dark d-flex justify-content-center">
            @if(!empty($linkers))
                @foreach($linkers as $linker)
                <a href="{{ $linker->social_link }}" class="mt-5 mx-5"><img src="{{ $linker->social_icon }}" class="img-fluid" alt="{{ asset('web/img/social/facebook.png') }}" /></a>
                --}}
{{--<a href="https://facebook.com/majucurated" class="mt-5 mx-5"><img src="img/social/facebook.png" class="img-fluid" /></a>--}}{{--

                --}}
{{--<a href="https://pinterest.com/majucurated" class="mt-5 mx-5"><img src="img/social/pinterest.png" class="img-fluid" /></a>--}}{{--

                --}}
{{--<a href="https://youtube.com/majucurated" class="mt-5 mx-5"><img src="img/social/youtube.png" class="img-fluid"></a>--}}{{--

                @endforeach
            @endif
        </div>
    </div>

</div>
<header class="d-flex d-md-none align-items-center justify-content-between container sticky-top bg-white pl-2 pr-3 text-dark text-uppercase">
    <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('web/img/logo-dark.png') }}" alt="Maju Curated" /></a>
    <a onclick=toggleNav() id="navToggle"><img src="{{ asset('web/img/menu-dark.png') }}" alt="Menu" /></a>
</header>
--}}


<header class="px-18 d-none d-md-flex align-items-center justify-content-around position-absolute bg-transparent p-2 text-light text-uppercase border-bottom border-white">
    <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('web/img/logo-light.png') }}" alt="Maju Curated" /></a>
    <ul class="nav d-none d-md-flex">
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/') }}">home</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_photography') }}">photography</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_videography/all') }}">videography</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_design') }}">design</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_shop') }}">shop</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_about') }}">about us</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="{{ url('/web_blog') }}">blog</a></li>
    </ul>
    <a onclick=toggleNav() id="navToggle"> <img src="{{ asset('web/img/menu-light.png') }}" alt="Menu" /></a>
</header>
<div id="menu" class="fixed-top overflow-auto p-md-5 w-100 h-100 bg-white text-dark d-none flex-column justify-content-between">

    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between p-2">
            <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('web/img/logo-dark.png') }}" alt="Maju Curated" /></a>
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
                        <a href="{{ url('/web_videography/all') }}" class="menu-item pl-4 text-capitalize">videography</a>
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
                        <a href="{{ url('/web_design') }}" class="menu-header text-uppercase">about us</a>
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
                    {{--<a href="https://facebook.com/majucurated" class="mt-5 mx-5"><img src="img/social/facebook.png" class="img-fluid" /></a>--}}
                    {{--<a href="https://pinterest.com/majucurated" class="mt-5 mx-5"><img src="img/social/pinterest.png" class="img-fluid" /></a>--}}
                    {{--<a href="https://youtube.com/majucurated" class="mt-5 mx-5"><img src="img/social/youtube.png" class="img-fluid"></a>--}}
                @endforeach
            @endif

        </div>
    </div>
</div>

<header class="d-flex d-md-none align-items-center justify-content-between container sticky-top bg-white pl-2 pr-3 text-dark text-uppercase">
    <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('web/img/logo-dark.png') }}" alt="Maju Curated" /></a>
    <a onclick=toggleNav() id="navToggle"><img src="{{ asset('web/img/menu-dark.png') }}" alt="Menu" /></a>
</header>
