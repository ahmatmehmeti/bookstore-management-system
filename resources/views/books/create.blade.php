@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #66a3ff; color: white" ><b>Add new book</b></div>
                    <div class="card-body" style="background-color: #cce0ff;">
                        <form method="POST" enctype="multipart/form-data" action="{{route('books.store')}}">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-xl-3 mb-2 {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <input type="text" id="title"
                                           class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           name="title"
                                           placeholder="{{ __('Title') }}"
                                           value="{{ old('title') }}" autocomplete="title" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-xl-6 mb-2 {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <input type="text" id="description"
                                           class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Description') }}"
                                           name="description"
                                           value="{{ old('description') }}" required>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-6 mb-2 {{ $errors->has('author') ? ' has-error' : '' }}">
                                    <input type="text" id="author"
                                           class="form-control {{ $errors->has('author') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Author') }}"
                                           name="author"
                                           value="{{ old('author') }}" required>
                                    @if ($errors->has('author'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('author') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-6 mb-2 {{ $errors->has('about_author') ? ' has-error' : '' }}">
                                    <input type="text" id="about_author"
                                           class="form-control {{ $errors->has('about_author') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('About Author') }}"
                                           name="about_author"
                                           value="{{ old('about_author') }}" required>
                                    @if ($errors->has('about_author'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('about_author') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-6 mb-2 {{ $errors->has('publisher') ? ' has-error' : '' }}">
                                    <input type="text" id="publisher"
                                           class="form-control {{ $errors->has('publisher') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Publisher') }}"
                                           name="publisher"
                                           value="{{ old('publisher') }}" required>
                                    @if ($errors->has('publisher'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('publisher') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-6 mb-2 {{ $errors->has('date_published') ? ' has-error' : '' }}">
                                    <input type="date" id="date_published"
                                           class="form-control {{ $errors->has('date_published') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Date of Published') }}"
                                           name="date_published"
                                           value="{{ old('date_published') }}" required>
                                    @if ($errors->has('date_published'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('date_published') }}</span>
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
                            <div class="row mb-2">
                                <div class="col-xl-6 mb-1 {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <input type="file" id="image"
                                           class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                           name="image"
                                           value="{{ old('images') }}" required>
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('image') }}</span>
                                    @endif
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
                                <div class="col-xl-6 mb-2 {{ $errors->has('price') ? ' has-error' : '' }}">
                                    <input type="text" id="price"
                                           class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('price') }}"
                                           name="price"
                                           value="{{ old('price') }}" required>
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-xl-6 mb-2 {{ $errors->has('pages') ? ' has-error' : '' }}">
                                    <input type="number" id="pages"
                                           class="form-control {{ $errors->has('pages') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('pages') }}"
                                           name="pages"
                                           value="{{ old('pages') }}" required>
                                    @if ($errors->has('pages'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('pages') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('books.index') }}" class="btn btn-default btn-flat btn-gray">@lang('Back')</a>
                                    <button type="submit" class="btn btn-info btn-flat btn-green ml-2">{{ __('Save') }}</button>
                                </div><!--col-->
                            </div><!--row-->
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
