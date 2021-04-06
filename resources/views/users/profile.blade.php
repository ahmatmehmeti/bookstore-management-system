@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #66a3ff; color: white"><b>Edit your profile</b></div>

                    <div class="card-body">
                        <form  method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-2">
                                <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input id="name" type="text"
                                           class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name"
                                           value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus
                                           placeholder="{{ __('Name') }}" maxlength="64">
                                            @if ($errors->has('name'))
                                             <span class="invalid-feedback" role="alxert">
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

                            <div class="row pb-11 mt-8 ml-5">
                                <div class="col">
                                    <a href="{{ route('home') }}" class="btn btn-default btn-flat btn-gray">@lang('Back')</a>

                                    <button type="submit" class="btn btn-info btn-flat btn-green ml-2">{{ __('Update') }}</button>
                                </div><!--col-->
                            </div><!--row-->
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" style="background-color: #66a3ff; color: white"><b>Change password</b></div>
                    <div class="card-body">
                        <form action="{{ route('profile.updatePassword') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                <div class="form-group row mb-2">
                                    <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="current_password" type="password"
                                               class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" name="current_password"
                                               placeholder="{{ __('Current Password') }}" maxlength="64">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alxert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password"
                                               class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" name="password"
                                               placeholder="{{ __('Password') }}" maxlength="64">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alxert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                         </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <div class="col-xl-3 col-lg-4 mb-2 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <input id="password_confirmation" type="password"
                                               class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" name="password_confirmation"
                                               placeholder="{{ __('Password Confirmation') }}" maxlength="64">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alxert">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>

                            <div class="row pb-15 mt-8 ml-5">
                                <div class="col">
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
