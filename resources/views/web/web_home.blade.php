<!DOCTYPE html>
<html lang="en-US">
{{--<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Maju Curated | Home</title>
    <meta name="description" content="To be filled">
    <meta name="keywords" content="To be filled">
    <meta name="author" content="Zubair Hasan">
    <meta name="copyright" content="Octoriz Private Limited">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="{{ asset('web/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/jq-bgslider"></script>


</head>--}}

<head>
    <!-- Essential Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- SEO Meta Tags -->
    <title>Maju Curated | Home</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Zubair Hasan">
    <meta copyright="Octoriz Private Limited">

    <!-- Including Favicons -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('web/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('web/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('web/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('web/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('web/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">

    <meta name="msapplication-TileColor" content="#9f00a7">
    <meta name="theme-color" content="#ffffff">
    <!-- Including Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Including Google Font (Lato) -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <!-- Including FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/1c781ab882.js"></script>
    <!-- Including Custom CSS -->
    <link href="{{ asset('web/css/style.css') }}" rel="stylesheet">
    {{--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>--}}
    {{--<script src="https://unpkg.com/jq-bgslider"></script>--}}

</head>
<body>
@include('web.includes.home_header')

<section id="home-slider" class="carousel slide align-itmes-center d-flex" data-ride="carousel">
    <ol class="carousel-indicators">

        @if(!empty($sliders))
            @foreach($sliders as $key=>$slider)
                @if($key == 0)
                    <li data-target="#home-slider" data-slide-to="{{ $key }}" class="active"></li>
                @else
                    <li data-target="#home-slider" data-slide-to="{{ $key }}"></li>
                @endif

            @endforeach
        @endif

        {{--<li data-target="#home-slider" data-slide-to="1"></li>--}}
        {{--<li data-target="#home-slider" data-slide-to="2"></li>--}}
        {{--<li data-target="#home-slider" data-slide-to="3"></li>--}}
        {{--<li data-target="#home-slider" data-slide-to="4"></li>--}}
    </ol>
    <div class="carousel-inner">

        @if(!empty($sliders))
            @foreach($sliders as $key=>$slider)
                @if($key == 0)
                    <div class="carousel-item active">
                        <img src='{{ $slider->slider_image }}' class="d-block w-100" alt="...">
                    </div>
                    @else
                    <div class="carousel-item">
                        <img src='{{ $slider->slider_image }}' class="d-block w-100" alt="...">
                    </div>
                @endif

            @endforeach
        @endif

    </div>
    <a class="carousel-control-prev" href="#home-slider" role="button" data-slide="prev">
        <img src="{{ asset('web/img/home/arrow_left.png') }}" alt="Previous" />
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#home-slider" role="button" data-slide="next">
        <img src="{{ asset('web/img/home/arrow_right.png') }}" alt="Next" />
        <span class="sr-only">Next</span>
    </a>
</section>

<section id="home-ribbon" class="d-flex align-items-center mt-5 font-weight-bold">
    <div class="d-none d-md-block container-fluid  position-absolute">
        <div class="row" id="ribbon">
            <div class="col-md-10 bg-dark">

            </div>
            <div class="col-md-2 bg-light d-flex justify-content-center align-items-center">
                <a href="#" class="text-uppercase text-muted px-18">book now</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row px-16">
            <div class="col-12 col-md-8 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-10 col-md-4 mb-4 mb-md-0 d-flex justify-content-end align-items-end">
                        <img src="{{ asset('web/img/home/photography.jpg') }}" class="img-fluid" />
                        <span class="position-absolute pb-2 pr-3 text-uppercase text-white">photography</span>
                    </div>
                    <div class="col-10 col-md-4 mb-4 mb-md-0 d-flex justify-content-end align-items-end">
                        <img src="{{ asset('web/img/home/videography.jpg') }}" class="img-fluid" />
                        <span class="position-absolute pb-2 pr-3 text-uppercase text-white">videography</span>
                    </div>
                    <div class="col-10 col-md-4 d-flex justify-content-end align-items-end">
                        <img src="{{ asset('web/img/home/design.jpg') }}" class="img-fluid" />
                        <span class="position-absolute pb-2 pr-3 text-uppercase text-white">design</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{--<script>--}}
    {{--var myIndex = 0;--}}
    {{--carousel();--}}

    {{--function carousel() {--}}
        {{--var i;--}}
        {{--var x = document.getElementsByClassName("mySlides");--}}
        {{--for (i = 0; i < x.length; i++) {--}}
            {{--x[i].style.display = "none";--}}
        {{--}--}}
        {{--myIndex++;--}}
        {{--if (myIndex > x.length) {myIndex = 1}--}}
        {{--x[myIndex-1].style.display = "block";--}}
        {{--setTimeout(carousel, 3000); // Change image every 2 seconds--}}
    {{--}--}}
{{--</script>--}}

<section id="home-social" class="p-5 d-flex flex-column px-16 font-weight-bold">
    <span class="text-center text-dark text-uppercase">follow us @majucurated</span>
    <ul class="nav justify-content-center">
        {{--<li class="nav-item"><a href="https://instagram.com/majucurated" class="nav-link px-3"><img src="img/social/instagram.png" class="img-fluid" /></a></li>--}}
        {{--<li class="nav-item"><a href="https://facebook.com/majucurated" class="nav-link px-3"><img src="img/social/facebook.png" class="img-fluid" /></a></li>--}}
        {{--<li class="nav-item"><a href="https://pinterest.com/majucurated" class="nav-link px-3"><img src="img/social/pinterest.png" class="img-fluid" /></a></li>--}}
        {{--<li class="nav-item"><a href="https://youtube.com/majucurated" class="nav-link px-3"><img src="img/social/youtube.png" class="img-fluid" /></a></li>--}}

        @if(!empty($linkers))
            @foreach($linkers as $linker)
                <li class="nav-item">
                    <a href="{{ $linker->social_link }}" target="_blank"  class="nav-link px-3">
                        <img src="{{ $linker->social_icon }}" alt="{{ $linker->name }}" class="img-fluid" />
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</section>
<section id="home-instagram" class="px-5 d-none d-md-flex flex-column">
    <div class="container-fluid">
        <div class="row" id="instagram_id">

           {{-- @if(!empty($insta_apis))
                @foreach($insta_apis as $insta_api)
                    <div class="col-12 col-md-3 p-4">
                        <div class="card">
                            <img src="{{ $insta_api->image_url }}" class="card-img-top img-fluid" />
                            <div class="card-body">
                                <span class="card-title font-weight-bold px-16">{{ $insta_api->name }}</span>
                                <div class="card-text px-12">
                                    <span class="mr-4">{{ $insta_api->like }}</span>{{ $insta_api->created_time }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif--}}

        </div>
    </div>
    <a class="d-inline-block border-0 rounded-0 mx-auto px-5 py-4 my-5 btn card text-uppercase font-weight-bold px-18" id="insta-btn">view gallery</a>
</section>
<section id="home-instagram-mobile" class="carousel slide align-itmes-center d-flex d-md-none mx-auto col-10 offset-1" data-ride="carousel">
    <div class="carousel-inner" id="instagram_mobile_view">
        {{--@if(!empty($insta_apis))
            @foreach($insta_apis as $key=>$insta_api)
                @if($key == 0)
                    <div class="card carousel-item active">
                        <img src="{{ $insta_api->image_url }}" class="card-img-top img-fluid" />
                        <div class="card-body">
                            <span class="card-title font-weight-bold px-16">{{ $insta_api->name }}</span>
                            <div class="card-text px-12">
                                <span class="mr-4">{{ $insta_api->like }}</span>{{ $insta_api->created_time }}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card carousel-item">
                        <img src="{{ $insta_api->image_url }}" class="card-img-top img-fluid" />
                        <div class="card-body">
                            <span class="card-title font-weight-bold px-16">{{ $insta_api->name }}</span>
                            <div class="card-text px-12">
                                <span class="mr-4">{{ $insta_api->like }}</span>{{ $insta_api->created_time }}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif--}}



    </div>
    <a class="carousel-control-prev" href="#home-instagram-mobile" role="button" data-slide="prev">
        <div class="home-instagram-mobile-control card d-flex justify-content-center align-items-center rounded-circle">
            <i class="fas fa-chevron-left text-dark"></i>
        </div>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#home-instagram-mobile" role="button" data-slide="next">
        <div class="home-instagram-mobile-control card d-flex justify-content-center align-items-center rounded-circle">
            <i class="fas fa-chevron-right text-dark"></i>
        </div>
        <span class="sr-only">Next</span>
    </a>
</section>


<section id="start-project" class="text-center mt-5 p-5 d-flex d-md-none flex-column align-items-center justify-content-center">
    <span class="text-uppercase font-weight-bold mb-3">start your new project</span>
    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <a class="btn action-button text-uppercase rounded-lg text-light px-5">send</a>
</section>


@include('web.includes.footer')

</body>

</html>


