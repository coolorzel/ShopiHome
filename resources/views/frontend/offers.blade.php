@extends('layouts.frontend')

@section('title', 'Create offer')


@section('content')

    <section class="dashboard section">
        <!-- Container Start -->
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                @include('frontend.offer.inc.navbar')
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <!-- Recently Favorited -->


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">{{ __('My all offers') }}</h5>
                                    </div>
                                    <div class="card">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="active-tab" data-bs-toggle="tab" href="#active" role="tab"
                                                   aria-controls="active" aria-selected="true">{{ __('Active') }} <span class="badge bg-secondary">{{ count($offers) }}</span></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="older-tab" data-bs-toggle="tab" href="#older" role="tab"
                                                   aria-controls="older" aria-selected="false">{{ __('Older') }} <span class="badge bg-secondary">{{ count($offers_deactive) }}</span></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="waitforaccept-tab" data-bs-toggle="tab" href="#waitforaccept" role="tab"
                                                   aria-controls="waitforaccept" aria-selected="false">{{ __('To accept') }} <span class="badge bg-secondary">{{ count($offers_waitforaccept) }}</span></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="active-tab">
                                                <div class="widget dashboard-container my-adslist">
                                                    @if(($offers->isEmpty()))
                                                        <h3 class="widget-header">Brak ofert...</h3>
                                                    @else

                                                        <table class="table table-responsive product-dashboard-table">
                                                            <thead>
                                                            <tr>
                                                                <th>Zdjęcie</th>
                                                                <th>Tytuł</th>
                                                                <th class="text-center">Kategoria</th>
                                                                <th class="text-center">Akcje</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($offers as $item)
                                                                <tr>
                                                                    <td class="product-thumb">
                                                                        <img width="80px" height="auto" src="{{asset('images/'.$item->category_id.'/'.$item->id.'/'.\App\Models\images::where('id', $item->images_id)->pluck('name')->first())}}" alt="image description"></td>
                                                                    <td class="product-details">
                                                                        <h3 class="title">{{ $item->name }}</h3>
                                                                        <span class="add-id"><strong>Ad ID:</strong> {{ $item->id }}</span>
                                                                        <span><strong>Posted on: </strong><time>{{ $item->created_at }}</time> </span>
                                                                        <span class="status active"><strong>Status</strong>@if($item->isActive == true) Active @else Deactive @endif</span>
                                                                        <span class="location"><strong>Location</strong>{{ $item->city }} {{ $item->state }} {{ $item->postcode }}</span>
                                                                    </td>
                                                                    <td class="product-category"><span class="categories">@foreach($category as $cat) @if($cat->id == $item->category_id) {{$cat->name}} @endif @endforeach</span></td>
                                                                    <td class="action" data-title="Action">
                                                                        <div class="">
                                                                            <ul class="list-inline justify-content-center">
                                                                                <li class="list-inline-item">
                                                                                    <a data-toggle="tooltip" data-placement="top" title="View" class="view" href="{{ route('offer.view', $item->id) }}">
                                                                                        <i class="fa fa-eye"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="{{ route('offer.edit', $item->id)}}">
                                                                                        <i class="fa fa-pencil"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                <span data-toggle="modal" data-target="#deleteoffer{{ $item->id }}">
                                                <a data-toggle="tooltip" class="delete" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                </span>
                                                                                </li>


                                                                            </ul>
                                                                        </div>
                                                                        <!-- delete-offer modal -->
                                                                        <!-- delete offer popup modal start-->
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="deleteoffer{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                                             aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header border-bottom-0">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body text-center">
                                                                                        <h6 class="py-2">Jesteś pewien, że chcesz dezaktywować to ogłoszenie?</h6>
                                                                                        <p>Dostęp do tej oferty zostanie ograniczony.</p>
                                                                                    </div>
                                                                                    <form action="{{ route('offer.delete', $item) }}" method="post" id="add-offer-form">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Anuluj</button>
                                                                                            <button type="submit" class="btn btn-danger">Dezaktywuj</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- delete offer popup modal end-->
                                                                        <!-- delete-offer modal -->
                                                                    </td>
                                                                </tr>
                                                            @endforeach


                                                            </tbody>
                                                        </table>

                                                    @endif

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="older" role="tabpanel" aria-labelledby="older-tab">
                                                <div class="widget dashboard-container my-adslist">
                                                    @if(($offers_deactive->isEmpty()))
                                                        <h3 class="widget-header">Brak ofert...</h3>
                                                    @else

                                                        <table class="table table-responsive product-dashboard-table">
                                                            <thead>
                                                            <tr>
                                                                <th>Zdjęcie</th>
                                                                <th>Tytuł</th>
                                                                <th class="text-center">Kategoria</th>
                                                                <th class="text-center">Akcje</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($offers_deactive as $item)
                                                                <tr>
                                                                    <td class="product-thumb">
                                                                        <img width="80px" height="auto" src="{{asset('images/'.$item->category_id.'/'.$item->id.'/'.\App\Models\images::where('id', $item->images_id)->pluck('name')->first())}}" alt="image description"></td>
                                                                    <td class="product-details">
                                                                        <h3 class="title">{{ $item->name }}</h3>
                                                                        <span class="add-id"><strong>Ad ID:</strong> {{ $item->id }}</span>
                                                                        <span><strong>Posted on: </strong><time>{{ $item->created_at }}</time> </span>
                                                                        <span class="status active"><strong>Status</strong>@if($item->isActive == true) Active @else Deactive @endif</span>
                                                                        <span class="location"><strong>Location</strong>{{ $item->city }} {{ $item->state }} {{ $item->postcode }}</span>
                                                                    </td>
                                                                    <td class="product-category"><span class="categories">@foreach($category as $cat) @if($cat->id == $item->category_id) {{$cat->name}} @endif @endforeach</span></td>
                                                                    <td class="action" data-title="Action">
                                                                        <div class="">
                                                                            <ul class="list-inline justify-content-center">
                                                                                <li class="list-inline-item">
                                                                                    <a data-toggle="tooltip" data-placement="top" title="View" class="view" href="{{ route('offer.view', $item->id) }}">
                                                                                        <i class="fa fa-eye"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="{{ route('offer.edit', $item->id)}}">
                                                                                        <i class="fa fa-pencil"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                <span data-toggle="modal" data-target="#activeoffer{{ $item->id }}">
                                                <a data-toggle="tooltip" class="active" data-placement="top" title="Delete"><i class="fa fa-check"></i></a>
                                                </span>
                                                                                </li>


                                                                            </ul>
                                                                        </div>
                                                                        <!-- delete-offer modal -->
                                                                        <!-- delete offer popup modal start-->
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="activeoffer{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                                             aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header border-bottom-0">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body text-center">
                                                                                        <h6 class="py-2">Ogłoszenie zostanie wysłane do ponownej weryfikacji.</h6>
                                                                                        <p>Po pozytywnym rozpatrzeniu, zostanie udostępnione dla przeglądających.</p>
                                                                                    </div>
                                                                                    <form action="{{ route('offer.active', $item) }}" method="post" id="add-offer-form">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Anuluj</button>
                                                                                            <button type="submit" class="btn btn-success">Aktywuj</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- delete offer popup modal end-->
                                                                        <!-- delete-offer modal -->
                                                                    </td>
                                                                </tr>
                                                            @endforeach


                                                            </tbody>
                                                        </table>

                                                    @endif

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="waitforaccept" role="tabpanel" aria-labelledby="waitforaccept-tab">
                                                <div class="widget dashboard-container my-adslist">
                                                    @if(($offers_waitforaccept->isEmpty()))
                                                        <h3 class="widget-header">Brak ofert...</h3>
                                                    @else


                                                        <h3 class="widget-header">Moje oferty</h3>
                                                        <table class="table table-responsive product-dashboard-table">
                                                            <thead>
                                                            <tr>
                                                                <th>Zdjęcie</th>
                                                                <th>Tytuł</th>
                                                                <th class="text-center">Kategoria</th>
                                                                <th class="text-center">Akcje</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($offers_waitforaccept as $item)
                                                                <tr>
                                                                    <td class="product-thumb">
                                                                        <img width="80px" height="auto" src="{{asset('images/'.$item->category_id.'/'.$item->id.'/'.\App\Models\images::where('id', $item->images_id)->pluck('name')->first())}}" alt="image description"></td>
                                                                    <td class="product-details">
                                                                        <h3 class="title">{{ $item->name }}</h3>
                                                                        <span class="add-id"><strong>Ad ID:</strong> {{ $item->id }}</span>
                                                                        <span><strong>Posted on: </strong><time>{{ $item->created_at }}</time> </span>
                                                                        <span class="status active"><strong>Status</strong>@if($item->isActive == true) Active @else Deactive @endif</span>
                                                                        <span class="location"><strong>Location</strong>{{ $item->city }} {{ $item->state }} {{ $item->postcode }}</span>
                                                                    </td>
                                                                    <td class="product-category"><span class="categories">@foreach($category as $cat) @if($cat->id == $item->category_id) {{$cat->name}} @endif @endforeach</span></td>
                                                                    <td class="action" data-title="Action">
                                                                        <div class="">
                                                                            <ul class="list-inline justify-content-center">
                                                                                <li class="list-inline-item">
                                                                                    <a data-toggle="tooltip" data-placement="top" title="View" class="view" href="{{ route('offer.view', $item->id) }}">
                                                                                        <i class="fa fa-eye"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="{{ route('offer.edit', $item->id)}}">
                                                                                        <i class="fa fa-pencil"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                <span data-toggle="modal" data-target="#deleteoffer{{ $item->id }}">
                                                <a data-toggle="tooltip" class="delete" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                </span>
                                                                                </li>


                                                                            </ul>
                                                                        </div>
                                                                        <!-- delete-offer modal -->
                                                                        <!-- delete offer popup modal start-->
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="deleteoffer{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                                             aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header border-bottom-0">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body text-center">
                                                                                        <h6 class="py-2">Jesteś pewien, że chcesz dezaktywować to ogłoszenie?</h6>
                                                                                        <p>Dostęp do tej oferty zostanie ograniczony.</p>
                                                                                    </div>
                                                                                    <form action="{{ route('offer.delete', $item) }}" method="post" id="add-offer-form">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Anuluj</button>
                                                                                            <button type="submit" class="btn btn-danger">Dezaktywuj</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- delete offer popup modal end-->
                                                                        <!-- delete-offer modal -->
                                                                    </td>
                                                                </tr>
                                                            @endforeach


                                                            </tbody>
                                                        </table>

                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- pagination
                    <div class="pagination justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>-->
                    <!-- pagination -->

                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </section>

@endsection

@section('scripts')

@endsection
