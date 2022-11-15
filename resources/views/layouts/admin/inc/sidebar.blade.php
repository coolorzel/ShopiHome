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
                <li class="sidebar-item {{ request()->is('acp/control') ? 'active' : '' }} ">
                    <a href="{{ route('acp.control') }}" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>{{ __('System control') }}</span>
                    </a>
                </li>
                <li class="sidebar-title">{{ __('Users & Permissions')}}</li>
                <li class="sidebar-item  {{ request()->is('acp/user') ? 'active' : '' }}{{ request()->is('acp/user/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.users') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Users') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/role') ? 'active' : '' }}{{ request()->is('acp/role/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.roles') }}" class="sidebar-link">
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>{{ __('Roles') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/permission') ? 'active' : '' }}{{ request()->is('acp/permission/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.permissions') }}" class="sidebar-link">
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>{{ __('Permissions') }}</span>
                    </a>
                </li>
                <li class="sidebar-title">{{ __('Offers Mod')}}</li>
                <li class="sidebar-item  {{ request()->is('acp/offer') ? 'active' : '' }}{{ request()->is('acp/offer/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.offer') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Offers') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/role') ? 'active' : '' }}{{ request()->is('acp/role/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.roles') }}" class="sidebar-link">
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>{{ __('Roles') }}</span>
                    </a>
                </li>
                <li class="sidebar-title">{{ __('Offers apps')}}</li>
                <li class="sidebar-item  {{ request()->is('acp/formcategory') ? 'active' : '' }}{{ request()->is('acp/formcategory/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.formcategory') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Category Forms') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/category') ? 'active' : '' }}{{ request()->is('acp/category/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.category') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Category') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/payment') ? 'active' : '' }}{{ request()->is('acp/payment/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.payment') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Payment') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/typeoffer') ? 'active' : '' }}{{ request()->is('acp/typeoffer/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.typeoffer') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Typeoffer') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/charges') ? 'active' : '' }}{{ request()->is('acp/charges/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.charges') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Charges') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/heating') ? 'active' : '' }}{{ request()->is('acp/heating/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.heating') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Heating') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/media') ? 'active' : '' }}{{ request()->is('acp/media/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.media') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Media') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/security') ? 'active' : '' }}{{ request()->is('acp/security/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.security') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Security') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/equipment') ? 'active' : '' }}{{ request()->is('acp/equipment/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.equipment') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Equipment') }}</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('acp/parking') ? 'active' : '' }}{{ request()->is('acp/parking/*') ? 'active' : '' }}">
                    <a href="{{ route('acp.parking') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ __('Parking') }}</span>
                    </a>
                </li>
                <!--<li class="sidebar-item  has-sub {{ request()->is('acp/users') ? 'active' : '' }}{{ request()->is('acp/user/*') ? 'active' : '' }}">
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
                </li>-->
            </ul>
            </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
