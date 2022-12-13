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
    <title>Myanma_Alinn</title>
    <!-- Icons-->
    <link href="{{ asset('vendors/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">



    <style type="text/css" media="print">
        @media print {
            body {
                visibility: hidden;
                transform: rotateY(0deg) rotate(90deg);
            }

            .print-container,
            .print-container * {
                visibility: visible;
            }

            .print-container {
                position: relative;
                left: 10px;
                right: 10px;
            }

            .print {
                visibility: visible;
            }
        }
    </style>

</head>

<body class="">

    @include('layout.header')

    <div class="app-body" style="width:1500px;">
        <main class="main">

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">Invoice
                        <strong>#90-98792</strong>
                        <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none print" href="#"
                            onclick="window.print();return false;" ">
            <i class="fa fa-print"></i> Print</a>
          <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="sales/">
            <i class="fa fa-save"></i> Cancle</a>
        </div>

{{-- @if (empty($sales->id))
No such ID
@else --}}
<form action="{{ url('sales') }}" method="POST">
    @csrf
    <div class="container-fluid">
        <div class="row print-container">
            <div class="col-lg-4 col-md-4 col-sm-12" style="border-right:1px solid;">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table>
                            <tr>
                                <td><img src="images/redmirror.png" alt=""></td>
                                <td><strong>ပြန်ကြားရေးဝန်ကြီးဌာန <br>
                                    သတင်းနှင့်စာနယ်ဇင်းလုပ်ငန်း <br>
                                    မြန်မာ့အလင်း သတင်းစာတိုက်
                                    ကြော်ငြာခ/ငွေရပြေစာ</strong>
                                </td>
                                <td>
                                    <div class="pull-right p-1 rounded border border-danger" id="stamp" style="transform: rotateY(0deg) rotate(45deg); text-align:center;">Customer Copy</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <strong>၅၂ လမ်း ၀၁-၃၉၇၃၃၀ ၀၁-၂၉၉၄၂၇</strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>အမည် :</strong>
                                </div>
                                <div class="col">
                                <strong>နေ့စွဲ : </strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>NPT :</strong>
                                </div>
                                <div class="col">
                                <strong>ဘောက်ချာ :</strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>လိပ်စာ :</strong>
                                </div>
                                <div class="col">
                                </div>
                </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col">
                        <strong>အမျိုးအစား :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>အကြောင်းအရာ :</strong>
                    </div>
                    <div class="col">
                        <strong> </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>အရွယ်အစား :</strong>
                    </div>
                    <div class="col">
                        <strong> Inches  Column</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>အကြိမ်ပေါင်း :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>လက်မပေါင်း :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>စျေးနှုန်း :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>သင့်ငွေ :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>မှတ်ချက် :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col">
                        <strong>လျှော့ပေးငွေ :</strong>
                    </div>
                    <div class="col">
                        <strong> </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>ကျသင့်ငွေပေါင်း :</strong>
                    </div>
                    <div class="col">
                        <strong>ကျပ်</strong>
                    </div>
                </div>
                <div class="row" style="margin: 50px;">
                    <div class="col-lg-12 col-md-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>ငွေကိုင်</strong>
                    </div>
                    <div class="col">
                        <strong>လက်ထောက်မန်နေဂျာ (ကြော်ငြာ)</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>ငွေပေးချေမှု SEE</strong>
                    </div>
                </div>
                <div class="row" style="margin: 25px; border:1px solid; padding-left:10px; margin-left:0px;">
                    <div class="col-lg-12 col-md-12">
                        <strong>ဖော်ပြပါနေ၌ ကြော်ငြာပါရန်ကြိုးစားပါမည်
                            သို့သော်အကြောင်းမညီညွတ်၍နေရာမရှိပါက တာဝန်မယူနိုင်ပါ</strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12" style="border-right:1px solid;">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table>
                            <tr>
                                <td><img src="images/redmirror.png" alt=""></td>
                                <td><strong>ပြန်ကြားရေးဝန်ကြီးဌာန <br>
                                    သတင်းနှင့်စာနယ်ဇင်းလုပ်ငန်း <br>
                                    မြန်မာ့အလင်း သတင်းစာတိုက်
                                    ကြော်ငြာခ/ငွေရပြေစာ</strong>
                                </td>
                                <td>
                                    <div class="pull-right p-1 rounded border border-danger" id="stamp" style="transform: rotateY(0deg) rotate(45deg); text-align:center;">Cashier Copy</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <strong>၅၂ လမ်း ၀၁-၃၉၇၃၃၀ ၀၁-၂၉၉၄၂၇</strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>အမည် :</strong>
                                </div>
                                <div class="col">
                                <strong>နေ့စွဲ : </strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>NPT :</strong>
                                </div>
                                <div class="col">
                                <strong>ဘောက်ချာ :</strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>လိပ်စာ :</strong>
                                </div>
                                <div class="col">
                                </div>
                </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col">
                        <strong>အမျိုးအစား :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>အကြောင်းအရာ :</strong>
                    </div>
                    <div class="col">
                        <strong> </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>အရွယ်အစား :</strong>
                    </div>
                    <div class="col">
                        <strong> Inches  Column</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>အကြိမ်ပေါင်း :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>လက်မပေါင်း :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>စျေးနှုန်း :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>သင့်ငွေ :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>မှတ်ချက် :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col">
                        <strong>လျှော့ပေးငွေ :</strong>
                    </div>
                    <div class="col">
                        <strong> </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>ကျသင့်ငွေပေါင်း :</strong>
                    </div>
                    <div class="col">
                        <strong>ကျပ်</strong>
                    </div>
                </div>
                <div class="row" style="margin: 50px;">
                    <div class="col-lg-12 col-md-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>ငွေကိုင်</strong>
                    </div>
                    <div class="col">
                        <strong>လက်ထောက်မန်နေဂျာ (ကြော်ငြာ)</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>ငွေပေးချေမှု SEE</strong>
                    </div>
                </div>
                <div class="row" style="margin: 25px; border:1px solid; padding-left:10px; margin-left:0px;">
                    <div class="col-lg-12 col-md-12">
                        <strong>ဖော်ပြပါနေ၌ ကြော်ငြာပါရန်ကြိုးစားပါမည်
                            သို့သော်အကြောင်းမညီညွတ်၍နေရာမရှိပါက တာဝန်မယူနိုင်ပါ</strong>
                    </div>
                </div>
            </div><div class="col-lg-4 col-md-4 col-sm-12" style="border-right:1px solid;">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table>
                            <tr>
                                <td><img src="images/redmirror.png" alt=""></td>
                                <td><strong>ပြန်ကြားရေးဝန်ကြီးဌာန <br>
                                    သတင်းနှင့်စာနယ်ဇင်းလုပ်ငန်း <br>
                                    မြန်မာ့အလင်း သတင်းစာတိုက်
                                    ကြော်ငြာခ/ငွေရပြေစာ</strong>
                                </td>
                                <td>
                                    <div class="pull-right p-1 rounded border border-danger" id="stamp" style="transform: rotateY(0deg) rotate(45deg); text-align:center;">Finance Copy</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <strong>၅၂ လမ်း ၀၁-၃၉၇၃၃၀ ၀၁-၂၉၉၄၂၇</strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>အမည် :</strong>
                                </div>
                                <div class="col">
                                <strong>နေ့စွဲ : </strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>NPT :</strong>
                                </div>
                                <div class="col">
                                <strong>ဘောက်ချာ :</strong>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>လိပ်စာ :</strong>
                                </div>
                                <div class="col">
                                </div>
                </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col">
                        <strong>အမျိုးအစား :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>အကြောင်းအရာ :</strong>
                    </div>
                    <div class="col">
                        <strong> </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>အရွယ်အစား :</strong>
                    </div>
                    <div class="col">
                        <strong> Inches  Column</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>အကြိမ်ပေါင်း :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>လက်မပေါင်း :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>စျေးနှုန်း :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>သင့်ငွေ :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>မှတ်ချက် :</strong>
                    </div>
                    <div class="col">
                        <strong></strong>
                    </div>
                </div>
                <hr style="background-color:black;">
                <div class="row">
                    <div class="col">
                        <strong>လျှော့ပေးငွေ :</strong>
                    </div>
                    <div class="col">
                        <strong> </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>ကျသင့်ငွေပေါင်း :</strong>
                    </div>
                    <div class="col">
                        <strong>ကျပ်</strong>
                    </div>
                </div>
                <div class="row" style="margin: 50px;">
                    <div class="col-lg-12 col-md-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>ငွေကိုင်</strong>
                    </div>
                    <div class="col">
                        <strong>လက်ထောက်မန်နေဂျာ (ကြော်ငြာ)</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>ငွေပေးချေမှု SEE</strong>
                    </div>
                </div>
                <div class="row" style="margin: 25px; border:1px solid; padding-left:10px; margin-left:0px;">
                    <div class="col-lg-12 col-md-12">
                        <strong>ဖော်ပြပါနေ၌ ကြော်ငြာပါရန်ကြိုးစားပါမည်
                            သို့သော်အကြောင်းမညီညွတ်၍နေရာမရှိပါက တာဝန်မယူနိုင်ပါ</strong>
                    </div>
                </div>
            </div>
{{-- @endif --}}
              </div>
            </div>
             </div>

            </div>
      </div>
    </div>

  </main>

</div>
 <!-- CoreUI and necessary plugins-->
 @yield('script')
 <script src="{{ asset('vendors/jquery/js/jquery.min.js') }}"></script>
 <script src="{{ asset('vendors/popper.js/js/popper.min.js') }}"></script>
 <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('vendors/pace-progress/js/pace.min.js') }}"></script>
 <script src="{{ asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
 <script src="{{ asset('vendors/@coreui/coreui-pro/js/coreui.min.js') }}"></script>
</body>
</html>
