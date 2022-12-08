@extends('admin.layouts.master')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Report List</li>
        </ol>
        <div class="container-fluid bg-white rounded-top ml-4 mr-4">
            <div name="date" class="d-flex justify-content-between p-2">
                <div>
                    <span class="text-bold" id="day"></span>/
                    <span class="text-bold" id="month"></span>/
                    <span class="text-bold" id="year"></span>
                </div>
                <h3>Report</h3>
            </div>
            <div name="form" class="row p-3">

                <div class="col-md-6">
                    <h5><span class="badge badge-secondary m-1">1</span>Choose Time Frame</h5>

                    <div name="col1">
                        <div name=row1 class="row">
                            <div class="col-md-6 p-2">
                                <span>Start Date</span>
                                <input type="text">
                            </div>
                            <div class="col-md-6 p-2">
                                <span>End Date</span>
                                <input type="text">
                            </div>
                        </div>
                        <div name="row2" class="row">
                            <div class="col-md-6 p-2">
                                <span class="bg-yellow py-1 border rounded-pill px-2"> Day Template </span>
                                <ul class="list-group p-2">
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            Today </a> </li>
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            Last 3 days </a> </li>
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            Last 7 days </a> </li>
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            Last 10 days </a> </li>
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            Last 14 days </a> </li>
                                </ul>
                            </div>
                            <div class="col-md-6 p-2">
                                <span class="bg-yellow py-1 border rounded-pill px-2"> Week Template </span>
                                <ul class="list-group py-2">
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            This Week </a> </li>
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            Previous Week </a> </li>
                                </ul>
                            </div>
                            <div class="col-md-6 p-2">
                                <span class="bg-yellow py-1  border rounded-pill px-2">Month Template</span>
                                <ul class="list-group py-2">
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            This Month </a> </li>
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            Previous Month </a> </li>
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            Last 3 Months </a> </li>
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            Last 6 </a> </li>
                                </ul>
                            </div>
                            <div class="col-md-6 p-2">
                                <span class="bg-yellow py-1  border rounded-pill px-2"> Year Template </span>
                                <ul class="list-group py-2">
                                    <li class="d-flex justify-content-right py-1 "> <a href="" class="text-primary">
                                            This Year </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h5><span class="badge badge-secondary m-1 ">2</span>Choose Report</h5>
                    <div name="col2">
                        <div name="row1" class="row p-1">
                            <div class="col-md-6">
                                <span class="bg-yellow py-1  border rounded-pill px-2">Sale Report</span>
                                <ul class="list-group py-2">
                                    <li class="d-flex justify-content-right py-1"> <a href="" class="text-primary">
                                            Sale by Ledger </a> </li>
                                    <li class="d-flex justify-content-right py-1"> <a href="" class="text-primary">
                                            Sale List </a> </li>
                                    <li class="d-flex justify-content-right py-1"> <a href="" class="text-primary">
                                            Sale by Customer </a> </li>
                                    <li class="d-flex justify-content-right py-1"> <a href="" class="text-primary">
                                            Sale by Items </a> </li>
                                </ul>
                            </div>
                            <div class="col-md-6 p-2">
                                <span class="bg-yellow py-1  border rounded-pill px-2">Cash Report</span>
                                <ul class="list-group py-2">
                                    <li class="d-flex justify-content-right py-1"> <a href="" class="text-primary">
                                            Credit by Customer </a> </li>
                                    <li class="d-flex justify-content-right py-1"> <a href=""
                                            class="text-primary"> Daily Profit </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('script')
    <script>
        const d = new Date();
        document.getElementById("year").innerHTML = d.getFullYear();
        document.getElementById("month").innerHTML = d.getMonth() + 1;
        document.getElementById("day").innerHTML = d.getDate();
    </script>
@endsection
