@extends('layouts.frontend')

@section('title', 'Create offer')


@section('content')

    <section class="user-profile section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 offset-md-1 col-lg-12 offset-lg-0">
                    <!-- Edit Profile Welcome Text -->
                    <div class="widget welcome-message">
                        <h2><button type="button" class="btn btn-light" onClick="history.back();">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </button> Dodawanie oferty </h2>
                        <h6>
                            @foreach($cat_id as $item)
                            {{ $item->content }}
                            @endforeach
                        </h6>

                    </div>
                    <!-- Edit Personal Info -->
                    <div class="row">

                        <div class="col-md-12 offset-md-1 col-lg-12 offset-lg-0">
                            <div class="widget personal-info">
                                <form action="{{ route('offer.created') }}" method="post" id="add-offer-form">
                                @method('patch')
                                @csrf
                                    <input type="hidden" name="category_id" value="{{ $offer->category_id }}">
                                    <input type="hidden" id="city" name="city" value="{{ $offer->city }}">
                                    <input type="hidden" id="state" name="state" value="{{ $offer->state }}">
                                    <input type="hidden" id="postcode" name="postcode" value="{{ $offer->postcode }}">
                                    <input type="hidden" id="lat" name="lat" value="{{ $offer->lat }}">
                                    <input type="hidden" id="lon" name="lon" value="{{ $offer->lon }}">
                                    <h3>{{ __('Localization') }}</h3>
                                    <hr>
                                    @if(in_array('location', $formhascategory))
                                        <div class="form-group">
                                            <label for="zip-code">Podaj lokalizację</label>
                                            <!-- Search input -->
                                            <input type="text" class="form-control" id="searchInput" name="location" value="{{ $offer->city }}" placeholder="Enter a location...">
                                            <!-- Google map -->
                                            <div id="map"></div>
                                            <!-- MODAL -->

                                            <!-- Button trigger modal -->
                                            <button id="searchButton" type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Wyszukaj
                                            </button>
                                            <span type="button" class="btn-sm btn-info">
                                                Miasto <span id="city_s" class="badge bg-info">@if(empty($offer->city)) City @else {{ $offer->city }} @endif</span>
                                            </span>
                                            <span type="button" class="btn-sm btn-info">
                                                Gmina <span id="state_s" class="badge bg-info">@if(empty($offer->state)) State @else {{ $offer->state }} @endif</span>
                                            </span>
                                            <span type="button" class="btn-sm btn-info">
                                                Kod pocztowy <span id="postcode_s" class="badge bg-info">@if(empty($offer->postcode)) XX-XXX @else {{ $offer->postcode }} @endif</span>
                                            </span>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Wybierz miasto...</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul id="resultList">
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"data-dismiss="modal">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <h3>{{ __('Basic information') }}</h3>
                                    <hr>
                                    <!-- Tytuł -->
                                    @if(in_array('name', $formhascategory))
                                        <div class="form-group">
                                        <label for="zip-code">Tytuł</label>
                                        <input type="text" class="form-control" id="name" name="name" onkeyup="tranSlug()" value="{{ $offer->name }}">
                                    </div>
                                    @endif
                                    <!-- Slug -->
                                    @if(in_array('slug', $formhascategory))
                                    <div class="form-group">
                                        <label for="zip-code">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $offer->slug }}" disabled>
                                    </div>
                                    @endif

                                    <div class="form-row">
                                        <!-- Cena wystawienia -->
                                        @if(in_array('regular_rent', $formhascategory))
                                        <div class="form-group col-md-6">
                                            <label for="zip-code">Cena wystawienia</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest pln)" placeholder="Addon on both side" name="regular_rent" value="{{ $offer->regular_rent }}">
                                                <span class="input-group-text">PLN</span>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- Kaucja -->
                                        @if(in_array('deposit', $formhascategory))
                                        <div class="form-group col-md-6">
                                            <label for="zip-code">Kaucja</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest pln)" placeholder="Addon on both side" name="deposit" value="{{ $offer->deposit }}">
                                                <span class="input-group-text">PLN</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-row">
                                        <!-- Pokoje -->
                                        @if(in_array('rooms', $formhascategory))
                                        <div class="form-group col-md-4">
                                            <label for="zip-code">Ilość pokoi</label>
                                            <div class="input-group text-center mb-3 rooms" style="width:130px;">
                                                <span class="input-group-text decrement-btn">-</span>
                                                <input type="text" class="form-control text-center" name="rooms" value="@if(empty($offer->rooms))0
