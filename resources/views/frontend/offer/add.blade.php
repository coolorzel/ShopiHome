@extends('layouts.frontend')

@section('title', 'Create offer')


@section('content')

    <section class="user-profile section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget welcome-message">
                        <h2><button type="button" class="btn btn-light" onClick="history.back();">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </button> Dodawanie oferty</h2>
                    </div>
        <hr>
                    <ul class="nav nav-pills nav-fill">
                        @foreach($category as $item)
                            <li class="create-object shadow-4">
                                <a href="{{ route('offer.create').'/'.strtolower($item->name) }}">
                                <span class="link-object">
                                    <i class="fa {{ $item->photo }}" aria-hidden="true"></i>
                                </span>
                                    <span class="link-text">{{ $item->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script>

    </script>
@endsection

