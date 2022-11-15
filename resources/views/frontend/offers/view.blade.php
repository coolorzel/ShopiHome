@extends('layouts.frontend')

@section('title', 'Create offer')


@section('content')

    <section class="section bg-gray">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="product-details">
                        <h1 class="product-title">{{ $offer->name }}</h1>
                        <div class="product-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-user-o"></i>Od: <a href="">{{ $owner->name }}</a></li>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i>Kategoria<a href="">{{ $category->name }}</a></li>
                                <li class="list-inline-item"><i class="fa fa-location-arrow"></i>Lokalizacja<a href="">{{ $offer->city }} / {{ $offer->postcode }}</a></li>
                            </ul>
                        </div>

                        <!-- product slider -->
                        <div class="product-slider">
                            @foreach($images as $item)
                                <div class="product-slider-item my-4" data-image="{{ asset('images/'.$offer->category_id.'/'.$offer->id.'/'.$item->name) }}">
                                    <img class="img-fluid w-100" src="{{ asset('images/'.$offer->category_id.'/'.$offer->id.'/'.$item->name) }}" alt="{{ $item->alt }}">
                                </div>
                            @endforeach
                        </div>
                        <!-- product slider -->

                        <div class="content mt-5 pt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                       aria-selected="true">Opis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                                       aria-selected="false">Szczegóły</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Opis oferty</h3>
                                    <p>{{ $offer->description }}</p>

                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <h3 class="tab-title">Więcej informacji</h3>
                                    <table class="table table-bordered product-table">
                                        <tbody>
                                        <tr>
                                            <td>Typ ogłoszenia</td>
                                            <td>{{ $type_offer->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Cena</td>
                                            <td>{{ $offer->regular_rent }}</td>
                                        </tr>
                                        <tr>
                                            <td>Dodano</td>
                                            <td>{{ $offer->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Miasto</td>
                                            <td>{{ $offer->city }}</td>
                                        </tr>
                                        <tr>
                                            <td>Województwo</td>
                                            <td>{{ $offer->state }}</td>
                                        </tr>
                                        <tr>
                                            <td>Wyposażenie</td>
                                            <td>{{ $eq }}</td>
                                        </tr>
                                        <tr>
                                            <td>Media</td>
                                            <td>{{ $me }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ogrzewanie</td>
                                            <td>{{ $he }}</td>
                                        </tr>
                                        <tr>
                                            <td>Zabezpieczenia</td>
                                            <td>{{ $se }}</td>
                                        </tr>
                                        <tr>
                                            <td>Opłaty</td>
                                            <td>{{ $cha }}</td>
                                        </tr>
                                        <tr>
                                            <td>Parking</td>
                                            <td>{{ $pa }}</td>
                                        </tr>
                                        <tr>
                                            <td>Dodatkowe informacje</td>
                                            <td>{{ $offer->additional_information }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <h3 class="tab-title">Product Review</h3>
                                    <div class="product-review">
                                        <div class="media">
                                            <!-- Avater -->
                                            <img src="images/user/user-thumb.jpg" alt="avater">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <h4>Cena</h4>
                            <p>$230</p>
                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5" src="images/user/user-thumb.jpg" alt="">
                            <h4><a href="">Jonathon Andrew</a></h4>
                            <p class="member-time">Member Since Jun 27, 2017</p>
                            <a href="">See all ads</a>
                            <ul class="list-inline mt-20">
                                <li class="list-inline-item"><a href="" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a></li>
                                <li class="list-inline-item"><a href="" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an
                                        offer</a></li>
                            </ul>
                        </div>
                        <!-- Map Widget -->
                        <div class="widget map">
                            <div class="map">
                                <div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- Container End -->
    </section>

@endsection

@section('scripts')

@endsection
