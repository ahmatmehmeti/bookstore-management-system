@extends('adminlte::page')


@section('content')
    <div class="row mt-5">
        <div class='col-md-2 '>
            <div class="list-group">
                <a href="{{ url('home')}}" class="list-group-item list-group-item-action active">
                    <i class="fa fa-home"></i> Categories
                </a>
                @foreach($categories as $category)

                    <a href="{{ url('categories/'.$category->name) }}"
                       class="list-group-item list-group-item-action">
                         {{$category->name}}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="row col-md-10">
            @foreach($books as $book)
                <div class='col-md-4' style="margin-bottom: 20px;">
                    <div class='panel panel-info'>
                        <div class='panel-heading'><h4>{{$book->title}}</h4></div>
                        <div class='panel-body'>
                            <img src="{{asset('images/' . $book->image)}}" style="width: 200px;height: 300px;">
                            <p>{{ substr(strip_tags($book->description), 0, 100) }}{{ strlen(strip_tags($book->description)) > 100 ? "..." : "" }}</p>
                            <a href="{{route('books.show', ['book' => $book->id])}}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{--            <div style="position: relative;left: 50%;">
                        {!! $books->links(); !!}}
                    </div>--}}
    </div>
@endsection
