@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" name="frmAdd" id="frmAdd" action="{{ route('/') }}">
    @csrf
    <div class="form-group">
      <label for="txtFname">First Name:</label>
      <input type="text" name="txtFname" class="form-control" id="txtFname" value="">
       @if ($errors->has('txtFname'))
       <span class="error">
       <p>{{ $errors->first('txtFname') }}</p>
       </span>
       @endif
    </div>

    <div class="form-group">
      <label for="txtLname">Last Name:</label>
      <input type="text" name="txtLname" class="form-control" id="txtLname" value="">
       @if ($errors->has('txtLname'))
       <span class="error">
       <p>{{ $errors->first('txtLname') }}</p>
       </span>
       @endif
    </div>

    <div class="form-group">
      <label for="txtEmail">Email:</label>
      <input type="text" name="txtEmail" class="form-control" id="txtEmail" value="">
      @if ($errors->has('txtEmail'))
      <span class="error">
      <p>{{ $errors->first('txtEmail') }}</p>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label for="txtMobile">Mobile:</label>
      <input type="text" name="txtMobile" class="form-control" id="txtMobile" value="">
      @if ($errors->has('txtMobile'))
      <span class="error">
      <p>{{ $errors->first('txtMobile') }}</p>
      </span>
      @endif
    </div>
     <div class="form-group>
      <label class="control-label">Captcha</label>
      {!! app('captcha')->display() !!}
      @if ($errors->has('g-recaptcha-response'))
      <span class="error">
      <p>{{ $errors->first('g-recaptcha-response') }}</p>
      </span> 
      @endif
   </div>
    <button type="submit" class="btn btn-default">Submit</button>        
  </form>
  </div>
@endsection