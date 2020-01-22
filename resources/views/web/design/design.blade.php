@extends('web.web_master')

@section('body')

    @if(!empty($designs))
        @foreach($designs as $key=>$design)
            @if($key%2 == 0)
               {{-- <div id="design">
                    <div id="design-text">
                        <div>
                            <div class="duplicated-shadow-text" value="{!!  $design->title_value !!}">{!!  $design->title !!}</div>
                            <p style="text-align: justify">
                               {!! $design->title_description !!}
                            </p>
                            <a href="#book-us" class="book-now-btn hide-mobile">book us</a>
                        </div>
                    </div>
                    <div id="design-image" style="background: url({{ $design->title_image }}) no-repeat center/cover">

                    </div>
                </div>
--}}
                <section id="design-top-block">
                    <div class="row no-gutters">
                        <div class="col-12 flex-column col-md-3 offset-md-1 p-5 order-1 order-md-0 d-flex justify-content-center">
                            <h2 class="text-uppercase mb-5 shadow-text font-weight-bolder" shadow="{!!  $design->title !!}">{!!  $design->title !!}</h2>
                            <p> {!! $design->title_description !!}.</p>
                            <a href="">
                                <button class="btn design-btn text-light text-capitalize py-2 px-5 mt-3">Book Us</button>
                            </a>
                        </div>
                        <div class="col-12 offset-md-1 col-md-7 order-0 order-md-1">
                            <img src="{{ $design->title_image }}" class="img-fluid" />
                        </div>
                    </div>
                </section>
            @else
            {{--    <div id="branding">
                    <div id="branding-image" style="background: url({{ $design->title_image }}) no-repeat center/cover">
                    </div>
                    <div id="branding-text">
                        <div>
                            <div class="duplicated-shadow-text" value="{!!  $design->title_value !!}">{!!  $design->title !!}</div>
                            <p style="text-align: justify">
                                {!! $design->title_description !!}
                            </p>
                            <a href="#book-us" class="book-now-btn hide-mobile">book us</a>
                        </div>
                    </div>
                </div>--}}
                <section id="design-mid-block" class="py-md-5">
                    <div class="row my-md-5 no-gutters">
                        <div class="col-12 col-md-6">
                            <img src="{{ $design->title_image }}" class="img-fluid w-100" alt=""/>
                        </div>
                        <div class="col-12 col-md-3 offset-md-1 d-flex flex-column justify-content-center p-5 text-light">
                            <h2 class="text-uppercase mb-5 shadow-text font-weight-bolder" shadow="{!!  $design->title !!}">{!!  $design->title !!}</h2>
                            <p>{!! $design->title_description !!}</p>
                            <a href="">
                                <button class="btn design-btn text-light text-capitalize py-2 px-5 mt-3">Book Us</button>
                            </a>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach
    @endif


    <!-- Design Block Ends -->


    {{--
    <section id="design-bottom-block" class="py-md-5">
        <div class="row no-gutters my-md-5">
            <div class="col-12 col-md-10 mx-auto row no-gutters">
                <div class="col-12 mx-auto p-5 col-md-4 order-1 order-md-0 offset-md-1 d-flex flex-column justify-content-center">
                    <h2 class="text-uppercase mb-5 shadow-text font-weight-bolder" shadow="Marketing">Marketing</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur beatae consequuntur dolorem, libero minus quam quasi quod quos voluptate. A corporis delectus harum, hic nam omnis provident quasi suscipit.</p>
                    <a href="">
                        <button class="btn design-btn text-light text-capitalize py-2 px-5 mt-3">Book Us</button>
                    </a>
                </div>
                <div class="col-12 order-0 order-md-1 offset-md-1 col-md-6">
                    <img src="img/design/marketing.jpg" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>

--}}
@endsection
