@extends('admin.layouts.master')

@section('content')
    <!-- Main Code Start-->
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Setup
            </li>
            <li class="breadcrumb-item active">Category</li>
            <li class="breadcrumb-item active">Category Edit</li>
        </ol>
        <!-- Start of code -->
        <form action="{{ url('category/' . $category->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card-header">
                    <i class="icon-note"></i> Category Edit Form
                    <div class="card-header-actions">
                        <a class="card-header-action" href="{{ url('category') }}">
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
                            <label>Category Name</label>
                            <div class="input-group border border-info rounded">
                                <span class="input-group-prepend">
                                    <span class="input-group-text bg-primary">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                                <input required type="text" id="name" name="name" class="form-control"
                                    value="{{ $category->name }}" />
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Description</label>
                            <div class="input-group border border-info rounded">
                                <span class="input-group-prepend">
                                    <span class="input-group-text bg-primary">
                                        <i class="fa fa-info"></i>
                                    </span>
                                </span>
                                <textarea required name="description" id="description" cols="50" rows="3" class="form-control mw-100">{{ $category->description }}</textarea>
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
