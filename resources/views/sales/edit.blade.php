@extends('admin.layouts.master')

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
                <i class="icon-graph"></i>  Dashboard</a>
            <a class="btn" href="#">
                <i class="icon-settings"></i>  Settings</a>
            </div>
        </li>
        </ol>
    <form action="{{ url('sales/'.$sales->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <i class="icon-note"></i> Sale Update Form
                    <div class="card-header-actions">
                    <a class="card-header-action" href="{{ url('sales') }}">
                        <div class="btn btn-primary"><i class="fa fa-arrow-left"></i></div>
                    </a>
                    </div>
                </div>
                <div class="card-body" x-data="calc()">
                    <form>
                        <div class="row">
                            <div class="col">
                              <div class="card">
                                <div class="card-header">Customer Information</div>
                                <div class="card-body">
                                    <fieldset class="form-group">
                                        <div class="row">
                                                <div class="col-12 mb-3">
                                                    <strong class="h6">Customer</strong>
                                                    <div class="input-group border border-info rounded">
                                                        {{-- <input type="text" hidden readonly class="form-control" id="customer_id" name="customer_id" required value="{{ $sales->customer->id }}">
                                                        <input type="text" readonly class="form-control" required value="{{ $sales->customer->name }}"> --}}
                                                        <select required class="form-control"  id="customer_id" name="customer_id" required >
                                                            <option value="{{ $sales->customer->id }}" selected>{{ $sales->customer->name }}</option>
                                                            @foreach ($customers as $customer )
                                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="input-group-append">
                                                            <button class="btn btn-primary" type="button">Create</button>
                                                        </span> --}}
                                                    </div>
                                                </div>
                                                <hr>
                                            <div class="col-lg-4 col-md-4 col-sm-12 mt-1">
                                                <strong class="h6">Record Date</strong>
                                                <div class="input-group border border-info rounded">
                                                    <input type="date" class="form-control" id="record_date" name="record_date" required value="{{ $sales->record_date->format('Y-m-d') }}" >

                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-12 mt-1">
                                                <strong class="h6">Received Date</strong>
                                                <div class="input-group border border-info rounded">
                                                    <input type="datetime" readonly class="form-control" name="received_date" required value="{{ $sales->received_date->format('Y-m-d') }}" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 mt-1">
                                                <strong class="h6">Specified Date</strong>
                                                <div class="input-group border border-info rounded">
                                                    <input type="datetime" readonly class="form-control" name="specified_date" required value="{{ $sales->specified_date->format('Y-m-d') }}" >
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
                                                <strong class="h6">Description</strong>
                                                <textarea name="description" required class="input-group border border-info rounded form-control" cols="30" rows="3">{{ $sales->description }}</textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-1">
                                                <strong class="h6">Account</strong>
                                                <div class="input-group border border-info rounded">
                                                    <select class="form-control mw-100 text-gray-700"  id="paid_id" name="paid_id" required >
                                                        @foreach ($accounts as $account)
                                                            <option value="{{ $account->id }}" class="text-gray-700"
                                                                @if ($account->id == $sales->account->id)
                                                                    selected
                                                                @endif
                                                                >{{ $account->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mt-1">
                                                <strong class="h6">Payment Comment</strong>
                                                <textarea name="payment_comment" id="" class="input-group border border-info rounded form-control" cols="30" rows="1.5">{{ $sales->payment_comment }}</textarea>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 mt-1">
                                                <label class="switch switch-label switch-success">
                                                    <input type="hidden" name="status" value="0">
                                                    <input class="switch-input" type="checkbox" checked name="status" value="1">
                                                <span class="switch-slider" data-checked="On" data-unchecked="Off" style="margin-top: 26px;"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                              </div>
                            </div>

                            <div class="col">
                                <div class="card">
                                  <div class="card-header">Items Information</div>
                                  <div class="card-body">
                                    <fieldset class="form-group" >
                                        <div class="row" >
                                            <div class="col-12 mt-1">
                                                <strong class="h6">Items</strong>
                                                <div class="input-group border border-info rounded">
                                                    {{-- <input type="text" hidden readonly class="form-control" id="item_id" name="item_id" required value="{{ $sales->item->id }}" placeholder="{{ $sales->item->name }}">
                                                    <input type="text" readonly class="form-control" required value="{{ $sales->item->name }}" > --}}
                                                    <select required class="form-control"  id="item" name="item_id" disabled>
                                                        {{-- <option value="{{ $sales->item->id }}" selected>{{ $sales->item->name }}</option> --}}
                                                        @foreach ($items as $item )
                                                            <option data-price="{{ $item->price }}" value="{{ $item->id }}"
                                                                @if ($item->id == $sales->item->id)
                                                                    selected
                                                                @endif>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <span class="input-group-append">
                                                        <button class="btn btn-primary" type="button">Create</button>
                                                    </span> --}}
                                                </div>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <strong class="h6">Inches</strong>
                                                {{-- <input type="number" id="inches" oninput="validate(this)" required name="inches" onkeypress="return onlyNumberKey(event)"  onkeyup="qty()" class="input-group border border-info rounded form-control" value="{{ $sales->inches}}"> --}}
                                                <input type="number" step=".01" id="inches" oninput="validate(this)" required name="inches" onkeypress="return onlyNumberKey(event)"  onkeyup="qty()" class="input-group border border-info rounded form-control" value="{{ $sales->inches}}" >
                                            </div>
                                            <div class="col-6 mt-1">
                                                <strong class="h6">Columns</strong>
                                                <input type="number" required name="columns" onkeypress="return onlyNumberKey(event)"  id="columns" onkeyup="qty()" class="input-group border border-info rounded form-control" value="{{ $sales->columns }}" >
                                            </div>
                                            <div class="col-6 mt-1">
                                                <strong class="h6">Quanity</strong>
                                                <input type="number" readonly required name="quantity" onkeypress="return onlyNumberKey(event)"  id="quantity" onkeyup="totpri()" class="input-group border border-info rounded form-control" value="{{ $sales->quantity }}" >
                                            </div>
                                            <div class="col-6 mt-1">
                                                <strong class="h6">Price</strong>
                                                {{-- @for ($items as $item ) --}}
                                                <input type="number" readonly required name="price" onkeypress="return onlyNumberKey(event)"  id="price" onkeyup="totpri()" class="price input-group border border-info rounded form-control" value="{{ $sales->price }}" >
                                                {{-- @endfor --}}
                                            </div>
                                            <div class="col-6 mt-1">
                                                <strong class="h6">Total Price</strong>
                                                <input type="number" readonly required name="total_price" onkeypress="return onlyNumberKey(event)"  id="total_price" onkeyup="totamt()" class="input-group border border-info rounded form-control" value="{{ $sales->total_price }}" >
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-6 mt-1">
                                                <strong class="h6">Times (No.of days displayed)</strong>
                                                <input type="number" required name="times" onkeypress="return onlyNumberKey(event)" onkeyup="totamtwtimes()"  id="times" class="input-group border border-info rounded form-control" value="{{ $sales->times }}" >
                                            </div>
                                            <div class="col-6 mt-1">
                                                <strong class="h6">Discount Amount</strong>
                                                <input type="number" required name="discount_amount" onkeypress="return onlyNumberKey(event)"  id="discount_amount" onkeyup="totamt()" class="input-group border border-info rounded form-control" value="{{ $sales->discount_amount }}" >
                                            </div>
                                            <div class="col-12 mt-1">
                                                <strong class="h6">Total Amount</strong>
                                                <input type="text" readonly required name="total_amount" onkeypress="return onlyNumberKey(event)"  id="total_amount" class="input-group border border-info rounded form-control" value="{{ $sales->total_amount }}" >
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
                                                <strong class="h6">Comments</strong>
                                                <textarea required  name="comments" id="" class="input-group border border-info rounded form-control" cols="30" rows="3">{{ $sales->comments }}</textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                </div>
                            </div>
                        </div>
                    <fieldset class="form-group pull-right mt-1">
                        <input type="submit" value="Update" class="btn btn-success">
                    </fieldset>
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

    <!-- Script -->
    <script>




    </script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>



        <script type="text/javascript">
        let date = document.getElementById("record_date").value;
        var strToDate = new Date(date);
        let date_int = parseInt(date);


        // var myArray = date_int.split("");
        // var test = myArray - 1;
        // alert(test)


        // const myArray = date.split(" ");
        // alert(myArray[0]);

        function nextDay()
        {

            let tomorrow = date_int + 1
            let month_year = "-6-2022"
            // let full_yesterday = yesterday
            // alert(tomorrow + '' + month_year);
            document.getElementById("record_date").value = tomorrow + '' + month_year;
        }

        function previousDay()
        {

            let yesterday = date_int - 1
            let month_year = "-6-2022"
            // let full_yesterday = yesterday
            // alert(tomorrow + '' + month_year);
            document.getElementById("record_date").value = yesterday + '' + month_year;
        }
        // alert(value_date)
        // let current_date_part = current_date.getDay(current_date);
        // alert(current_date_part);

        // var nextDay = new Date(current_date);
        // nextDay.setDate(current_date.getDate() + 1);
        // alert(nextDay)


            function qty() {
                var inches = document.getElementById('inches').value;
                var columns = document.getElementById('columns').value;
                var result = parseFloat(inches) * parseFloat(columns);
                if (!isNaN(result)) {
                    document.getElementById('quantity').value = result;
                }
            }
            function totpri() {
                var quantity = document.getElementById('quantity').value;
                var price = document.getElementById('price').value;
                var result = parseFloat(quantity) * parseFloat(price);
                if (!isNaN(result)) {
                    document.getElementById('total_price').value = result;
                }
            }
            function totamt() {
                var total_price = document.getElementById('total_price').value;
                var discount_amount = document.getElementById('discount_amount').value;
                var result = parseFloat(total_price) - parseFloat(discount_amount);
                if (!isNaN(result)) {
                    document.getElementById('total_amount').value = result;
                }
            }

        </script>

        <script  type="text/javascript">
            $('#item').on('change', function(){
            var  price = $(this).children('option:selected').data('price');
            $('#price').val(price);
            });
        </script>
    <!-- Script END-->

@endsection
