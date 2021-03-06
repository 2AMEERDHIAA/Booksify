@extends('site.site_layouts.site_master')

@section('content')

    <div class="container-fluid h-100">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 mt-5">
                <div class="card">
                    <div class="card-header card-header-info special blue-gradient-rgba m-0"><h4 class="title">{{ __('Login') }}</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">


                                <div class="col-md-6">
                                    <label for="email" class="text-dark">E-mail</label>

                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password " class="text-dark">Password</label>
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-lg-6 col-sm-auto offset-md-4">
                                    <div class="row justify-content-center">
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-instagram  btn-round">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="_footer">
            @include("site.site_layouts.site_footer")

        </div>

    </div>

@endsection
