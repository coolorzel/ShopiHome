<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
    <div class="sidebar">
        <!-- User Widget -->
        <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
                @if(empty(Auth::user()->avatar))

                    <div class="avatar avatar-xxl bg-warning me-3">
                        <span class="avatar-content">{{ ucwords(Auth::user()->name[0]) }}{{ ucwords(Auth::user()->lname[0]) }}</span>
                    </div>
                @else
                    <div class="avatar avatar-xxl me-3">
                        <img src="{{asset('assets/uploads/users/avatars/'.Auth::user()->avatar)}}" alt="" srcset="">
                    </div>
                @endif
            </div>
            <!-- User Name -->
            <h5 class="text-center">{{ Auth::user()->name }} {{ Auth::user()->lname }}</h5>
            <p>Dołączono {{ Auth::user()->created_at }}</p>
        </div>
        @can('MOD')
            <!-- Dashboard MOD Links -->
            <div class="widget user-dashboard-menu">
                <ul>
                    <li class="{{ request()->is('mod/ota') ? 'active' : '' }}{{ request()->is('mod/ota/*') ? 'active' : '' }}">
                        <a href="{{ route('offer.ota') }}"><i class="fa fa-bars"></i>Oferty do akceptacji
                            <span class="badge @if(count($ota) > 0) bg-warning text-info @else bg-info text-warning @endif ">{{ count($ota) }}</span></a>
                    </li>
                    <li>
                        <a href="{{ route('message.controll.mod') }}"><i class="fa fa-envelope"></i>Wiadomości wy/na
                            <span class="badge @if(count($mesmod) > 0) bg-warning text-info @else bg-info text-warning @endif ">{{ count($mesmod) }}</span></a>
                    </li>
                </ul>
            </div>
        @endcan
        <!-- Dashboard Links -->
        <div class="widget user-dashboard-menu">
            <ul>
                <li>
                    <a href=""><i class="fa fa-user"></i>Edytuj profil</a>
                </li>
                <li class="{{ request()->is('myProfile/offer') ? 'active' : '' }}{{ request()->is('myProfile/offer/*') ? 'active' : '' }}">
                    <a href="{{ route('offer.index') }}"><i class="fa fa-bars"></i>Moje oferty</a>
                </li>
                <li>
                    <a href=""><i class="fa fa-envelope"></i>Wiadomości</a>
                </li>
                <li>
                    <a href=""><i class="fa fa-cog"></i>Wyloguj</a>
                </li>
                <li>
                    <a href="" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Usuń konto</a>
                </li>
            </ul>
        </div>

        <!-- delete-account modal -->
        <!-- delete account popup modal start-->
        <!-- Modal -->
        <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        @if(empty(Auth::user()->avatar))

                            <div class="avatar avatar-xxl bg-warning me-3">
                                <span class="avatar-content">{{ ucwords(Auth::user()->name[0]) }}{{ ucwords(Auth::user()->lname[0]) }}</span>
                            </div>
                        @else
                            <div class="avatar avatar-xxl me-3">
                                <img src="{{asset('assets/uploads/users/avatars/'.Auth::user()->avatar)}}" alt="" srcset="">
                            </div>
                        @endif

                        <h6 class="py-2">Jesteś pewien, że chcesz usunąć konto?</h6>
                        <p>Ten proces jest nieodwracalny.</p>
                    </div>
                    <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Anuluj</button>
                        <button type="button" class="btn btn-danger">Usuń</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- delete account popup modal end-->
        <!-- delete-account modal -->

    </div>
</div>
