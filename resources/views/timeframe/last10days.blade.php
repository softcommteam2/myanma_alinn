<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="./../">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Kyay Mone</title>
    @yield('script_links')
    <!-- Icons-->
    <link href="{{asset('vendors/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
    <link href="{{asset('vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="{{asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    {{-- toggle --}}
    <link href="{{asset('asset/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <script src="{{asset('asset/bootstrap-toggle.min.js')}}"></script>
    {{-- select2 CDN  --}}
    <link href="{{asset('asset/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/sweetalert.css')}}" rel="stylesheet">
</head>
<style media="print">
    .hide{
        display: none;
    }
</style>
<body>

    <div style="margin-bottom: 60px;">
        <div class="col-12"><h1 style="text-align: center;">၅၂လမ်း ကြေးမုံသတင်းစာတိုက်</h1></div>
    </div>
    <div>
        <form method="POST" class="hide">
            @csrf
            {{-- <a onclick="ExportToExcel('xlsx')" class="btn btn-success pull-right m-1"><span class="fa fa-file-excel-o"></span></a> --}}
            <a onclick="window.print();return false;" " class="btn btn-danger pull-right m-1"><span class="fa fa-file-pdf-o"></span></a>
            <a href="{{ url('/timeframe') }}" class="btn btn-warning pull-right m-1"><span class="fa fa-arrow-left"></span> GO BACK</a>
        </form>
    </div>
    <h4 class="card-title">
        Last 10 Day's {{$date->format('d-m-Y')}} - {{$today->format('d-m-Y')}} </h4>
    <table class="table table-responsive-sm table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>SaleVoucher No.</th>
                <th>ItemSKU No.</th>
                <th>Sales Date</th>
                <th>Customer Name</th>
                <th>Account Name</th>
                <th>Discount Amount</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($sales as $sale )
            <form action="{{url('sales/'.$sale->id)}}" method="POST" >
                @csrf
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $sale->sale_voucher }}</td>
                <td>{{ $sale->item->itemsku->name }} - {{$sale->sale_voucher_sku_id}}</>
                <td>{{ $sale->sale_date->format('d-m-Y H:i')  }}</td>
                <td>{{ $sale->customer->name }}</td>
                <td>{{ $sale->account->name }}</td>
                <td style="text-align: right">{{ $sale->discount_amount}} </td>
                <td style="text-align: right">{{ number_format($sale->total_amount) }} </td>
            </tr>
            </form>
            @endforeach
        </tbody>
    </table>


    @section('script')
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="assets/js/front.js"></script>
</body>
</html>
