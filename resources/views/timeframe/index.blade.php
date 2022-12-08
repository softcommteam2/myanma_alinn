@extends('admin.layouts.master')

@section('script_links')
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="assets/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="assets/https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Favicon-->
    <link href='https://www.soengsouy.com/favicon.ico' rel='icon' type='image/x-icon' />
@endsection

@section('content')
    @php
        $dt = new DateTime();
    @endphp

    <style>
        .dropbtn {
            cursor: pointer;
            /* padding-left: 178px; */
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #000000;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: rgb(0, 0, 0);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #0d7be2
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #printArea * {
                visibility: visible;
            }

            #printArea {
                position: relative;
                left: 0;
                top: 0;
                /* padding: 50px; */
            }

            #notPrint {
                display: none;
            }
        }
    </style>


    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Reports</li>
            <li class="breadcrumb-item active">Timeframe</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="icon-calendar"></i><?= $dt->format('Y-m-d') ?>
                                <div class="card-header-actions hide">
                                    <a class="card-header-action" href="{{ url('sales') }}" id="hide">
                                        <div class="btn btn-primary"><i class="fa fa-arrow-left"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body" style="position: relative">
                                @if (session()->has('message'))
                                    <p class="btn btn-success btn-block btn-sm custom_message text-left"
                                        style="margin-top: 10px;">{{ session()->get('message') }}</p>
                                @endif

                                <div id="notPrint">
                                    <form method="POST">
                                        @csrf
                                        <fieldset class="form-group" id="se_date" style="display:auto;">
                                            <div class="row">
                                                <div class="col-4">
                                                    <small class="text-primary h6">Start Date</small>
                                                    <div class="input-group border border-info rounded">
                                                        <input type="date" class="form-control" name="start_date"
                                                            id="start_date">
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <small class="text-primary h6">End Date</small>
                                                    <div class="input-group border border-info rounded">
                                                        <input type="date" class="form-control" name="end_date"
                                                            id="end_date">
                                                    </div>
                                                </div>
                                                <div class="col-3 mt-4">
                                                    <input type="submit" value="Search" class="btn btn-success">
                                                    <a href="{{ url('timeframe') }}" class="btn btn-secondary">ShowAll</a>
                                                    <a class="btn btn-info" href="#"
                                                        onclick="window.print(); return false;"><i
                                                            class="fa fa-print"></i></a>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </form>
                                    <fieldset class="form-group">
                                        <hr class="bg-primary">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <form method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-12 mt-1">
                                                    <div class="dropdown">
                                                        <label for="Daily Report"
                                                            class="form-control bg-warning text-dark dropbtn"
                                                            style="text-align: center;appearance: none;">Daily
                                                            Report</label>
                                                        <div class="dropdown-content">
                                                            <a href="{{ url('timeframe/today') }}"
                                                                class="btn btn-primary">Today</a>
                                                            <a href="{{ url('timeframe/last3days') }}"
                                                                class="btn btn-primary">Last 3 Days</a>
                                                            <a href="{{ url('timeframe/last7days') }}"
                                                                class="btn btn-primary">Last 7 Days</a>
                                                            <a href="{{ url('timeframe/last10days') }}"
                                                                class="btn btn-primary">Last 10 Days</a>
                                                            <a href="{{ url('timeframe/last14days') }}"
                                                                class="btn btn-primary">Last 14 Days</a>
                                                        </div>
                                                        {{-- <button type="" class="btn btn-primary" name="getToday">Today</button> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-12 mt-1">
                                                    <div class="dropdown">
                                                        <label for="Weekly Report"
                                                            class="form-control bg-warning text-dark dropbtn"
                                                            style="text-align: center;appearance: none;">Weekly
                                                            Report</label>
                                                        <div class="dropdown-content">
                                                            <a href="{{ url('timeframe/thisweek') }}"
                                                                class="btn btn-primary">This Week</a>
                                                            <a href="{{ url('timeframe/previousweek') }}"
                                                                class="btn btn-primary">Previous Week</a>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-12 mt-1">
                                                    <div class="dropdown">
                                                        <label for="Monthly Report"
                                                            class="form-control bg-warning text-dark dropbtn"
                                                            style="text-align: center;appearance: none;">Monthly
                                                            Report</label>
                                                        <div class="dropdown-content">
                                                            <a href="{{ url('timeframe/thismonth') }}"
                                                                class="btn btn-primary">This Month</a>
                                                            <a href="{{ url('timeframe/previousmonth') }}"
                                                                class="btn btn-primary">Previous Month</a>
                                                            <a href="{{ url('timeframe/bymonth') }}"
                                                                class="btn btn-primary">Choose Month</a>
                                                            {{-- <a class="btn btn-primary" onclick="change()">Choose Month</a> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3 col-sm-12 mt-1">
                                                    <div class="dropdown">
                                                        <label for="Yearly Report"
                                                            class="form-control bg-warning text-dark dropbtn"
                                                            style="text-align: center;appearance: none;">Yearly
                                                            Report</label>
                                                        <div class="dropdown-content">
                                                            <a href="{{ url('timeframe/thisyear') }}"
                                                                class="btn btn-primary">This Year</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </fieldset>
                                </div>
                                <hr class="bg-primary">
                                <div class="card border-0" id="printArea">
                                    <div class="table-responsive">
                                        <h3 class="text-2xl leading-6 font-medium text-gray-900 text-left">
                                            @if (!empty($start_date))
                                                Sales List between "{{ $start_date }}" 1:00AM and "{{ $end_date }}"
                                                1:00PM.
                                            @else
                                            @endif
                                        </h3>
                                        <table class="table table-striped table-bordered" id="records"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>SaleVoucher No.</th>
                                                    <th>ItemSKU No.</th>
                                                    <th>Sales Date</th>
                                                    <th>Customer Name</th>
                                                    <th>Account Name</th>
                                                    <th>Total Amount</th>
                                                    <th>Discount Amount</th>
                                                    <th>Balance</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="DataTable">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($sales as $sale)
                                                    <form action="{{ url('sales/' . $sale->id) }}" method="POST">
                                                        @csrf
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $sale->sale_voucher }}</td>
                                                            <td>{{ $sale->item->itemsku->name }} -
                                                                {{ $sale->sale_voucher_sku_id }}</>
                                                            <td>{{ $sale->sale_date->format('d-m-Y H:i') }}</td>
                                                            <td>{{ $sale->customer->name }}</td>
                                                            <td>{{ $sale->account->name }}</td>
                                                            <td style="text-align: right">
                                                                {{ number_format($sale->timeprice) }} </td>
                                                            <td style="text-align: right">{{ $sale->discount_amount }}
                                                            </td>
                                                            <td style="text-align: right">
                                                                {{ number_format($sale->total_amount) }} </td>
                                                            @if ($sale->cancel == '1')
                                                                <td><span class="bg-warning rounded p-1">Cancelled</span>
                                                                </td>
                                                            @else
                                                                @if ($sale->status == '1')
                                                                    <td><span class="bg-green rounded p-1">Active</span>
                                                                    </td>
                                                                @else
                                                                    <td><span class="bg-danger rounded p-1">Banned</span>
                                                                    </td>
                                                                @endif
                                                            @endif
                                                        </tr>
                                                    </form>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>
        </div>
    </main>
@section('script')
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="assets/vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="assets/js/front.js"></script>
@endsection
@endsection
