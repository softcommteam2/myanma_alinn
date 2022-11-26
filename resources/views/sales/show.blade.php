@php
    $dt = new DateTime();
@endphp
<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="./../">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Kyay Mone</title>
    <!-- Icons-->
    <link href="{{asset('vendors/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
    <link href="{{asset('vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="{{asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <style>
        .watermark
        {
            background-image: url(images/mmalinn_wm.png);
            background-repeat: no-repeat;
            background-size: 1400px 1000px;
        }
    </style>

    <style type="text/css" media="print">
            @media print{
                body{
            /* visibility:hidden; */
            transform: rotateY(0deg) rotate(90deg);
            /* background-image: url(images/mmalinn_wm_print.png); */
            background-color: #ffff;
            font-size: 16px;
            font-weight: 500;
            /* background-size: 1400px 1000px; */
            /* width: 1500px; */

        }
        .watermark
        {
            left: 0;
            right: 0;
            top: 0;
            width: 1500px;
        }
        .print-container, .print-container * {
            visibility: visible;
        }
        .print-container{
            position: relative;
            left: 10px;
            right: 10px;
        }
        .print {
            visibility:visible;}
        }
    </style>

  </head>

  <body class="">

    @include('layout.header')

    <div class="app-body" style="width:1500px;">
    <main class="main">
            <a class="btn btn-sm  btn-info float-right mr-1 d-print-none print" href="#" onclick="window.print();return false;" ">
                <i class="fa fa-print"></i> Print</a>
            <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="sales/">
            <i class="fa fa-arrow-left"></i> Cancel</a>

@if(empty($sales->id))
No such ID
@else
<form action="{{ url('sales') }}" method="POST") class="watermark">
    @csrf
    <div class="container-fluid">
        <div class="row print-container">
            <div class="col-lg-4 col-md-4 col-sm-12" style="border-right:1px solid;">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table>
                            <tr>
                                <td><img src="images/logo_with_address.png" alt="" width="150" class=""></td>
                                <td>
                                    <strong>
                                        မြန်မာ့အလင်းသတင်းစာတိုက် <br>
                                        သတင်းနှင့်စာနယ်ဇင်းလုပ်ငန်း <br>
                                        ပြန်ကြားရေးဝန်ကြီးဌာန <br>
                                        အမှတ်(၅၃)၊နတ်မောက်လမ်းသွယ်(၁)၊ဗိုလ်ချို(၂)ရပ်ကွက် <br>
                                        ဗဟန်းမြို့နယ်၊ရန်ကုန်တိုင်းဒေသကြီး <br>
                                        ၀၉-၄၃၀၃၆၀၃၀၊ ၀၁-၅၄၄၃၁၄၊ ၀၁-၈၆၀၄၅၄၇
                                    </strong>
                                </td>
                                <td>
                                    <div class="pull-right rounded border border-dark" id="stamp" style="transform: rotateY(0deg) rotate(45deg); text-align:center;">Customer Copy</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                        <div class="row mt-5">
                            <div class="col-lg-12 col-md-12">

                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <strong>အမည် :{{ $sales->customer->name }}</strong>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                <strong>နေ့စွဲ : <?=$dt->format('d-m-Y H:i');?> </strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <strong>ဖုန်း : </strong>{{$sales->customer->phone}}
                                </div>
                                <div class="col-lg-6 col-md-6">
                                <strong>ဘောက်ချာ : {{ $sales->item->itemsku->name }} - {{$sales->sale_voucher_sku_id}}</strong>
                                </div>
                        </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အမျိုးအစား :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->item->name }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->item->category->name }} ({{number_format( $sales->item->price) }}) ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အကြောင်းအရာ :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->description }} </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အရွယ်အစား :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>({{ $sales->inches }}) Inches x ({{ $sales->columns }}) Column</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>လက်မပေါင်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->total_inches }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အကြိမ်ပေါင်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->times }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>စျေးနှုန်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ number_format($sales->price)  }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>သင့်ငွေ :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ number_format($sales->total_price) }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>မှတ်ချက် :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->comments }}</strong>
                    </div>
                </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>လျှော့ပေးငွေ :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong> {{ number_format($sales->discount_amount) }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>ကျသင့်ငွေပေါင်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ number_format($sales->total_amount) }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row" style="margin: 50px;">
                    <div class="col-lg-12 col-md-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>ငွေကိုင်</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>လက်ထောက်မန်နေဂျာ (ကြော်ငြာ)</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>ငွေပေးချေမှု {{ $sales->account->name }}</strong>
                    </div>
                </div>
                <div class="row" style="margin: 50px; border:1px solid; padding-left:10px; margin-left:0px;">
                    <div class="col-lg-12 col-md-12" style="margin: 10px;">
                        <strong>ဖော်ပြပါနေ၌ ကြော်ငြာပါရန်ကြိုးစားပါမည်
                            သို့သော်အကြောင်းမညီညွတ်၍နေရာမရှိပါက တာဝန်မယူနိုင်ပါ။</strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12" style="border-right:1px solid;">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table>
                            <tr>
                                <td><img src="images/logo_with_address.png" alt="" width="150" class=""></td>
                                <td>
                                    <strong>
                                        မြန်မာ့အလင်းသတင်းစာတိုက် <br>
                                        သတင်းနှင့်စာနယ်ဇင်းလုပ်ငန်း <br>
                                        ပြန်ကြားရေးဝန်ကြီးဌာန <br>
                                        အမှတ်(၅၃)၊နတ်မောက်လမ်းသွယ်(၁)၊ဗိုလ်ချို(၂)ရပ်ကွက် <br>
                                        ဗဟန်းမြို့နယ်၊ရန်ကုန်တိုင်းဒေသကြီး <br>
                                        ၀၉-၄၃၀၃၆၀၃၀၊ ၀၁-၅၄၄၃၁၄၊ ၀၁-၈၆၀၄၅၄၇
                                    </strong>
                                </td>
                                <td>
                                    <div class="pull-right p-1 rounded border border-dark" id="stamp" style="transform: rotateY(0deg) rotate(45deg); text-align:center;"><strong>Cashier Copy</strong></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                        <div class="row mt-5">
                            <div class="col-lg-12 col-md-12">
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <strong>အမည် :{{ $sales->customer->name }}</strong>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                <strong>နေ့စွဲ : <?=$dt->format('d-m-Y H:i');?> </strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <strong>ဖုန်း : </strong>{{$sales->customer->phone}}
                                </div>
                                <div class="col-lg-6 col-md-6">
                                <strong>ဘောက်ချာ : {{ $sales->item->itemsku->name }} - {{$sales->sale_voucher_sku_id}}</strong>
                                </div>
                        </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အမျိုးအစား :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->item->name }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->item->category->name }} ({{number_format( $sales->item->price) }}) ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အကြောင်းအရာ :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->description }} </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အရွယ်အစား :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>({{ $sales->inches }}) Inches x ({{ $sales->columns }}) Column</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>လက်မပေါင်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->total_inches }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အကြိမ်ပေါင်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->times }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>စျေးနှုန်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ number_format($sales->price)  }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>သင့်ငွေ :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ number_format($sales->total_price) }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>မှတ်ချက် :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->comments }}</strong>
                    </div>
                </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>လျှော့ပေးငွေ :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong> {{ number_format($sales->discount_amount) }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>ကျသင့်ငွေပေါင်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ number_format($sales->total_amount) }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row" style="margin: 50px;">
                    <div class="col-lg-12 col-md-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>ငွေကိုင်</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>လက်ထောက်မန်နေဂျာ (ကြော်ငြာ)</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>ငွေပေးချေမှု {{ $sales->account->name }}</strong>
                    </div>
                </div>
                <div class="row" style="margin: 50px; border:1px solid; padding-left:10px; margin-left:0px;">
                <div class="col-lg-12 col-md-12" style="margin: 10px;">
                        <strong>ဖော်ပြပါနေ၌ ကြော်ငြာပါရန်ကြိုးစားပါမည်
                            သို့သော်အကြောင်းမညီညွတ်၍နေရာမရှိပါက တာဝန်မယူနိုင်ပါ။ </strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table>
                            <tr>
                                <td><img src="images/logo_with_address.png" alt="" width="150"></td>
                                <td>
                                    <strong>
                                        မြန်မာ့အလင်းသတင်းစာတိုက် <br>
                                        သတင်းနှင့်စာနယ်ဇင်းလုပ်ငန်း <br>
                                        ပြန်ကြားရေးဝန်ကြီးဌာန <br>
                                        အမှတ်(၅၃)၊နတ်မောက်လမ်းသွယ်(၁)၊ဗိုလ်ချို(၂)ရပ်ကွက် <br>
                                        ဗဟန်းမြို့နယ်၊ရန်ကုန်တိုင်းဒေသကြီး <br>
                                        ၀၉-၄၃၀၃၆၀၃၀၊ ၀၁-၅၄၄၃၁၄၊ ၀၁-၈၆၀၄၅၄၇
                                    </strong>
                                </td>
                                <td>
                                    <div class="pull-right rounded border border-dark" id="stamp" style="transform: rotateY(0deg) rotate(45deg); text-align:center;"><strong>Finance Copy</strong></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                        <div class="row mt-5">
                            <div class="col-lg-12 col-md-12">
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <strong>အမည် :{{ $sales->customer->name }}</strong>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                <strong>နေ့စွဲ : <?=$dt->format('d-m-Y H:i');?> </strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <strong>ဖုန်း : </strong>{{$sales->customer->phone}}
                                </div>
                                <div class="col-lg-6 col-md-6">
                                <strong>ဘောက်ချာ : {{ $sales->item->itemsku->name }} - {{$sales->sale_voucher_sku_id}}</strong>
                                </div>
                        </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အမျိုးအစား :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->item->name }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->item->category->name }} ({{number_format( $sales->item->price) }}) ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အကြောင်းအရာ :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->description }} </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အရွယ်အစား :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>({{ $sales->inches }}) Inches x ({{ $sales->columns }}) Column</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>လက်မပေါင်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->total_inches }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>အကြိမ်ပေါင်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->times }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>စျေးနှုန်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ number_format($sales->price)  }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>သင့်ငွေ :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ number_format($sales->total_price) }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>မှတ်ချက် :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ $sales->comments }}</strong>
                    </div>
                </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>လျှော့ပေးငွေ :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong> {{ number_format($sales->discount_amount) }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>ကျသင့်ငွေပေါင်း :</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>{{ number_format($sales->total_amount) }} ကျပ်</strong>
                    </div>
                </div>
                <div class="row" style="margin: 50px;">
                    <div class="col-lg-12 col-md-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>ငွေကိုင်</strong>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <strong>လက်ထောက်မန်နေဂျာ (ကြော်ငြာ)</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <strong>ငွေပေးချေမှု {{ $sales->account->name }}</strong>
                    </div>
                </div>
                <div class="row" style="margin: 50px; border:1px solid; padding-left:10px; margin-left:0px;">
                <div class="col-lg-12 col-md-12" style="margin: 10px;">
                        <strong>ဖော်ပြပါနေ၌ ကြော်ငြာပါရန်ကြိုးစားပါမည်
                            သို့သော်အကြောင်းမညီညွတ်၍နေရာမရှိပါက တာဝန်မယူနိုင်ပါ။</strong>
                    </div>
                </div>
            </div>
@endif
            </div>
            </div>
    </div>
    </div>

  </main>

</div>
    <!-- CoreUI and necessary plugins-->
    @yield('script')
    <script src="{{ asset('vendors/jquery/js/jquery.min.js') }}"></script>
    <script src="{{asset ('vendors/popper.js/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/pace-progress/js/pace.min.js') }}"></script>
    <script src="{{ asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendors/@coreui/coreui-pro/js/coreui.min.js') }}"></script>
</body>
</html>



