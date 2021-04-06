@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #66a3ff;color: white"><b>Books</b></div>
                    <div class="card-body" style="background-color: #cce0ff">
                        <form  method="POST" action="{{route('books.update', ['book' => $book->id])}}" enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-2">
                                <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <input id="title" type="text"
                                           class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" name="title"
                                           value="{{ old('title', $book->title) }}" required autocomplete="name" autofocus
                                           placeholder="{{ __('Title') }}" maxlength="64">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('title') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-8 mb-2 {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <input id="description" type="text"
                                           class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" name="description"
                                           value="{{ old('description', $book->description) }}" required autocomplete="description"
                                           placeholder="{{ __('Description') }}">
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('description') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-8 mb-2 {{ $errors->has('author') ? ' has-error' : '' }}">
                                    <input id="author" type="text"
                                           class="form-control {{ $errors->has('author') ? 'is-invalid' : ''}}" name="author"
                                           value="{{ old('author', $book->author) }}" required autocomplete="author"
                                           placeholder="{{ __('Author') }}">
                                    @if ($errors->has('author'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('author') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-8 mb-2 {{ $errors->has('about_author') ? ' has-error' : '' }}">
                                    <input id="about_author" type="text"
                                           class="form-control {{ $errors->has('about_author') ? 'is-invalid' : ''}}" name="about_author"
                                           value="{{ old('about_author', $book->about_author) }}" required autocomplete="about_author"
                                           placeholder="{{ __('About Author') }}">
                                    @if ($errors->has('about_author'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('about_author') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-8 mb-2 {{ $errors->has('publisher') ? ' has-error' : '' }}">
                                    <input id="publisher" type="text"
                                           class="form-control {{ $errors->has('publisher') ? 'is-invalid' : ''}}" name="publisher"
                                           value="{{ old('publisher', $book->publisher) }}" required autocomplete="publisher"
                                           placeholder="{{ __('Publisher') }}">
                                    @if ($errors->has('publisher'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('publisher') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-8 mb-2 {{ $errors->has('date_published') ? ' has-error' : '' }}">
                                    <input id="date_published" type="date"
                                           class="form-control {{ $errors->has('date_published') ? 'is-invalid' : ''}}" name="date_published"
                                           value="{{ old('date_published', $book->date_published) }}" required autocomplete="date_published"
                                           placeholder="{{ __('Date Published') }}">
                                    @if ($errors->has('date_published'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('date_published') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-xl-6  {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <select name="category_id" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-8 mb-2  {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <input type="file" id="image"
                                           class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                           name="image"
                                           value="{{ old('image') }}" required>
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-8 mb-2 {{ $errors->has('price') ? ' has-error' : '' }}">
                                    <input id="price" type="number"
                                           class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}"
                                           name="price"
                                           value="{{ old('price', $book->price) }}" required autocomplete="price"
                                           placeholder="{{ __('Price') }}">
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('price') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-8 mb-2 {{ $errors->has('qty') ? ' has-error' : '' }}">
                                    <input id="qty" type="number"
                                           class="form-control {{ $errors->has('qty') ? 'is-invalid' : ''}}"
                                           name="qty"
                                           value="{{ old('qty', $book->qty) }}" required autocomplete="qty"
                                           placeholder="{{ __('Quantity') }}">
                                    @if ($errors->has('qty'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('qty') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-8 mb-2 {{ $errors->has('pages') ? ' has-error' : '' }}">
                                    <input id="pages" type="number"
                                           class="form-control {{ $errors->has('pages') ? 'is-invalid' : ''}}" name="pages"
                                           value="{{ old('pages', $book->pages) }}" required autocomplete="pages"
                                           placeholder="{{ __('pages') }}">
                                    @if ($errors->has('pages'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('pages') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col">
                                    <a href="{{ route('books.index') }}" class="btn btn-default btn-flat btn-gray">@lang('Back')</a>

                                    <button type="submit" class="btn btn-info btn-flat btn-green ml-2">{{ __('Update') }}</button>
                                </div><!--col-->
                            </div><!--row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
