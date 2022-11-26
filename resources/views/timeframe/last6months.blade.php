@extends('admin.layouts.app')

@section('script_links')
<!-- Bootstrap CSS-->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome CSS-->
<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
<!-- Fontastic Custom icon font-->
<link rel="stylesheet" href="assets/css/fontastic.css">
<!-- Google fonts - Roboto -->
<link rel="stylesheet" href="assets/https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
<!-- jQuery Circle-->
<link rel="stylesheet" href="assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
<!-- Custom Scrollbar-->
<link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
<!-- theme stylesheet-->
<link rel="stylesheet" href="assets/css/style.default.css" id="theme-stylesheet">
<!-- Custom stylesheet - for your changes-->
<link rel="stylesheet" href="assets/css/custom.css">
<!-- Favicon-->
<link href='https://www.soengsouy.com/favicon.ico' rel='icon' type='image/x-icon'/>

<!-- EXcel script link-->
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

 <!--Make PDF script -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


@endsection

@section('content')
<style type="text/css" media="print">
    .hide
    {
        display: none;
    }body{
        visibility: hidden;
        display: none;
        background-color: #ffffff;
   }
   .print-container, .print-container * {
        visibility:visible
   }
   .print-container {
       position: relative;
       top: 0px;
        left: 0px;
        right: 0px;
   }
</style>
@php
    $dt = new DateTime();
@endphp

<main class="main">
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">TimeFrame
    </li>
    <li class="breadcrumb-item active">Last 6 Months</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                  <div class="col">
                    <i class="icon-calendar"></i><?=$dt->format('Y-m-d');?>
                  </div>
                  <div class="col">
                    <form method="POST" class="hide">
                        @csrf
                        <a onclick="ExportToExcel('xlsx')" class="btn btn-success pull-right m-1"><span class="fa fa-file-excel-o"></span></a>
                        {{-- <a onclick="ExportToPDF('pdf')" class="btn btn-danger pull-right m-1"><span class="fa fa-file-pdf-o"></span></a> --}}
                        <a onclick="window.print();return false;" " class="btn btn-danger pull-right m-1"><span class="fa fa-file-pdf-o"></span></a>

                        <a href="{{ url('/timeframe') }}" class="btn btn-warning pull-right m-1"><span class="fa fa-arrow-left"></span> GO BACK</a>
                      </form>
                  </div>
              </div>
            </div>
            <div class="card-body">
                  @if(session()->has('message'))
                      <p class="btn btn-success btn-block btn-sm custom_message text-left" style="margin-top: 10px;">{{ session()->get('message') }}</p>
                  @endif

            <fieldset class="form-group print-container">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">Last 6 Month's Report</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tbl_exporttable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>SaleVoucher No.</th>
                                        <th>ItemSKU No.</th>
                                        <th>Sales Date</th>
                                        <th>Customer Name</th>
                                        <th>Account Name</th>
                                        <th>Total Amount</th>
                                        <th>Discount Amount</th>
                                        <th>Balance</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="DataTable">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($sales as $sale )
                                    <form action="{{url('sales/'.$sale->id)}}" method="POST" >
                                        @csrf
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $sale->sale_voucher }}</td>
                                        <td>{{ $sale->item->itemsku->name }} - {{$sale->sale_voucher_sku_id}}</>
                                        <td>{{ $sale->sale_date->format('d-m-Y H:i')  }}</td>
                                        <td>{{ $sale->customer->name }}</td>
                                        <td>{{ $sale->account->name }}</td>
                                        <td style="text-align: right">{{ number_format($sale->timeprice) }} </td>
                                        <td style="text-align: right">{{ $sale->discount_amount}} </td>
                                        <td style="text-align: right">{{ number_format($sale->total_amount) }} </td>
                                        @if ($sale->cancel=="1")
                                        <td><span class="bg-warning rounded p-1">Cancelled</span></td>
                                        @else
                                            @if ($sale->status=="1")
                                            <td><span class="bg-green rounded p-1">Active</span></td>
                                            @else
                                            <td><span class="bg-danger rounded p-1">Banned</span></td>
                                            @endif
                                        @endif
                                    </tr>
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </fieldset>
</main>

  @section('script')
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
  <script src="assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="assets/vendor/chart.js/Chart.min.js"></script>
  <script src="assets/vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="assets/js/charts-home.js"></script>
  <!-- Main File-->
  <script src="assets/js/front.js"></script>


  <!-- This is the script for Excel export-->
  <script type="text/javascript">
    function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('LAst6Months' + date + '.' + (type || 'xlsx')));
    }
    </script>
  <!-- This is the script for PDF export-->
  <script type="text/javascript">
    function ExportToPDF() {
            html2canvas(document.getElementById('tbl_exporttable'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500,
                            height: 75
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Las6Months.pdf");
                }
            });
        }
  </script>

  @endsection
@endsection
