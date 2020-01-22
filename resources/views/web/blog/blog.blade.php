@extends('web.web_master')
@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

@endsection
@section('body')



    <section id="blog-hero" class="d-none d-md-flex h-50 w-100 overflow-hidden align-items-start">
        <img src="{{ asset('web/img/blog/blog-hero-bg.jpg') }}" alt="" class="img-fluid">
    </section>
    <section id="blog-hero" class="d-block d-md-none">
        <img src="{{ asset('web/img/blog/blog-hero-bg.jpg') }}" alt="" class="img-fluid">
    </section>

    <section id="blog" class="pt-md-5">
        <div class="row no-gutters d-flex">

            <div class="col-12 col-md-8">
                <div class="row no-gutters" id="blog-filter-container">
                    <div class="d-none d-md-flex col-md-6 p-3 bg-white justify-content-center align-items-center">
                        <span class="text-uppercase">filter by category <i class="fas fa-arrow-right ml-3"></i></span>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center dropdown">
                        <button class="btn dropdown-toggle align-items-center w-100 d-flex justify-content-md-between justify-content-around" type="button" id="blog-filter-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="d-none d-md-block"></div><span class="text-uppercase d-none d-md-inline">
                                 @if(!empty($category_name))
                                    {{ $category_name->category_name }}
                                @else
                                    all
                                @endif


                            </span><span class="d-inline d-md-none text-uppercase">filter by category</span><i class="fas fa-caret-down"></i>
                        </button>
                        <div class="dropdown-menu w-100" aria-labelledby="blog-filter-dropdown">


                            <a href="{{ url('/web_blog') }}">
                                <div class="dropdown-item">All </div>
                            </a>
                            @if(!empty($categories))
                                @foreach($categories as $key => $category)
                                    {{--<a class="dropdown-item" href="{{ url('/categorized_blog/'.$category->id) }}">{{ $category->category_name }}</a>--}}
                                    <a href="{{ url('/categorized_blog/'.$category->id) }}">
                                        <div class="dropdown-item" >{{ $category->category_name }} </div>
                                    </a>

                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row no-gutters bg-white p-md-5">

                    @if(!empty($blogs))
                        @foreach($blogs as $key => $blog)
                            <div class="col-12 mb-3 col-md-6 d-flex flex-column p-3">
                                <h3>{{ $blog->title }}</h3>
                                <span>{{ $blog->date }}</span>
                                <a href="{{ '/web_blog_details/'.$blog->id }}"   data-toggle="tooltip" data-placement="top" title="Click to see details">
                                    <img src="{{ $blog->image }}" class="img-fluid mt-3" alt=""/>
                                </a>
                            </div>
                        @endforeach
                    @endif

                    @if(!empty($categorized_blogs))
                        @foreach($categorized_blogs as $key => $blog)
                            <div class="col-12 mb-3 col-md-6 d-flex flex-column p-3">
                                <h3 class="">{{ $blog->title }}</h3>
                                <span>{{ $blog->date }}</span>
                                <a href="{{ '../web_blog_details/'.$blog->id }}" data-toggle="tooltip" data-placement="top" title="Click to see details">
                                    <img src="{{ '../'.$blog->image }}" class="img-fluid mt-3" alt=""/>
                                </a>
                            </div>
                        @endforeach
                    @endif

                </div>

                <div class="row no-gutters bg-white p-md-5 text-center">
                    <div class="container">

                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col">
                                @if(!empty($blogs))
                                    {{ $blogs->links() }}
                                @endif
                                @if(!empty($categorized_blogs))
                                    {{ $categorized_blogs->links() }}
                                @endif
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-4">

                <div class="row no-gutters mx-md-5 px-5">
                    <div class="col-12 d-flex align-items-center py-3 text-uppercase">about me</div>
                </div>
                <div class="row no-gutters mx-md-5 px-5">
                    <div class="col-12">
                        @if(!empty($profiles))
                            <img src="{{'../'.$profiles->profile_image}}" alt="" class="img-fluid">
                         @endif
                    </div>
                </div>

                <div class="row no-gutters mx-md-5 px-5">
                    @if(!empty($profiles))
                        <div class="col-12 d-flex align-items-center py-3" style="text-align: justify">{{ $profiles->profile_description }}</div>
                    @endif
                </div>

                <div class="row no-gutters mx-md-5 px-5 pb-5 pb-md-0">
                    <div class="col-12 d-flex align-items-center py-3 text-uppercase">follow me @majusandino</div>
                    <div class="col-12 d-flex align-items-center">
                        @if(!empty($blogs))
                            @if(!empty($linkers))
                                @foreach($linkers as $linker)
                                    <a href="{{ $linker->social_link }}" target="_blank">
                                        <img class="fab fa-2x mr-3" src="{{ $linker->social_icon }}" alt="{{ $linker->name }}" width="32" height="auto" />
                                    </a>
                                    &nbsp;
                                @endforeach
                            @endif
                        @endif
                        @if(!empty($categorized_blogs))
                            @if(!empty($linkers_blog))
                                @foreach($linkers_blog as $linker)
                                    <a href="{{ $linker->social_link }}" target="_blank" style="align-items: center;justify-content: center">
                                        <img  class="fab fa-2x mr-3" src="{!! '../'.$linker->social_icon !!}" alt="{{ $linker->name }}" width="32" height="auto" />
                                    </a>
                                    &nbsp;
                                @endforeach
                            @endif
                        @endif

                    </div>
                </div>
                <div class="d-none d-md-block row no-gutters mx-md-5 p-5">
                    <div class="w-100 border-top border-dark"></div>
                </div>
                <div class="d-none d-md-flex row no-gutters mx-md-5 px-5">
                    <div class="col-12 d-flex align-items-center py-3 text-uppercase">popular posts</div>

                    @if(!empty($populer_posts))
                        @foreach($populer_posts as $populer_post)
                            <div class="col-6 py-2">
                                <a href="{{ '/web_blog_details/'.$populer_post->id }}">
                                    <img src="{{ $populer_post->image }}" alt="" class="img-fluid">
                                </a>

                            </div>
                            <div class="col-6 py-2">
                                <div class="p-3">
                                    <div class="text-uppercase font-weight-bold">{{ $populer_post->title }}</div>
                                    <div class="small">{{ $populer_post->date }}</div>
                                </div>
                            </div>
                        @endforeach

                    @endif

                    @if(!empty($categorized_populer_posts))
                        @foreach($categorized_populer_posts as $populer_post)
                            <div class="col-6 py-2">
                                <a href="{{ '../web_blog_details/'.$populer_post->id }}">
                                    <img src="{{ '../'.$populer_post->image }}" alt="" class="img-fluid">
                                </a>

                            </div>
                            <div class="col-6 py-2">
                                <div class="p-3">
                                    <div class="text-uppercase font-weight-bold">{{ $populer_post->title }}</div>
                                    <div class="small">{{ $populer_post->date }}</div>
                                </div>
                            </div>
                        @endforeach

                    @endif


                </div>
            </div>
        </div>
    </section>

@endsection
