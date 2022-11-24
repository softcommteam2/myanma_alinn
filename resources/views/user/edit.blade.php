@extends('admin.layouts.app')

@section('content')


    <body class="app main-bg header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

        <div class="app-body">

    <!-- Left Nav Bar -->
    <div class="sidebar">
        <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Navigation</li>
            <a class="nav-link"  href="{{ url('home') }}">
                <i class="nav-icon icon-home"></i> Home</a>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle">
                <i class="nav-icon icon-puzzle"></i> Setup</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('customer') }}">
                        <i class="nav-icon icon-puzzle"></i> Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('items') }}">
                        <i class="nav-icon icon-puzzle"></i> Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('itemsku') }}">
                        <i class="nav-icon icon-puzzle"></i> Item SKU</a>
                    </li>
                    <li class="nav-item hover:main-bg">
                        <a class="nav-link" href="{{ url('category') }}">
                        <i class="nav-icon icon-puzzle"></i> Item Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('accounts') }}">
                        <i class="nav-icon icon-puzzle"></i> Accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('users') }}">
                        <i class="nav-icon icon-puzzle"></i> Users</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('sales') }}">
                <i class="nav-icon icon-drop"></i> Sales</a>
            </li>
        {{--
            <li class="nav-item">
                <a class="nav-link" href="{{ url('report') }}">
                <i class="nav-icon icon-pencil"></i> Reports</a>
            </li>
        --}}
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle">
                <i class="nav-icon icon-pencil"></i> Reports</a>
                <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('timeframe') }}">
                    <i class="nav-icon icon-pencil"></i> Time Frame</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('record') }}">
                    <i class="nav-icon icon-pencil"></i> Record</a>
                </li>
                </ul>
            </li>

            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <!-- Left Nav Bar END-->


    <!-- Main Code Start-->
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
        <form action="{{ url('users/'.$users->id) }}" method="POST">
            @method('PATCH')
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
                        <form>
                            <fieldset>
                                <div class="pull-right">
                                    <label class="switch switch-label switch-success">
                                        <input type="hidden" name="status" value="0">
                                        <input class="switch-input" type="checkbox" checked name="status" value="1">
                                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
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
                              <input class="form-control" id="date" required name="name" type="text" value="{{ $users->name }}" >
                            </div>
                          </fieldset>
                          @if ($users->role_id==="2")
                          <fieldset>
                            <div class="radio-toolbar">
                                <input type="radio" id="radioManager" name="role_id" value="2" checked>
                                <label for="radioManager">Manager</label>

                                <input type="radio" id="radioCashier" name="role_id" value="3">
                                <label for="radioCashier">Cashier</label>
                            </div>
                          </fieldset>
                          @elseif ($users->role_id==="3")
                          <fieldset>
                            <div class="radio-toolbar">
                                <input type="radio" id="radioManager" name="role_id" value="2" >
                                <label for="radioManager">Manager</label>

                                <input type="radio" id="radioCashier" name="role_id" value="3"checked>
                                <label for="radioCashier">Cashier</label>
                            </div>
                          </fieldset>
                          @endif
                          <fieldset class="form-group">
                            <label>Email</label>
                            <div class="input-group border border-info rounded">
                              <span class="input-group-prepend">
                                <span class="input-group-text bg-primary">
                                  <i class="fa fa-map"></i>
                                </span>
                              </span>
                              <input class="form-control" id="tin" type="email" required value="{{ $users->email }}" name="email">
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
                              <input class="form-control" id="ssn" type="password" required name="password" >
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
                    {{-- Buttons --}}
                    <fieldset class="form-group pull-right mt-1">
                        <input type="submit" value="Register" class="btn btn-success">
                    </fieldset>
                    {{-- Buttons END --}}
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </form>
    </main>

    <!-- Main Code END -->
    </div>

@endsection

