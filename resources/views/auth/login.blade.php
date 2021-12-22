@extends('layouts.app')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-8 Theme">
            <div class="card Theme">
                <div class="card-header heading-color">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-white text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-white">
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link link-color" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <hr class="bg-white">
                    <p class="heading-color  text-center">Do you have an Account ? <a href="{{route('register')}}" class="link-color">Sign Up Instead</a> </p>
                </div>
                <hr class="bg-white">
                <div class="form-group ">
                    <div class="col-sm-12 text-center">
                        <h4 class="text-white ">Or Signin With</h4>
                    </div>
                </div>
                <hr class="bg-white">
                <div class="row justify-content-around">
                   <div class="col-3">
                       <a href="{{route('github')}}" class=""><i class="fab fa-github fa-3x text-dark"></i></a>
                   </div>
                   <div class="col-3">
                    <a href="{{route('google')}}" class=""><i class="fab fa-google fa-3x text-danger"></i></a>
                   </div>
                   <div class="col-3">
                       <a href="{{route('linkedin')}}" class=""><i class="fab fa-linkedin fa-3x text-primary"></i></a>
                   </div>
                  <div class="col-3">
                      <a href="{{route('facebook')}}" class=""> <i class="fab fa-facebook fa-3x" aria-hidden="true"></i> </a>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
