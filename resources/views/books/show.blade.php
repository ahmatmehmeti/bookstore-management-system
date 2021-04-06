@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('orders.store')}}">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class='panel-body'>
                                            <img src="{{asset('images/' . $book->image)}}"
                                                 style="width: 200px;height: 300px;">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class='panel-heading'><h3>{{$book->title}}</h3></div>
                                        <p><b>By: </b>{{$book->author}}</p><br>
                                        <p><b>Description</b>: {{$book->description}}</p><br>
                                    </div>
                                    <div class="col-md-4">
                                        <p><b>Author Biography: </b>{{$book->about_author}}</p>
                                        <p><b>Price: </b>{{$book->price}}&euro;</p>
                                        <p><b>Pages: </b>{{$book->pages}}</p>
                                        <p><b>Published date: </b>{{$book->date_published}}</p>
                                        <p><b>Quantity: </b>{{$book->qty}}</p>

                                    </div>
                                </div>
                                <br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Order this book
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <form method="POST" enctype="multipart/form-data" action="{{route('orders.store')}}">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$book->title}} Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-2">
                            <div class="col-xl-6 mb-2 {{ $errors->has('contact_number') ? ' has-error' : '' }}">
                                <input type="text" id="contact_number"
                                       class="form-control {{ $errors->has('contact_number') ? ' is-invalid' : '' }}"
                                       placeholder="Contact Number"
                                       autocomplete="contact_number"
                                       name="contact_number"
                                       value="{{ old('contact_number') }}" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-xl-6 mb-2 {{ $errors->has('city') ? ' has-error' : '' }}">
                                <input type="text" id="city"
                                       class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}"
                                       placeholder="City"
                                       autocomplete="city"
                                       name="city"
                                       value="{{ old('city') }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-xl-6 mb-2 {{ $errors->has('address') ? ' has-error' : '' }}">
                                <input type="text" id="address"
                                       class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                       placeholder="Address"
                                       autocomplete="address"
                                       name="address"
                                       value="{{ old('address') }}" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-xl-6 mb-2 {{ $errors->has('qty') ? ' has-error' : '' }}">
                                <input type="number" id="qty"
                                       class="form-control {{ $errors->has('qty') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('Quantity') }}"
                                       name="qty"
                                       value="{{ old('qty') }}" required>
                                @if ($errors->has('qty'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('qty') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-xl-6 mb-2 {{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea name="comment" class="form-control"  placeholder="Comment" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Order Now</button>
                    </div>
                </div>
            </div>
            <input name="book_id" type="hidden" value="{{$book->id}}">
        </div>
    </form>

@endsection
