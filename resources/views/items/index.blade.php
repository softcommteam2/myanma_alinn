@extends('admin.layouts.master')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Item List</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <div class="text-primary" style="font-size: 20px">Item List</div>
                        <div class="card-header-actions">
                            <a href="{{ url('items') }}" class="btn btn-secondary">Show All</a>
                            <a class="card-header-action" href="{{ url('items/create') }}">
                                <small class="btn btn-success"><i class="fa fa-plus"></i></small>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('items_search') }}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="input-group">
                                        <input type="text" name="search" placeholder="Search here"class="form-control">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary">Search</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped table-bordered datatable" id="dataTable">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">ID</th>
                                    <th onclick="sortTable(1)">Category</th>
                                    <th onclick="sortTable(2)">Name</th>
                                    <th onclick="sortTable(3)">ItemSKU</th>
                                    <th>Description</th>
                                    <th onclick="sortTable(4)">Price</th>
                                    <th>Stock_Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <form action="{{ url('items/' . $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <tr id="myUL">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->itemsku->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ number_format($item->price) }} </td>
                                            <td>{{ $item->stock_amount }}</td>
                                            @if ($item->status === '1')
                                                <td><span class="bg-green rounded p-1">Active</span></td>
                                            @else
                                                <td><span class="bg-danger rounded p-1">Banned</span></td>
                                            @endif
                                            <td>
                                                <a class="btn btn-info" href="{{ url('items/' . $item->id . '/edit') }}"
                                                    data-toggle="tooltip" data-placement="top" title="Edit to Item"
                                                    name="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger" type="submit" name="Delete">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $items->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

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


        const instance = new mdb.Datatable(document.getElementById('datatable'), dataTable)

        document.getElementById('datatable-search-input').addEventListener('input', (e) => {
            instance.input - group(e.target.value);
        });
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
                name = tr[i].getElementsByTagName("td")[2];
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
@endsection
