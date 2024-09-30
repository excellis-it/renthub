
@extends('backend.layouts.app')
@section('PageTitle', 'Subscription')
@section('content')
    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Subscription</div>
        
    </div>
    <!--end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="ms-auto" style="margin-bottom: 20px">
                        <table id="data_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Subscription Plan</th>
                                <th>Price($)</th>
                                <th>Days</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($subscription)>0)
                            @foreach($subscription as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{strtoupper($item->subscription->title)}}</td>
                                    <td>{{ number_format($item->price, 2) }}</td>
                                    <td>{{$item->days}}</td>
                                    <td>{{date('jS F, Y',strtotime($item->start_date))}}</td>
                                    <td>{{date('jS F, Y',strtotime($item->end_date))}}</td>  
                                    <td>
                                        {{-- @if($item->status==1)
                                            <span style="padding: 8px; background-color:green; color:white;"> Active</span>
                                        @else                                
                                            <span style="padding: 8px; background-color:red; color:white;"> In-Active</span>
                                        @endif --}}

                                        <select style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; width:100%;">
                                            <option value="1" @if($item->status == 1) selected @endif style="color: green;">Active</option>
                                            <option value="2" @if($item->status == 2) selected @endif style="color: blue;">Renewal</option>
                                            <option value="3" @if($item->status == 3) selected @endif style="color: red;">Cancel</option>
                                        </select>
                                    </td>
                                </tr>

                            @endforeach
                            @else
                            <tr><td colspan="7">No Data available</td></tr>
                            @endif
                        </table>
                   
            </div>
         
        </div>
    </div>
@endsection
@section('plugins')
    <link href="{{asset('backend_assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
@endsection
@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@endsection

@section('js')
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

    

    <script>
        $(document).ready(function () {
            var table = $('#data_table').DataTable({
                lengthChange: true,
                buttons: ['excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#data_table_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script src="sweetalert2.all.min.js"></script>

    @section('js')
        <script type="text/javascript">
            $(document).ready(function () {
                $('#product_image').change(function (e) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#show_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>


    @endsection
@endsection
