{{-- <link href="{{asset('vendors/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
<link href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
<link href="{{asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
<link href="{{asset('css/style.css') }}" rel="stylesheet">
<link href="{{asset('vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
<link href="{{asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{asset('asset/bootstrap-toggle.min.css')}}" rel="stylesheet">
<script src="{{asset('asset/bootstrap-toggle.min.js')}}"></script>
<link href="{{asset('asset/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('asset/sweetalert.css')}}" rel="stylesheet">

@section('content')
<style type="text/css" media="print">
    .hide
    {
        display: none;
    }
</style>
@php
        $dt = new DateTime();
    @endphp
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
        <li class="breadcrumb-item active">Sales List</li>
    </ol>
    <div class="container-fluid">
        <div class=" mx-auto mt-8 sm:px-6 lg:px-8">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="grid grid-cols-3">
                            <div class="col-span-1">
                                <div class="card shadow mb-4 print-container">
                                    <div class="card-header py-3 card-header-color">
                                        <div class="float-left">
                                            <h1 class="text-2xl leading-6 font-medium text-gray-900 text-left">
                                                ၅၂လမ်း ကြေးမုံသတင်းစာတိုက်နေ့စဉ်ကြော်ငြာစာရင်း
                                            </h1>
                                        </div>
                                        <div class=" float-right">
                                            <a class="card-header-action" href="#" onclick="window.print();return false;">
                                                <small class="btn btn-info"><i class="fa fa-print"></i></small>
                                            </a>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <b>Daily Profit <?=$dt->format('Y-m-d');?> 1:00 AM to 1:00PM</b>
                                    </div>
                                    <div class="card-body grid grid-cols-3 grid gap-2">
                                        <table class="table table-striped table-bordered datatable" id="dataTable example">
                                                <thead class="floral-white">
                                                    <tr>
                                                        <th onclick="sortTable(0)"> No</th>
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
                                                    <form action="" method="GET">
                                                        @csrf
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $sale->itemsku->name }}</td>
                                                        <td>{{ $sale->itemsku->category->name }} (Kyats {{ number_format("$sale->price", 2) }})</td>
                                                        <td id="col1" style="text-align: right">{{ number_format("$sale->discount_amount", 2)}} </td>
                                                        <td id="col2" style="text-align: right">{{ $sale->quantity }}</td>
                                                        <td id="col3" style="text-align: right">{{number_format("$sale->total_amount", 2) }}</td>
                                                        @if ($sale->cancel=="1")
                                                        <td><span class="bg-warning rounded p-1">Cancelled</span></td>
                                                        @else
                                                            @if ($sale->status=="1")
                                                            <td><span class="bg-green rounded p-1">Active</span></td>
                                                            @else
                                                            <td><span class="bg-danger rounded p-1">Banned</span></td>
                                                            @endif
                                                        @endif
                                                    </tr>
                                                    </form>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3" align="right"><b>Total</b></td>
                                                        <td style="text-align: right"><i>{{ number_format("$DiscountSum", 2)}}</i> </td>
                                                        <td style="text-align: right"><i id="totalquantity"></i></td>
                                                        <td style="text-align: right"><i>{{ number_format("$AmountSum", 2)}}</i> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</main>

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('vendors/jquery/js/jquery.min.js') }}"></script>
<script src="{{asset ('vendors/popper.js/js/popper.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/pace-progress/js/pace.min.js') }}"></script>
<script src="{{ asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('vendors/@coreui/coreui-pro/js/coreui.min.js') }}"></script>
<script src="{{ asset('asset/select2_jquery.min.js') }}"></script>
<script src="{{asset('asset/jquery-3.6.0.js')}}" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{asset('asset/select2.min.js')}}"></script>
<script src="{{asset('asset/axios.min.js')}}"></script>
<script src="{{asset('asset/sweetalert2.min.js')}}"></script>
<script src="{{asset('sweetalert2@11.js')}}"></script>
<script type="text/javascript">
    $(function() {
        var sum_total_quantity = 0;
        $("tr #col2").each(function(index,value){
            getEachRow = parseFloat($(this).text());
            sum_total_quantity += getEachRow
        });
        document.getElementById('totalquantity').innerHTML = sum_total_quantity;
    });

    $(function() {
        var sum_total_amount = 0;
        $("tr #col3").each(function(index,value){
            getEachRow = parseFloat($(this).text());
            sum_total_amount += getEachRow
        });
        var a = (sum_total_amount).toLocaleString('en');
        document.getElementById('totalamount').innerHTML = a;
    });

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
 --}}


