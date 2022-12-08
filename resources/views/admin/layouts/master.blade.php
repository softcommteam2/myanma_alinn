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

    {{-- toggle --}}
    <link href="{{ asset('asset/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <script src="{{ asset('asset/bootstrap-toggle.min.js') }}"></script>
    {{-- select2 CDN  --}}
    <link href="{{ asset('asset/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/sweetalert.css') }}" rel="stylesheet">
    @yield('script_links')

</head>

<body class="app main-bg header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <!-- HEADER -->
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
            $dt = new DateTime();
        @endphp
        <a class="navbar-brand" href="{{ url('home') }}">
            <img class="navbar-brand-full" src="{{ asset('images/logo_withoud_address.png') }}" width="full"
                height="50" alt="Myanma_Alinn Logo">
            {{-- <img class="navbar-brand-minimized" src="{{ asset('images/bluemirror.png') }}" width="30" height="30" alt="CoreUI Logo"> --}}
        </a>

        <strong><i class="fa fa-calendar text-primary"></i> : <?= $dt->format('Y-m-d') ?></strong>

        <ul class="nav navbar-nav ml-autod-flex justify-content-between">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link rounded-circle" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    @auth
                        <strong class="btn btn-primary lg mr-5 text-light rounded-circle">{{ Auth::user()->name }}</strong>
                    @endauth
                    {{-- <img class="img-avatar mr-3" src="images/profile.jpeg" alt="admin@bootstrapmaster.com"> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>@auth
                                <strong>{{ Auth::user()->role->name }}</strong>
                            @endauth
                        </strong>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" onclick="return confirm('Are you sure to logout?')"
                            class="btn btn-primary dropdown-item"><i class="fa fa-lock"></i>Logout</a></button>
                        <a href="{{ asset('help.docx.pdf') }}" target="_blank" class="btn btn-primary dropdown-item"><i
                                class="fa fa-question-circle"></i>Help</a>
                    </form>
                </div>
            </li>
            <li>
            </li>
        </ul>
    </header>
    <!-- HEADER END -->
    <div class="app-body">
        <!-- SIDE BAR -->
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">Navigation</li>
                    <li class="nav-item hover:main-bg">
                        <a class="nav-link" href="home">
                            <i class="nav-icon icon-home"></i> Home</a>
                    </li>
                    @if (Auth::user()->role->id == 1)
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle">
                                <i class="nav-icon icon-puzzle"></i> Setup</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item hover:main-bg">
                                    <a class="nav-link" href="{{ url('category') }}">
                                        <i class="nav-icon icon-puzzle"></i> Item Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('itemsku') }}">
                                        <i class="nav-icon icon-puzzle"></i> Item SKU</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('items') }}">
                                        <i class="nav-icon icon-puzzle"></i> Items</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('customer') }}">
                                        <i class="nav-icon icon-puzzle"></i> Customers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('accounts') }}">
                                        <i class="nav-icon icon-puzzle"></i> Accounts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('users') }}">
                                        <i class="nav-icon icon-puzzle"></i> Users</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('sales') }}">
                                <i class="nav-icon icon-drop"></i> Sales</a>
                        </li>

                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle">
                                <i class="nav-icon icon-pencil"></i> Reports</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('timeframe') }}">
                                        <i class="nav-icon icon-pencil"></i> Time Frame</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('record') }}">
                                        <i class="nav-icon icon-pencil"></i> Record</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('dateadjust') }}">
                                <i class="nav-icon icon-drop"></i> Date Adjustment</a>
                        </li>
                    @elseif (Auth::user()->role->id == 2)
                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle">
                                <i class="nav-icon icon-puzzle"></i> Setup</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('customer') }}">
                                        <i class="nav-icon icon-puzzle"></i> Customers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('items') }}">
                                        <i class="nav-icon icon-puzzle"></i> Items</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('itemsku') }}">
                                        <i class="nav-icon icon-puzzle"></i> Item SKU</a>
                                </li>
                                <li class="nav-item hover:main-bg">
                                    <a class="nav-link" href="{{ url('category') }}">
                                        <i class="nav-icon icon-puzzle"></i> Item Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('accounts') }}">
                                        <i class="nav-icon icon-puzzle"></i> Accounts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('users') }}">
                                        <i class="nav-icon icon-puzzle"></i> Users</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('sales') }}">
                                <i class="nav-icon icon-drop"></i> Sales</a>
                        </li>

                        <li class="nav-item nav-dropdown">
                            <a class="nav-link nav-dropdown-toggle">
                                <i class="nav-icon icon-pencil"></i> Reports</a>
                            <ul class="nav-dropdown-items">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('timeframe') }}">
                                        <i class="nav-icon icon-pencil"></i> Time Frame</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset('record') }}">
                                        <i class="nav-icon icon-pencil"></i> Record</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('dateadjust') }}">
                                <i class="nav-icon icon-drop"></i> Date Adjustment</a>
                        </li>
                    @elseif (Auth::user()->role->id == 3)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ asset('sales') }}">
                                <i class="nav-icon icon-drop"></i> Sales</a>
                        </li>
                    @else
                        <li class="nav-item">
                            Nothing to show
                        </li>
                    @endif
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>
        <!-- SIDE BAR END -->
        @yield('content')

    </div>

    <footer class="app-footer">
        <div>
            <a href="http://softcomm.kmd.com.sg/" target="_blank">Softcomm Technology</a>
            <span>&copy; {{ date('Y') }}</span>
        </div>
        <div class="ml-auto">
            <span>Powered by</span>
            <a href="http://softcomm.kmd.com.sg/" target="_blank">Softcomm Technology</a>
        </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('vendors/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/popper.js/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/pace-progress/js/pace.min.js') }}"></script>
    <script src="{{ asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendors/@coreui/coreui-pro/js/coreui.min.js') }}"></script>
    {{-- select2-jquery --}}
    <script src="{{ asset('asset/select2_jquery.min.js') }}"></script>
    {{-- Jquery --}}
    <script src="{{ asset('asset/jquery-3.6.0.js') }}" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    {{-- select2 CDN --}}
    <script src="{{ asset('asset/select2.min.js') }}"></script>
    {{-- Axios  --}}
    <script src="{{ asset('asset/axios.min.js') }}"></script>
    {{-- sweet_alert --}}
    <script src="{{ asset('asset/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('sweetalert2@11.js') }}"></script>
    @yield('script')
</body>

</html>
