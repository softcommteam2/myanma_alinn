<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    @php
        $dt = new DateTime();
    @endphp
    <a class="navbar-brand" href="{{ url('home') }}">
        <img class="navbar-brand-full" src="{{ asset('images/logo_withoud_address.png') }}" width="full" height="50"
            alt="KyayMone Logo">
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
                    <button type="submit" class="btn btn-primary dropdown-item"><i
                            class="fa fa-lock"></i>Logout</a></button>
                    <a href="{{ asset('help.docx.pdf') }}" target="_blank" class="btn btn-primary dropdown-item"><i
                            class="fa fa-question-circle"></i>Help</a>
                </form>
            </div>
        </li>
        <li>
        </li>
    </ul>
</header>
