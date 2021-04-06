@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12" >
                <div class="card" >
                    {{--                    <a href="{{ route('welcome') }}" class="btn btn-primary" >Home</a>--}}
                    <div class="card-header" style="background-color: #66a3ff;color: white"><b>Orders</b></div>

                    <div class="card-body"  style="background-color: #cce0ff">
                        <table class="table table-bordered" id="pendingtable">
                            <thead style="background-color: #66a3ff;color: white">
                            <tr>
                                <th>Book</th>
                                <th>User</th>
                                <th>Postier</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Created_at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>

<script>
    (function($){
        $(document).ready(function () {
            $('#pendingtable').DataTable({
                responsive: true,
                order: [1, "desc"],
                processing: true,
                serverSide: true,
                ajax: '{!! route('orders.pendingdatatable') !!}',
                columns: [
                    {data: 'book', name: 'book'},
                    {data: 'user', name: 'user'},
                    {data: 'postier', name: 'postier'},
                    {data: 'qty', name: 'qty'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
            });
        });
    })(jQuery);
</script>
