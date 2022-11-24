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
    html
    {
        font-size: 22px;
        font-weight: bold;
    }
</style>
<body>

    <form method="POST" class="hide">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <strong class="h6">Start Date</strong>
                        <div class="input-group border border-info rounded">
                            <input type="date" class="form-control" id="txtstartDate" name="start_date" value="" >
                        </div>
                    </div>
                    <div class="col">
                        <strong class="h6">End Date</strong>
                        <div class="input-group border border-info rounded">
                            <input type="date" class="form-control" id="txtendDate" name="end_date" value="" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label><strong>Search With</strong></label>
                    </div>
                    <div class="col">
                        <select required class="form-control"  id="txtItem" name="item_id" >
                            <option value="" selected >Choose Item</option>
                            @foreach ($items as $item )
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="submit" value="Search" class="btn btn-success">
                        <a href="{{ url('record/items') }}" class="btn btn-secondary">Show All</a>
                        <a class="pull-right ml-2" href="#" onclick="window.print();return false;">
                            <small class="hide btn btn-info"><i class="fa fa-print"></i></small>
                        </a>
                        <a href="{{ url('home') }}" class="hide btn btn-warning pull-right ml-1"><span class="fa fa-arrow-left"></span> GO BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <h1 style="text-align: center;">
        ၅၂လမ်း ကြေးမုံသတင်းစာတိုက်နေ့စဉ်ကြော်ငြာစာရင်း
    </h1>
    <h3 class="text-2xl leading-6 font-medium text-gray-900 text-left">
        @if (!empty($start_date))
        {{ $item_name[0] }} - Sales List between "{{$start_date}}" 1:00AM and "{{$end_date}}" 1:00PM
        {{-- @dd($item_name) --}}
        @elseif(!empty($item_name))
        {{ $item_name[0] }} - Sales List
        @endif
    </h3>
    <table class="table table-responsive-sm table-striped">
        @php
            $i =1;
        @endphp
        <thead class="floral-white">
            <tr>
                <th onclick="sortTable(0)">စဉ်</th>
                <th onclick="sortTable(1)">ကြော်ငြာအမှတ်စဉ်</th>
                <th>လက်မပေါင်း</th>
                <th>သင့်ငွေ</th>
            </tr>
        </thead>
        <tbody id="result">
            @foreach ($sales as $sale )
            <form action="{{url('sales/'.$sale->id)}}" method="POST" >
                @csrf
                @method('DELETE')
            <tr>
                {{-- @dd($sale); --}}
                <td>{{ $i++ }}</td>
                <td>{{ $sale->itemsku->name }} - {{$sale->sale_voucher_sku_id}}</td>
                <td id="inches">{{ $sale->total_inches }}</td>
                <td id="amount">{{$sale->total_amount }}</td>
            </tr>
            </form>
            @endforeach
            <tr>
                <td colspan="2" align="right"><b>Total</b></td>
                {{-- <td style="text-align:right"><i id="totaldiscount" ></i> </td> --}}
                <td><i id="totalinches" ></i></td>
                <td><i id="totalamount" ></i> </td>
            </tr>
        </tbody>
    </table>

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
    <script src="{{asset('asset/buttons.print.min.js')}}"></script>
        <script src="{{asset('asset/jquery1a.min.js')}}"></script>

        <script>
            $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            } );
        } );
        </script>

        <script type="text/javascript">
            $(function() {
                    var sum_total_discount = 0;
                    $("tr #col1").each(function(index,value){
                        getEachRow = parseFloat($(this).text());
                        sum_total_discount += getEachRow
                    });
                    var sumdiscount = (sum_total_discount).toLocaleString('en');
                    document.getElementById('totaldiscount').innerHTML = sumdiscount;
                });

            $(function() {
                    var sum_total_inches = 0;
                    $("tr #inches").each(function(index,value){
                        getEachRow = parseFloat($(this).text());
                        sum_total_inches += getEachRow
                    });
                    document.getElementById('totalinches').innerHTML = sum_total_inches;
                });

            $(function() {
                    var sum_total_amount = 0;
                    $("tr #amount").each(function(index,value){
                        getEachRow = parseFloat($(this).text());
                        sum_total_amount += getEachRow
                    });
                    var sumamount = (sum_total_amount).toLocaleString('en');
                    document.getElementById('totalamount').innerHTML = sumamount;
                });
        </script>



        <script type="text/javascript">
            $(document).ready(function() {
            var sHiddenStartDate = $.trim($('#lblStartDate').text());
            var sHiddenEndDate = $.trim($('#lblEndDate').text());

            // You call datepicker then setup your value for that input box
            $('#txtstartDate').datepicker().val(sHiddenStartDate);
            $('#txtFinishDate').datepicker().val(sHiddenEndDate);
        });
        </script>
</body>
</html>
