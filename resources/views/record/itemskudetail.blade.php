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
    body
    {
        font-size: 19px;
        font-weight: 400;
        background-color: #ffffff;

    }
    /* .print-area{
        transform: rotateY(0deg) rotate(90deg);
        margin-top: 100px;
        margin-right: 400px;
        width:2000px;
    } */
    @page{
        size: A4 landscape;
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
                        <select class="form-control"  id="account" name="account" >
                            <option value="" selected >All Account </option>
                            @foreach ($accounts as $account )
                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select required class="form-control"  id="itemsku" name="itemsku" >
                            <option value="" selected >Choose Item SKU</option>
                            @foreach ($itemsku as $sku )
                                <option value="{{ $sku->id }}">{{ $sku->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <input type="submit" value="Search" class="btn btn-success">
                        <a href="{{ url('record/item_sku_detail') }}" class="btn btn-secondary">Show All</a>
                        <a class="pull-right ml-2" href="#" onclick="window.print();return false;">
                            <small class="hide btn btn-info"><i class="fa fa-print"></i></small>
                        </a>
                        <a href="{{ url('home') }}" class="hide btn btn-warning pull-right ml-1"><span class="fa fa-arrow-left"></span> GO BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="print-area">
    <h3 style="text-align: center;">
        မြန်မာ့အလင်း သတင်းစာတိုက်
    </h3>
    <h5 class=" mt-4">
        {{-- @dd($itemsku_name) --}}
        @if(!empty($itemsku_name) && ($start_date) && ($end_date) && ($account_id))
        {{ $itemsku_name->name }} - Sales List between "{{$start_date}}" 1:00AM and "{{$end_date}}" 1:00PM. Account Type:{{ $paid->name }}


        @elseif(!empty($itemsku_name) && ($start_date) && ($end_date) )
        {{ $itemsku_name->name }} - Sales List between "{{$start_date}}" 1:00AM and "{{$end_date}}" 1:00PM. Account Type: ALL

        @elseif(!empty($itemsku_name) && ($account_id))
        {{ $itemsku_name->name }} - Sales List. Account Type:{{ $paid->name }}

        @elseif(!empty($itemsku_name))
        {{ $itemsku_name->name }} - Sales List. Account Type: ALL

        @endif
    </h5>
    <table class="table table-responsive-sm table-bordered">
        @php
            $i =1;
        @endphp
            <thead class="floral-white">
                <tr>
                    <th onclick="sortTable(0)">စဉ်</th>
                    <th onclick="sortTable(1)">ကြော်ငြာအမှတ်စဉ်</th>
                    <th>Sale Date</th>
                    <th onclick="sortTable(2)">အမည်</th>
                    <th>အကြောင်းအရာ</th>
                    <th>အရွယ်အစား</th>
                    <th>အကြိမ်</th>
                    <th>လက်မပေါင်း</th>
                    <th>သင့်ငွေ</th>
                    <th>Account</th>
                    <th>ပါရှိနေစွဲမှတ်ချက်</th>
                </tr>
            </thead>
            <tbody id="result">
                @foreach ($sales as $sale )
                <form action="{{url('sales/'.$sale->id)}}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $sale->itemsku->name }} - {{$sale->sale_voucher_sku_id}}</td>
                        <td>{{ $sale->sale_date->format('d-m-Y') }}</td>
                        <td>{{ $sale->customer->name }}</td>
                        <td>{{ $sale->description }}</td>
                        <td style="text-align: right">{{ $sale->columns }} x {{ $sale->inches }}</td>
                        <td style="text-align: right">{{ $sale->times }}</td>
                        <td id="inch" style="text-align: right">{{ $sale->total_inches }}</td>
                        {{-- <td id="col3" style="text-align: right">{{number_format( "$sale->total_amount", 2 )}}</td> --}}
                        <td id="amount" style="text-align: right">{{$sale->total_amount}}</td>
                        <td>{{ $sale->account->name}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                    @if ($itemsku != NULL)
                    <tr>
                        <td colspan="7" align="right"><b>Total</b></td>
                        <td style="text-align:right"><i id="totalinches" ></i></td>
                        <td style="text-align:right"><i id="totalamount" ></i> </td>
                    </tr>
                @endif

                </form>
            </tbody>
    </table>
    </div>
    @if($status== 'paginate')
        <div class="d-flex justify-content-center">
            {!! $sales->links() !!}
        </div>
    @endif
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

    <script type="text/javascript">

        $(function() {
                var sum_total_amount = 0;
                $("tr #inch").each(function(index,value){
                    getEachRow = parseFloat($(this).text());
                    sum_total_amount += getEachRow
                });
                var a = (sum_total_amount).toLocaleString('en');
                document.getElementById('totalinches').innerHTML = a;
            });
        $(function() {
                var sum_total_amount = 0;
                $("tr #amount").each(function(index,value){
                    getEachRow = parseFloat($(this).text());
                    sum_total_amount += getEachRow
                });
                var a = (sum_total_amount).toLocaleString('en');
                document.getElementById('totalamount').innerHTML = a;
            });
    </script>
</body>
</html>
