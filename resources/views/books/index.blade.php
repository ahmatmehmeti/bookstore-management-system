@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>Books</b></div>
                    <a href="{{ route('books.create') }}"><button type="button" class="btn btn-primary" style="position: absolute; top: 5px; right: 10px">Add New Book</button></a>

                    <div class="card-body" style="background-color: #cce0ff">
                        <table class="table table-bordered" id="tblBooks">
                            <thead  style="background-color: #66a3ff; color: white">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Author</th>
                                <th>AboutAuthor</th>
                                <th>Publisher</th>
                                <th>Date Published</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Pages</th>
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
            $('#tblBooks').DataTable({
                responsive: true,
                order: [1, "desc"],
                processing: true,
                serverSide: true,
                ajax: '{!! route('books.datatable') !!}',
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'author', name: 'author'},
                    {data: 'about_author', name: 'about_author'},
                    {data: 'publisher', name: 'publisher'},
                    {data: 'date_published', name: 'date_published'},

                    {data: 'qty', name: 'qty'},
                    {data: 'price', name: 'price'},
                    {data: 'pages', name: 'pages'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
            });
        });
    })(jQuery);
</script>
