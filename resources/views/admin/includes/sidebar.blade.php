<div class="sidebar" data-background-color="brown" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

    <div class="logo">
        <a href="{{ url('/home') }}" class="simple-text logo-mini">
            <i class="ti-pulse"></i>
        </a>

        <a href="{{ url('/home') }}" class="simple-text logo-normal">
            MAJU CURATED
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="info">
                <div class="photo">
                    <img src="{{ asset('paper_dashboard/assets/img/faces/img03.png') }}" />
                </div>

                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span style="font-variant-caps: all-petite-caps">
                      {{ Auth::user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>

                <div class="clearfix"></div>

                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="sidebar-mini"><i class="ti-lock"></i></span>
                                <span class="sidebar-normal">
                                    {{ __('Logout') }}
                                </span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li>
                <a data-toggle="collapse" href="#category">
                    <i class="ti-agenda"></i>
                    <p>Category
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="category">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/category') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Category Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/category_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Category Info List</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#dashboardOverview" aria-expanded="true">
                    <i class="ti-panel"></i>
                    <p>Social Linker
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="dashboardOverview">
                    <ul class="nav">
                        <li class="">
                            <a href="{{ url('/linker') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Linker</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/linker_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Linker List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#componentsExamples">
                    <i class="ti-mobile"></i>
                    <p>Contact
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="componentsExamples">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/contact') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Contact Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/contact_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Contact Info List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#profile">
                    <i class="ti-user"></i>
                    <p>Profile
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="profile">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/profile') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/profile_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Profile Info List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#slider">
                    <i class="ti-crown"></i>
                    <p>Slider
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="slider">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/slider') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Slide</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/slider_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Slider Info List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li>
                <a data-toggle="collapse" href="#about">
                    <i class="ti-info"></i>
                    <p>Maju About
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="about">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/about') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New About Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/about_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">About Info List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#design">
                    <i class="ti-write"></i>
                    <p>Design
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="design">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/design') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal"> New Design Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/design_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Design Info List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#blog">
                    <i class="ti-blackboard"></i>
                    <p>Blogs
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="blog">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/blog') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Blog</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/blog_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Blog List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#gallery">
                    <i class="ti-camera"></i>
                    <p>Photography
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="gallery">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/gallery') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Photography</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/gallery_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Photography  List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#video">
                    <i class="ti-video-camera"></i>
                    <p>Videography
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="video">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/videography') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Video</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/videography_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Video List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{--SERVCES--}}
            <li>
                <a data-toggle="collapse" href="#service">
                    <i class="ti-cloud"></i>
                    <p>Photography Services
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="service">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/service') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Service</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/service_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal">Service Info List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#video_service">
                    <i class="ti-cloud"></i>
                    <p>VideoGraphy Services
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="video_service">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/video_service') }}">
                                <span class="sidebar-mini"><i class="ti-plus"></i></span>
                                <span class="sidebar-normal">Add New Videography Service</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/video_service_list') }}">
                                <span class="sidebar-mini"><i class="ti-list"></i></span>
                                <span class="sidebar-normal"> Service Info List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
