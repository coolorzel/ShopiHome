<nav class="navbar navbar-expand navbar-light ">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown me-1">
                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-envelope bi-sub fs-4 text-gray-600"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">{{ __('Mail') }}</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">{{ __('No new mail') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3">
                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="bi bi-bell bi-sub fs-4 text-gray-600"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">
                                {{ __('Notifications') }}
                            </h6>
                        </li>
                        <li><a class="dropdown-item">{{ __('No notification available') }}</a></li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                            <p class="mb-0 text-sm text-gray-600">
                                    @foreach(Auth::user()->roles->pluck('name')->toArray() as $roles)
                                        {{ ucwords($roles) }}
                                    @endforeach
                            </p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            @if (Auth::check() && Auth::user()->avatar)
                                <div class="avatar avatar-lg me-3">
                                    <img src="{{ asset('assets/avatars/'.Auth::user()->avatar) }}" alt="" srcset="">
                                </div>
                            @else
                                <div class="avatar avatar-lg bg-warning me-3">
                                    <span class="avatar-content">{{ ucwords(Auth::user()->name[0]) }}{{ ucwords(Auth::user()->lname[0]) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li>
                        <h6 class="dropdown-header">Hello, John!</h6>
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                            Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                            Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="icon-mid bi bi-box-arrow-left me-2"></i> {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
