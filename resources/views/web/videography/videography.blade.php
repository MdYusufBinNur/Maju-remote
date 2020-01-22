@extends('web.web_master')

@section('body')
    <section id="videography-slider" class="d-none d-md-block h-75">
        <div class="row no-gutters h-100">
            <div class="col-12 col-md-9 h-100">
                <div id="videography-carousel" class="carousel slide h-100" data-ride="carousel">
                    <div class="carousel-inner h-100">
                        @if(!empty($all_videos))
                            @foreach($all_videos as $key=>$all_video)

                            @if($key == 0)
                                    <div class="carousel-item h-100 w-100 active" data-interval="10000">
{{--                                        <video class="h-100 w-100" controls>--}}
{{--                                            <source src="{{ '../'.$all_video->video_file }}" type="video/mp4">--}}
{{--                                            Your browser does not support HTML5 video.--}}
{{--                                        </video>--}}
                                        <div class="player video-player" data-property="{videoURL:'{{$all_video->video_link}}',containment:'#videography-carousel',autoPlay:true, mute:true, startAt:0, opacity:1}"></div>
                                    </div>
                                @else
                                    <div class="carousel-item h-100 w-100" data-interval="10000">
{{--                                        <video class="h-100 w-100" controls>--}}
{{--                                            <source src="{{ '../'.$all_video->video_file }}" type="video/mp4">--}}
{{--                                            Your browser does not support HTML5 video.--}}
{{--                                        </video>--}}
                                        <div class="player video-player" data-property="{videoURL:'{{$all_video->video_link}}',containment:'#videography-carousel',autoPlay:true, mute:true, startAt:0, opacity:1}"></div>
                                    </div>
                                @endif

                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 flex-column h-100 overflow-auto">

                <div class="dropdown">
                    <button class="p-3 text-light btn-videography w-100 dropdown-toggle text-uppercase" type="button" id="videoDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        @if(!empty($cat_name))
                            {{ $cat_name->category_name }}
                        @else
                            All Videos
                        @endif
                    </button>
                    <div class="dropdown-menu w-100" aria-labelledby="videoDropDown">
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ url('/web_videography/'.$category->id) }}"> {{ $category->category_name }}</a>
                            @endforeach
                        @endif

                    </div>
                </div>

                @if(!empty($all_videos))
                @foreach($all_videos as $key=>$all_video)
                        <div class="w-100 bg-dark">
                            <div class="videography-carousel-overlay position-absolute"  data-target="#videography-carousel" data-slide-to="{{ $key }}">
                                <video  class="embed-responsive">
                                    <source src="{{ '../'.$all_video->video_file }}" type="video/mp4">
                                </video>

                            </div>
                            <video src="{{ '../'.$all_video->video_file }}"  class="embed-responsive"></video>
                        </div>
                @endforeach
                @endif

            </div>
        </div>
    </section>

    <section id="videography-slider-mobile" class="d-block d-md-none">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="dropdown">
                    <button class="p-3 text-light btn-videography w-100 dropdown-toggle text-uppercase" type="button" id="videoDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        All Videos
                    </button>
                    <div class="dropdown-menu w-100" aria-labelledby="videoDropDown">
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ url('/web_videography/'.$category->id) }}"> {{ $category->category_name }}</a>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div id="videography-carousel-mobile" class="carousel slide w-100 h-100" data-ride="carousel">
                    <div class="carousel-inner w-100 h-100">

                        @if(!empty($all_videos))
                            @foreach($all_videos as $key=>$all_video)

                                @if($key == 0)
                                   {{-- <div class="carousel-item h-100 w-100 active" data-interval="60000">
                                        <video class="h-100 w-100" controls>
                                            <source src="{{ '../'.$all_video->video_file }}" type="video/mp4">
                                            Your browser does not support HTML5 video.
                                        </video>
                                    </div>--}}
                                    <div class="carousel-item w-100 h-100 active" data-interval="10000">
                                        <video class=" w-100 h-100" controls>
                                            <source src="{{ '../'.$all_video->video_file }}" type="video/mp4">
                                            Your browser does not support HTML5 video.
                                        </video>
                                    </div>
                                @else

                                    <div class="carousel-item w-100 h-100" data-interval="10000">
                                        <video class=" w-100 h-100" controls>
                                            <source src="{{ '../'.$all_video->video_file }}" type="video/mp4">
                                            Your browser does not support HTML5 video.
                                        </video>
                                    </div>
                                @endif

                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-row overflow-auto no-gutters">
                @if(!empty($all_videos))
                    @foreach($all_videos as $key=>$all_video)

                        <div class="col-4 bg-dark">
                            <div class="position-absolute w-100 h-100 videography-carousel-overlay" data-target="#videography-carousel-mobile" data-slide-to={{ $key }}></div>
                            <video class="w-100 h-100">
                                <source src="{{ '../'.$all_video->video_file }}" type="video/mp4">

                            </video>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>



    <section id="call-to-action" class="py-2 bg-dark text-uppercase">
        <a href="#" class="d-flex flex-column align-items-center text-light">
            <span>view services</span>
            <i class="fas fa-chevron-down"></i>
        </a>
    </section>

    <section id="photography-reversed" class="py-5">
        <div class="container">

            @if(!empty($video_services))
                @foreach($video_services as $key=>$video_service)
                    @if($key%2 != 0)

                                <div class="row py-3 align-items-center">
                                    <div class="col-12 order-1 order-md-0 col-md-5 offset-md-1 h-100 text-light d-flex flex-column align-items-md-end">
                                        <h2 class="text-uppercase text-left text-md-right my-4">{{ $video_service->title }}</h2>
                                        <p class="text-justify">{{ $video_service->title_description }}</p>
                                    </div>
                                    <div class="col-12 col-md-6 order-0 order-md-1">
                                        <img src="{{ '../'.$video_service->title_image  }}" alt="" class="img-fluid w-100"/>
                                    </div>
                                </div>

                            @else

                                <div class="row py-3 align-items-center">
                                    <div class="col-12 col-md-6">
                                        <img src="{{ '../'.$video_service->title_image  }}" alt="" class="img-fluid w-100"/>
                                    </div>
                                    <div class="col-12 col-md-5 h-100 text-light">
                                        <h2 class="text-uppercase my-4">{{ $video_service->title }}</h2>
                                        <p class="text-justify">{{ $video_service->title_description }}</p>
                                    </div>
                                </div>

                            @endif
                @endforeach
            @endif

        </div>
    </section>

    <section id="start-project" class="text-center p-5 d-flex d-md-none flex-column align-items-center justify-content-center">
        <span class="text-uppercase font-weight-bold mb-3">start your new project</span>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <a class="btn action-button text-uppercase rounded-lg text-light px-5">send</a>
    </section>

@endsection
