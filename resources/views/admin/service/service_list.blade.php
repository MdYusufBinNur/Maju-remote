@extends('layouts.app')

@section('style')
    {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">--}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.4/css/rowReorder.dataTables.min.css"/>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success success_msg" hidden>
                        <button type="button" aria-hidden="true" data-notify="dismiss" class="close">×</button>
                        <span><b> Success - </b> Priority Updated</span>
                    </div>
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
                    <h4 class="title">Photography Service List</h4>
                    <br>

                    <div class="card">
                        <div class="card-content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <div class="fresh-datatables">
                                <table id="data_tables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> Order No</th>
                                        <th class="text-center" hidden> ID</th>
                                        <th class="text-center"> Service Title</th>
                                        <th class="text-center"> Description</th>
                                        <th class="text-center"> Image</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    @if(!empty($all_services))
                                        @php($i = 1)
                                        @foreach($all_services as $all_service)
                                            <tr class="text-center">
                                                <td>{!! $i !!}</td>
                                                <td hidden>{!! $all_service->id !!}</td>
                                                <td>{!! $all_service->title !!}</td>

                                                <td>{!! substr($all_service->title_description,0,70) !!}</td>
                                                <td class="text-center">
                                                    <img src="{!! $all_service->title_image !!}" width="100px" height="auto" alt=""> </td>
                                                <td>
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon" data-toggle="modal" onclick="get_service_data({{$all_service->id}})" data-target="#BrandModal"><i class="ti-pencil-alt"></i></a>

                                                    <a href="" class="btn btn-simple btn-info btn-icon del_brand"  id="del_brand_item" onclick="deleteService({{ $all_service->id }})"><i class="ti-trash"></i></a>
                                                </td>
                                            </tr>

                                            @php($i++)
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button href="" onclick="get_photo_service_ordered_data()" type="submit" class="btn btn-sm">Set Priority</button>
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
                    <h4 class="modal-title">Photography Service </h4>
                </div>
                <form action="{{ url('/update_service_info') }}" method="post" enctype="multipart/form-data">

                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">

                            <input type="text" id="service_id" hidden name="service_id">

                            <div class="form-group">
                                <label class="control-label" for="category_info">
                                    Service Title
                                </label>
                                <label for="category_name"></label>
                                <input class="form-control" type="text" name="title" id="title"/>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="title_description">Service Description<star>*</star></label>
                                <textarea class="form-control" name="title_description" id="title_description" type="text"  rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="title_description">Priority <star>*</star></label>
                                <input class="form-control" name="order_no" id="order_no" type="number" min="0" readonly/>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Title Image </label>
                                <input type="file" name="title_image" class="form-control"/>
                            </div>


                            <div class="form-group">
                                <label for="old_logo">Old Image</label>
                                <br>
                                <img src="" alt="" width="50" height="auto" id="old_logo">
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default fed_btn" >Update</button>
                    </div>


                </form>


            </div>

        </div>
    </div>

@endsection

@section('footer')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>

    {{--<script type="text/javascript">--}}
        {{--$('#tbody').sortable();--}}

    {{--</script>--}}


    {{--<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.4/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#data_tables').dataTable({
                "jQueryUI": true,
                // "pagingType": "full_numbers",
                // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                // responsive: true,
                // language: {
                //     search: "_INPUT_",
                //     searchPlaceholder: "Search records",
                //     class: 'navbar-form navbar-left navbar-search-form'
                // },
                rowReorder: true

            });

            table.on( 'row-reorder', function ( e, diff, edit ) {
                var result = 'Reorder started on row: '+edit.triggerRow.data()[1]+'<br>';

                for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
                    var rowData = table.row( diff[i].node ).data();

                    result += rowData[1]+' updated to be in position '+
                        diff[i].newData+' (was '+diff[i].oldData+')<br>';
                }

                $('#result').html( 'Event result:<br>'+result );
            } );

            // var table = $('#data_tables').DataTable();
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





@endsection


