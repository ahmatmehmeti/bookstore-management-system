@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #66a3ff;color: white"><b>Add new category</b></div>
                    <div class="card-body" style="background-color: #cce0ff">
                        <form method="POST" action="{{route('categories.store')}}">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-xl-3 mb-2 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" id="name"
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name"
                                           placeholder="{{ __('Name') }}"
                                           value="{{ old('name') }}" autocomplete="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('categories.index') }}" class="btn btn-default btn-flat btn-gray">@lang('Back')</a>
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
