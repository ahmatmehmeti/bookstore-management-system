@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #66a3ff;color: white"><b>Edit Order</b></div>

                    <div class="card-body" style="background-color: #cce0ff">
                        <form method="POST" action="{{route('orders.update', $order->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-2">
                                <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('city') ? ' has-error' : '' }}">
                                    <input id="name" type="text"
                                           class="form-control {{ $errors->has('city') ? 'is-invalid' : ''}}"
                                           name="city"
                                           value="{{ old('name', $order->city) }}" required autocomplete="city" autofocus
                                           placeholder="{{ __('City') }}" maxlength="64">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('contact_number') ? ' has-error' : '' }}">
                                    <input id="contact_number" type="text"
                                           class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : ''}}"
                                           name="contact_number"
                                           value="{{ old('name', $order->contact_number) }}" required autocomplete="contact_number" autofocus
                                           placeholder="{{ __('Contact Number') }}" maxlength="64">
                                    @if ($errors->has('contact_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('contact_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('address') ? ' has-error' : '' }}">
                                    <input id="address" type="text"
                                           class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}"
                                           name="address"
                                           value="{{ old('name', $order->address) }}" required autocomplete="address" autofocus
                                           placeholder="{{ __('Address') }}" maxlength="64">
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('qty') ? ' has-error' : '' }}">
                                    <input id="qty" type="number"
                                           class="form-control {{ $errors->has('qty') ? 'is-invalid' : ''}}"
                                           name="qty"
                                           value="{{ old('name', $order->qty) }}" required autocomplete="qty" autofocus
                                           placeholder="{{ __('Quantity') }}" maxlength="64">
                                    @if ($errors->has('qty'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('qty') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('comment') ? ' has-error' : '' }}">
                                    <textarea name="comment" class="form-control"  placeholder="Comment" required>{{$order->comment}}
                                    </textarea>

                                @if ($errors->has('comment'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('comment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @if(auth()->user()->isAdmin())
                                <div class="row mb-2">
                                    <div class="col-xl-6 mb-2">
                                        <select name="postier"
                                                class="form-control {{ $errors->has('postier') ? ' is-invalid' : '' }}">
                                            @foreach($postiers as $postier)
                                                <option
                                                    value="{{$postier->id}}" {{$postier->id == $order->postier_id ? 'selected' : ''}}>
                                                    {{$postier->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('postier'))
                                            <span class="invalid-feedback" role="alert">{{ $errors->first('postier') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="row mb-2">
                                <div class="col-xl-6 mb-2">
                                    <select name="book"
                                            class="form-control {{ $errors->has('book') ? ' is-invalid' : '' }}">
                                        @foreach($books as $book)
                                            <option
                                                value="{{$book->id}}" {{$book->id == $order->book_id ? 'selected' : ''}}>
                                                {{$book->title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('book'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('book') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('users.index') }}"
                                       class="btn btn-default btn-flat btn-gray">@lang('Back')</a>

                                    <button type="submit"
                                            class="btn btn-info btn-flat btn-green ml-2">{{ __('Update') }}</button>
                                </div><!--col-->
                            </div><!--row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
