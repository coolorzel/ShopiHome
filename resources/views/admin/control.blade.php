@extends('layouts.admin')

@section('title', 'Control')

@section('heading')
    {{ __('Control') }}
@endsection

@section('description')
    {{ __('Control System') }}
@endsection

@section('navlink')
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a></li>
    {{--<li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>--}}
    <li class="breadcrumb-item active" aria-current="page">{{ __('Control system') }}</li>
@endsection

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Control Role</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>Control standard role name.
                            </p>
                            <ul class="list-group">
                                @foreach($roles as $role)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span> {{$role}}</span>
                                        <span class="badge @if(in_array($role, $db_roles)) bg-warning @else bg-danger @endif badge-pill badge-round ml-1">
                                            @if(in_array($role, $db_roles))
                                                Istnieje
                                            @else
                                                Nie istnieje
                                            @endif
                                        </span>
                                    </li>
                                @endforeach
                            </ul>

                            <p>
                                Additionally added roles.
                            </p>
                            <ul class="list-group">
                                @foreach($db_rolesnew as $role)
                                        @if(in_array($role->name, $roles))

                                        @else
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{$role->name}}</span>
                                            <span class="badge bg-primary badge-pill badge-round ml-1">
                                                Created: {{ $role->created_at }}
                                            </span>
                                        </li>
                                        @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Super Admin</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>Control exists Super Admin user
                            </p>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action active">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 text-white">List group item heading</h5>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">
                                        Donec id elit non mi porta gravida at eget metus. Maecenas sed
                                        diam eget risus varius blandit.
                                    </p>
                                    <small>Donec id elit non mi porta.</small>
                                </a>
                                @foreach($users as $item)
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ __('Super Admin email') }}</h5>
                                        <small>Active</small>
                                    </div>
                                    <p class="mb-1">
                                        Username:
                                        e'Mail: {{ $item }}
                                    </p>
                                    <small>Donec id elit non mi porta.</small>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Control Permissions</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>Control standard permission name.
                            </p>
                            <ul class="list-group">
                                @foreach($permission as $perm)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span> {{$perm}}</span>
                                    <span class="badge @if(in_array($perm, $db_permissions)) bg-warning @else bg-danger @endif badge-pill badge-round ml-1">
                                        @if(in_array($perm, $db_permissions))
                                        Istnieje
                                        @else
                                        Nie istnieje
                                        @endif

                                    </span>
                                </li>
                                @endforeach
                            </ul>
                            <p>
                                Additionally added permissions.
                            </p>
                            <ul class="list-group">
                                @foreach($db_permissionsnew as $permi)
                                    @if(in_array($permi->name, $permission))

                                    @else
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{ $permi->name }}</span>
                                            <span class="badge bg-primary badge-pill badge-round ml-1">
                                                Created: {{ $permi->created_at }}
                                            </span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
