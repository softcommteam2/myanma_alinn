{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}




<!DOCTYPE html>


<html lang="en">
 <head>
   <base href="./">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
   <meta name="author" content="Łukasz Holeczek">
   <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
   <title>Kyae Mone</title>
   <!-- Icons-->
   <link href="vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
   <link href="vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
   <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <link href="vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
   <!-- Main styles for this application-->
   <link href="css/style.css" rel="stylesheet">
   <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
 </head>
 <body class="app flex-row align-items-center">
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-md-8">
         <div class="card-group" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;">
           <div class="card p-4">
             <form action="{{ route('login') }}" method="POST">
              @csrf
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-muted">Sign In to your account</p>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-at"></i>
                        </span>
                      </div>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                    </div>
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-lock"></i>
                        </span>
                      </div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="current-password">

                                     @error('password')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <button type="submit" class="btn btn-primary px-4">
                         {{ __('Login') }}
                     </button>
                      </div>
                      {{-- <div class="col-6 text-right">
                        <a href="{{ url('register') }}" class="btn btn-link px-0">Register</a>
                      </div> --}}
                    </div>
                  </div>
             </form>
           </div>
           <div class="card text-white py-5 d-md-down-none" style="width:44%">
             <div class="card-body text-center">
               <img src="images/login_mirror_blue.png" alt="login_mirror_blue.png" style="width: 244px; height:226px; margin-right:20px;">
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- CoreUI and necessary plugins-->
   <script src="vendors/jquery/js/jquery.min.js"></script>
   <script src="vendors/popper.js/js/popper.min.js"></script>
   <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
   <script src="vendors/pace-progress/js/pace.min.js"></script>
   <script src="vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
   <script src="vendors/@coreui/coreui-pro/js/coreui.min.js"></script>
 </body>
</html>
