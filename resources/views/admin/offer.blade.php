@extends('layouts.admin')

@section('title', 'Offer')

@section('heading')
    {{ __('Offer') }}
@endsection

@section('description')
    {{ __('List Offer') }}
@endsection

@section('navlink')
    {{--<li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>--}}
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Offer</li>
@endsection

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    {{ __('Active offer') }}
                </div>
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                        <tr>
                            <th>Offer nr</th>
                            <th>Name</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($offers as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="{{asset('images/'.$item->category_id.'/'.$item->id.'/'.\App\Models\images::where('id', $item->images_id)->pluck('name')->first())}}"
                                                alt=""
                                                style="width: 45px; height: 45px"
                                                class="rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $item->name }}</p>
                                                <p class="text-muted mb-0">{{ $item->short_description }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="{{asset('images/'.$item->category_id.'/'.$item->id.'/'.\App\Models\images::where('id', $item->images_id)->pluck('name')->first())}}"
                                                alt=""
                                                style="width: 45px; height: 45px"
                                                class="rounded-circle"
                                            />
                                            <div class="ms-3">
                                            <p class="fw-normal mb-1">{{ \App\Models\User::where('id', $item->user_id)->pluck('name')->first() }} {{ \App\Models\User::where('id', $item->user_id)->pluck('lname')->first() }}</p>
                                            <p class="text-muted mb-0">{{ \App\Models\User::where('id', $item->user_id)->pluck('email')->first() }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($item->isCreated == 1 AND $item->isActive == 0 AND $item->isDeactive == 0 AND $item->isAcceptMod == 0)
                                            <span class="badge bg-warning rounded-pill d-inline">Is Created</span>
                                        @endif

                                            @if($item->isActive == 1 AND $item->isCreated == 0)
                                                <span class="badge bg-success rounded-pill d-inline">Active</span>
                                            @endif

                                            @if($item->isDeactive == 1)
                                                <span class="badge bg-secondary rounded-pill d-inline">Deleted</span>
                                            @endif

                                            @if($item->isAcceptMod == 0 AND $item->isCreated == 0 AND $item->isDeactive == 0)
                                                <span class="badge bg-info rounded-pill d-inline">Wait to Accept</span>
                                            @endif
                                    </td>
                                    <td>{{ \App\Models\Category::where('id', $item->category_id)->pluck('name')->first() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm btn-rounded">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>

        </section>
    </div>

@endsection

@section('scripts')

@endsection
