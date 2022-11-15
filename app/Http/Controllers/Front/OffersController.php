<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryForm;
use App\Models\CategoryHasCharges;
use App\Models\CategoryHasEquipment;
use App\Models\CategoryHasHeating;
use App\Models\CategoryHasMedia;
use App\Models\CategoryHasParking;
use App\Models\CategoryHasSecurity;
use App\Models\charges;
use App\Models\equipment;
use App\Models\FormHasCategory;
use App\Models\heating;
use App\Models\images;
use App\Models\media;
use App\Models\Offer;
use App\Models\parking;
use App\Models\payment;
use App\Models\security;
use App\Models\TemporaryFile;
use App\Models\typeoffer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class OffersController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['permission:ACP-payment-view']);
    }

    public function index()
    {
        $ota = Offer::where([['isCreated', false], ['isDeactive', false], ['isAcceptMod', false],])->get();
        $mesmod = ['1', '2', '3']; $mesmod = [];

        $offers = Offer::where([['user_id', Auth::id()], ['isCreated', false], ['isDeactive', false], ['isAcceptMod', true],])->get();
        $offers_deactive = Offer::where([['user_id', Auth::id()], ['isCreated', false], ['isDeactive', true],])->get();
        $offers_waitforaccept = Offer::where([['user_id', Auth::id()], ['isCreated', false], ['isAcceptMod', false], ['isDeactive', 'false'],])->get();
        //dd($offers);
        $category = Category::all();
        $img_src = images::all();
        return view('frontend.offers', compact('offers', 'category', 'img_src', 'offers_deactive', 'offers_waitforaccept', 'ota', 'mesmod'));
    }

    public function create()
    {
        $category = Category::where('enable', true)->get();
        return view('frontend.offer.add', compact('category'));
    }

    public function edit($offer)
    {
        if(Offer::where([['id', $offer],['user_id', Auth::user()->id], ['isCreated', '0']])->first())
        {
            $offer = Offer::where([['id', $offer],['user_id', Auth::user()->id], ['isCreated', '0']])->first();

            $formhascategory_id = FormHasCategory::where('categoryId', $offer->category_id)->pluck('formId')->toArray();
            $formhascategory = [];
            foreach($formhascategory_id as $id)
            {
                array_push($formhascategory, CategoryForm::where('id', $id)->pluck('name')->first());
            }

            $heating = heating::get();
            $heatingOffer = CategoryHasHeating::where('category_id', $offer->id)->pluck('heating_id')->toArray();
            //dd($heatingOffer);
            $media = media::get();
            $mediaOffer = CategoryHasMedia::where('category_id', $offer->id)->pluck('media_id')->toArray();
            $security = security::get();
            $securityOffer = CategoryHasSecurity::where('category_id', $offer->id)->pluck('security_id')->toArray();
            $charges = charges::get();
            $chargesOffer = CategoryHasCharges::where('category_id', $offer->id)->pluck('charges_id')->toArray();
            $equipment = equipment::get();
            $equipmentOffer = CategoryHasEquipment::where('category_id', $offer->id)->pluck('equipment_id')->toArray();
            $parking = parking::get();
            $parkingOffer = CategoryHasParking::where('category_id', $offer->id)->pluck('parking_id')->toArray();

            $typeoffer = typeoffer::all();
            $payment = payment::all();
            $paymentOffer = Offer::where('category_id', $offer->id)->pluck('payment_id')->toArray();
            //dd($paymentOffer);
            $typeofferOffer = Offer::where('category_id', $offer->id)->pluck('typeoffer_id')->toArray();

            $images = images::where('offer_id', $offer->id)->get();

            return view('frontend.offer.edit',
                compact('offer',
                    'heating',
                    'heatingOffer',
                    'media',
                    'mediaOffer',
                    'security',
                    'securityOffer',
                    'charges',
                    'chargesOffer',
                    'equipment',
                    'equipmentOffer',
                    'parking',
                    'parkingOffer',
                    'paymentOffer',
                    'typeofferOffer',
                    'payment',
                    'typeoffer',
                    'formhascategory',
                    'images'));
        }
        else
        {
            return redirect()->route('offer.index');
        }
    }

    public function edited (Request $request, $offer)
    {
        //code
        $offer = Offer::find($offer);
        //dd($offer);

        $slug = str_replace(" ", "-", $request->name);


        //
        // SKRACANIE DODAWANIA DO BAZY DANYCH Z FORMULARZA
        //
        /*
        $offer->update(array_merge($request->all(), [
            'slug'              => $slug,
            'payment_id'        => $request->input('payment'),
            'typeoffer_id'      => $request->input('typeofer'),
        ]));
        */

        //Offer::create($request->all()); // TWORZENIE NOWEGO NA SKRÓTY

        $offer->payment_id = $request->input('payment');
        $offer->typeoffer_id = $request->input('typeoffer');
        $offer->name = $request->input('name');
        $offer->slug = $slug;
        $offer->description = $request->input('description');
        $offer->short_description = $request->input('short_description');
        $offer->rooms = $request->input('rooms');
        $offer->surface = $request->input('surface');
        $offer->land_area = $request->input('land_area');
        $offer->regular_rent = $request->input('regular_rent');
        $offer->sale_rent = $request->input('sale_rent');
        $offer->deposit = $request->input('deposit');
        $offer->contact_tel = $request->input('contact_tel');
        $offer->contact_email = $request->input('contact_email');

        $offer->state = $request->input('state');
        $offer->city = $request->input('city');
        $offer->postcode = $request->input('postcode');
        $offer->additional_information = $request->input('additional_information');


        //dd($request->input('media'));
        $this->checkBoxCheck($request->input('media'), $offer->id, 'media');
        $this->checkBoxCheck($request->input('charges'), $offer->id, 'charges');
        $this->checkBoxCheck($request->input('equipment'), $offer->id, 'equipment');
        $this->checkBoxCheck($request->input('heating'), $offer->id, 'heating');
        $this->checkBoxCheck($request->input('parking'), $offer->id, 'parking');
        $this->checkBoxCheck($request->input('security'), $offer->id, 'security');

        //$this->test($offer->id);
        $img = images::where('name', $request->input('images_file'))->first();
        $offer->images_id = $request->input('images_file');
        $offer->update();

        return redirect()->route('offer.index')->with('success', __('Offer edited successfull.'));

    }

    public function offer_create($who)
    {
        //$offer = Offer::where('user_id', $offer->user_id)->orderBy('id', 'DESC')->get()->first(); // odnalezienie tworzonej oferty i pobranie jej id
        /*$offer = Offer::where([
            ['user_id', Auth::id()],
            ['isCreated', true],
        ])->first();*/
        $category = Category::all();
        //dd($category);
        $count = -1;
        $table[0] = 0;
        foreach($category as $item)
        {
            $table[$count+1] = strtolower($item->name);
            $count += 1;
        }
        $cat_id = Category::where('name', $who)->get();
        foreach ($cat_id as $item)
        {
            $category_id = $item->id;
        }
        if(in_array($who, $table)) {
            if (Offer::where([
                ['user_id', Auth::id()],
                ['category_id', $category_id],
                ['isCreated', true],
            ])->first()) {
                $text = 'tak';
                //$offer = Offer::where([['user_id', Auth::id()], ['isCreated', true],])->first();
            } else {
                $text = 'nie';
                $offer = new Offer();
                $offer->user_id = Auth::id();
                $offer->category_id = $category_id;
                $offer->save();
            }
            $offer = Offer::where([
                ['user_id', Auth::id()],
                ['category_id', $category_id],
                ['isCreated', true],
            ])->first();
            $category = Category::where('enable', true)->get();
            $payment = payment::all();
            $typeoffer = typeoffer::all();
            $images = images::where('offer_id', $offer->id)->get();
            //$delimages = images::where('offer_id', $offer->id)->delete();
            $formhascategory_id = FormHasCategory::where('categoryId', $category_id)->pluck('formId')->toArray();
            $formhascategory = [];
            foreach($formhascategory_id as $id)
            {
                array_push($formhascategory, CategoryForm::where('id', $id)->pluck('name')->first());
            }

            //dd($formhascategory);
            $heating = heating::get();
            $heatingOffer = CategoryHasHeating::where('category_id', $offer->id)->pluck('heating_id')->toArray();
            //dd($heatingOffer);
            $media = media::get();
            $mediaOffer = CategoryHasMedia::where('category_id', $offer->id)->pluck('media_id')->toArray();
            $security = security::get();
            $securityOffer = CategoryHasSecurity::where('category_id', $offer->id)->pluck('security_id')->toArray();
            $charges = charges::get();
            $chargesOffer = CategoryHasCharges::where('category_id', $offer->id)->pluck('charges_id')->toArray();
            $equipment = equipment::get();
            $equipmentOffer = CategoryHasEquipment::where('category_id', $offer->id)->pluck('equipment_id')->toArray();
            $parking = parking::get();
            $parkingOffer = CategoryHasParking::where('category_id', $offer->id)->pluck('parking_id')->toArray();

            $paymentOffer = Offer::where('category_id', $offer->id)->pluck('payment_id')->toArray();
            //dd($paymentOffer);
            $typeofferOffer = Offer::where('category_id', $offer->id)->pluck('typeoffer_id')->toArray();

            return view('frontend.offer.create',
                compact('typeofferOffer',
                    'paymentOffer',
                    'heating',
                    'heatingOffer',
                    'media',
                    'mediaOffer',
                    'security',
                    'securityOffer',
                    'charges',
                    'chargesOffer',
                    'equipment',
                    'equipmentOffer',
                    'parking',
                    'parkingOffer',
                    'category',
                    'payment',
                    'typeoffer',
                    'text',
                    'images',
                    'offer',
                    'cat_id',
                    'formhascategory'));
        }
        else
        {
            return redirect()->route('offer.create');
        }
    }

    public function created(Request $request)
    {
        //$images = new images(); //model tabeli images
        //$offer = new Offer(); // model tabeli offer
        $offer = Offer::where([
            ['user_id', Auth::id()],
            ['category_id', $request->category_id],
            ['isCreated', true],
        ])->first();


        $slug = str_replace(" ", "-", $request->name);

        $offer->user_id = Auth::id();
        $offer->category_id = $request->input('category_id');
        //$offer->isCreated = false;
        //$offer->images_id = $request->images_file; // pierwsze zdjecie z tablicy, będzie głównym zdjęciem. Główne zdjecie zapisane jest w tabeli offer.

        $offer->payment_id = $request->input('payment');
        $offer->typeoffer_id = $request->input('typeoffer');
        $offer->name = $request->input('name');
        $offer->slug = $slug;
        $offer->description = $request->input('description');
        $offer->short_description = $request->input('short_description');
        $offer->rooms = $request->input('rooms');
        $offer->surface = $request->input('surface');
        $offer->land_area = $request->input('land_area');
        //$offer->heating = $request->input('heating');
        //$offer->media = $request->input('media');
        //$offer->security = $request->input('security');
        $offer->regular_rent = $request->input('regular_rent');
        $offer->sale_rent = $request->input('sale_rent');
        $offer->deposit = $request->input('deposit');
        //$offer->charges = $request->input('charges');
        //$offer->equipment = $request->input('equipment');
        //$offer->parking = $request->input('parking');
        $offer->contact_tel = $request->input('contact_tel');
        $offer->contact_email = $request->input('contact_email');
        //$offer->featured = $request->input('featured'); //Dopiero gdy opanujemy dodawanie ofert, dodamy opcje "premium" np wyróżnienie na stronie.
        //$offer->archivum = $request->input('archivum'); // Nie dodajemy stworzonej oferty do archiwum :D

        $offer->state = $request->input('state');
        $offer->city = $request->input('city');
        $offer->postcode = $request->input('postcode');
        //$offer->street = $request->input('street');
        //$offer->house_number = $request->input('house_number');
        //$offer->apartment_number = $request->input('apartment_number');
        //$offer->floor = $request->input('floor');
        $offer->additional_information = $request->input('additional_information');

        //$offer->save(); // zapis do bazy danych oferty bez obrazkow

        //dd($request->input('media'));
        $this->checkBoxCheck($request->input('media'), $offer->id, 'media');
        $this->checkBoxCheck($request->input('charges'), $offer->id, 'charges');
        $this->checkBoxCheck($request->input('equipment'), $offer->id, 'equipment');
        $this->checkBoxCheck($request->input('heating'), $offer->id, 'heating');
        $this->checkBoxCheck($request->input('parking'), $offer->id, 'parking');
        $this->checkBoxCheck($request->input('security'), $offer->id, 'security');

        //$this->test($offer->id);
        $offer->update();
        //$offerImg = Offer::where('user_id', $offer->user_id)->orderBy('id', 'DESC')->get()->first(); // odnalezienie tworzonej oferty i pobranie jej id
        $img = images::where('name', $request->input('images_file'))->first();


        //dd($request->input('images_file'));

        //dd($img->id);
        if($request->butt == "add")
        {
            $offer->isCreated = false;
            $offer->images_id = $request->input('images_file');
            $offer->update();
            return redirect()->route('offer.index')->with('success', __('Offer created successfull.'));
        }
        if($request->butt == "save")
        {
            $offer->isCreated = true;
            $offer->images_id = $request->input('images_file');
            $offer->update();
            return redirect()->route('offer.create')->with('success', __('Offer save successfull.'));
        }

        return ('ERROR');

       /* if($files = $request->file('images')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $file->move('public/assets/uploads/offer/',$image_full_name);
                $images->offer_id = $offerImg->id;
                $images->name = $image_full_name;
                $images->alt = "Alternative";

                $images->save(); // zapis kazdego obrazka jako osobnego rekordu w bazie danych. Powiązanie offer_id z kolumna id w tabeli offer
            }
        }*/
    }


    public function checkBoxCheck($who, $id, $loc)
    {
        if($loc == 'media') {
            CategoryHasMedia::where('category_id', $id)->delete();
            if (empty($who)) {
                //dd('PUSTY');
            } else {
                foreach ($who as $item => $value) {
                    if (CategoryHasMedia::where([['category_id', $id], ['media_id', $value]])->first()) {
                        //dd('Istnieje już w bazie');
                    } else {
                        $med = new categoryhasmedia();
                        $med->category_id = $id;
                        $med->media_id = $value;
                        $med->save();
                    }
                    //dd($offer);
                }
            }
        }

        if($loc == 'charges') {
            CategoryHasCharges::where('category_id', $id)->delete();
            if (empty($who)) {
                //dd('PUSTY');
            } else {
                foreach ($who as $item => $value) {
                    if (CategoryHasCharges::where([['category_id', $id], ['charges_id', $value]])->first()) {
                        //dd('Istnieje już w bazie');
                    } else {
                        $med = new categoryhascharges();
                        $med->category_id = $id;
                        $med->charges_id = $value;
                        $med->save();
                    }
                    //dd($offer);
                }
            }
        }
        if($loc == 'equipment') {
            CategoryHasEquipment::where('category_id', $id)->delete();
            if (empty($who)) {
                //dd('PUSTY');
            } else {
                foreach ($who as $item => $value) {
                    if (CategoryHasEquipment::where([['category_id', $id], ['equipment_id', $value]])->first()) {
                        //dd('Istnieje już w bazie');
                    } else {
                        $med = new categoryhasequipment();
                        $med->category_id = $id;
                        $med->equipment_id = $value;
                        $med->save();
                    }
                    //dd($offer);
                }
            }
        }
        if($loc == 'heating') {
            CategoryHasHeating::where('category_id', $id)->delete();
            if (empty($who)) {
                //dd('PUSTY');
            } else {
                foreach ($who as $item => $value) {
                    if (CategoryHasHeating::where([['category_id', $id], ['heating_id', $value]])->first()) {
                        //dd('Istnieje już w bazie');
                    } else {
                        $med = new categoryhasheating();
                        $med->category_id = $id;
                        $med->heating_id = $value;
                        $med->save();
                    }
                    //dd($offer);
                }
            }
        }
        if($loc == 'parking') {
            CategoryHasParking::where('category_id', $id)->delete();
            if (empty($who)) {
                //dd('PUSTY');
            } else {
                foreach ($who as $item => $value) {
                    if (CategoryHasParking::where([['category_id', $id], ['parking_id', $value]])->first()) {
                        //dd('Istnieje już w bazie');
                    } else {
                        $med = new categoryhasparking();
                        $med->category_id = $id;
                        $med->parking_id = $value;
                        $med->save();
                    }
                    //dd($offer);
                }
            }
        }
        if($loc == 'security') {
            CategoryHasSecurity::where('category_id', $id)->delete();
            if (empty($who)) {
                //dd('PUSTY');
            } else {
                foreach ($who as $item => $value) {
                    if (CategoryHasSecurity::where([['category_id', $id], ['security_id', $value]])->first()) {
                        //dd('Istnieje już w bazie');
                    } else {
                        $med = new categoryhassecurity();
                        $med->category_id = $id;
                        $med->security_id = $value;
                        $med->save();
                    }
                    //dd($offer);
                }
            }
        }
    }

    public function delete($offer)
    {
        $offer = Offer::where([['id', $offer], ['user_id', Auth::id()]])->first();
        $offer->isDeactive = true;
        $offer->isActive = false;
        $offer->update();
        return redirect()->route('offer.index')->with('success', __('Offer deleted successfull.'));
        //dd($offer);
    }

