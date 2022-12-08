@extends('timeframe.layout.master')
@section('content')
    <h4 class="card-title">
        This Week's {{ $start_of_date->format('d-m-Y') }} - {{ $end_of_week->format('d-m-Y') }}
    </h4>
    <table class="table table-responsive-sm table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>SaleVoucher No.</th>
                <th>ItemSKU No.</th>
                <th>Sales Date</th>
                <th>Customer Name</th>
                <th>Account Name</th>
                <th>Discount Amount</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($sales as $sale)
                <form action="{{ url('sales/' . $sale->id) }}" method="POST">
                    @csrf
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $sale->sale_voucher }}</td>
                        <td>{{ $sale->item->itemsku->name }} - {{ $sale->sale_voucher_sku_id }}</>
                        <td>{{ $sale->sale_date->format('d-m-Y H:i') }}</td>
                        <td>{{ $sale->customer->name }}</td>
                        <td>{{ $sale->account->name }}</td>
                        <td style="text-align: right">{{ $sale->discount_amount }} </td>
                        <td style="text-align: right">{{ number_format($sale->total_amount) }} </td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
@endsection
