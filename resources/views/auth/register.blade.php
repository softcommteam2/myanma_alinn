
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
  <style>
    .radio-toolbar {
  margin-top: 10px;
  margin-bottom: 10px;
}

.radio-toolbar input[type="radio"] {
  opacity: 0;
  position: fixed;
  width: 0;
}

.radio-toolbar label {
    display: inline-block;
    background-color: #eaf3f3;
    padding: 10px 20px;
    font-family: sans-serif, Arial;
    font-size: 16px;
    border: 1px solid #444;
    border-radius: 4px;
}

.radio-toolbar label:hover {
  background-color: #3ba8d8;
}

.radio-toolbar input[type="radio"]:focus + label {
    /* border: 2px dashed #444; */
}

.radio-toolbar input[type="radio"]:checked + label {
    background-color: #3ba8d8;
    border-color: rgb(41, 132, 206);
}
</style>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-8" style="box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px; border-radius: 30px;">
            <div class="card-body p-4">
              <h1>Register</h1>
              <p class="text-muted">Create your account</p>
              <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
                <div class="row mb-3">
                    <div>
                        <input type="radio" id="radioManager" name="role_id" value="2" checked>
                        <label for="radioManager">Manager</label>

                        <input type="radio" id="radioCashier" name="role_id" value="3">
                        <label for="radioCashier">Cashier</label>
                    </div>
                </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
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
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
              </div>
              <div class="input-group mb-4" style="display: none;">
                <p class="form-control">Status</p>
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <input type="checkbox" checked>
                  </span>
                </div>
              </div>
              {{-- <button class="btn btn-block btn-success" type="button" style="border-radius: 10px 100px / 120px;">Create Account</button> --}}
              <button type="submit" class="btn btn-block btn-success" type="button" style="border-radius: 10px 100px / 120px;">
                {{ __('Register') }}
            </button>
              </form>
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
