@extends('admin.layouts.master')

@section('content')

    @php
        
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
                                    <div class="card-header card-header-color">
                                        <div class="float-left">
                                            <h4 class="text-2xl font-medium text-gray-900 text-left">
                                                Sales List
                                            </h4>
                                        </div>

                                        <div class=" float-right">
                                            {{-- <a href="{{ route('search') }}" class="items-center px-3 py-2 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-success float-left m-2 " >
                                                <i class="fa fa-plus"></i>
                                            </a> --}}

                                            <a href="{{ url('sales_showall') }}" class="btn btn-warning">Show_All</a>
                                            <a href="{{ url('sales') }}" class="btn btn-secondary">Refresh</a>
                                            <a class="btn btn-primary" href="{{ url('sales/create') }}">
                                                + Add New
                                            </a>
                                        </div>
                                        {{-- <label>
                                            Search by Customer, ItemSKU & Sale Date-Format [YYYY-MM-DD]
                                        </label> --}}
                                    </div>
                                    <div class="card-body grid grid-cols-3 grid gap-2">
                                        <form action="{{ url('sales_search') }}" method="GET">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" name="search"
                                                            placeholder="Search here"class="form-control">
                                                        <span class="input-group-append">
                                                            <button class="btn btn-primary">Search</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @if (session()->has('alertMsg'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Congrats,</strong> {{ session()->get('alertMsg') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <table class="table table-striped table-bordered datatable mt-2" id="dataTable">

                                            <thead class="floral-white">
                                                <tr>
                                                    <th>No.</th>
                                                    <th onclick="sortTable(0)">SaleVoucher No.</th>
                                                    <th onclick="sortTable(0)">ItemSKU No.</th>
                                                    <th onclick="sortTable(1)">Customer</th>
                                                    <th>Sales Date</th>
                                                    <th>Account</th>
                                                    <th>Total Amount</th>
                                                    <th>Discount Amount</th>
                                                    <th> Balance</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($sales as $sale)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $sale->sale_voucher }}</td>
                                                        <td>{{ $sale->item->itemsku->name }} -
                                                            {{ $sale->sale_voucher_sku_id }}</td>
                                                        <td>{{ $sale->customer->name }}</td>
                                                        <td>{{ $sale->sale_date->format('d-m-Y H:i') }}</td>
                                                        <td>{{ $sale->account->name }}</td>
                                                        <td style="text-align: right">
                                                            {{ number_format("$sale->timeprice", 2) }} </td>
                                                        <td style="text-align: right">
                                                            {{ number_format("$sale->discount_amount", 2) }} </td>
                                                        <td style="text-align: right">
                                                            {{ number_format("$sale->total_amount", 2) }} </td>
                                                        @if ($sale->cancel == '1')
                                                            <td><span class="bg-warning rounded p-1">Cancelled</span></td>
                                                        @else
                                                            @if ($sale->status == '1')
                                                                <td><span class="bg-green rounded p-1">Active</span></td>
                                                            @else
                                                                <td><span class="bg-danger rounded p-1">Banned</span></td>
                                                            @endif
                                                        @endif

                                                        @if (Auth::user()->role->id == 3)
                                                            <td>
                                                                <a class="btn btn-warning"
                                                                    href="{{ url('sales/' . $sale->id . '') }}"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Print to Sales" name="print">
                                                                    <i class="fa fa-print"></i>
                                                                </a>
                                                                <button data-toggle="tooltip" onclick="cash()"
                                                                    data-placement="top" title="Edit to Sales"
                                                                    class="btn btn-info disabled"><i
                                                                        class="fa fa-edit"></i></button>
                                                                <button data-toggle="tooltip" onclick="cash()"
                                                                    data-placement="top" title="Delete to Sales"
                                                                    class="btn btn-danger disabled"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <form action="{{ url('sales_cancel/' . $sale->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <a class="btn btn-info"
                                                                        href="{{ url('sales/' . $sale->id . '/edit') }}"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Edit to Sales" name="Edit">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a class="btn btn-warning"
                                                                        href="{{ url('sales/' . $sale->id . '') }}"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Print to Sales" name="print">
                                                                        <i class="fa fa-print"></i>
                                                                    </a>
                                                                    @if ($sale->cancel == '1')
                                                                        <button id="myBtn" onclick="myFunction()"
                                                                            disabled class="btn btn-danger" type="submit"
                                                                            name="cancel"><i
                                                                                class="fa fa-ban"></i></button>
                                                                    @else
                                                                        <button id="myBtn" onclick="myFunction()"
                                                                            class="btn btn-danger" type="submit"
                                                                            name="cancel"><i
                                                                                class="fa fa-ban"></i></button>
                                                                    @endif
                                                                </form>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    </form>
                                                @endforeach

                                            </tbody>
                                        </table>

                                        <div class="d-flex justify-content-center">
                                            {!! $sales->links() !!}
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function myFunction() {
            Swal.fire('Sale has been cancelled')
        }

        function cash() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            })
        }
    </script>

    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var sale_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {
                        'status': status,
                        'sale_id': sale_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })

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
                name = tr[i].getElementsByTagName("td")[3];
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
