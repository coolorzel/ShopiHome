<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('acp.index') }}"><img src="{{ asset('admin/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item ">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>{{ __('Home') }}</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('acp') ? 'active' : '' }} ">
                    <a href="{{ route('acp.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub {{ request()->is('acp/users') ? 'active' : '' }}{{ request()->is('acp/user/*') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Users') }}</span>
                    </a>
                    <ul class="submenu {{ request()->is('acp/user/*') ? 'active' : '' }}{{ request()->is('acp/users') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->is('acp/user/*') ? 'active' : '' }}{{ request()->is('acp/users') ? 'active' : '' }}">
                            <a href="{{ route('acp.users') }}">{{ __('Users list') }}</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('acp.roles') }}">{{ __('Roles') }}</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('acp.permissions') }}">{{ __('Permissions') }}</a>
                        </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
