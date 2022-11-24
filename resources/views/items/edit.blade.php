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
            Setup
        </li>
        <li class="breadcrumb-item">Itmes</li>
        <li class="breadcrumb-item active">Items Edit</li>
        </ol>
        <!-- Start of code -->
        <form action="{{ url('items/'.$items->id) }}" method="POST">
            @method('PATCH')
            @csrf
            {{-- @dd($items); --}}
            <div class="card-header">
                <i class="icon-note"></i> Item Update Form
                <div class="card-header-actions">
                    <a class="card-header-action" href="{{ url('items') }}">
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
                        <label>Item Name</label>
                        <div class="input-group border border-info rounded">
                            <input class="form-control" id="name" type="text" required name="name" value="{{ $items->name }}">
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Category</label>
                        <div class="input-group border border-info rounded">
                            <select required class="form-control"  id="category-dropdown" name="category_id" >
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if ($category->id == $items->category->id)
                                        selected
                                    @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>

                            {{-- <input hidden class="form-control" id="category_id" type="text" required value="{{ $items->category->id }}" name="category_id" >
                            <input readonly class="form-control"  type="text" required value="{{ $items->category->name }}" > --}}
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Item SKU</label>
                        <div class="input-group border border-info rounded">
                            {{-- <select required class="form-control"  id="itemsku-dropdown" name="itemsku_id" >{{ $items->itemsku->name }}</select> --}}
                            {{-- <input hidden class="form-control" id="itemsku_id" type="text" required value="{{ $items->itemsku->id }}" name="itemsku_id">
                            <input readonly class="form-control"  type="text" required value="{{ $items->itemsku->name }}" > --}}
                            <select required class="form-control"  id="category-dropdown" name="itemsku_id" >
                                @foreach ($itemsku as $sku)
                                <option  value="{{ $sku->id }}"
                                    @if ($sku->id == $items->itemsku->id)
                                        selected
                                    @endif>{{ $sku->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </fieldset>


                        <fieldset class="form-group">
                            <label>Item Price</label>
                            <div class="input-group border border-info rounded">
                                <input class="form-control" id="price" type="text" required value="{{ $items->price }}" name="price">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Cost Price</label>
                            <div class="input-group border border-info rounded">
                                <input class="form-control" id="cost_price" type="text" required value="{{ $items->cost_price }}" name="cost_price">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Brand</label>
                            <div class="input-group border border-info rounded">
                                <input class="form-control" id="brand" type="text" required value="{{ $items->brand }}" name="brand">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Item Stock Amount</label>
                            <div class="input-group border border-info rounded">
                                <input class="form-control" id="stock_amount" type="text" required value="{{ $items->stock_amount }}" name="stock_amount">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Description</label>
                            <div class="input-group border border-info rounded">
                                <input class="form-control" id="description" type="text" required value="{{ $items->description }}" name="description">
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="input-group">
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





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#category-dropdown').on('change', function() {
                var category_id = this.value;

                $("#itemsku-dropdown").html('');
                $.ajax({
                    url:"api/items",
                    type: "POST",
                    data: {
                        category_id: category_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType : 'json',
                    success: function(result){
                        console.log(result);
                        $('#itemsku-dropdown').html('<option value="{{ $items->itemsku->id }}">{{ $items->itemsku->name }}');
                        $.each(result,function(key,value){

                            $("#itemsku-dropdown").append('<option value="{{ $items->itemsku->id}}">{{ $items->itemsku->name }}</option>');;
                        });
                    }
                });
            });

        });
        </script>

        @endsection

