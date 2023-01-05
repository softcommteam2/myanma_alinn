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
    <title>Myanma_Alinn</title>
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
    body
    {
        font-size: 22px;
        font-weight: bold;
        background-color: #ffffff;
    }
</style>
<body>

    <form method="post">
        @csrf
            <div class="card hide">
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
                <div class="card-body ">
                        <div class="float-right">
                            <a href="{{ url('home') }}" class="hide btn btn-warning pull-right ml-1"><span class="fa fa-arrow-left"></span> GO BACK</a>
                            <input type="submit" value="Search" class="btn btn-success">
                            <a href="{{ url('record/item_sku_summary') }}" class="btn btn-secondary">Show All</a>
                            <a class="pull-right ml-2" href="#" onclick="window.print();return false;">
                                <small class="hide btn btn-info"><i class="fa fa-print"></i></small>
                            </a>
                        </div>
                </div>
            </div>
        </form>
        <h1 style="text-align: center;">
            မြန်မာ့အလင်း သတင်းစာတိုက်
        </h1>
        <h3 class="text-2xl leading-6 font-medium text-gray-900 text-left">
            @if (!empty($start_date))
            Sales List between "{{$start_date}}" 1:00AM and "{{$end_date}}" 1:00PM.
            @else

            @endif
        </h3>
        <table class="table table-responsive-sm table-striped">
            <thead class="floral-white">
                <tr>
                    <th onclick="sortTable(0)">No</th>
                    <th onclick="sortTable(1)">SKU</th>
                    <th onclick="sortTable(2)">Item</th>
                    <th>Discount</th>
                    <th>Total Inches</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($sales as $sale )
                {{-- @dd($sales); --}}
                <form action="{{url('sales/'.$sale->id)}}" method="POST" >
                    @csrf
                    @method('DELETE')
                <tr>
                    {{-- @dd($start_date) --}}
                    {{-- @dd($sale); --}}
                    <td>{{ $i++ }}</td>

                    @if (!empty($start_date))
                    <td><a href="{{url('/record/item_sku_summary_detail/'.$sale->itemsku_id.'/'.$start_date.'/'.$end_date)}}" target="_blank">{{ $sale->itemsku->name }}</a></td>
                    @else
                    <td>{{ $sale->itemsku->name }}</td>
                    @endif
                    <td>{{ $sale->item->name }} (Kyats {{ $sale->price }}) </td>
                    {{-- @dd( $sale->item); --}}
                    <td id="col1">{{ "$sale->sumdiscount", 2}} </td>
                    <td id="col2">{{ $sale->sumtotinch }}</td>
                    <td id="col3">{{ number_format("$sale->sumamount", 2) }} </td>
                    {{-- @dd($sale); --}}
                </tr>
                </form>
                @endforeach
                <tr>
                    <td colspan="3" align="right"><b>Total</b></td>
                    <td><i id="totaldiscount" ></i> </td>
                    <td><i id="totalquantity" ></i></td>
                    {{-- <td><i  id="totalamount" ></i> </td> --}}
                    <td><i> {{ number_format("$totalAmountSum", 2) }}</i> </td>
                </tr>
            </tbody>
        </table>



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
            var a = (sum_total_discount).toLocaleString('en');
            document.getElementById('totaldiscount').innerHTML = a;
        });
</script>

<script type="text/javascript">
    $(function() {
            var sum_total_quantity = 0;
            $("tr #col2").each(function(index,value){
                getEachRow = parseFloat($(this).text());
                sum_total_quantity += getEachRow
            });
            document.getElementById('totalquantity').innerHTML = sum_total_quantity;
        });
</script>

<script type="text/javascript">
    $(function() {
            var sum_total_amount = 0;
            $("tr #col3").each(function(index,value){
                getEachRow = parseFloat($(this).text());
                sum_total_amount += getEachRow
            });
            var a = (sum_total_amount).toLocaleString('en');
            document.getElementById('totalamount').innerHTML = a;
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
