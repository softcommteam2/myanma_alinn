@extends('admin.layouts.master')

@section('content')

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Setup
            </li>
            <li class="breadcrumb-item">Item SKu</li>
            <li class="breadcrumb-item active">SKU Register</li>
        </ol>
        <form action="{{ url('itemsku') }}" method="POST">
            @csrf
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="icon-note"></i> Item SKU Register Form
                                    <div class="card-header-actions">
                                        <a class="card-header-action" href="{{ url('itemsku') }}">
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
                                            <label>Itemsku</label>
                                            <div class="input-group border border-info rounded">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text bg-primary">
                                                        <i class="fa fa-money "></i>
                                                    </span>
                                                </span>
                                                <input required type="text" id="name" name="name"
                                                    class="form-control mw-100" />
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label>Category</label>
                                            <div class="input-group border border-info rounded">
                                                <select required class="form-control" id="category_id" name="category_id">
                                                    <option value="" selected>Choose Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
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
                    <!-- /.row-->
                </div>
            </div>
    </main>

@section('script')
@endsection
@endsection
