@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-sm-8">
    <div class="card Theme">
     <div class="card-header heading-color heading-style">Edit User {{$user->name}}</div>
     <div class="card-body">
      <form action="{{route('admin.users.update',$user)}}" method="POST">
         <div class="form-group row">
             <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('E-Mail Address') }}</label>

             <div class="col-md-6">
                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                 @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
             </div>
         </div>       
         <div class="form-group row">
             <label for="name" class="col-md-4 text-white col-form-label text-md-right">Name</label>
 
             <div class="col-md-6">
                 <input id="name" type="name" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="email" autofocus>

                 @error('name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
             </div>
         </div>     
         @csrf
         {{ method_field('PUT') }}
         <div class="form-group row">
           <label for="Roles" class="col-md-4 text-white col-form-label text-md-right">Roles</label>
           <div class="col-md-6">
             @foreach($roles as $role)
             <div class="form-check">
             <input type="checkbox" name="roles[]" id="" value="{{ $role->id }}"
             @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
             <label for="">{{$role->name}}</label>
             </div>
             @endforeach
            </div>
           </div>
           <button type="submit" class="btn btn-primary">
             Update
             </button>
      </form>
     </div>
     <div class="card"></div>
    </div>
  </div>
 </div>
</div>
@endsection