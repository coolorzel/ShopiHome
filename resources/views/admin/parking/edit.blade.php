@extends('layouts.admin')

@section('title', 'Edit parking')

@section('heading')
    {{ __('Edit parking for site') }}
@endsection

@section('description')
    {{ __('Edit parking') }}
@endsection

@section('navlink')
    {{--<li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>--}}
    <li class="breadcrumb-item"><a href="{{ route('acp.index') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('acp.parking') }}">Parking</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit parking</li>
@endsection

@section('content')
    <div class="page-content">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Edit parking') }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <form method="post"  enctype="multipart/form-data" class="form" action="{{ route('acp.parking.update', $parking->id) }}">

                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('Name parking') }}</label>
                                                <input type="text" id="first-name-column" class="form-control" value="{{ $parking->name }}" name="name">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">{{ __('Save parking') }}</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

@section('scripts')


@endsection
