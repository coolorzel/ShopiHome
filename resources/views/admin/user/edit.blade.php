@extends('layouts.admin')

@section('title', 'Edit user')

@section('heading')
    {{ __('Edit User Parameters') }}
@endsection

@section('description')
    {{ __('Edit user') }}
@endsection

@section('navlink')
    {{--<li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>--}}
    <li class="breadcrumb-item"><a href="{{ route('acp.index') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('acp.users') }}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $user->email }}</li>
@endsection

@section('content')
    <div class="page-content">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('User with edit') }} {{$user->email}}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" class="form" action="{{ route('acp.user.edited.avatar', $user->id) }}">

                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            @if(empty($user->avatar))

                                                <div class="avatar avatar-xxl bg-warning me-3">
                                                    <span class="avatar-content">{{ ucwords($user->name[0]) }}{{ ucwords($user->lname[0]) }}</span>
                                                </div>
                                            @else
                                                <div class="avatar avatar-xxl me-3">
                                                    <img src="{{asset('assets/uploads/users/avatars/'.$user->avatar)}}" alt="" srcset="">
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('Choice avatar') }}</label>
                                                <fieldset>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="avatar" accept="image/png, image/gif, image/jpeg, image/jpg" />
                                                        <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">Upload</button>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="button" class="btn btn-primary me-1 mb-1" data-bs-toggle="modal" data-bs-target="#inlineForm">{{ __('Edit password') }}</button>
                                                <button type="button" class="btn btn-warning me-1 mb-1" data-bs-toggle="modal" data-bs-target="#danger">{{ __('Delete account') }}</button>
                                            </div>
                                        </div>

                                        </div>

                                </form>

                                <form method="post"  enctype="multipart/form-data" class="form" action="{{ route('acp.user.edited', $user->id) }}">

                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-1 col-12">
                                            <label for="disabledInput">ID</label>
                                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="{{ $user->id }}">
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('First Name') }}</label>
                                                <input type="text" id="first-name-column" class="form-control" value="{{ $user->name }}" name="name">

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">{{ __('Last Name') }}</label>
                                                <input type="text" id="last-name-column" class="form-control" value="{{ $user->lname }}" name="lname">

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="city-column">{{ __('City') }}</label>
                                                <input type="text" id="city-column" class="form-control" value="{{ $user->city }}" name="city">

                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">{{ __('Zip') }}</label>
                                                <input type="text" id="zip-floating" class="form-control" name="zipcode" value="{{ $user->zipcode }}">

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="city-column">{{ __('Street') }}</label>
                                                <input type="text" id="city-column" class="form-control" value="{{ $user->street }}" name="street">

                                            </div>
                                        </div>
                                        <div class="col-md-1 col-12">
                                            <div class="form-group">
                                                <label for="city-column">{{ __('Number') }}</label>
                                                <input type="tel" id="city-column" class="form-control" value="{{ $user->number }}" name="number">

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">{{ __('Country') }}</label>
                                                <input type="text" id="country-floating" class="form-control" name="country" value="{{ $user->country }}">

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="company-column">{{ __('Username') }}</label>
                                                <input type="text" id="company-column" class="form-control" name="username" value="{{ $user->username }}">

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">{{ __('Email') }}</label>
                                                <input type="email" id="email-id-column" class="form-control" name="email" value="{{ $user->email }}">

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">{{ __('Phone') }}</label>
                                                <input type="text" id="email-id-column" class="form-control" name="phone" value="{{ $user->phone }}">

                                            </div>
                                        </div>



                                        <div class="col-md-6 mb-4">

                                            <h6>{{ __('Choice role') }}</h6>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01">{{ __('Roles') }}</label>
                                                <select class="form-select" id="inputGroupSelect01" name="role">
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}"
                                                            {{ in_array($role->name, $userRole)
                                                                ? 'selected'
                                                                : '' }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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

    <div class="modal fade text-left" id="inlineForm" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
             role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">{{ __('Change password') }} </h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form method="post" action="{{ route('acp.user.edited.password', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <label>{{ __('Password:') }} </label>
                        <div class="form-group">
                            <input type="password" placeholder="New password"
                                   class="form-control" name="password">
                        </div>
                        <label>{{ __('Repeat password') }} </label>
                        <div class="form-group">
                            <input type="password" placeholder="Repeat password"
                                   class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="IsActive" class="col-md-11 col-form-label">Confim change password</label>
                        <div class="form-check col-md-1">
                            <input class="form-check-input" type="checkbox" value="true" id="IsActiveCheck" name="IsActiveCheck">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">{{ __('Cancle') }}</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1"
                                id="deleteActiveChange">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">{{ __('Change') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade text-left" id="danger" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel120"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
             role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">
                        {{ __('Delete account') }}
                    </h5>
                    <button type="button" class="close"
                            data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form method="post" action="{{ route('acp.user.delete', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        {{ __('Account') }} <b>{{$user->email}}</b> {{ __('will be deleted and cannot be restored.') }}

                        <hr>
                        <div class="form-group row">
                            <label for="IsActive" class="col-md-11 col-form-label">Confim delete account</label>
                            <div class="form-check col-md-1">
                                <input class="form-check-input" type="checkbox" value="true" id="IsActive" name="IsActive">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">{{ __('Cancle') }}</span>
                        </button>
                        <button type="submit" class="btn btn-danger ml-1" id="deleteActive">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">{{ __('Delete') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('admin/js/custom.input.file.js') }}" defer></script>

    <script>




        $('#deleteActiveChange').prop("disabled", true);
        $('#IsActiveCheck').on("change",function(){
            if($('#IsActiveCheck:checked').length>0)
                $('#deleteActiveChange').prop("disabled",false);
            else
                $('#deleteActiveChange').prop("disabled",true);
        });

        $('#deleteActive').prop("disabled", true);
        $('#IsActive').on("change",function(){
            if($('#IsActive:checked').length>0)
                $('#deleteActive').prop("disabled",false);
            else
                $('#deleteActive').prop("disabled",true);
        });

    </script>
    <script>
        @if ($errors->has('name'))

                Toastify({
                    text: "{{ $errors->first('name') }}",
                    duration: 3000,
                    close:true,
                    gravity:"top",
                    position: "right",
                    backgroundColor: "#ff4343",
                }).showToast();
        @endif
        @if ($errors->has('lname'))
                Toastify({
                    text: "{{ $errors->first('lname') }}",
                    duration: 3000,
                    close:true,
                    gravity:"top",
                    position: "right",
                    backgroundColor: "#ff4343",
                }).showToast();
        @endif
        @if ($errors->has('username'))
                Toastify({
                    text: "{{ $errors->first('username') }}",
                    duration: 3000,
                    close:true,
                    gravity:"top",
                    position: "right",
                    backgroundColor: "#ff4343",
                }).showToast();
        @endif
        @if ($errors->has('city'))
                Toastify({
                    text: "{{ $errors->first('city') }}",
                    duration: 3000,
                    close:true,
                    gravity:"top",
                    position: "right",
                    backgroundColor: "#ff4343",
                }).showToast();
        @endif
        @if ($errors->has('zip'))
                Toastify({
                    text: "{{ $errors->first('zip') }}",
                    duration: 3000,
                    close:true,
                    gravity:"top",
                    position: "right",
                    backgroundColor: "#ff4343",
                }).showToast();
        @endif
        @if ($errors->has('street'))
                Toastify({
                    text: "{{ $errors->first('street') }}",
                    duration: 3000,
                    close:true,
                    gravity:"top",
                    position: "right",
                    backgroundColor: "#ff4343",
                }).showToast();
        @endif
        @if ($errors->has('country'))
            Toastify({
                text: "{{ $errors->first('country') }}",
                duration: 3000,
                close:true,
                gravity:"top",
                position: "right",
                backgroundColor: "#ff4343",
            }).showToast();
        @endif
        @if ($errors->has('number'))
            Toastify({
                text: "{{ $errors->first('number') }}",
                duration: 3000,
                close:true,
                gravity:"top",
                position: "right",
                backgroundColor: "#ff4343",
            }).showToast();
        @endif
        @if ($errors->has('phone'))
            Toastify({
                text: "{{ $errors->first('phone') }}",
                duration: 3000,
                close:true,
                gravity:"top",
                position: "right",
                backgroundColor: "#ff4343",
            }).showToast();
        @endif
        @if ($errors->has('email'))
        Toastify({
            text: "{{ $errors->first('email') }}",
            duration: 3000,
            close:true,
            gravity:"top",
            position: "right",
            backgroundColor: "#ff4343",
        }).showToast();
        @endif
        @if ($errors->has('password'))
        Toastify({
            text: "{{ $errors->first('password') }}",
            duration: 3000,
            close:true,
            gravity:"top",
            position: "right",
            backgroundColor: "#ff4343",
        }).showToast();
        @endif
    </script>
@endsection
