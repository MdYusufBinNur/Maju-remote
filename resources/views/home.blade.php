@extends('layouts.app')

@section('style')
    <style>
        .service {
            font-family: "Seaweed Script";
            color: #a5a098;
            text-align: center;
            font-size: 40px;
            position: relative;
            margin:0;
        }
        .service:before {
            content:"";
            display: block;
            position: absolute;
            z-index:-1;
            top: 50%;
            width: 100%;
            border-bottom: 3px solid #a5a098;
        }
    </style>
@endsection
@section('content')
   <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-agenda"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('category_list') }}" style="color: black">CATEGORY INFORMATION</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-facebook"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('linker_list') }}" style="color: black">SOCIAL ACTIVITIES</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />
                            {{--<div class="stats">--}}
                                {{--<div class="pull-right" style="position:relative; display:inline-block;"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" rel="tooltip" title="adasdasdasdasdasd adasdasdasdasdShows the total price of orders minus cost for ads."></i></div>--}}
                                {{--<i class="ti-clipboard"></i><div class="my-inline-block" id="campaign-name4"></div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-mobile"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('contact_list') }}" style="color: black">CONTACT INFORMATION</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('profile_list') }}" style="color: black">PROFILE INFORMATION</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-list"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('blog_list') }}" style="color: black">BLOG INFORMATION</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-gallery"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('gallery_list') }}" style="color: black">PHOTOGRAPHY INFORMATION</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-video-camera"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('videography_list') }}" style="color: black">VIDEOGRAPHY INFORMATION</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-clipboard"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('design_list') }}" style="color: black">DESIGN INFORMATION</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 text-center">
                    {{--<hr style="height: 20px;border-color: #a5a098">--}}
                    <p class="service"><button class="btn" style="background-color: #66615B; color: white">Services</button></p>
                    {{--<button class="btn btn-block" style="background-color: #66615B; color: white">SERVICES</button>--}}
                </div>

                <div class="col-lg-3 col-sm-6">
                </div>
                <div class="col-lg-3 col-sm-6" style="margin-top: 20px">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-layout-media-center"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('video_service_list') }}" style="color: black">VIDEOGRAPHY SERVICES</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" style="margin-top: 20px">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-dark text-center">

                                        <i class="ti-layout-media-overlay-alt-2"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p><a href="{{ url('service_list') }}" style="color: black">PHOTOGRAPHY SERVICES</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />

                        </div>
                    </div>
                </div>

            </div>
        </div>
   </div>
@endsection
