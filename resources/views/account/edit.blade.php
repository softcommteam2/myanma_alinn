@extends('admin.layouts.master')

@section('content')
    <!-- Main Code Start-->
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Setup
            </li>
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item active">Account Edit</li>
        </ol>
        <!-- Start of code -->
        <form action="{{ url('accounts/' . $accounts->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card-header">
                    <i class="icon-note"></i> Account Edit Form
                    <div class="card-header-actions">
                        <a class="card-header-action" href="{{ url('accounts') }}">
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
                            <label>Account Name</label>
                            <div class="input-group border border-info rounded">
                                <span class="input-group-prepend">
                                    <span class="input-group-text bg-primary">
                                        <i class="fa fa-money "></i>
                                    </span>
                                </span>
                                <input class="form-control" id="name" type="text" name="name"
                                    value="{{ $accounts->name }}">
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
