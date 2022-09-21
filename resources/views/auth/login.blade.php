@extends('layouts.app')
@section('content')

<style>
    body{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

  <div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="text-center col-md-4">
        <div class=" card card-outline card-warning">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
        <div>
            <div class="row">
                <div class="col-md-5">
                <label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>

                </div>
                <div class="col-md-12">
                <input placeholder="Enter Your Email" id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
                </div>
            </div>
                           
                           
         
        <div class="input-group mb-3">
        <div >
            <div class="row">
                <div class="col-md-4 ">
                <label  for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>

                </div>
                
     <input placeholder="Enter Your Password" id="password" type="password" class="ml-3 col-md-12 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                </div>
            

                            
                           
      
        <div class="row">
          <div class="col-md-6">
            <div class="icheck-primary">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>


              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="row mb-0">
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-block btn-primary ">
                                  <b>{{ __('Login') }}</b>  
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-warning">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
      <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

        </div>
    </div>
  </div>
  
@endsection

