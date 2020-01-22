@extends('web.web_master')

@section('body')


    @if(!empty($abouts))
        @foreach($abouts as $key=>$about)
             {{--   @if(($key+1)%2 == 1)
                    @if($key%3 == 0)
                        <section id="about-bottom-block">
                            <div class="row no-gutters">
                                <div class="d-none d-md-flex flex-column justify-content-end col-12 col-md-6 position-absolute" id="experience-text-block">
                                    <h2 class="shadow-text-about ml-5 pl-5 text-uppercase font-weight-bolder" shadow="{{ $about->title }}">{{ $about->title }}</h2>
                                    <div class="about-text-block h-75 p-5">
                                        <p class="pr-5 mx-5">{{ $about->title_description }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 offset-md-5" id="experience-img">
                                    <img src="{{ $about->title_image }}" alt="" class="img-fluid w-100">
                                </div>
                                <div class="d-flex d-md-none col-12 flex-column justify-content-end">
                                    <h2 class="shadow-text-about pl-5 text-uppercase font-weight-bolder" shadow="{{ $about->title }}">{{ $about->title }}</h2>
                                    <div class="p-5 about-text-block h-75">
                                        <p>{{ $about->title_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @else
                        <section id="about-mid-block">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-6 pr-md-5">
                                    <img src="{{ $about->title_image }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-12 col-md-6 pt-md-5 d-flex flex-column justify-content-end">
                                    <h2 class="shadow-text-about pl-5 text-uppercase font-weight-bolder" shadow="{!! $about->title !!}">{!! $about->title !!}</h2>
                                    <div class="p-5 about-text-block h-75">
                                        <p>{!! $about->title_description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                @else
                    @if($key%3 == 0)
                        <section id="about-bottom-block">
                            <div class="row no-gutters">
                                <div class="d-none d-md-flex flex-column justify-content-end col-12 col-md-6 position-absolute" id="experience-text-block">
                                    <h2 class="shadow-text-about ml-5 pl-5 text-uppercase font-weight-bolder" shadow="{{ $about->title }}">{{ $about->title }}</h2>
                                    <div class="about-text-block h-75 p-5">
                                        <p class="pr-5 mx-5">{{ $about->title_description }}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 offset-md-5" id="experience-img">
                                    <img src="{{ $about->title_image }}" alt="" class="img-fluid w-100">
                                </div>
                                <div class="d-flex d-md-none col-12 flex-column justify-content-end">
                                    <h2 class="shadow-text-about pl-5 text-uppercase font-weight-bolder" shadow="{{ $about->title }}">{{ $about->title }}</h2>
                                    <div class="p-5 about-text-block h-75">
                                        <p>{{ $about->title_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @else
                        <section id="about-top-block">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-3 offset-md-1 order-1 order-md-0 p-5 d-flex flex-column justify-content-center">
                                        <h2 class="d-none d-md-block text-uppercase font-weight-bolder mb-5">{!! $about->title !!}</h2>
                                        <h2 class="d-block d-md-none text-uppercase font-weight-bolder mb-5 shadow-text-about" shadow="{!! $about->title !!}">{!! $about->title !!}</h2>
                                        <p>{!! $about->title_description !!}</p>
                                    </div>
                                    <div class="col-12 col-md-7 offset-md-1 order-0 order-md-1">
                                        <img src="{{ $about->title_image }}" class="img-fluid w-100" alt="" />
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                @endif--}}


            @if($key == 0)
                <section id="about-top-block">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-3 offset-md-1 order-1 order-md-0 p-5 d-flex flex-column justify-content-center">
                                <h2 class="d-none d-md-block text-uppercase font-weight-bolder mb-5">{!! $about->title !!}</h2>
                                <h2 class="d-block d-md-none text-uppercase font-weight-bolder mb-5 shadow-text-about" shadow="{!! $about->title !!}">{!! $about->title !!}</h2>
                                <p>{!! $about->title_description !!}</p>
                            </div>
                            <div class="col-12 col-md-7 offset-md-1 order-0 order-md-1">
                                <img src="{{ $about->title_image }}" class="img-fluid w-100" alt="" />
                            </div>
                        </div>
                    </div>
                </section>
            @else
                @if($key%2 == 1)
                    <section id="about-mid-block">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-6 pr-md-5">
                                <img src="{{ $about->title_image }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-12 col-md-6 pt-md-5 d-flex flex-column justify-content-end">
                                <h2 class="shadow-text-about pl-5 text-uppercase font-weight-bolder" shadow="{!! $about->title !!}">{!! $about->title !!}</h2>
                                <div class="p-5 about-text-block h-75">
                                    <p>{!! $about->title_description !!}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    <section id="about-bottom-block">
                        <div class="row no-gutters">
                            <div class="d-none d-md-flex flex-column justify-content-end col-12 col-md-6 position-absolute" id="experience-text-block">
                                <h2 class="shadow-text-about ml-5 pl-5 text-uppercase font-weight-bolder" shadow="{{ $about->title }}">{{ $about->title }}</h2>
                                <div class="about-text-block h-75 p-5">
                                    <p class="pr-5 mx-5">{{ $about->title_description }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-7 offset-md-5" id="experience-img">
                                <img src="{{ $about->title_image }}" alt="" class="img-fluid w-100">
                            </div>
                            <div class="d-flex d-md-none col-12 flex-column justify-content-end">
                                <h2 class="shadow-text-about pl-5 text-uppercase font-weight-bolder" shadow="{{ $about->title }}">{{ $about->title }}</h2>
                                <div class="p-5 about-text-block h-75">
                                    <p>{{ $about->title_description }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif

        @endforeach
    @endif



@endsection
