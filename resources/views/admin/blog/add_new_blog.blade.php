@extends('layouts.app')

@section('style')
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    {{--<script src="https://cdn.tiny.cloud/1/mw34pc21bdb4huz4mvu639u3pka3tmggjygirmj07to8lhe8/tinymce/5/tinymce.min.js"></script>--}}

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'image code',
            toolbar: 'undo redo | link image | code',
            // enable title field in the Image dialog
            image_title: true,
            // enable automatic uploads of images represented by blob or data URIs
            automatic_uploads: true,
            // add custom filepicker only to Image dialog
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        // call the callback and populate the Title field with the file name
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            entity_encoding : "raw",
            height: 200,

        });
    </script>

@endsection
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
                        <form  action="{{ url('/add_new_blog') }}" method="post"  enctype="multipart/form-data" >
                            @csrf()
                            <div class="card-header">
                                <a href="{{ url('/blog_list') }}" class="btn btn-outline-dark  pull-right">List</a>

                                <div class="form-group pull-left">
                                    <h5><strong>BLOG</strong></h5>
                                </div>

                            </div>
                            <div class="clearfix"></div>

                            <div class="card-content">

                                <div class="form-group">
                                    <label for="">Select Category<star>*</star></label>
                                    <select  title="-" class="selectpicker"  data-style="btn-dark  btn-block" data-size="7" name="category_id" id="category_id"  required>
                                        @if(!empty($all_categories))
                                            @foreach($all_categories as $all_category)
                                                <option value="{{ $all_category->id }}">{{ $all_category->category_name }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">
                                        Title
                                    </label>
                                    <input class="form-control" type="text" name="title" id="title" required/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="gallery_title">
                                        Blog Cover Image
                                    </label>
                                    <input type="file" name="image" class="form-control "  required/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="tiny_description">
                                        Description
                                    </label>
                                    <textarea class="form-control" type="text" name="description" id="tiny_description" required>

                                    </textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                <div class="clearfix"></div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

