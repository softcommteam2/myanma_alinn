@extends('admin.layouts.app')

@section('script_links')
@endsection

@section('content')

<style>
    .select2-selection__rendered {
            line-height: 35px !important;
        }
        .select2-container .select2-selection--single {
            height: 35px !important;
        }
        .select2-selection__arrow {
            height: 35px !important;
        }


</style>
@php
    $current_date = new DateTime();


@endphp

<main class="main">
    <!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Sale</li>
    <li class="breadcrumb-item active">Sale Create</li>
</ol>
<form action="{{ url('sales') }}" method="POST" name="saleForm">
@csrf
<div class="container-fluid">
<div class="animated fadeIn">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <i class="icon-note"></i> Sale Register Form
            <div class="card-header-actions">
            <a class="card-header-action" href="{{ url('sales') }}">
                <div class="btn btn-primary"><i class="fa fa-arrow-left"></i></div>
            </a>
            </div>
        </div>
        <div class="card-body" x-data="calc()">
            @if(session()->has('alertMsg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry,</strong> {{ session()->get('alertMsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-sm-12 col-xl-6">
            <div class="card">

            <div class="card-header">
                <i class="fa fa-align-justify"></i> Customer Information
            </div>
            <div class="card-body">
                <input type="hidden"  name="sale_voucher" id="sale_voucher" class="input-group border border-info rounded form-control">
                <input type="hidden"  name="budget_year" id="budget_year" class="input-group border border-info rounded form-control">
                <input type="hidden"  name="sale_voucher_sku"  id="sale_voucher_sku" class="input-group border border-info rounded form-control" value="{{ session()->get('sale_voucher_sku') }}">

                <fieldset class="form-group">
                    <div class="row">
                        <div class="col mt-1">
                            <strong class="h6">Customer</strong>
                            <div class="input-group border border-info rounded" id="cusdrop">
                                <select class="customer form-control" data-live-search="true"  id="customer" name="customer_id" required style="padding:30px 0">
                                    <option value="" selected >Choose Customer</option>
                                    @foreach ($customers as $customer )
                                        <option value="{{ $customer->id }}"
                                            @if (session()->get('customer_id') == $customer->id)
                                                selected
                                            @endif
                                            >{{ $customer->name}}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Create</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group" id="myForm">
                    <hr class="bg-primary">
                    <div class="row">
                        <div class="col-6 mt-1">
                            <strong class="h6">Phone</strong>
                            <div class="input-group border border-info rounded">
                                <input type="text" class="form-control" name="phone" id="phone" readonly value="{{ session()->get('phone') }}">
                            </div>
                        </div>
                        <div class="col-6 mt-1">
                            <strong class="h6">Township</strong>
                            <div class="input-group border border-info rounded">
                                <input type="text" class="form-control" name="township" id="township" readonly value="{{ session()->get('township') }}">
                            </div>
                        </div>
                        <div class="col-6 mt-1">
                            <strong class="h6">City</strong>
                            <div class="input-group border border-info rounded">
                                <input type="text" class="form-control" name="city" id="city" readonly value="{{ session()->get('city') }}">
                            </div>
                        </div>
                    </div>
                    <hr class="bg-primary">
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-1">
                            <strong class="h6">Sales Date</strong>
                            <div class="input-group border border-info rounded">
                                <input type="text" class="form-control" name="record_date" readonly value="<?=$current_date->format('Y-m-d h:i');?>" >
                                <input hidden type="text" class="form-control" name="sale_date" readonly value="<?=$current_date->format('Y-m-d h:i');?>" >
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-1">
                            <strong class="h6">Received Date</strong>
                            <div class="input-group border border-info rounded">
                                <input type="datetime-local" class="form-control" name="received_date" value="<?=$current_date->format('Y-m-d h:i');?>" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 mt-1">
                            <strong class="h6">Specified Date</strong>
                            <div class="input-group border border-info rounded">
                                <input type="datetime-local" class="form-control" name="specified_date" value="<?=$current_date->format('Y-m-d h:i');?>" required>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <strong class="h6">Description</strong>
                            <textarea name="description" required class="input-group border border-info rounded form-control" cols="30" rows="3">@if(session()->has('description')){{  session()->get('description') }}@endif</textarea>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <hr class="bg-primary">
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col">
                            <strong class="h6">Account</strong>
                            <div class="input-group border border-info rounded">
                                <select class="form-control mw-100 text-gray-700"  id="paid_id" name="paid_id" required >
                                    <option selected value="">Choose Account</option>
                                    @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}"
                                        @if (session()->get('paid_id') == $account->id)
                                            selected
                                        @endif
                                        >{{ $account->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-1">
                            <strong class="h6">Payment Comment</strong>
                            <textarea  name="payment_comment" id="" class="input-group border border-info rounded form-control" cols="30" rows="1.5">@if(session()->has('payment_comment')){{  session()->get('payment_comments') }}@endif</textarea>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 mt-1" style="display: none;">
                            <label class="switch switch-label switch-success">
                                <input type="hidden" name="status" value="0">
                                <input class="switch-input" type="checkbox" checked name="status" value="1">
                            <span class="switch-slider" data-checked="On" data-unchecked="Off" style="margin-top: 26px;"></span>
                            </label>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Items Information
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <strong class="h6">Items</strong>
                            <div class="input-group border border-info rounded">
                                <select class="form-control mw-100 text-gray-700"  id="item" name="item_id" required >
                                    <option selected value="">Choose Item</option>
                                    @foreach ($items as $item )
                                    <option data-itemsku="{{ $item->itemsku_id }}" data-price="{{ $item->price }}" value="{{ $item->id }}"
                                        @if (session()->get('item_id') == $item->itemsku_id)
                                            selected
                                        @endif
                                        >{{ $item->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col mt-1">
                                <strong class="h6">Inches</strong>
                                <input type="number" step=".01" id="inches" oninput="validate(this)" required name="inches"  value="{{ session()->get('inches') }}" onkeyup="qty()" class="input-group border border-info rounded form-control" >
                            </div>
                            <div class="col mt-1">
                                <strong class="h6">Columns</strong>
                                <input type="number" id="columns"  required name="columns" onkeyup="qty()" value="{{ session()->get('columns') }}" class="input-group border border-info rounded form-control" >
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col mt-1">
                                <strong class="h6">Quanity</strong>
                                <input type="number" id="quantity"  readonly required name="quantity" value="{{ session()->get('quantity') }}"  onkeyup="totpri()" class="input-group border border-info rounded form-control" >
                            </div>
                            <div class="col mt-1">
                                <strong class="h6">Price</strong>
                                <input type="number" readonly required name="price"   id="price" onkeyup="totpri()" value="{{ session()->get('price') }}" class="price input-group border border-info rounded form-control" >
                                <input type="text" hidden name="itemsku"  id="itemsku_id" class="input-group border border-info rounded form-control" value="{{ session()->get('itemsku') }}">
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col mt-1">
                                <strong class="h6">Amount</strong>
                                <input type="number" step=".01" readonly required name="total_price"   id="total_price" onkeyup="totamt()" value="{{ session()->get('total_price') }}" class="input-group border border-info rounded form-control" >
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <hr class="bg-primary">
                        </fieldset>
                        <div class="row">
                            <div class="col mt-1">
                                <strong class="h6">Times (No.of days displayed)</strong>
                                <input type="number" required name="times" id="times" class="input-group border border-info rounded form-control" value="1">
                            </div>
                            <div class="col mt-1">
                                <strong class="h6">Time Price total</strong>
                                <input type="number"  step=".01" readonly required name="timeprice"  onkeyup="totpricetimes()" value="{{ session()->get('timeprice') }}" id="timeprice" class="input-group border border-info rounded form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-1">
                                <strong class="h6">Discount Amount</strong>
                                <input type="number" step=".01" required name="discount_amount"  value="0" id="discount_amount" onkeyup="totamt()" class="input-group border border-info rounded form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-1">
                                <strong class="h6">Total Amount</strong>
                                <input type="hidden" step="0.01" required name="total_amount" value="{{ session()->get('total_amount') }}"  id="total_amount" class="input-group border border-info rounded form-control number-separator" >
                                <input readonly type="text" step="0.01" onchange="return onlyNumberKey(event)"  id="displaytot" class="input-group border border-info rounded form-control" >

                            </div>
                        </div>
                        <hr class="bg-primary">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
                                <strong class="h6">Comments (In Word)</strong>
                                <textarea  name="comments" id="" class="input-group border border-info rounded form-control" cols="30" rows="3">@if(session()->has('comments')){{  session()->get('comments') }}@endif</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
         {{-- Buttons --}}
         <fieldset class="form-group pull-right mt-1">
            <input type="submit" value="Save" class="btn btn-success" onclick="btn()">
            {{-- <input type="submit" value="Save" class="btn btn-success" onclick="this.disabled=true;this.form.submit();" > --}}
            <button type="reset" class="btn btn-danger">Cancel</button>
        </fieldset>
        {{-- Buttons END --}}
    </form>

    <div class="form">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Customer Information</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('customer') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6 mt-1">
                                <strong class="h6">Customer Name</strong>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-6 mt-1">
                                <strong class="h6">Phone</strong>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="col-6 mt-1">
                                <strong class="h6">Township</strong>
                                <input type="text" class="form-control" name="township">
                            </div>
                            <div class="col-6 mt-1">
                                <strong class="h6">City</strong>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="col-12 mt-1">
                                <strong class="h6">Address</strong>
                                <input type="text" class="form-control" name="address">
                                <input hidden type="text" class="form-control" name="status" value="1">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">ADD</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

            </div>
        </div>
    </div>
</main>


@section('script')

{{-- Calculating Java Code --}}
<script type="text/javascript" src="{{ asset('asset/jquery-1.10.2.js')}}"></script>
{{-- sweet alert --}}
<script type="text/javascript" src="{{ asset('asset/sweetalert2@11.js')}}"></script>


{{-- This is JavaScript for Item select --}}

<script>
    function btn()
    {
        Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
        )
    }
    // insert commas as thousands separators
    function addCommas(n){
      var rx=  /(\d+)(\d{3})/;
      return String(n).replace(/^\d+/, function(w){
        while(rx.test(w)){
          w= w.replace(rx, '$1,$2');
        }
        return w;
      });
    }
    // return integers and decimal numbers from input
    // optionally truncates decimals- does not 'round' input
    function validDigits(n, dec){
      n= n.replace(/[^\d\.]+/g, '');
      var ax1= n.indexOf('.'), ax2= -1;
      if(ax1!= -1){
        ++ax1;
        ax2= n.indexOf('.', ax1);
        if(ax2> ax1) n= n.substring(0, ax2);
        if(typeof dec=== 'number') n= n.substring(0, ax1+dec);
      }
      return n;
    }

    window.onload= function(){
      var n2= document.getElementById('displaytot');
      n2.value='';

     n2.onkeyup=n2.onchange= function(e){
        e=e|| window.event;
        var who=e.target || e.srcElement,temp;
        if(who.id==='displaytot')  temp= validDigits(who.value,2);
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
      }
      n1.onblur= n2.onblur= function(){
        var temp2=parseFloat(validDigits(n2.value));
        if(temp2)n2.value=addCommas(temp2.toFixed(2));
      }
    }
  </script>
<script >



    //Api for customer display data
    document.getElementById('customer').onchange = function () {
        axios.get('/api/customer/' + this.value)
        .then(response => {
            console.log(response.data)
            document.getElementById('phone').value = response.data.phone;
            document.getElementById('township').value = response.data.township;
            document.getElementById('city').value = response.data.city;
        })
        .catch(err => console.log(err));
    }
    $(document).ready(function() {
        $('.customer').select2();
    });
    //Api for customers display data End
    //Function for Item as country-city funciton
        $('#item').on('change', function(){
        var  price = $(this).children('option:selected').data('price');
        $('#price').val(price);
        });

        $('#item').on('change', function(){
        var  itemsku = $(this).children('option:selected').data('itemsku');
        $('#itemsku_id').val(itemsku);
        });

        $('#item').on('change', function(){
        var  itemsku_voucher = $(this).children('option:selected').data('itemsku');
        $('#sale_voucher_sku').val(itemsku_voucher);
        let sku = document.getElementById('sale_voucher_sku').value
        // alert(sku)
        });

        $(document).ready(function () {
            $('select').selectpicker();
            $('select').change(function () {
            $('.output').html($(this).val());
            });
        });
    //Function for Item country-city funciton End
</script>

<script type="text/javascript">
//Calculating the data
    function qty() {
        var inches = document.getElementById('inches').value;
        var columns = document.getElementById('columns').value;

        var result = parseFloat(inches) * parseFloat(columns);
        if (!isNaN(result)) {
            document.getElementById('quantity').value = result;
        }
    } //calculate quantity
    function totpri() {
        var quantity = document.getElementById('quantity').value;
        var price = document.getElementById('price').value;
        var result = parseFloat(quantity) * parseFloat(price);
        if (!isNaN(result)) {
            document.getElementById('total_price').value = result;
        }
    }// calculate total price
    function totamt() {
        var total_price = document.getElementById('total_price').value;
        var discount_amount = document.getElementById('discount_amount').value;
        var times = document.getElementById('times').value;
        var result = parseFloat(total_price)*parseFloat(times) - parseFloat(discount_amount);
        if (!isNaN(result)) {
            document.getElementById('total_amount').value = result;
            document.getElementById('displaytot').value = result;
        }
    } // calculate total amount
    function totpricetimes() {
        var timeprice = document.getElementById('timeprice').value;
        var times = document.getElementById('times').value;
        var total_price = document.getElementById('total_price').value;
        var result = parseFloat(total_price) * parseFloat(times);
        if (!isNaN(result)) {
            document.getElementById('timeprice').value = result;
        }
    }// calculate total price
    function totamtwtimes() {
        var total_amount = document.getElementById('total_amount').value;
        var times = document.getElementById('times').value;
        var result = parseFloat(total_price) * parseFloat(times);
        if (!isNaN(result)) {
            document.getElementById('total_amount').value = result;
        }
    }// calculate total times
    // In your Javascript (external .js resource or <script> tag)

</script>
    <script>
        document.forms['saleForm'].onsubmit = function() {
        let current_date = new Date();
        let current_year = current_date.getFullYear();
        let budget_yr_change_date = new Date(current_year,'02','31','13'); //March 31 1 PM
        let current_budget_year = current_year

        if (current_date < budget_yr_change_date)
        {
            current_budget_year = current_year - 1 // March ma kyaw thy buu so , budegt year ko a yin year u Example, if current year is 2022 , but march la ma kyaw thy buu so 2021 loc u
        }else if (current_date > budget_yr_change_date)
        {
            current_budget_year = current_year
        }

        @php
        $final_year = DB::table('sales')->latest('id')->first();
        // dd($final_year);
        if ($final_year == null)
        {
            $final_year = 2022;
            $current_budget_year_final = 2022;
        }
        else
        {

            $current_budget_year_final = $final_year->budget_year;
            // dd($final_year);
            // dd($current_budget_year_final);  //2022

        }
        $sale_voucher = DB::table('sales')->count(); // where current_budget_year = year
        $budget_year = DB::table('sales')->where('budget_year', $current_budget_year_final)->count();
        // dd($budget_year); // 1
        @endphp
        let id = {{$budget_year}};
        let budget_year = {{$budget_year}};
        // alert(budget_year);

        if (budget_year == 0)
        {
            // alert('0')
            id = 1;
        }else if (current_budget_year != {{$current_budget_year_final}})
        (
            id = 1
        )
        else if (budget_year >= 1)
        {
            id++;
        }
        else
        {
            alert('Something Wrong')
        }

        document.getElementById("sale_voucher").value = `${current_budget_year}-${id}`;
        document.getElementById("budget_year").value = `${current_budget_year}`;
        }





        // let itemskuid = $(this).children('option:selected').data('itemsku');
        // alert(itemskuid);

        // let Lkk = document.getElementById("sale_voucher_sku").value

        // document.forms["saleForm"].submit = function()
        // {
        //     document.getElementById("submitBTN").disabled = true;
        // }
    </script>
    <script>
        let sku = document.getElementById('sale_voucher_sku').value

        function openForm() {
    document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
    document.getElementById("myForm").style.display = "none";
    }
    </script>
@endsection

@endsection
