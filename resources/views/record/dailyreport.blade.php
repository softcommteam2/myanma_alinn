@extends('admin.layouts.app')

@section('content')
<style type="text/css" media="print">
    .hide
    {
        display: none;
    }
    body{
        visibility: hidden;
        display: none;
   }
   .print-container, .print-container * {
        visibility:visible
   }
   .print-container {
       position: relative;
       top: 0px;
        left: 0px;
        right: 0px;
   }
</style>
@php
        $dt = new DateTime();
    @endphp
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
        <li class="breadcrumb-item active">Sales List</li>
    </ol>
    <div class="container-fluid">
        <div class=" mx-auto mt-8 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="grid grid-cols-3">
                            <div class="col-span-1">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4 print-container">
                                    <div class="card-header py-3 card-header-color">
                                        <div class="float-left">
                                            <h1 class="text-2xl leading-6 font-medium text-gray-900 text-left">
                                                ၅၂လမ်း ကြေးမုံသတင်းစာတိုက်နေ့စဉ်ကြော်ငြာစာရင်း
                                            </h1>
                                        </div>
                                        <div class=" float-right">
                                            <a class="card-header-action hide" href="#" onclick="window.print();return false;">
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
                                                    {{-- @dd($sales); --}}
                                                    <form action="" method="GET">
                                                        @csrf
                                                    <tr>
                                                        {{-- @dd($sale); --}}
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
                                                        {{-- @dd($sale); --}}
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

@endsection
@endsection

