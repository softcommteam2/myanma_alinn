@extends('admin.layouts.app')

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
@section('content')
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">Dashboard</li>
      <!-- Breadcrumb Menu-->
      <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
          <a class="btn" href="#">
            <i class="icon-speech"></i>
          </a>
          <a class="btn" href="./">
            <i class="icon-graph"></i>  Dashboard</a>
          <a class="btn" href="#">
            <i class="icon-settings"></i>  Settings</a>
        </div>
      </li>
    </ol>
<form action="{{ url('users') }}" method="POST">
    @csrf
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <i class="icon-note"></i> User Register Form
                <div class="card-header-actions">
                  <a class="card-header-action" href="{{ url('users') }}">
                    <div class="btn btn-primary"><i class="fa fa-arrow-left"></i></div>
                  </a>
                </div>
              </div>

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  <fieldset>
                    <div class="radio-toolbar">
                        <input type="radio" id="radioManager" name="role_id" value="2" checked>
                        <label for="radioManager">Manager</label>

                        <input type="radio" id="radioCashier" name="role_id" value="3">
                        <label for="radioCashier">Cashier</label>
                    </div>
                  </fieldset>
                    <fieldset>
                        <div style="display: none;">
                            <label class="switch switch-label switch-success">
                                <input type="hidden" name="status" value="0">
                                <input class="switch-input" type="hidden" checked name="status" value="1">
                          </label>
                        </div>
                    </fieldset>
                  <fieldset class="form-group">
                    <label>User Name</label>
                    <div class="input-group border border-info rounded">
                      <span class="input-group-prepend">
                        <span class="input-group-text bg-primary">
                          <i class="fa fa-user"></i>
                        </span>
                      </span>
                      <input class="form-control" id="date" required name="name" type="text">
                    </div>
                  </fieldset>
                  <fieldset class="form-group">
                    <label>Email</label>
                    <div class="input-group border border-info rounded">
                      <span class="input-group-prepend">
                        <span class="input-group-text bg-primary">
                          <i class="fa fa-map"></i>
                        </span>
                      </span>
                      <input class="form-control" id="tin" type="email" required name="email">
                    </div>
                  </fieldset>
                  <fieldset class="form-group">
                    <label>Password</label>
                    <div class="input-group border border-info rounded">
                      <span class="input-group-prepend">
                        <span class="input-group-text bg-primary">
                          <i class="fa fa-building"></i>
                        </span>
                      </span>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </fieldset>
                  <fieldset class="form-group">
                    <label>Confirm Password</label>
                    <div class="input-group border border-info rounded">
                      <span class="input-group-prepend">
                        <span class="input-group-text bg-primary">
                          <i class="fa fa-address-book"></i>
                        </span>
                      </span>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </fieldset>
                  <fieldset class="form-group pull-right">
                    <input type="submit" value="Save" class="btn btn-success">
                    <button type="reset" class="btn btn-danger">Clear</button>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection



