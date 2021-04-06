@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #66a3ff;color: white"><b>Edit this category</b></div>

                    <div class="card-body" style="background-color: #cce0ff">
                        <form  method="POST" action="{{route('categories.update', ['category' => $category->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-2">
                                <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input id="name" type="text"
                                           class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name"
                                           value="{{ old('name', $category->name) }}" required autocomplete="name" autofocus
                                           placeholder="{{ __('Name') }}" maxlength="64">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                                    @endif
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('categories.index') }}" class="btn btn-default btn-flat btn-gray">@lang('Back')</a>

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
