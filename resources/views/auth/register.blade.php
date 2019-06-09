@extends('layouts.app')

@section('content')
<div class="container">
{{--    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
--}}

    <div class="pop_up_in my-5">
        <div class="pop_up_body">
            <div class="shade"></div>
            <div class="nav-pop_up" style="z-index: 2; width: 20%;">
                <div class="wr-content-nav">
                    <div class="wr-nav">
                        <svg class="icon-arrow_popup" version="1.1" id="sara_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 240.823 240.823" style="enable-background:new 0 0 240.823 240.823;" xml:space="preserve">
                            <g>
                                <path id="Chevron_Right"
                                      d="M57.633,129.007L165.93,237.268c4.752,4.74,12.451,4.74,17.215,0c4.752-4.74,4.752-12.439,0-17.179
                                    l-99.707-99.671l99.695-99.671c4.752-4.74,4.752-12.439,0-17.191c-4.752-4.74-12.463-4.74-17.215,0L57.621,111.816
                                    C52.942,116.507,52.942,124.327,57.633,129.007z">
                                </path>
                            </g>
                        </svg>
                    </div>

                    <div class="wr-dots">
                        <ul>
                            <li class="active"><i class="popup-dots dots-pop_up"></i></li>
                            <li class=""><i class="popup-dots dots-sign-in"></i></li>
                            <li class=""><i class="popup-dots dots-sign-add"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sign-in" style="width: 20%;">
                <div class="wr-btn" style="">
                    <div class="prev-sign-in">
                        <i class="icon-sign-in"></i>
                        <span class="header-form">{{ __('Login') }}</span>
                    </div>
                </div>
                <div class="wr-content-form" style="display: none;">
                    <div class="wr-form-in">
                        <div class="header-form"><span>{{ __('Login') }}</span></div>

                        {{--Login--}}
                        <form method="POST" action="{{ route('login') }}" class="pop-up-form">
                            @csrf
                            <div class="form-group">
                                <input id="email"
                                       type="email" class="input__custom{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autofocus
                                       placeholder={{ __('E-Mail Address') }}
                                >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="password"
                                       type="password"
                                       class="input__custom{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password"
                                       required
                                       placeholder={{ __('Password') }}
                                >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}
                                           placeholder={{ __('Remember Me') }}
                                           required>
                                    <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                </div>

                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-custom btn-custom_green">
                                    {{ __('Login') }}
                                </button>
                                <div class="mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        {{--Login--}}

                    </div>
                </div>
            </div>
            <div class="sign-add" style="width: 60%;">
                <div class="wr-btn" style="display: none;">
                    <div class="prev-sign-add">
                        <i class="icon-sign-add"></i>
                        <span class="header-form">{{ __('Register') }}</span>
                    </div>
                </div>
                <div class="wr-content-form" style="display: block;">
                    <div class="wr-form-in">
                        <div class="header-form"><span>{{ __('Register') }}</span></div>

                        {{--Register--}}
                        <form method="POST" action="{{ route('register') }}" class="pop-up-form">
                            @csrf
                            <div class="form-group mb-3">
                                <input id="name"
                                       type="text"
                                       class="input__custom{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required
                                       autofocus
                                        placeholder={{ __('Name') }}
                                >

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input id="email"
                                       type="email"
                                       class="input__custom{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       placeholder={{ __('E-Mail Address') }}
                                >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input id="password"
                                       type="password"
                                       class="input__custom{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password"
                                       required
                                       placeholder={{ __('Password') }}
                                >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group mb-4">
                                <input id="password-confirm"
                                       type="password"
                                       class="input__custom"
                                       name="password_confirmation"
                                       required
                                       placeholder={{ __('Confirm Password') }}
                                >
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn-custom btn-custom_green">{{ __('Register') }}</button>
                            </div>
                        </form>
                        {{--Register--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
