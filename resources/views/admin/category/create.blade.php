@extends('layouts.admin')

@section('title', 'Create category')

@section('heading')
    {{ __('Create new category for site') }}
@endsection

@section('description')
    {{ __('Create category') }}
@endsection

@section('navlink')
    {{--<li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>--}}
    <li class="breadcrumb-item"><a href="{{ route('acp.index') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('acp.category') }}">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create category</li>
@endsection

@section('content')
    <div class="page-content">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Create category') }} </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <form method="post"  enctype="multipart/form-data" class="form" action="{{ route('acp.category.created') }}">

                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('Name category') }}</label>
                                                <input type="text" id="first-name-column" class="form-control" value="{{ old('name') }}" name="name" required>
                                                @if ($errors->has('name'))
                                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('Select image') }}</label>
                                                <fieldset>
                                                    <div class="input-group">
                                                        <select class="form-select" id="basicSelect" name="photo" onchange="changev(this.value);">
                                                            @include('admin.category.inc.select')
                                                        </select>
                                                        <label class="input-group-text" for="inputGroupSelect01">
                                                            <i id="view-fa" class="fa fa-home" aria-hidden="true" style="font-size: 24px;"></i>
                                                        </label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-12">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                                                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('Keywords') }}</label>
                                                <input type="text" id="first-name-column" class="form-control" value="{{ old('keywords') }}" name="keywords" required>
                                                @if ($errors->has('keywords'))
                                                    <span class="text-danger text-left">{{ $errors->first('keywords') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="form-group form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="enable">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Active category</label>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-lg">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="all_form"></th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($formcategory as $item)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox"
                                                                   name="formcat[{{ $item->name }}]"
                                                                   value="{{ $item->id }}"
                                                                   class='formcat'>
                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->type }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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

    <script>
        function changev(change)
        {
            $('#view-fa').removeClass().addClass('fa '+change);
        }

    </script>

    <script>
        $(document).ready(function() {
            $('[name="all_form"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.formcat'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.formcat'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection
