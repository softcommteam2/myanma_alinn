@extends('admin.layouts.master')

@section('content')
    <style type="text/css" media="print">
        .hide {
            display: none;
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
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 card-header-color">
                                        <div class="float-left">
                                            <h3 class="text-2xl leading-6 font-medium text-gray-900 text-left pb-3 pl-2">
                                                Sales List Search By Customer and Account Type
                                            </h3>
                                            <h5 class="text-2xl leading-6 font-medium text-gray-900 text-left">
                                                @if (!empty($search))
                                                    Sale form searched by {{ $search }} on <?= $dt->format('d-m-Y') ?>
                                                @else
                                                @endif
                                            </h5>
                                        </div>
                                        <div class=" float-right">

                                            <form action="{{ url('record/cusoracc_search') }}" method="GET">
                                                @csrf
                                                <div class="row">
                                                    <div name="searchbar"
                                                        class="hide input-group border border-info rounded">
                                                        <input type="text" name="search"
                                                            placeholder="Search here"class="form-control">
                                                        <span class="input-group-append">
                                                            <button class="hide btn btn-primary">Search</button>
                                                        </span>
                                                        <a href="{{ url('record/customer_or_account') }}"
                                                            class="hide btn btn-secondary">Refresh</a>
                                                        @if (!empty($search))
                                                            <a class="pull-right m-1" href="#"
                                                                onclick="window.print();return false;">
                                                                <small class="hide btn btn-info"><i
                                                                        class="fa fa-print"></i></small>
                                                            </a>
                                                        @else
                                                        @endif
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card-body grid grid-cols-3 grid gap-2">
                                        <table class="table table-striped table-bordered datatable" id="dataTable">

                                            <thead class="floral-white">
                                                <tr>
                                                    <th onclick="sortTable(0)">ID</th>
                                                    <th onclick="sortTable(1)">Customer</th>
                                                    <th>Sale Voucher</th>
                                                    <th>Item SKU</th>
                                                    <th>Sales Date</th>
                                                    <th>Total</th>
                                                    <th>Tax</th>
                                                    <th>Paid</th>
                                                    <th>Account</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sales as $sale)
                                                    <form action="{{ url('sales/' . $sale->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <tr>
                                                            <td>{{ $sale->id }}</td>
                                                            <td>{{ $sale->customer->name }}</td>
                                                            <td>{{ $sale->sale_voucher }}</td>
                                                            <td>{{ $sale->itemsku->name }}</td>
                                                            <td>{{ $sale->sale_date->format('d-m-Y H:i') }}</td>
                                                            <td style="text-align: right">
                                                                {{ number_format("$sale->timeprice", 2) }} </td>
                                                            <td style="text-align: right">
                                                                {{ number_format("$sale->discount_amount", 2) }} </td>
                                                            <td style="text-align: right">
                                                                {{ number_format("$sale->total_amount", 2) }} </td>
                                                            <td>{{ $sale->account->name }}</td>
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

                                        @if (!empty($search))
                                        @else
                                            <div class="d-flex justify-content-center">
                                                {!! $sales->links() !!}
                                            </div>
                                        @endif

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
                            shouldSwitch = true;
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
                    switchcount++;
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
        var tot_amt = document.getElementById('total_amount');
        tot_amt = tot_amt.LocaleString("en-US");

        colsole.log(tot_amt);
    </script>
@endsection
@endsection
