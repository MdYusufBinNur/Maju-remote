@extends('web.web_master')

@section('body')
    <section id="blog-hero" class="d-none d-md-flex h-50 w-100 overflow-hidden align-items-center">
        @if(!empty($blog))
            <img src="{{ '../'.$blog->image }}" alt="" class="img-fluid">
            @else
            <img src="{{ asset('web/img/blog/blog-post-bg.jpg') }}" alt="" class="img-fluid">
        @endif

    </section>
    <section id="blog-hero" class="d-block d-md-none">
        @if(!empty($blog))
            <img src="{{ $blog->image }}" alt="" class="img-fluid">
        @else
            <img src="{{ asset('web/img/blog/blog-post-bg.jpg') }}" alt="" class="img-fluid">
        @endif
    </section>
    <section id="blog" class="p-md-0 pt-md-5">
        <div class="row no-gutters">
            <div class="col-12 col-md-10 offset-md-2">
                <div class="row no-gutters">
                    <div class="col-12 m-4 mb-md-5 d-flex align-items-center">
                        <img src="{{ asset('web/img/blog/scrolldown.png') }}" class="img-fluid" id="scroll-down">
                        <div class="p-3">
                            @if(!empty($blog))
                                <h5 class="font-weight-bold text-uppercase">{{ $blog->title }}</h5>
                                <div class="small">{{ $blog->date }}</div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row no-gutters bg-white" id="blog-post-content">
                    <div class="col-12 col-md-10 p-4 p-md-5 m-md-5">
                        @if(!empty($blog))
                            {!! $blog->description !!}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
