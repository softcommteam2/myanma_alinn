@extends('admin.layouts.master')

@section('content')

    <body class="app main-bg header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

        <div class="app-body">

            <!-- Left Nav Bar -->
            <div class="sidebar">
                <nav class="sidebar-nav">
                    <ul class="nav">
                        <li class="nav-title">Navigation</li>
                        <a class="nav-link" href="{{ url('home') }}">
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
                    <li class="breadcrumb-item active">Customer Edit</li>
                </ol>
                <form action="{{ url('customer/' . $customer->id) }}" method="POST">

                    @method('PATCH')
                    @csrf
                    <div class="container-fluid">
                        <div class="animated fadeIn">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="icon-note"></i> Customer Update Form
                                            <div class="card-header-actions">
                                                <a class="card-header-action" href="{{ url('customer') }}">
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
                                                            <input class="switch-input" type="checkbox" checked
                                                                name="status" value="1">
                                                            <span class="switch-slider" data-checked="On"
                                                                data-unchecked="Off"></span>
                                                        </label>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label>Customer Name</label>
                                                    <div class="input-group border border-info rounded">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text bg-primary">
                                                                <i class="fa fa-user"></i>
                                                            </span>
                                                        </span>
                                                        <input class="form-control" id="date" required name="name"
                                                            type="text" value="{{ $customer->name }}">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label>Customer Phone</label>
                                                    <div class="input-group border border-info rounded">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text bg-primary">
                                                                <i class="fa fa-phone"></i>
                                                            </span>
                                                        </span>
                                                        <input class="form-control" id="phone" type="text"
                                                            required name="phone" value="{{ $customer->phone }}">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label>Township</label>
                                                    <div class="input-group border border-info rounded">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text bg-primary">
                                                                <i class="fa fa-map"></i>
                                                            </span>
                                                        </span>
                                                        <input class="form-control" id="tin" type="text"
                                                            required name="township" value="{{ $customer->township }}">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label>City</label>
                                                    <div class="input-group border border-info rounded">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text bg-primary">
                                                                <i class="fa fa-building"></i>
                                                            </span>
                                                        </span>
                                                        <input class="form-control" id="ssn" type="text"
                                                            required name="city" value="{{ $customer->city }}">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label>Address</label>
                                                    <div class="input-group border border-info rounded">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text bg-primary">
                                                                <i class="fa fa-address-book"></i>
                                                            </span>
                                                        </span>
                                                        <input class="form-control" id="eyescript" type="text"
                                                            required name="address" value="{{ $customer->address }}">
                                                    </div>

                                                </fieldset>
                                                {{-- Buttons --}}
                                                <fieldset class="form-group pull-right mt-1">
                                                    <input type="submit" value="Update" class="btn btn-success">
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
