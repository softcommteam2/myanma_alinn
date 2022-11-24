@extends('admin.layouts.app')

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
        <li class="breadcrumb-item active">Sale_Date Adjustement</li>
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
                                            <h1 class="text-2xl leading-6 font-medium text-gray-900 text-left pb-3 pl-2">
                                                Sale_Date Adjustement
                                            </h1>
                                        </div>
                                        <div class=" float-right">
                                            {{-- <a href="{{ route('search') }}" class="items-center px-3 py-2 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-success float-left m-2 " >
                                                <i class="fa fa-plus"></i>
                                            </a> --}}
                                        </div>
                                    </div>
                                    <div class="card-body grid grid-cols-3 grid gap-2">
                                            <table class="table table-striped table-bordered" id="records" style="width:100%">
                                                {{-- <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <div class="input-group">
                                                            <div name="searchbar" class="input-group border border-info rounded">
                                                                <input type="text" class="form-control border-info" id="findField" />
                                                                <span class="input-group-append">
                                                                    <button onclick="FindNext ();" class="btn btn-primary">Search</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>SaleVoucher No.</th>
                                                        <th>ItemSKU No.</th>
                                                        <th>Sales Date</th>
                                                        <th>Record Date</th>
                                                        <th>Customer Name</th>
                                                        <th>Account Name</th>
                                                        <th>Amount</th>
                                                        <th>Discount Amount</th>
                                                        <th>Total Amount</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="DataTable">
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($sales as $sale )
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $sale->sale_voucher }}</td>
                                                        <td>{{ $sale->item->itemsku->name }} - {{$sale->sale_voucher_sku_id}}</>
                                                        <td>{{ $sale->sale_date->format('d-m-Y H:i')  }}</td>
                                                        <td>
                                                            @if ($sale->change_date_status == 0)
                                                            {{ $sale->record_date->format('d-m-Y')  }}
                                                            @else
                                                            <span class="bg-green rounded p-1">{{ $sale->record_date->format('d-m-Y')  }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $sale->customer->name }}</td>
                                                        <td>{{ $sale->account->name }}</td>
                                                        <td>{{ number_format($sale->total_price) }} </td>
                                                        <td>{{ $sale->discount_amount}} </td>
                                                        <td>{{ number_format($sale->total_amount) }} </td>
                                                        @if ($sale->cancel=="1")
                                                        <td><span class="bg-warning rounded p-1">Cancelled</span></td>
                                                        @else
                                                            @if ($sale->status=="1")
                                                            <td><span class="bg-green rounded p-1">Active</span></td>
                                                            @else
                                                            <td><span class="bg-danger rounded p-1">Banned</span></td>
                                                            @endif
                                                        @endif
                                                        <form method="POST" >
                                                            @csrf
                                                        <td>
                                                            @if ($sale->change_date_status == 0)

                                                            <a href="{{ url('dateadjust/'.$sale->id.'/edit') }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit to Sales" name="Edit">
                                                                <i class="fa fa-calendar"></i>  <i class="fa fa-edit"></i>
                                                                @else

                                                            <a href="#" class="btn btn-info disabled" data-toggle="tooltip" data-placement="top" title="Edit to Sales" name="Edit">
                                                                <i class="fa fa-calendar"></i>  <i class="fa fa-edit"></i>
                                                                @endif
                                                            </a>
                                                        </form>
                                                        </td>
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

    {{-- @include('sales.editdate') --}}


    @section('script')
    <script>
        let nextBtns = document.getElementsByClassName('nextBtn')
        for(let i = 0; i <= nextBtns.length; i++){
            nextBtns[i].onclick = function(){
                let id = this.getAttribute('data-myAttribute');
                let recordDate = document.getElementById('record_date'+id)
                console.log(recordDate)
                recordDate.value = 'hey'

                function nextDay()
                {
                    // let db_date = document.getElementById('record_date').value;
                    let d = new Date(recordDate);
                    d.setDate(d.getDate())
                    let weekday = d.toLocaleString([], {weekday: 'short'});
                    if (weekday == "Fri")
                    {
                        d.setDate(d.getDate() + 3);
                        let weekday = d.toLocaleString([], {weekday: 'short'});
                        // alert(weekday);
                        let day = d.toLocaleString([], {day: 'numeric'});
                        let month = d.toLocaleString([], {month: 'numeric'});
                        let year = d.toLocaleString([], {year: 'numeric'});
                        var next_day = year + "-" + month + "-" + day;
                        document.getElementById('record_date').value = next_day;

                        function disableButton(btn) {
                        document.getElementById(btn.id).disabled = true;
                        alert("Button has been disabled.");
                    }
                    }else
                    {
                    d.setDate(d.getDate() + 1);
                    let day = d.toLocaleString([], {day: 'numeric'});
                    let month = d.toLocaleString([], {month: 'numeric'});
                    let year = d.toLocaleString([], {year: 'numeric'});
                    var next_day = year + "-" + month + "-" + day;
                    document.getElementById('record_date').value = next_day;
                    }
                }
            }
        }

        console.log(nextBtns)


        let date = document.getElementById("record_date").value;
        var strToDate = new Date(date);
        let date_int = parseInt(date);

        // function nextDay()
        // {
        //     let db_date = document.getElementById('record_date').value;
        //     let d = new Date(db_date);
        //     d.setDate(d.getDate())
        //     let weekday = d.toLocaleString([], {weekday: 'short'});
        //     if (weekday == "Fri")
        //     {
        //         d.setDate(d.getDate() + 3);
        //         let weekday = d.toLocaleString([], {weekday: 'short'});
        //         // alert(weekday);
        //         let day = d.toLocaleString([], {day: 'numeric'});
        //         let month = d.toLocaleString([], {month: 'numeric'});
        //         let year = d.toLocaleString([], {year: 'numeric'});
        //         var next_day = year + "-" + month + "-" + day;
        //         document.getElementById('record_date').value = next_day;

        //         function disableButton(btn) {
        //         document.getElementById(btn.id).disabled = true;
        //         alert("Button has been disabled.");
        //     }
        //     }else
        //     {
        //     d.setDate(d.getDate() + 1);
        //     let day = d.toLocaleString([], {day: 'numeric'});
        //     let month = d.toLocaleString([], {month: 'numeric'});
        //     let year = d.toLocaleString([], {year: 'numeric'});
        //     var next_day = year + "-" + month + "-" + day;
        //     document.getElementById('record_date').value = next_day;
        //     }
        // }

        function previousDay()
        {

            let db_date = document.getElementById('record_date').value;
            let d = new Date(db_date);
            d.setDate(d.getDate())
            let weekday = d.toLocaleString([], {weekday: 'short'});
            if (weekday == "Mon")
            {
                d.setDate(d.getDate() - 3);
                let weekday = d.toLocaleString([], {weekday: 'short'});
                // alert(weekday);
                let day = d.toLocaleString([], {day: 'numeric'});
                let month = d.toLocaleString([], {month: 'numeric'});
                let year = d.toLocaleString([], {year: 'numeric'});
                var previous_day = year + "-" + month + "-" + day;
                document.getElementById('record_date').value = previous_day;
            }else
            {
            d.setDate(d.getDate() - 1);
            let day = d.toLocaleString([], {day: 'numeric'});
            let month = d.toLocaleString([], {month: 'numeric'});
            let year = d.toLocaleString([], {year: 'numeric'});
            var previous_day = year + "-" + month + "-" + day;
            document.getElementById('record_date').value = previous_day;
            }
        }
    </script>
    <script type="text/javascript">
        // window.find() function
    function FindNext () {
        var str = document.getElementById ("findField").value;
        if (str == "") {
            alert ("Please enter some text to search!");
            return;
        }

        var supported = false;
        var found = false;
        if (window.find) {        // Firefox, Google Chrome, Safari
            supported = true;
                // if some content is selected, the start position of the search
                // will be the end position of the selection
            found = window.find (str);
        }
        else {
            if (document.selection && document.selection.createRange) { // Internet Explorer, Opera before version 10.5
                var textRange = document.selection.createRange ();
                if (textRange.findText) {   // Internet Explorer
                    supported = true;
                        // if some content is selected, the start position of the search
                        // will be the position after the start position of the selection
                    if (textRange.text.length > 0) {
                        textRange.collapse (true);
                        textRange.move ("character", 1);
                    }

                    found = textRange.findText (str);
                    if (found) {
                        textRange.select ();
                    }
                }
            }
        }

        if (supported) {
            if (!found) {
                alert ("The following text was not found:\n" + str);
            }
        }
        else {
            alert ("Your browser does not support this example!");
        }
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
