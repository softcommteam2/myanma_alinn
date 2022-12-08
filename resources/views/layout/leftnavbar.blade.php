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
