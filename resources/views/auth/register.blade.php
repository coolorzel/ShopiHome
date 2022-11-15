@extends('layouts.app')

@section('content')

    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">{{ __('Register') }}</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <fieldset class="p-4">
                                <input id="name" type="text" placeholder="{{ __('Name') }}" class="border p-3 w-100 my-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <input id="lname" type="text" placeholder="{{ __('Last name') }}" class="border p-3 w-100 my-2 @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                                <input id="username" type="text" placeholder="{{ __('Username') }}" class="border p-3 w-100 my-2 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
                                <input id="email" type="email" placeholder="{{ __('Address email') }}" class="border p-3 w-100 my-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <input id="password" type="password" placeholder="{{ __('Password') }}" class="border p-3 w-100 my-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <input id="password-confirm" type="password" placeholder="{{ __('Confirm password') }}" class="border p-3 w-100 my-2" name="password_confirmation" required autocomplete="new-password">
                                <div class="loggedin-forgot d-inline-flex my-3">
                                    <input type="checkbox" id="registering" class="mt-1" value="true" onclick="activateSubmitBtn()">
                                    <label for="registering" class="px-2">{{ __('Oświadczam, że akceptuję') }} <a class="text-primary font-weight-bold" href="#">{{ __('Regulamin') }}</a></label>
                                </div>
                                <button id="register" type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold" disabled>{{ __('Register') }}</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
        $('#register').prop("disabled", true);
        $('#registering').on("change",function(){
            if($('#registering:checked').length>0)
                $('#register').prop("disabled",false);
            else
                $('#register').prop("disabled",true);
        });
    </script>

    <script>

        function activateSubmitBtn()
        {
            $('#registering').change(function () {
                $('#submitClick').prop("disabled", !this.checked);
            }).change()

            if (!$('#registering').prop("checked")) {
                alert("Zaakceptuj regulamin!");
            }
        }

    </script>

@endsection

@section('content2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
