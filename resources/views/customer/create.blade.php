@extends('admin.layouts.app')


@section('content')
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Setup</li>
      <li class="breadcrumb-item">
        <a href="{{ url('customer') }}">Customer</a>
      </li>
      <li class="breadcrumb-item active">Customer Register</li>
    </ol>
<form action="{{ url('customer') }}" method="POST">
    @csrf
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <i class="icon-note"></i> Customer Register Form
                <div class="card-header-actions">
                  <a class="card-header-action" href="{{ url('customer') }}">
                    <div class="btn btn-primary"><i class="fa fa-arrow-left"></i></div>
                  </a>
                </div>
              </div>
              <div class="card-body">
                  <input type="text" value="1" hidden name="status">
                <form>
                    <fieldset>
                        <div style="display: none;">
                            <label class="switch switch-label switch-success">
                                <input type="hidden" name="status" value="0">
                                <input class="switch-input" type="hidden" checked name="status" value="1">
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
                      <input class="form-control" id="date" name="name" type="text">
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
                      <input class="form-control" id="phone" type="text" name="phone">
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
                      <input class="form-control" id="tin" type="text" name="township">
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
                      <input class="form-control" id="ssn" type="text" name="city">
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
                      <input class="form-control" id="eyescript" type="text" name="address">
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
@section('script')

<script>
    $(function() {
      $('#toggle-two').bootstrapToggle({
        on: 'Enabled',
        off: 'Disabled'
      });
    })
  </script>

@endsection
@endsection




