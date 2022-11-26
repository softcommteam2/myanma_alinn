@extends('admin.layouts.app')

@section('content')

<style media="print">
    .hidden {
        display: none;
    }
    body
    {
        background-color: #ffffff;
    }
</style>

<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="#">Admin</a>
        </li>
        <li class="breadcrumb-item active">Sale List</li>
    </ol>
    <div class="container-fluid">
        <div class=" mx-auto mt-8 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="grid grid-cols-3">
                            <div class="col-span-1">

                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 card-header-color">
                                        <div class="row">
                                        <div class="col float-left">
                                            <h1 class="text-2xl leading-6 font-medium text-gray-900 text-left pb-3 pl-2">
                                                Sales List
                                            </h1>
                                            @if (!empty($selectedmonth))
                                            <b>{{ $selectedmonth }} (YYYY-MM)</b>
                                            @else

                                            @endif
                                        </div>
                                        <div class="col">
                                        <form action="{{ url('timeframe/bymonth_search') }}" method="GET" class="hidden">
                                            @csrf
                                            <div name="searchbar" class="input-group border border-info rounded">
                                                <input type="month" name="search" placeholder="Search here"class="form-control">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary">Search</button>
                                                </span>
                                            </form>
                                            </div>
                                        </div>
                                        <div class="col" >
                                            <form method="POST" class="hidden" >
                                                @csrf
                                                <a onclick="ExportToExcel('xlsx')" class="btn btn-success pull-right m-1"><span class="fa fa-file-excel-o"></span></a>
                                                <a onclick="window.print();return false;" " class="btn btn-danger pull-right m-1"><span class="fa fa-file-pdf-o"></span></a>

                                                <a href="{{ url('/timeframe') }}" class="btn btn-warning pull-right m-1"><span class="fa fa-arrow-left"></span> GO BACK</a>
                                            </form>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="card border-0" id="printArea">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="records" style="width:100%">
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
                                                        <td style="text-align: right">{{ number_format($sale->timeprice) }} </td>
                                                        <td style="text-align: right">{{ $sale->discount_amount}} </td>
                                                        <td style="text-align: right">{{ number_format($sale->total_amount) }} </td>
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
                                                </tbody>
                                            </table>

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


<!-- This is the script for Excel export-->
<script type="text/javascript">
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('tbl_exporttable');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
            XLSX.writeFile(wb, fn || ('TodayReport.' + date + '.' + (type || 'xlsx')));
    }
    </script>
<!-- This is the script for PDF export-->
<script type="text/javascript">
    function ExportToPDF() {
            html2canvas(document.getElementById('tbl_exporttable'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500,
                            height: 75
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Today.pdf");
                }
            });
        }
</script>
<script>
    function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("dataTable");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc";
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /*check if the two rows should switch place,
        based on the direction, asc or desc:*/
        if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
            }
        } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
            }
        }
        }
        if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        //Each time a switch is done, increase this count by 1:
        switchcount ++;
        } else {
        /*If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again.*/
        if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
        }
        }
    }
    }
</script>

<script>
    function searchFunction() {
    // Declare variables
    var input, filter, table, tr, name, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        name = tr[i].getElementsByTagName("td")[1];
        if (name) {
        txtValue = name.textContent || name.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>

    <script type="text/javascript">
        var tot_amt=document.getElementById('total_amount');
        tot_amt=tot_amt.LocaleString("en-US");

        colsole.log(tot_amt);
    </script>
@endsection


@endsection

