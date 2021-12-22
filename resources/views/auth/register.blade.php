@extends('layouts.app')
@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-8 Theme">
            <div class="card Theme">
                <div class="card-header heading-color">{{ __('Register') }}</div>
                  @if(count($errors)>0)
                   <div class="alert alert-danger">
                     @foreach($errors->all() as $error)
                     <p>{{$error}}</p>
                     @endforeach
                   </div>
                  @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right text-white">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-white">{{ __('Password') }} </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-white">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                    <hr class="bg-white">
                    <div class="form-group mt-2">
                        <div class="col-sm-12 text-center">
                            <h4 class="text-white ">Or Signin With</h4>
                        </div>
                    </div>
                    <hr class="bg-white">
                    <div class="row justify-content-around">
                        <div class="col-3">
                            <a href="{{route('github')}}" class=""><i class="fab text-dark fa-github fa-3x "></i></a>
                        </div>
                        <div class="col-3">
                         <a href="{{route('google')}}" class=""><i class="fab text-danger fa-google fa-3x "></i></a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('linkedin')}}" class=""><i class="fab text-primary fa-linkedin fa-3x "></i></a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('facebook')}}" class=""> <i class="fab fa-facebook text-primary fa-3x" aria-hidden="true"></i> </a>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
