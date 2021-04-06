@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #66a3ff;color: white"><b>Edit this user</b></div>

                    <div class="card-body"  style="background-color: #cce0ff">
                        <form  method="POST" action="{{route('users.update', ['user' => $user->id])}}">
                            @csrf
                            @method('PUT')
                        <div class="form-group row mb-2">
                            <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text"
                                       class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name"
                                       value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus
                                       placeholder="{{ __('Name') }}" maxlength="64">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-xl-6 col-lg-8 mb-2 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email"
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" name="email"
                                       value="{{ old('email', $user->email) }}" required autocomplete="email"
                                       placeholder="{{ __('E-Mail Address') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-6 mb-2 {{ $errors->has('role') ? ' has-error' : '' }}">
                                <select name="role"
                                        class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}">
                                    <option value="user" {{$user->user == 0 ? 'selected' : ''}}>User</option>
                                    <option value="admin" {{$user->is_admin == 1 ? 'selected' : ''}}>Admin</option>
                                    <option value="postier" {{$user->is_postier == 2 ? 'selected' : ''}}>Postier</option>

                                </select>
                                @if ($errors->has('role'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>
                            <div class="row ">
                                <div class="col">
                                    <a href="{{ route('users.index') }}" class="btn btn-default btn-flat btn-gray">@lang('Back')</a>

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
