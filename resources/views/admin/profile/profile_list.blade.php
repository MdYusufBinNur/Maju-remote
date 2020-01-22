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
                            <span><b> Success - </b> {{ Session::get('error') }}</span>
                        </div>
                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title">Profile List</h4>
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
                                        <th> Name</th>
                                        <th> Description</th>
                                        <th> Image</th>
                                        <th class="disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($all_profiles))
                                        @foreach($all_profiles as $all_profile)
                                            <tr>
                                                <td>{!! $all_profile->profile_name !!}</td>
                                                <td>{!! substr($all_profile->profile_description,0,70) !!}</td>
                                                <td><img src="{!! $all_profile->profile_image !!}" width="100px" height="auto" alt=""> </td>

                                                <td>
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon" data-toggle="modal" onclick="get_profile_data({{$all_profile->id}})" data-target="#BrandModal"><i class="ti-pencil-alt"></i></a>


                                                    <a href="" class="btn btn-simple btn-info btn-icon del_brand"  id="del_profile" onclick="deleteProfile({{ $all_profile->id }})"><i class="ti-trash"></i></a>

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
                    <h4 class="modal-title">Profile Information</h4>
                </div>
                <form action="{{ url('/update_profile_info') }}" method="post" enctype="multipart/form-data">

                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">

                            <input type="text" id="profile_id" hidden name="profile_id">

                            <div class="form-group">
                                <label class="control-label" for="category_info">
                                    Name
                                </label>
                                <label for="category_name"></label><input class="form-control" type="text" name="profile_name" id="profile_name"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="link">Description<star>*</star></label>
                                <textarea class="form-control" name="profile_description" id="profile_description" type="text" required> </textarea>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Image <star>*</star></label>
                                <input type="file" name="profile_image" class="form-control"/>
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


        });
    </script>
    {{--<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
@endsection


