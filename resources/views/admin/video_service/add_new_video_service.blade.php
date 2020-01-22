@extends('layouts.app')

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" aria-hidden="true" data-notify="dismiss" class="close">×</button>
                            <span><b> Success - </b> {{ Session::get('success') }}</span>
                        </div>
                    @endif

                    @if(Session::get('error'))
                        <div class="alert alert-warning">
                            <button type="button" aria-hidden="true" data-notify="dismiss" class="close">×</button>
                            <span><b> Success - </b> {{ Session::get('error') }}</span>
                        </div>
                    @endif

                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <form id="registerFormValidation" action="{{ url('/add_new_video_service') }}" method="post" enctype="multipart/form-data">
                            @csrf()
                            <div class="card-header">
                                <a href="{{ url('/video_service_list') }}" class="btn btn-outline-dark  pull-right">List</a>

                                <div class="form-group pull-left">
                                    <h5><strong>VIDEO SERVICE</strong></h5>
                                </div>

                            </div>
                            <div class="clearfix"></div>

                            <div class="card-content">
                                <div class="form-group">
                                    <label class="control-label" for="category_info">
                                        Service Title
                                    </label>
                                    <label for="service_name"></label>
                                    <input class="form-control" type="text" name="title" id="title"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="title_description">Service Description<star>*</star></label>
                                    <textarea class="form-control" name="title_description" id="title_description" type="text" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Service Image </label>
                                    <input type="file" name="title_image" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="title_description">Priority <star>*</star></label>
                                    <input class="form-control" name="order_no" id="order_no" type="number" min="0" onkeyup="check_video_service_priority(this.value)" />

                                    <span class="invalid-feedback feedback" role="alert" hidden>
                                        <strong style="color: red">This Priority value already added to another one</strong>
                                    </span>

                                </div>

                                <div class="category"><star>*</star> Required fields</div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-fill pull-right fed_btn">Submit</button>
                                <div class="clearfix"></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Sociallinker_Icon--}}
@endsection
