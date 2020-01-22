@extends('layouts.app')

@section('style')
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    {{--<script src="https://cdn.tiny.cloud/1/mw34pc21bdb4huz4mvu639u3pka3tmggjygirmj07to8lhe8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

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
                <div class="col-md-12">
                    <h4 class="title">Blog List</h4>
                    <br>

                    <div class="card">
                        <div class="card-content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="text-center"> Date</th>
                                        <th class="text-center"> Category</th>
                                        <th class="text-center"> Title </th>
                                        <th class="text-center"> Image</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($all_blogs))
                                        @foreach($all_blogs as $all_blog)
                                            <tr class="text-center">
                                                <td>{!! $all_blog->date !!}</td>
                                                <td>{!! $all_blog->category->category_name !!}</td>
                                                <td>{!! $all_blog->title !!}</td>

                                                <td class="text-center">
                                                    <img src="{!! $all_blog->image !!}" width="100px" height="auto" alt=""> </td>
                                                <td>

                                                    <a href="#" class="btn btn-simple btn-warning btn-icon" data-toggle="modal" onclick="get_blog_data({{$all_blog->id}})" data-target="#BrandModal"><i class="ti-pencil-alt"></i></a>

                                                    <a href="" class="btn btn-simple btn-info btn-icon del_brand"  id="del_brand_item" onclick="deleteBlog({{ $all_blog->id }})"><i class="ti-trash"></i></a>
                                                    {{--<form action="{{ url('/delete_brand' ) }}" method="post" id="form">--}}
                                                    {{--@csrf()--}}
                                                    {{--<input type="text" hidden value="{{$all_brand_list->id}}" name="deleteBrand">--}}
                                                    {{--<button href="#" type="submit" class="btn btn-simple btn-info btn-icon like" onclick="archiveFunction()"><i class="ti-trash"></i></button>--}}
                                                    {{--</form>--}}
                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->

                {{--<div class="col-md-4 col-md-offset-4">--}}
                {{--<div class="card">--}}
                {{--<div class="card-content text-center">--}}
                {{--<h5>Custom HTML description</h5>--}}
                {{--<button class="btn btn-default btn-fill" onclick="demo.showSwal('custom-html')">Try me!</button>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div> <!-- end row -->

        </div>
    </div>

    <div class="modal fade" id="BrandModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Blog Information</h4>
                </div>
                <form action="{{ url('/update_blog_info') }}" method="post" enctype="multipart/form-data">

                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">

                            <input type="text" id="blog_id" hidden name="blog_id">

                            <div class="form-group">
                                <label class="control-label" for="old_cat_name">
                                    Old Category Name
                                </label>
                                <input class="form-control" type="text" name="old_cat_name" id="old_cat_name" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="">Select Category</label>
                                <select  title="-" class="selectpicker"  data-style="btn-dark  btn-block" data-size="7" name="category_id" id="category_id" >
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
                                <input type="file" name="image" class="form-control "  />
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="tiny_description">
                                    Description
                                </label>
                                <textarea class="form-control description" type="text" name="description" id="tiny_description" required>

                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="old_logo">Old Image</label>
                                <br>
                                <img src="" alt="" width="50" height="auto" id="old_logo">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" >Update</button>
                    </div>


                </form>


            </div>

        </div>
    </div>

@endsection

@section('footer')
    <script>

    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                    class: 'navbar-form navbar-left navbar-search-form'
                }
            });


            // var table = $('#datatables').DataTable();
            // // Edit record
            // table.on( 'click', '.edit', function () {
            //     $tr = $(this).closest('tr');
            //
            //     var data = table.row($tr).data();
            //     alert( 'You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.' );
            // } );
            //
            // // Delete a record
            // table.on( 'click', '.remove', function (e) {
            //     $tr = $(this).closest('tr');
            //     table.row($tr).remove().draw();
            //     e.preventDefault();
            // } );
            //
            // //Like record
            // table.on( 'click', '.like', function () {
            //     alert('You clicked on Like button');
            // });

        });
    </script>
    {{--<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
@endsection


