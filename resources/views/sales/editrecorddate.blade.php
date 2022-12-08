@extends('admin.layouts.master')

@section('content')


    <!-- Main Code Start-->
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Date_Adjustment</li>
        </ol>
        <form action="{{ url('dateadjust/' . $sales->id) }}" method="POST">
            {{-- @method('PATCH') --}}
            @csrf
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="icon-note"></i> Sale Register Form
                                    <div class="card-header-actions">
                                        <a class="card-header-action" href="{{ url('dateadjust') }}">
                                            <div class="btn btn-primary"><i class="fa fa-arrow-left"></i></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" x-data="calc()">
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-8 mb-2"><strong for="">Sale Voucher NO :</strong></div>
                                            <div class="col">{{ $sales->sale_voucher }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 mb-2"><strong for="">ItemSKU No. :</strong></div>
                                            <div class="col">{{ $sales->item->itemsku->name }} -
                                                {{ $sales->sale_voucher_sku_id }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 mb-2"><strong for="">Customer Name :</strong></div>
                                            <div class="col">{{ $sales->customer->name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 mb-2"><strong for="">Account Name :</strong></div>
                                            <div class="col">{{ $sales->account->name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 mb-2"><strong for="">Amount:</strong></div>
                                            <div class="col">{{ number_format($sales->total_price) }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 mb-2"><strong for="">Discount Amount :</strong></div>
                                            <div class="col">{{ $sales->discount_amount }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 mb-2"><strong for="">Total Amount :</strong></div>
                                            <div class="col">{{ number_format($sales->total_amount) }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 mb-2"><strong for="">Status:</strong></div>
                                            <div class="col">
                                                @if ($sales->cancel == '1')
                                                    <span class="bg-warning rounded p-1">Cancelled</span>
                                                @else
                                                    @if ($sales->status == '1')
                                                        <span class="bg-green rounded p-1">Active</span>
                                                    @else
                                                        <span class="bg-danger rounded p-1">Banned</span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8">
                                                <strong class="h6">Record Date</strong>
                                                <div class="input-group border border-info rounded">
                                                    <input type="text" readonly class="form-control" id="record_date"
                                                        name="record_date" required
                                                        value="{{ $sales->record_date->format('Y-m-d') }}">
                                                    <input type="text" hidden class="form-control" required
                                                        value="1" name="change_date_status">
                                                    <input type="text" hidden class="form-control" required
                                                        value="{{ $sales->change_date_status }}">

                                                </div>
                                            </div>
                                            <div class="col mt-4">
                                                @if ($sales->change_date_status == 0)
                                                    <label for="" class="btn btn-info outline"
                                                        onclick="previousDay()">Previous Day</label>
                                                    <label for="" class="btn btn-info outline" onclick="nextDay()"
                                                        id="btn1">Next Day</label>
                                                @else
                                                    <button class="btn btn-info outline" disabled>Previous Day</button>
                                                    <button class="btn btn-info outline" disabled>Next Day</button>
                                                @endif

                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group pull-right mt-1">
                                        <input type="submit" value="Update" class="btn btn-success">
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </main>
    </div>

    <script>
        let date = document.getElementById("record_date").value;
        var strToDate = new Date(date);
        let date_int = parseInt(date);


        // var myArray = date_int.split("");
        // var test = myArray - 1;
        // alert(test)


        // const myArray = date.split(" ");
        // alert(myArray[0]);

        function nextDay() {
            let db_date = document.getElementById('record_date').value;
            let d = new Date(db_date);
            d.setDate(d.getDate())
            let weekday = d.toLocaleString([], {
                weekday: 'short'
            });
            if (weekday == "Fri") {
                d.setDate(d.getDate() + 3);
                let weekday = d.toLocaleString([], {
                    weekday: 'short'
                });
                // alert(weekday);
                let day = d.toLocaleString([], {
                    day: 'numeric'
                });
                let month = d.toLocaleString([], {
                    month: 'numeric'
                });
                let year = d.toLocaleString([], {
                    year: 'numeric'
                });
                var next_day = year + "-" + month + "-" + day;
                document.getElementById('record_date').value = next_day;

                function disableButton(btn) {
                    document.getElementById(btn.id).disabled = true;
                    alert("Button has been disabled.");
                }
            } else {
                d.setDate(d.getDate() + 1);
                let day = d.toLocaleString([], {
                    day: 'numeric'
                });
                let month = d.toLocaleString([], {
                    month: 'numeric'
                });
                let year = d.toLocaleString([], {
                    year: 'numeric'
                });
                var next_day = year + "-" + month + "-" + day;
                document.getElementById('record_date').value = next_day;
            }

            // console.log(d.toLocaleString());
        }

        function previousDay() {

            let db_date = document.getElementById('record_date').value;
            let d = new Date(db_date);
            d.setDate(d.getDate())
            let weekday = d.toLocaleString([], {
                weekday: 'short'
            });
            if (weekday == "Mon") {
                d.setDate(d.getDate() - 3);
                let weekday = d.toLocaleString([], {
                    weekday: 'short'
                });
                // alert(weekday);
                let day = d.toLocaleString([], {
                    day: 'numeric'
                });
                let month = d.toLocaleString([], {
                    month: 'numeric'
                });
                let year = d.toLocaleString([], {
                    year: 'numeric'
                });
                var previous_day = year + "-" + month + "-" + day;
                document.getElementById('record_date').value = previous_day;
            } else {
                d.setDate(d.getDate() - 1);
                let day = d.toLocaleString([], {
                    day: 'numeric'
                });
                let month = d.toLocaleString([], {
                    month: 'numeric'
                });
                let year = d.toLocaleString([], {
                    year: 'numeric'
                });
                var previous_day = year + "-" + month + "-" + day;
                document.getElementById('record_date').value = previous_day;
            }
        }
    </script>

    <!-- Main Code END -->


    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    </body>

    </html>
@endsection