@else{{ $offer->rooms }}@endif">
                                                <span class="input-group-text increment-btn">+</span>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- Powierzchnia m2 -->
                                        @if(in_array('surface', $formhascategory))
                                        <div class="form-group col-md-4">
                                            <label for="zip-code">Powierzchnia w m<sup>2</sup></label>
                                            <div class="input-group text-center mb-3 rooms" style="width:130px;">
                                                <span class="input-group-text decrement-btn">-</span>
                                                <input type="text" class="form-control text-center" name="surface" value="@if(empty($offer->surface))0
@else{{ $offer->surface }}@endif">
                                                <span class="input-group-text increment-btn">+</span>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- Działka -->
                                        @if(in_array('land_area', $formhascategory))
                                        <div class="form-group col-md-4">
                                            <label for="zip-code">Powierzchnia działki w m<sup>2</sup></label>
                                            <div class="input-group text-center mb-3 rooms" style="width:130px;">
                                                <span class="input-group-text decrement-btn">-</span>
                                                <input type="text" class="form-control text-center" name="land_area" value="@if(empty($offer->land_area))0
@else{{ $offer->land_area }}@endif">
                                                <span class="input-group-text increment-btn">+</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    @if(in_array('images', $formhascategory))
                                        <!-- File chooser -->
                                        <h3>{{ __('Media uploader') }}</h3>
                                        <hr>

                                        <div class="form-group">
                                            <input type="file" class="multiple-files-filepond" name="images_file" id="input_file" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="8">
                                        </div>
                                    @endif


                                    <!-- Opis -->
                                    <h3>{{ __('Detailed information') }}</h3>
                                    <hr>
                                    @if(in_array('description', $formhascategory))
                                    <div class="form-group">
                                        <label for="zip-code">Opis</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="7" name="description">{{ $offer->description }}</textarea>
                                    </div>
                                    @endif
                                    <!-- Krótki opis -->
                                    @if(in_array('short_description', $formhascategory))
                                    <div class="form-group">
                                        <label for="zip-code">Krótki opis</label>
                                        <input type="text" class="form-control" id="short_description" name="short_description" value="{{ $offer->short_description }}">
                                    </div>
                                    @endif

                                    <!-- Ogrzewanie -->
                                    @if(in_array('heating', $formhascategory))
                                        <h3>{{ __('Ogrzewanie') }}</h3>
                                        <hr>
                                        <div class="form-row">
                                            @foreach($heating as $item)
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="material[{{ $item->name }}]" name="heating[{{ $item->name }}]" value="{{ $item->id }}"
                                                        {{ in_array($item->id, $heatingOffer)
                                                                            ? 'checked'
                                                                            : '' }}>
                                                    <label class="form-check-label" for="material[{{ $item->name }}]">{{ $item->name }}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <!-- Media -->
                                    @if(in_array('media', $formhascategory))
                                        <h3>{{ __('Media') }}</h3>
                                        <hr>
                                        <div class="form-row">
                                            @foreach($media as $item)
                                                <div class="form-group col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="material[{{ $item->name }}]" name="media[{{ $item->name }}]" value="{{ $item->id }}"
                                                            {{ in_array($item->id, $mediaOffer)
                                                                                ? 'checked'
                                                                                : '' }}>
                                                        <label class="form-check-label" for="material[{{ $item->name }}]">{{ $item->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <!-- Zabezpieczenia -->
                                    @if(in_array('security', $formhascategory))
                                        <h3>{{ __('Security') }}</h3>
                                        <hr>
                                        <div class="form-row">
                                            @foreach($security as $item)
                                                <div class="form-group col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="material[{{ $item->name }}]" name="security[{{ $item->name }}]" value="{{ $item->id }}"
                                                            {{ in_array($item->id, $securityOffer)
                                                                                ? 'checked'
                                                                                : '' }}>
                                                        <label class="form-check-label" for="material[{{ $item->name }}]">{{ $item->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <!-- Opłaty -->
                                    @if(in_array('charges', $formhascategory))
                                        <h3>{{ __('Charges') }}</h3>
                                        <hr>
                                        <div class="form-row">
                                            @foreach($charges as $item)
                                                <div class="form-group col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="material[{{ $item->name }}]" name="charges[{{ $item->name }}]" value="{{ $item->id }}"
                                                            {{ in_array($item->id, $chargesOffer)
                                                                                ? 'checked'
                                                                                : '' }}>
                                                        <label class="form-check-label" for="material[{{ $item->name }}]">{{ $item->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <!-- Wyposażenie -->
                                    @if(in_array('equipment', $formhascategory))
                                        <h3>{{ __('Equipment') }}</h3>
                                        <hr>
                                        <div class="form-row">
                                            @foreach($equipment as $item)
                                                <div class="form-group col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="material[{{ $item->name }}]" name="equipment[{{ $item->name }}]" value="{{ $item->id }}"
                                                            {{ in_array($item->id, $equipmentOffer)
                                                                                ? 'checked'
                                                                                : '' }}>
                                                        <label class="form-check-label" for="material[{{ $item->name }}]">{{ $item->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <!-- Miejsce parkingowe -->
                                    @if(in_array('parking', $formhascategory))
                                        <h3>{{ __('Parking') }}</h3>
                                        <hr>
                                        <div class="form-row">
                                            @foreach($parking as $item)
                                                <div class="form-group col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="material[{{ $item->name }}]" name="parking[{{ $item->name }}]" value="{{ $item->id }}"
                                                            {{ in_array($item->id, $parkingOffer)
                                                                                ? 'checked'
                                                                                : '' }}>
                                                        <label class="form-check-label" for="material[{{ $item->name }}]">{{ $item->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <!-- Identyfikator płatności -->
                                    @if(in_array('payment', $formhascategory))
                                    <div class="form-group">
                                        <label for="first-name">Płatność co:</label>
                                        <select name="payment" id="payment_id" class="form-control" style="width: 100%">
                                            @foreach($payment as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ in_array($item->id, $paymentOffer)
                                                                ? 'selected'
                                                                : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    <!-- Typ ogłoszenia -->
                                    @if(in_array('typeoffer', $formhascategory))
                                    <div class="form-group">
                                        <label for="first-name">Typ oferty:</label>
                                        <select name="typeoffer" id="payment_id" class="form-control" style="width: 100%">
                                            <option value="">--{{ __('Please choose an option') }}--</option>
                                            @foreach($typeoffer as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ in_array($item->id, $typeofferOffer)
                                                                ? 'selected'
                                                                : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif



                                    @if(in_array('contact_tel', $formhascategory) || in_array('contact_email', $formhascategory))
                                        <div class="form-row">

                                            @if(in_array('contact_tel', $formhascategory))
                                            <!-- Kontakt telefoniczny -->
                                                    <div class="form-group col-md-6">
                                                        <label for="zip-code">Nr telefonu</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">+48</span>
                                                            <input id="phone-mask" type="tel" class="form-control" aria-label="Phone number" placeholder="Enter a phone number" name="contact_tel" value="{{ $offer->contact_tel }}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}">
                                                        </div>
                                                    </div>
                                            @endif

                                            @if(in_array('contact_email', $formhascategory))
                                            <!-- contact_email -->
                                                <div class="form-group col-md-6">
                                                    <label for="zip-code">Adres e'Mail</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">@</span>
                                                        <input type="email" class="form-control" aria-label="Adress eMail" placeholder="Enter a adress eMail" name="contact_email" value="{{ $offer->contact_email }}">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif

                                    <!-- Submit button -->
                                    <button name="butt" value="add" class="btn btn-transparent">Dodaj</button>
                                    <button name="butt" value="save" class="btn btn-transparent">Zapisz</button>


                                </form>
<!-- https://css-tricks.com/lets-make-a-form-that-puts-current-location-to-use-in-a-map/
 https://www.youtube.com/watch?v=vOPr5k_SGVA
 - GEOLOKALIZACJA-->
                            </div>
                        </div>

                        <!--<script>
                            function reset()
                            {
                                //reset all form
                                listitems = document.getElementsByTagName("input");
                                for (i=0; i<listitems.length; i++) {
                                    listitems[i].setAttribute('disabled', 'disabled');
                                }
                            }
                            reset();
                        </script>-->

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script src="https://unpkg.com/imask"></script>

    <script>
        var phoneMask = IMask(
            document.getElementById('phone-mask'), {
                mask: '000-000-000'
            }).on('accept', function() {
            document.getElementById('phone-mask').classList.remove('is-valid');
            //document.getElementById('phone-unmasked').innerHTML = phoneMask.unmaskedValue;
        }).on('complete', function() {
            document.getElementById('phone-mask').classList.add('is-valid');
        });
    </script>

    <script>

        const seachInput = document.getElementById('searchInput');
        const resultList = document.getElementById('resultList');
        const saveList = [];
        const currentMarkers = [];

        document.getElementById('searchButton').addEventListener('click', () => {
            const query = searchInput.value;
            fetch('https://nominatim.openstreetmap.org/search?format=json&polygon=1&addressdetails=1&q=' + query)
                .then(result => result.json())
                .then(parsedResult => {
                    setResultList(parsedResult);
                });
        });

        function isEmpty(str) {
            return (!str || str.length === 0 );
        }

        function setResultList(parsedResult) {
            resultList.innerHTML = "";
            //for (const marker of currentMarkers) {
                //map.removeLayer(marker);
            //}
            //map.flyTo(new L.LatLng(20.13847, 1.40625), 2);
            for (const result of parsedResult) {
                if (result.type === "administrative" || result.type === "village")
                {
                    const li = document.createElement('li');
                    li.classList.add('list-group-item', 'list-group-item-action');
                    //li.textContent = 'City: ' + result.address.town + ', Post Code: ' + result.address.town;
                    li.innerHTML = result.display_name;

                    li.innerHTML2 = JSON.stringify({
                        city: result.address.town,
                        village: result.address.village,
                        administrative: result.address.administrative,
                        suburb: result.address.suburb,
                        state: result.address.state,
                        postcode: result.address.postcode,
                        lat: result.lat,
                        lon: result.lon
                    }, undefined, 2);
                    li.addEventListener('click', (event) => {
                        for (const child of resultList.children) {
                            child.classList.remove('active');
                        }
                        event.target.classList.add('active');
                        const clickedData = JSON.parse(event.target.innerHTML2);
                        if (!!clickedData.administrative)
                        {
                            document.getElementById('city').value = clickedData.administrative;
                            document.getElementById('state').value = clickedData.state;
                            document.getElementById('postcode').value = clickedData.postcode;
                            document.getElementById('city_s').textContent = clickedData.administrative;
                            document.getElementById('state_s').textContent = clickedData.state;
                            document.getElementById('postcode_s').textContent = clickedData.postcode;
                            document.getElementById('lat').textContent = clickedData.lat;
                            document.getElementById('lon').textContent = clickedData.lon;
                        }
                        if (!!clickedData.city)
                        {
                            document.getElementById('city').value = clickedData.city;
                            document.getElementById('state').value = clickedData.state;
                            document.getElementById('postcode').value = clickedData.postcode;
                            document.getElementById('city_s').textContent = clickedData.city;
                            document.getElementById('state_s').textContent = clickedData.state;
                            document.getElementById('postcode_s').textContent = clickedData.postcode;
                            document.getElementById('lat').textContent = clickedData.lat;
                            document.getElementById('lon').textContent = clickedData.lon;
                        }
                        if (!!clickedData.village)
                        {
                            document.getElementById('city').value = clickedData.village;
                            document.getElementById('state').value = clickedData.state;
                            document.getElementById('postcode').value = clickedData.postcode;
                            document.getElementById('city_s').textContent = clickedData.village;
                            document.getElementById('state_s').textContent = clickedData.state;
                            document.getElementById('postcode_s').textContent = clickedData.postcode;
                            document.getElementById('lat').textContent = clickedData.lat;
                            document.getElementById('lon').textContent = clickedData.lon;
                        }
                        if (!!clickedData.suburb)
                        {
                            document.getElementById('city').value = clickedData.suburb;
                            document.getElementById('state').value = clickedData.state;
                            document.getElementById('postcode').value = clickedData.postcode;
                            document.getElementById('city_s').textContent = clickedData.suburb;
                            document.getElementById('state_s').textContent = clickedData.state;
                            document.getElementById('postcode_s').textContent = clickedData.postcode;
                            document.getElementById('lat').textContent = clickedData.lat;
                            document.getElementById('lon').textContent = clickedData.lon;
                        }
                        //const position = new L.LatLng(clickedData.lat, clickedData.lon);
                        //map.flyTo(position, 10);
                    })
                    //const position = new L.LatLng(result.lat, result.lon);
                    //currentMarkers.push(new L.marker(position).addTo(map));
                    resultList.appendChild(li);
                }
            }
        }


    </script>


    <script>

        function tranSlug()
        {
            var oTextbox1 = document.getElementById("name");
            var value1 = oTextbox1.value;
            var replaceText1 = value1.replace(/ /g, "-");
            document.getElementById("slug").value = (replaceText1);
        }

        function setFields()
        {
            //get value from select box
            val = $("#category_id :selected").val();
            //disable specific fields
            switch (val) {
                case '1':
                    reset();
                    break;
                case '6':   //mieszkanie
                    reset();
                    inputToEnable = ['user_id', 'images_id', 'payment_id', 'typeoffer_id',
                    'name', 'slug', 'description', 'short_description', 'rooms', 'input_file',
                    'surface', 'land_area', 'heating', 'media', 'security', 'regular_rent',
                    'sale_rent', 'deposit', 'charges', 'equipment', 'parking', 'contact_tel',
                    'featured', 'archivum', 'country', 'voivodeship', 'community', 'city',
                    'zip_code', 'street', 'house_number', 'apartament_number', 'floor', 'additional_information'];
                    $.each(inputToEnable, function( index, value ) {
                        document.getElementById(value).removeAttribute('disabled');
                    });
                    break;
                case '7':
                    reset();
                    inputToEnable = ['user_id', 'images_id', 'payment_id', 'typeoffer_id',
                        'name', 'slug', 'description', 'short_description', 'rooms', 'input_file',
                        'surface', 'land_area', 'heating', 'media', 'security', 'regular_rent',
                        'sale_rent', 'deposit', 'charges', 'equipment', 'parking', 'contact_tel',
                        'featured', 'archivum', 'country', 'voivodeship', 'community', 'city',
                        'zip_code', 'street', 'house_number', 'apartament_number', 'floor', 'additional_information'];
                    $.each(inputToEnable, function( index, value ) {
                        document.getElementById(value).removeAttribute('disabled');
                    });
                    break;
                case '8':
                    reset();
                    inputToEnable = ['user_id', 'images_id', 'payment_id', 'typeoffer_id',
                        'name', 'slug', 'description', 'short_description', 'rooms', 'input_file',
                        'surface', 'land_area', 'heating', 'media', 'security', 'regular_rent',
                        'sale_rent', 'deposit', 'charges', 'equipment', 'parking', 'contact_tel',
                        'featured', 'archivum', 'country', 'voivodeship', 'community', 'city',
                        'zip_code', 'street', 'house_number', 'apartament_number', 'floor', 'additional_information'];
                    $.each(inputToEnable, function( index, value ) {
                        document.getElementById(value).removeAttribute('disabled');
                    });
                    break;
                case '9':
                    reset();
                    inputToEnable = ['user_id', 'images_id', 'payment_id', 'typeoffer_id',
                        'name', 'slug', 'description', 'short_description', 'rooms', 'input_file',
                        'surface', 'land_area', 'heating', 'media', 'security', 'regular_rent',
                        'sale_rent', 'deposit', 'charges', 'equipment', 'parking', 'contact_tel',
                        'featured', 'archivum', 'country', 'voivodeship', 'community', 'city',
                        'zip_code', 'street', 'house_number', 'apartament_number', 'floor', 'additional_information'];
                    $.each(inputToEnable, function( index, value ) {
                        document.getElementById(value).removeAttribute('disabled');
                    });
                    break;
            }

        }
    </script>

    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>

    <!-- image editor -->
    <script
        src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

    <script>
        // register desired plugins...
        FilePond.registerPlugin(
            // validates the size of the file...
            FilePondPluginFileValidateSize,
            // validates the file type...
            FilePondPluginFileValidateType,

            // calculates & dds cropping info based on the input image dimensions and the set crop ratio...
            FilePondPluginImageCrop,
            // preview the image file type...
            FilePondPluginImagePreview,
            // filter the image file
            FilePondPluginImageFilter,
            // corrects mobile image orientation...
            FilePondPluginImageExifOrientation,
            // calculates & adds resize information...
            FilePondPluginImageResize,
            // encodes the file as base64 data
            FilePondPluginFileEncode,
        );

        // Filepond: Multiple Files
        FilePond.create(document.querySelector('.multiple-files-filepond'), {
            allowImagePreview: true,
            allowMultiple: true,
            allowFileEncode: true,
            required: false,
            server: {
                process: {
                    url: '{{ route('offer.image.process') }}',
                    method: 'POST',
                    withCredentials: false,
                    timeout: 7000,
                    onload: null,
                    onerror: null,
                    ondata: null
                },

                revert: '{{ route('offer.image.delete') }}',
                load: (source, load, error, progress, abort, headers) => {
                    console.log('attempting to load', source);},
            <!--    load: '/public/assets/uploads/offer/2',-->
                restore: '{{ route('offer.image.delete') }}',
                fetch: '/offer/fetch',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            files: [
                @foreach($images as $item)
                {
                    source: '/storage/assets/uploads/offer/{{ $item->offer_id }}/{{ $item->name }}',
                },
                @endforeach
            ]
        });
    </script>
@endsection
