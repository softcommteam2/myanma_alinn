@extends('admin.layouts.app')

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
@if(empty($role->id))
<form action="{{ url('role') }}" method="POST">
    @csrf
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <i class="icon-note"></i> Role Register Form
                <div class="card-header-actions">
                  <a class="card-header-action" href="{{ url('role') }}">
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
@else
    <form action="{{ url('role/'.$role->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="container-fluid">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <i class="icon-note"></i> Role Register Form
                      <div class="card-header-actions">
                        <a class="card-header-action" href="{{ url('role') }}">
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
                          <label>Role</label>
                          <div class="input-group border border-info rounded">
                            <span class="input-group-prepend">
                              <span class="input-group-text bg-primary">
                                <i class="fa fa-money "></i>
                              </span>
                            </span>
                            <input required type="text" id="name" name="name" class="form-control mw-100" value="{{ $role->name }}"/>
                          </div>
                        </fieldset>
                      @endif

                <fieldset class="form-group pull-right">
                    <input type="submit" value="Save" class="btn btn-success">
                    <button type="reset" class="btn btn-danger">Cancel</button>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row-->
      </div>
    </div>
  </main>


@endsection

@section('script')

@endsection



