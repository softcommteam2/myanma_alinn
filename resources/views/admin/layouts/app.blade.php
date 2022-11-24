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
    <title>Myanma Alinn</title>
    @yield('script_links')
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

    {{-- toggle --}}
    <link href="{{asset('asset/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <script src="{{asset('asset/bootstrap-toggle.min.js')}}"></script>
    {{-- select2 CDN  --}}
    <link href="{{asset('asset/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('asset/sweetalert.css')}}" rel="stylesheet">


    <!-- Pagination-->
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}

  </head>

  <body class="app main-bg header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    @include('layout.header')

    <div class="app-body">


        @include('layout.leftnavbar')


        @yield('content')


    </div>

   @include('layout.footer')

    <!-- CoreUI and necessary plugins-->
    @yield('script')
    <script src="{{ asset('vendors/jquery/js/jquery.min.js') }}"></script>
    <script src="{{asset ('vendors/popper.js/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/pace-progress/js/pace.min.js') }}"></script>
    <script src="{{ asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendors/@coreui/coreui-pro/js/coreui.min.js') }}"></script>
    {{-- select2-jquery --}}
    <script src="{{ asset('asset/select2_jquery.min.js') }}"></script>
    {{-- Jquery --}}
<script src="{{asset('asset/jquery-3.6.0.js')}}" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
{{-- select2 CDN --}}
<script src="{{asset('asset/select2.min.js')}}"></script>
{{-- Axios  --}}
<script src="{{asset('asset/axios.min.js')}}"></script>
{{-- sweet_alert --}}
<script src="{{asset('asset/sweetalert2.min.js')}}"></script>
<script src="{{asset('sweetalert2@11.js')}}"></script>
  </body>
</html>