<link href="{{asset('vendors/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
<link href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
<link href="{{asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
<link href="{{asset('css/style.css') }}" rel="stylesheet">
<link href="{{asset('vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
<link href="{{asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{asset('asset/bootstrap-toggle.min.css')}}" rel="stylesheet">
<script src="{{asset('asset/bootstrap-toggle.min.js')}}"></script>
<link href="{{asset('asset/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('asset/sweetalert.css')}}" rel="stylesheet">
<style type="text/css" media="print">
body{
    background-color: #ffffff;
}
    .hide
    {
        display: none;
    }
</style>

<body>
    <div class="container">
        <div class="pull-right">
            <a class="btn btn-primary" href="#" onclick="window.print();return false;">Print</a>
            <a href="{{url('record')}}" class="btn btn-primary">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        </div>
        <div>
            <h1 class="text-center mt-3">မြန်မာ့အလင်း သတင်းစာတိုက်</h1>
            <p class="mt-5">Daily Profit {{date("d-m-y")}} 1:00 AM to 1:00PM</p>
        </div>
    </div>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>SKU</th>
                    <th>Item</th>
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
                <form action="" method="GET">
                    @csrf
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $sale->itemsku->name }}</td>
                    <td>{{ $sale->itemsku->category->name }} (Kyats {{ number_format("$sale->price", 2) }})</td>
                    <td id="col1" style="text-align: right">{{ number_format("$sale->discount_amount", 2)}} </td>
                    <td id="col2" style="text-align: right">{{ $sale->quantity }}</td>
                    <td id="col3" style="text-align: right">{{number_format("$sale->total_amount", 2) }}</td>
                    @if ($sale->cancel=="1")
                    <td><span class="bg-warning rounded p-1">Cancelled</span></td>
                    @else
                        @if ($sale->status=="1")
                        <td><span class="bg-green rounded p-1">Active</span></td>
                        @else
                        <td><span class="bg-danger rounded p-1">Banned</span></td>
                        @endif
                    @endif
                </tr>
                </form>
                @endforeach
                <tr>
                    <td colspan="3" align="right"><b>Total</b></td>
                    <td style="text-align: right"><i>{{ number_format("$DiscountSum", 2)}}</i> </td>
                    <td style="text-align: right"><i id="totalquantity"></i></td>
                    <td style="text-align: right"><i>{{ number_format("$AmountSum", 2)}}</i> </td>
                </tr>
            </tbody>                       
        </table>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('vendors/jquery/js/jquery.min.js') }}"></script>
<script src="{{asset ('vendors/popper.js/js/popper.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/pace-progress/js/pace.min.js') }}"></script>
<script src="{{ asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('vendors/@coreui/coreui-pro/js/coreui.min.js') }}"></script>
<script src="{{ asset('asset/select2_jquery.min.js') }}"></script>
<script src="{{asset('asset/jquery-3.6.0.js')}}" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{asset('asset/select2.min.js')}}"></script>
<script src="{{asset('asset/axios.min.js')}}"></script>
<script src="{{asset('asset/sweetalert2.min.js')}}"></script>
<script src="{{asset('sweetalert2@11.js')}}"></script>

<script type="text/javascript">
    $(function() {
        var sum_total_quantity = 0;
        $("tr #col2").each(function(index,value){
            getEachRow = parseFloat($(this).text());
            sum_total_quantity += getEachRow
        });
        document.getElementById('totalquantity').innerHTML = sum_total_quantity;
    });

    $(function() {
        var sum_total_amount = 0;
        $("tr #col3").each(function(index,value){
            getEachRow = parseFloat($(this).text());
            sum_total_amount += getEachRow
        });
        var a = (sum_total_amount).toLocaleString('en');
        document.getElementById('totalamount').innerHTML = a;
    });

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
</body>