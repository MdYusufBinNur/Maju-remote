@extends('layouts.app')

@section('style')
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
                            <span><b> Warning - </b> {{ Session::get('error') }}</span>
                        </div>
                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title">Videography List</h4>
                    <br>
                    <div class="card">
                        <div class="card-content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> Category</th>
                                        <th class="text-center"> Title</th>
                                        <th class="text-center"> Link</th>
                                        <th class="text-center"> Key</th>
                                        {{--<th class="text-center"> Video File</th>--}}

                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($all_videos))
                                        @foreach($all_videos as $all_video)
                                            <tr class="text-center">
                                                <td>{!! $all_video->category->category_name !!}</td>
                                                <td>{!! $all_video->name !!}</td>
                                                <td>{!! $all_video->video_link !!}</td>
                                                <td>{!! $all_video->key !!}</td>

                                                {{--<td class="text-center">--}}
                                                {{--<iframe width="280" height="180" src="https://www.youtube.com/embed/{!! $all_video->video_key !!}" frameborder="0" allowfullscreen></iframe>--}}
                                                {{--<iframe width="345" height="309" src="{{ "http://www.youtube.com/embed/".$all_video->video_key }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                                {{--<iframe width="345" height="309" src="https://www.youtube.com/embed/{!! $all_video->video_key !!}" frameborder="0" allowfullscreen></iframe>--}}
                                                {{--  <video width="150" height="100" controls>--}}
                                                {{--<source src="{{ $all_video->video_file }}" type="video/mp4">--}}
                                                {{--<source src="{{ $all_video->video_file }}" type="video/ogg">--}}
                                                {{--Your browser does not support the video tag.--}}
                                                {{--</video>--}}
                                                <td>
                                                <a href="#" class="btn btn-simple btn-warning btn-icon" data-toggle="modal" onclick="get_video_data({{$all_video->id}})" data-target="#BrandModal"><i class="ti-pencil-alt"></i></a>
                                                <a href="" class="btn btn-simple btn-info btn-icon del_brand"  id="del_brand_item" onclick="delete_Video({{ $all_video->id }})"><i class="ti-trash"></i></a>
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
            </div> <!-- end row -->

        </div>
    </div>

    <div class="modal fade" id="BrandModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Videography Information</h4>
                </div>
                <form action="{{ url('/update_videography_info') }}" method="post" enctype="multipart/form-data">

                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <input type="text" id="video_id" hidden name="video_id">
                            <div class="form-group">
                                <label class="control-label" for="gallery_title">
                                    Old  Category
                                </label>
                                <input class="form-control" type="hidden" name="old_category_id" id="old_cat_id"  required/>
                                <input class="form-control" readonly type="text" name="old_category_name" id="old_cat_name"  required/>
                            </div>
                            <div class="form-group">
                                <label for="">Select Category</label>

                                <select  title="-" class="selectpicker"  data-style="btn-dark  btn-block" data-size="7" name="category_id" id="category_id">
                                    @if(!empty($all_categories))
                                        @foreach($all_categories as $all_category)
                                            <option value="{{ $all_category->id }}">{{ $all_category->category_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="video_title">
                                    Title
                                </label>
                                <input class="form-control" type="text" name="video_title" id="video_title" required/>
                            </div>


                            {{--     <div class="form-group">
                                     <label class="control-label">Video File</label>
                                     <input type="file" name="video_file" accept="video/*" class="form-control"/>
                                 </div>--}}
                            <div class="form-group">
                                <label class="control-label" for="video_title">
                                    Youtube Link
                                </label>
                                <input class="form-control" type="text" name="video_link" id="video_link" required/>
                            </div>

                            {{--<div class="form-group">--}}
                            {{--<video width="150" height="100" controls>--}}
                            {{--<source src="" type="video/mp4" class="video_file" id="video_file">--}}
                            {{--<source src="" type="video/ogg" class="video_file">--}}

                            {{--</video>--}}
                            {{--</div>--}}

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

@section('script')
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


            var table = $('#datatables').DataTable();
            // Edit record
            table.on( 'click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert( 'You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.' );
            } );

            // Delete a record
            table.on( 'click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            } );

            //Like record
            table.on( 'click', '.like', function () {
                alert('You clicked on Like button');
            });

        });
    </script>
    {{--<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
@endsection