/*    public function test($id)
    {
        $offer = Offer::where([
            ['id', $id],
            //['isCreated', true],
        ])->first();

        $images = images::where('offer_id', $offer->id)->get();
        $directory = 'public/assets/uploads/offer/'.$offer->id;
        $storage = Storage::disk('local')->allFiles($directory);
//        dd($images);
        $data = array(
            'title' => 'All files',
            'files' => $storage
        );
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $table[0] = 0;
        $table2[0] = 0;

        foreach($images as $item)
        {
            $table2[$count3+1] = $item->name;
            $count3 += 1;
        }
        //dd($table2);
        foreach($storage as $item)
        {
            $filename = str_replace($directory.'/', '', $item);
            //dd($filename);
            $table[$count3+1] = $filename;
            $count3 += 1;
            if(in_array($filename, $table2))
            {
                $count1 += 1;
            }
            else
            {
                //dd('app/'.$directory.'/'.$filename);
                unlink(storage_path('app/'.$directory.'/'.$filename));
                $count2 += 1;
            }
        }
        return $count1;
    }
*/

    public function view ($offer)
    {
        $offer = Offer::where('id', $offer)->first();
        $owner = User::where('id', $offer->user_id)->first();
        $images = images::where('offer_id', $offer->id)->get();
        $category = Category::where('id', $offer->category_id)->first();
        $type_offer = typeoffer::where('id', $offer->typeoffer_id)->first();
        $equipmentOffer = CategoryHasEquipment::where('category_id', $offer->id)->pluck('equipment_id')->toArray();
        $equipment = equipment::get();
        $eq = '';
        foreach($equipment as $item)
        {
            if(in_array($item->id, $equipmentOffer)) {
                {
                    $eq .= $item->name.', ';
                }
            }
        }

        $mediaOffer = CategoryHasMedia::where('category_id', $offer->id)->pluck('media_id')->toArray();
        $media = media::get();
        $me = '';
        foreach($media as $item)
        {
            if(in_array($item->id, $mediaOffer)) {
                {
                    $me.= $item->name.', ';
                }
            }
        }

        $heatingOffer = CategoryHasHeating::where('category_id', $offer->id)->pluck('heating_id')->toArray();
        $heating = heating::get();
        $he = '';
        foreach($heating as $item)
        {
            if(in_array($item->id, $heatingOffer)) {
                {
                    $he.= $item->name.', ';
                }
            }
        }

        $securityOffer = CategoryHasSecurity::where('category_id', $offer->id)->pluck('security_id')->toArray();
        $security = security::get();
        $se = '';
        foreach($security as $item)
        {
            if(in_array($item->id, $securityOffer)) {
                {
                    $se.= $item->name.', ';
                }
            }
        }

        $chargesOffer = CategoryHasCharges::where('category_id', $offer->id)->pluck('charges_id')->toArray();
        $charges = charges::get();
        $cha = '';
        foreach($security as $item)
        {
            if(in_array($item->id, $chargesOffer)) {
                {
                    $cha.= $item->name.', ';
                }
            }
        }

        $parkingOffer = CategoryHasParking::where('category_id', $offer->id)->pluck('parking_id')->toArray();
        $parking = parking::get();
        $pa = '';
        foreach($parking as $item)
        {
            if(in_array($item->id, $parkingOffer)) {
                {
                    $pa.= $item->name.', ';
                }
            }
        }


        return view('frontend.offers.view', compact('offer', 'images', 'owner', 'category', 'type_offer', 'eq', 'me', 'he', 'se', 'cha', 'pa'));
    }

    public function active($id)
    {
        return('TEST'.$id);
    }

    public function ota ()
    {
        $ota = Offer::where([['isCreated', false], ['isDeactive', false], ['isAcceptMod', false],])->get();
        $mesmod = ['1', '2', '3']; $mesmod = [];

        return view('frontend.offers.ota', compact('ota', 'mesmod'));
    }
}
