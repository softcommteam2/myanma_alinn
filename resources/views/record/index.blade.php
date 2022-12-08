@extends('admin.layouts.master')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Reports
            </li>
            <li class="breadcrumb-item active">Record</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-info-circle"></i>Report

                            </div>
                            <div class="card-body">
                                <form>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6col-sm-12 mt-1">
                                                <input type="text"
                                                    class="input-group rounded form-control bg-yellow text-dark"
                                                    style="text-align: center;" value="Sale Report">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mt-1">
                                                <input type="text"
                                                    class="input-group rounded form-control bg-yellow text-dark"
                                                    style="text-align: center;" value="Cash Report">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset
                                        style="border-radius: 0px 0px 30px 30px; background-color:#c8ced382; padding-top:2px;">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 mt-1" style="text-align: center;">
                                                    <a href="{{ url('record/item_sku_detail') }}" class="text-primary">Sale
                                                        by Item SKU Detail</a>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 mt-1" style="text-align: center;">
                                                    <a href="{{ url('record/customer_or_account') }}"
                                                        class="text-primary">By Customer or Account Type</a>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 mt-1" style="text-align: center;">
                                                    <a href="{{ url('record/item_sku_summary') }}" class="text-primary">Sale
                                                        by Item SKU Summary</a>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 mt-1" style="text-align: center;">
                                                    <a href="{{ url('record/daily_report') }}" class="text-primary">Daily
                                                        Profit</a>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 mt-1" style="text-align: center;">
                                                    <a href="{{ url('record/items') }}" class="text-primary">Sale by
                                                        Items</a>
                                                </div>
                                            </div>
                                        </fieldset>
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
