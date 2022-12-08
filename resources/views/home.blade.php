@extends('admin.layouts.master')

@section('content')
    {{-- $count = DB::table('goods')->count(); --}}
    @php
        $count_item = DB::table('items')->count();
        $count_customer = DB::table('customers')->count();
        $count_sale = DB::table('sales')->count();
        $sum_sale = DB::table('sales')->sum('total_amount');
    @endphp
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
        </ol>
        <div class="container">
            <div class="animated fadeIn">
                <div class="card-group mb-4">
                    <div class="row">
                        <!-- /.col-->
                        <div class="col-6 col-lg-4">
                            <a href="{{ url('items') }}">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <i class="fa fa-archive bg-success p-3 font-2xl mr-3"></i>
                                        <div>
                                            <div class="text-value-sm text-success">Items</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-4">
                            <a href="{{ url('sales') }}">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <i class="fa fa-file-o bg-primary p-3 font-2xl mr-3"></i>
                                        <div>
                                            <div class="text-value-sm text-primary">Sale</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-4">
                            <a href="{{ url('customer') }}">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <i class="fa fa-user-o bg-danger p-3 font-2xl mr-3"></i>
                                        <div>
                                            <div class="text-value-sm text-danger">Customer</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-3">
                            <a href="{{ url('timeframe') }}">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <i class="fa fa-clock-o bg-primary p-3 font-2xl mr-3"></i>
                                        <div>
                                            <div class="text-value-sm text-primary">Timeframe</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-3">
                            <a href="{{ url('record/item_sku_summary') }}">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <i class="fa fa-list-alt bg-info p-3 font-2xl mr-3"></i>
                                        <div>
                                            <div class="text-value-sm text-info">Sale By Item SKU Summary</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-3">
                            <a href="{{ url('record/item_sku_detail') }}">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <i class="fa fa-file-text-o bg-warning p-3 font-2xl mr-3"></i>
                                        <div>
                                            <div class="text-value-sm text-warning">Sale by Item SKU Detail</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-3">
                            <a href="{{ url('record/items') }}">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <i class="fa fa-file bg-danger p-3 font-2xl mr-3"></i>
                                        <div>
                                            <div class="text-value-sm text-danger">Sale by Items</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-6">
                            <a href="{{ url('record/customer_or_account') }}">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <i class="fa fa-user-o bg-success p-3 font-2xl mr-3"></i>
                                        <div>
                                            <div class="text-value-sm text-success">Credit by Customer or By Account</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-6">
                            <a href="{{ url('record/daily_report') }}">
                                <div class="card">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <i class="fa fa-calendar-o bg-primary p-3 font-2xl mr-3"></i>
                                        <div>
                                            <div class="text-value-sm text-primary">Daily Report</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /.col-->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
