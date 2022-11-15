<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ url('/frontend/images/logo.png') }}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Strona główna</a>
                            </li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Mój profil<span><i class="fa fa-angle-down"></i></span>
                                </a>

                                <!-- Dropdown list -->
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard.html">Szczegóły</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Więcej <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="user-profile.html">Moje dane</a>
                                    <a class="dropdown-item" href="contact-us.html">Kontakt</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Oferta <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="category.html">Przeglądaj</a>
                                </div>
                            </li>
                        </ul>
                        @guest
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">{{ Auth::user()->name }}</span>
                                    </a>

                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        @can('ACP-view')
                                            <a class="dropdown-item" href="{{ route('acp.index') }}">{{ __('ACP') }}</a>
                                        @endcan
                                        @can('USER-offer-menagement')
                                                <a class="dropdown-item" href="{{ route('offer.index') }}">{{ __('Offers') }}</a>
                                        @endcan
                                        @can('USER-offer-menagement')
                                                <a class="dropdown-item" href="{{ route('offer.create') }}">{{ __('Create Offers') }}</a>
                                        @endcan
                                        <a class="dropdown-item" href="#">Edytuj profil</a>
                                        <a class="dropdown-item" href="#">Szczegóły konta</a>
                                        <a class="dropdown-item" href="#">Wiadomości</a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
