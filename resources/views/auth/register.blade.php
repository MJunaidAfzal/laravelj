@extends('layouts.app')

@section('content')
<style>
body{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        background-color:lightgrey;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div style="margin-top:100px;" class="col-md-8">
  <div class="p-2 card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('register') }}" method="post">
      @csrf
                <div class="container">
                  <div class="row">
                  <div class="col-md-6">
                <label  for="name" class=" col-form-label text-md-end">{{ __('Name') }}</label>
                </div>
                <div class="col-md-6">
            <label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>

            </div>
                  </div>
                </div>
            
    <div class="container">
      <div class="row">
      <div class="col-md-6">
         <input placeholder="Enter Your Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                               
          
            <div class="col-md-6">
          <input placeholder="Enter Your Email" id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
      </div>
    </div>

    <div class="container mt-3">
      <div class="row">
      <div class="col-md-6">
            <label for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>

            </div>
            <div class="col-md-6">
            <label for="password-confirm" class="  col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            </div>

      </div>
    </div>

    <div class="container">
      <div class="row">
      <div class="col-md-6">
   <input placeholder="Enter Your Password" id="password" type="password" class=" form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="col-md-6">
            <input placeholder="password-confirm" id="password-confirm" type="password" class=" form-control" name="password_confirmation" required autocomplete="new-password">

            </div>
      </div>
    </div>

    <div class="container mt-2">
      <div class="row">
            <div class="col-md-12">
            <label for="role" class=" col-form-label text-md-end">Please Select</label>
            </div>
            <div class="col-md-12">
                <select name="role_id" class="form-control">
                                <option value="2">Reader</option>
                                <option value="3">Author</option>
                               </select>
            </div>
      </div>
    </div>

        <div class="row">
          <div class="col-8 mt-3">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4 mt-3">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>


        </div>
    </div>
</div>


@endsection
