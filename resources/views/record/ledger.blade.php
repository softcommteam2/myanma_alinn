@extends('admin.layouts.app')

@section('content')

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
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <strong class="h6">Start Date</strong>
                                                <div class="input-group border border-info rounded">
                                                    <input type="date" class="form-control" name="start_date" id="start_date" value="" >
                                                </div>
                                            </div>
                                            <div class="col">
                                                <strong class="h6">End Date</strong>
                                                <div class="input-group border border-info rounded">
                                                    <input type="date" class="form-control" name="end_date" id="end_date" value="" >
                                                </div>
                                            </div>
                                            <input type="submit" value="Search" class="btn btn-success">
                                            <a href="{{ url('timeframe') }}" class="pull-right btn btn-secondary">ShowAll</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 card-header-color">
                                        <div class="float-left">
                                            <h4 class="text-2xl leading-6 font-medium text-gray-900 text-left">
                                                Sales list between 'Br br ' and  'br br'.
                                            </h4>
                                        </div>
                                        <div class=" float-right">
                                            <a class="card-header-action" href="{{ url('sales/create') }}">
                                                <small class="btn btn-success"><i class="fa fa-arrow-left"></i></small>
                                              </a>
                                        </div>
                                    </div>

                                    <div class="card-body grid grid-cols-3 grid gap-2">
                                        <table class="table table-striped table-bordered datatable" id="dataTable">
                                                <thead class="floral-white">
                                                    <tr>
                                                        <th onclick="sortTable(0)">ID</th>
                                                        <th onclick="sortTable(1)">Customer</th>
                                                        <th>Sales Date</th>
                                                        <th>Total</th>
                                                        <th>Tax</th>
                                                        <th>Paid</th>
                                                        <th>Total Amount</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sales as $sale )
                                                    <form action="{{url('sales/'.$sale->id)}}" method="POST" >
                                                        @csrf
                                                        @method('DELETE')
                                                    <tr>
                                                        <td>{{ $sale->id }}</td>
                                                        <td>{{ $sale->customer->name }}</td>
                                                        <td>{{ $sale->sale_date->format('d-m-Y H:i') }}</td>
                                                        <td>{{ number_format($sale->total_amount) }} </td>
                                                        <td>{{ number_format($sale->discount_amount)}} </td>
                                                        <td >{{ $sale->account->name }}</td>
                                                        <td>{{ number_format($sale->total_price) }} </td>
                                                        @if ($sale->status==="1")
                                                            <td><span class="bg-green rounded p-1">Active</span></td>
                                                        @else
                                                            <td><span class="bg-danger rounded p-1">Banned</span></td>
                                                        @endif
                                                        <td>
                                                            <a class="btn btn-info" href="{{url('sales/'.$sale->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Edit to Sales" name="Edit">
                                                            <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-warning" href="{{url('sales/'.$sale->id.'')}}" data-toggle="tooltip" data-placement="top" title="Print to Sales" name="print">
                                                                <i class="fa fa-print"></i>
                                                                </a>
                                                            <button class="btn btn-danger" type="submit" name="Delete">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </form>
                                                    @endforeach

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


@endsection

