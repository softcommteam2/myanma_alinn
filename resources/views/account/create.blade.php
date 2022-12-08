@extends('admin.layouts.master')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Setup
            </li>
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item active">Account Register</li>
        </ol>

        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ url('accounts') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <i class="icon-note"></i> Account Register Form
                                    <div class="card-header-actions">
                                        <a class="card-header-action" href="{{ url('accounts') }}">
                                            <div class="btn btn-primary"><i class="fa fa-arrow-left"></i></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <fieldset>
                                            <div style="display: none;">
                                                <label class="switch switch-label switch-success">
                                                    <input type="hidden" name="status" value="0">
                                                    <input class="switch-input" type="hidden" checked name="status"
                                                        value="1">
                                                </label>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label>Account Name</label>
                                            <div class="input-group border border-info rounded">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">
                                                        <i class="fa fa-money "></i>
                                                    </span>
                                                </span>
                                                <input class="form-control" id="name" type="text" name="name">
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group pull-right">
                                            <input type="submit" name="Save" value="Save" class="btn btn-success">
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
