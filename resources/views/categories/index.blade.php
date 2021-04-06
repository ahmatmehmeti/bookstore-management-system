@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>Categories</b></div>
                    <a href="{{ route('categories.create') }}"><button type="button" class="btn btn-primary" style="position: absolute; top: 5px; right: 10px">Add Categories</button></a>

                    <div class="card-body" style="background-color: #cce0ff">
                        <table class="table table-bordered" id="tblCategory">
                            <thead  style="background-color: #66a3ff; color: white">
                            <tr>
                                <th>Name</th>
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
            $('#tblCategory').DataTable({
                responsive: true,
                order: [1, "desc"],
                processing: true,
                serverSide: true,
                ajax: '{!! route('categories.datatable') !!}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
            });
        });
    })(jQuery);
</script>
