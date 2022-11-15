<?php

use App\Http\Controllers\Admin\ACPController;
use App\Http\Controllers\Admin\ACPUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChargesController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\FormCategory;
use App\Http\Controllers\Admin\HeatingController;
use App\Http\Controllers\Admin\InstallSystem;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\ParkingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\TypeOfferController;
use App\Http\Controllers\DropZone\DropZoneController;
use App\Http\Controllers\Front\OfferImageController;
use App\Http\Controllers\Front\OffersController;
use App\Http\Controllers\HomeController;
use App\Models\CategoryForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/install', [InstallSystem::class, 'index']);
Route::post('/install', [InstallSystem::class, 'store'])->name('install');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'myProfile'], function(){
    Route::group(['middleware' => ['permission:USER-view-myoffer']], function() {
       Route::group(['prefix' => 'offer'], function(){
          Route::get('/', [OffersController::class, 'index'])->name('offer.index')->middleware('auth');
          Route::group(['middleware' => ['permission:USER-create-myoffer']], function(){
             Route::get('/create', [OffersController::class, 'create'])->name('offer.create')->middleware('auth');
             Route::get('/create/{who}', [OffersController::class, 'offer_create'])->name('offer.offer.create')->middleware('auth');
             Route::patch('/created', [OffersController::class, 'created'])->name('offer.created')->middleware('auth');
          });
          Route::group(['middleware' => ['permission:USER-edit-myoffer']], function(){
             Route::get('/edit/{offer}', [OffersController::class, 'edit'])->name('offer.edit')->middleware('auth');
             Route::patch('/edited/{offer}', [OffersController::class, 'edited'])->name('offer.edited')->middleware('auth');
          });
          Route::group(['middleware' => ['permission:USER-delete-myoffer']], function(){
             Route::delete('/delete/{offer}', [OffersController::class, 'delete'])->name('offer.delete')->middleware('auth');
          });
           Route::group(['middleware' => ['permission:USER-active-myoffer']], function(){
               Route::delete('/active/{offer}', [OffersController::class, 'active'])->name('offer.active')->middleware('auth');
           });
           Route::post('/process/{cat_id}/{lsd}', [OfferImageController::class, 'upload'])->name('offer.image.process')->middleware('auth');
           Route::delete('/delete/{cat_id}/{lsd}', [OfferImageController::class, 'delete'])->name('offer.image.delete')->middleware('auth');
           Route::get('/fetch/{cat_id}/{lsd}', [OfferImageController::class, 'fetch'])->name('offer.image.fetch')->middleware('auth');
           Route::patch('/select-img', [OfferImageController::class, 'select'])->name('offer.image.select')->middleware('auth');
           Route::get('/test', [OfferImageController::class, 'test'])->name('offer.image.test')->middleware('auth');
       });
    });
});

Route::group(['prefix' => 'mod'], function(){
    Route::group(['middleware' => ['permission:MOD']], function(){
        Route::get('/ota', [OffersController::class, 'ota'])->name('offer.ota')->middleware('auth');
        Route::get('/message')->name('message.controll.mod')->middleware('auth');
    });
});

Route::group(['prefix' => 'offers'], function () {
    Route::group(['middleware' => ['permission:USER-view-offer']], function () {
        Route::get('/view/{offer}', [OffersController::class, 'view'])->name('offer.view')->middleware('auth');
    });
});


Route::group(['middleware' => ['permission:ACP-view']], function () {
    Route::group(['prefix' => 'acp'], function() {
        Route::get('/', [ACPController::class, 'index'])->name('acp.index');
        Route::group(['middleware' => ['permission:ACP-system-control']], function() {
            Route::get('/control', [ACPController::class, 'control'])->name('acp.control');
        });
        /*Route::group(['prefix' => 'users'], function() {
            Route::get('/', [ACPController::class, 'users'])->name('acp.users');
            Route::get('/roles', [ACPController::class, 'roles'])->name('acp.roles');
            Route::get('/permissions', [ACPController::class, 'permission'])->name('acp.permissions');
        });*/


        /*
         * Users section -- ['prefix' => 'user']
         * All this one is user list,edit,delete
         * Role and permission use, edit, view, delete
         * Adding page permission group:
         ** Route::group(['middleware' => ['permission:NAME_PERMISSION']], function() {
         ** //code
         ** });
         */

        Route::group(['prefix' => 'offer'], function() {
            Route::group(['middleware' => ['permission:ACP-offer-view']], function() {
                Route::get('/', [OfferController::class, 'index'])->name('acp.offer');
                Route::group(['middleware' => ['permission:ACP-offer-create']], function() {
                    Route::get('/view/{offer}', [OfferController::class, 'view'])->name('acp.offer.view');
                    Route::patch('/created', [OfferController::class, 'created'])->name('acp.offer.created');
                });
                Route::group(['middleware' => ['permission:ACP-offer-edit']], function(){
                    Route::get('/edit/{offer}', [OfferController::class, 'edit'])->name('acp.offer.edit');
                    Route::patch('/edited/{offer}', [OfferController::class, 'update'])->name('acp.offer.update');
                });
                Route::group(['middleware' => ['permission:ACP-offer-delete']], function() {
                    Route::patch('/delete/{offer}', [OfferController::class, 'delete'])->name('acp.offer.delete');
                });
            });
        });

        Route::group(['prefix' => 'user'], function(){
            Route::group(['middleware' => ['permission:ACP-user-list-view']], function() {
                Route::get('/', [ACPUserController::class, 'index'])->name('acp.users');
            });
            Route::group(['middleware' => ['permission:ACP-user-view']], function() {
               Route::get('/view/{user}', [ACPUserController::class, 'view'])->name('acp.user.view');
            });

            Route::group(['middleware' => ['permission:ACP-user-edit']], function() {
                Route::get('/edit/{user}', [ACPUserController::class, 'edit'])->name('acp.user.edit');
                Route::group(['middleware' => ['permission:ACP-user-update']], function() {
                    Route::patch('/edited/{user}', [ACPUserController::class, 'update'])->name('acp.user.edited');
                });
                Route::group(['middleware' => ['permission:ACP-user-update-avatar']], function() {
                    Route::patch('/edited-avatar/{user}', [ACPUserController::class, 'update_avatar'])->name('acp.user.edited.avatar');
                });
                Route::group(['middleware' => ['permission:ACP-user-update-password']], function() {
                    Route::patch('/edited-password/{user}', [ACPUserController::class, 'update_password'])->name('acp.user.edited.password');
                });
                Route::group(['middleware' => ['permission:ACP-user-delete']], function() {
                    Route::patch('/delete/{user}', [ACPUserController::class, 'destroy'])->name('acp.user.delete');
                });
            });
        });
        Route::group(['prefix' => 'role'], function() {
            Route::group(['middleware' => ['permission:ACP-role-list-view']], function() {
                Route::get('/', [RolesController::class, 'index'])->name('acp.roles');
            });
            Route::group(['middleware' => ['permission:ACP-role-edit']], function() {
                Route::get('/edit/{role}', [RolesController::class, 'edit'])->name('acp.role.edit');
                Route::group(['middleware' => ['permission:ACP-role-create']], function () {
                    Route::get('/create', [RolesController::class, 'create'])->name('acp.role.create');
                    Route::patch('/created', [RolesController::class, 'store'])->name('acp.role.created');
                });
                Route::group(['middleware' => ['permission:ACP-role-update']], function () {
                    Route::patch('/update/{role}', [RolesController::class, 'update'])->name('acp.role.update');
                });
                Route::group(['middleware' => ['permission:ACP-role-delete']], function () {
                    Route::patch('/delete/{role}', [RolesController::class, 'destroy'])->name('acp.role.delete');
                });
            });

        });
        Route::group(['prefix' => 'permission'], function() {
            Route::group(['middleware' => ['permission:ACP-permission-list-view']], function () {
                Route::get('/', [PermissionController::class, 'index'])->name('acp.permissions');
            });
            Route::group(['middleware' => ['permission:ACP-permission-edit']], function () {
                Route::get('/edit/{permission}', [PermissionController::class, 'edit'])->name('acp.permission.edit');
                Route::group(['middleware' => ['permission:ACP-permission-create']], function () {
                    Route::get('/create', [PermissionController::class, 'create'])->name('acp.permission.create');
                    Route::patch('/created', [PermissionController::class, 'store'])->name('acp.permission.created');
                });
                Route::group(['middleware' => ['permission:ACP-permission-update']], function () {
                    Route::patch('/update/{permission}', [PermissionController::class, 'update'])->name('acp.permission.update');
                });
                Route::group(['middleware' => ['permission:ACP-permission-delete']], function () {
                    Route::patch('/delete/{permission}', [PermissionController::class, 'destroy'])->name('acp.permission.delete');
                });
            });
        });
        Route::group(['prefix' => 'category'], function() {
           Route::group(['middleware' => ['permission:ACP-category-view']], function() {
             Route::get('/', [CategoryController::class, 'index'])->name('acp.category');
             Route::group(['middleware' => ['permission:ACP-category-create']], function() {
                 Route::get('/create', [CategoryController::class, 'create'])->name('acp.category.create');
                 Route::patch('/created', [CategoryController::class, 'created'])->name('acp.category.created');
             });
             Route::group(['middleware' => ['permission:ACP-category-edit']], function(){
                Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('acp.category.edit');
                Route::patch('/edited/{category}', [CategoryController::class, 'edited'])->name('acp.category.update');
             });
             Route::group(['middleware' => ['permission:ACP-category-delete']], function() {
                Route::patch('/delete/{category}', [CategoryController::class, 'delete'])->name('acp.category.delete');
             });
           });
        });
        Route::group(['prefix' => 'payment'], function() {
            Route::group(['middleware' => ['permission:ACP-payment-view']], function() {
                Route::get('/', [PaymentController::class, 'index'])->name('acp.payment');
                Route::group(['middleware' => ['permission:ACP-payment-create']], function() {
                    Route::get('/create', [PaymentController::class, 'create'])->name('acp.payment.create');
                    Route::patch('/created', [PaymentController::class, 'created'])->name('acp.payment.created');
                });
                Route::group(['middleware' => ['permission:ACP-payment-edit']], function(){
                    Route::get('/edit/{payment}', [PaymentController::class, 'edit'])->name('acp.payment.edit');
                    Route::patch('/edited/{payment}', [PaymentController::class, 'update'])->name('acp.payment.update');
                });
                Route::group(['middleware' => ['permission:ACP-payment-delete']], function() {
                    Route::patch('/delete/{payment}', [PaymentController::class, 'delete'])->name('acp.payment.delete');
                });
            });
        });
        Route::group(['prefix' => 'typeoffer'], function() {
            Route::group(['middleware' => ['permission:ACP-typeoffer-view']], function() {
                Route::get('/', [TypeOfferController::class, 'index'])->name('acp.typeoffer');
                Route::group(['middleware' => ['permission:ACP-typeoffer-create']], function() {
                    Route::get('/create', [TypeOfferController::class, 'create'])->name('acp.typeoffer.create');
                    Route::patch('/created', [TypeOfferController::class, 'created'])->name('acp.typeoffer.created');
                });
                Route::group(['middleware' => ['permission:ACP-typeoffer-edit']], function(){
                    Route::get('/edit/{typeoffer}', [TypeOfferController::class, 'edit'])->name('acp.typeoffer.edit');
                    Route::patch('/edited/{typeoffer}', [TypeOfferController::class, 'update'])->name('acp.typeoffer.update');
                });
                Route::group(['middleware' => ['permission:ACP-typeoffer-delete']], function() {
                    Route::patch('/delete/{typeoffer}', [TypeOfferController::class, 'delete'])->name('acp.typeoffer.delete');
                });
            });
        });

        Route::group(['prefix' => 'heating'], function() {
            Route::group(['middleware' => ['permission:ACP-heating-view']], function() {
                Route::get('/', [HeatingController::class, 'index'])->name('acp.heating');
                Route::group(['middleware' => ['permission:ACP-heating-create']], function() {
                    Route::get('/create', [HeatingController::class, 'create'])->name('acp.heating.create');
                    Route::patch('/created', [HeatingController::class, 'created'])->name('acp.heating.created');
                });
                Route::group(['middleware' => ['permission:ACP-heating-edit']], function(){
                    Route::get('/edit/{heating}', [HeatingController::class, 'edit'])->name('acp.heating.edit');
                    Route::patch('/edited/{heating}', [HeatingController::class, 'update'])->name('acp.heating.update');
                });
                Route::group(['middleware' => ['permission:ACP-heating-delete']], function() {
                    Route::patch('/delete/{heating}', [HeatingController::class, 'delete'])->name('acp.heating.delete');
                });
            });
        });

        Route::group(['prefix' => 'media'], function() {
            Route::group(['middleware' => ['permission:ACP-media-view']], function() {
                Route::get('/', [MediaController::class, 'index'])->name('acp.media');
                Route::group(['middleware' => ['permission:ACP-media-create']], function() {
                    Route::get('/create', [MediaController::class, 'create'])->name('acp.media.create');
                    Route::patch('/created', [MediaController::class, 'created'])->name('acp.media.created');
                });
                Route::group(['middleware' => ['permission:ACP-media-edit']], function(){
                    Route::get('/edit/{media}', [MediaController::class, 'edit'])->name('acp.media.edit');
                    Route::patch('/edited/{media}', [MediaController::class, 'update'])->name('acp.media.update');
                });
                Route::group(['middleware' => ['permission:ACP-media-delete']], function() {
                    Route::patch('/delete/{media}', [MediaController::class, 'delete'])->name('acp.media.delete');
                });
            });
        });

        Route::group(['prefix' => 'security'], function() {
            Route::group(['middleware' => ['permission:ACP-security-view']], function() {
                Route::get('/', [SecurityController::class, 'index'])->name('acp.security');
                Route::group(['middleware' => ['permission:ACP-security-create']], function() {
                    Route::get('/create', [SecurityController::class, 'create'])->name('acp.security.create');
                    Route::patch('/created', [SecurityController::class, 'created'])->name('acp.security.created');
                });
                Route::group(['middleware' => ['permission:ACP-security-edit']], function(){
                    Route::get('/edit/{security}', [SecurityController::class, 'edit'])->name('acp.security.edit');
                    Route::patch('/edited/{security}', [SecurityController::class, 'update'])->name('acp.security.update');
                });
                Route::group(['middleware' => ['permission:ACP-security-delete']], function() {
                    Route::patch('/delete/{security}', [SecurityController::class, 'delete'])->name('acp.security.delete');
                });
            });
        });

        Route::group(['prefix' => 'charges'], function() {
            Route::group(['middleware' => ['permission:ACP-charges-view']], function() {
                Route::get('/', [ChargesController::class, 'index'])->name('acp.charges');
                Route::group(['middleware' => ['permission:ACP-charges-create']], function() {
                    Route::get('/create', [ChargesController::class, 'create'])->name('acp.charges.create');
                    Route::patch('/created', [ChargesController::class, 'created'])->name('acp.charges.created');
                });
                Route::group(['middleware' => ['permission:ACP-charges-edit']], function(){
                    Route::get('/edit/{charges}', [ChargesController::class, 'edit'])->name('acp.charges.edit');
                    Route::patch('/edited/{charges}', [ChargesController::class, 'update'])->name('acp.charges.update');
                });
                Route::group(['middleware' => ['permission:ACP-charges-delete']], function() {
                    Route::patch('/delete/{charges}', [ChargesController::class, 'delete'])->name('acp.charges.delete');
                });
            });
        });

        Route::group(['prefix' => 'equipment'], function() {
            Route::group(['middleware' => ['permission:ACP-equipment-view']], function() {
                Route::get('/', [EquipmentController::class, 'index'])->name('acp.equipment');
                Route::group(['middleware' => ['permission:ACP-equipment-create']], function() {
                    Route::get('/create', [EquipmentController::class, 'create'])->name('acp.equipment.create');
                    Route::patch('/created', [EquipmentController::class, 'created'])->name('acp.equipment.created');
                });
                Route::group(['middleware' => ['permission:ACP-equipment-edit']], function(){
                    Route::get('/edit/{equipment}', [EquipmentController::class, 'edit'])->name('acp.equipment.edit');
                    Route::patch('/edited/{equipment}', [EquipmentController::class, 'update'])->name('acp.equipment.update');
                });
                Route::group(['middleware' => ['permission:ACP-equipment-delete']], function() {
                    Route::patch('/delete/{equipment}', [EquipmentController::class, 'delete'])->name('acp.equipment.delete');
                });
            });
        });

        Route::group(['prefix' => 'parking'], function() {
            Route::group(['middleware' => ['permission:ACP-parking-view']], function() {
                Route::get('/', [ParkingController::class, 'index'])->name('acp.parking');
                Route::group(['middleware' => ['permission:ACP-parking-create']], function() {
                    Route::get('/create', [ParkingController::class, 'create'])->name('acp.parking.create');
                    Route::patch('/created', [ParkingController::class, 'created'])->name('acp.parking.created');
                });
                Route::group(['middleware' => ['permission:ACP-parking-edit']], function(){
                    Route::get('/edit/{parking}', [ParkingController::class, 'edit'])->name('acp.parking.edit');
                    Route::patch('/edited/{parking}', [ParkingController::class, 'update'])->name('acp.parking.update');
                });
                Route::group(['middleware' => ['permission:ACP-parking-delete']], function() {
                    Route::patch('/delete/{parking}', [ParkingController::class, 'delete'])->name('acp.parking.delete');
                });
            });
        });

        Route::group(['prefix' => 'formcategory'], function() {
            Route::group(['middleware' => ['permission:ACP-formcategory-view']], function() {
                Route::get('/', [FormCategory::class, 'index'])->name('acp.formcategory');
                Route::group(['middleware' => ['permission:ACP-formcategory-create']], function() {
                    Route::get('/create', [FormCategory::class, 'create'])->name('acp.formcategory.create');
                    Route::patch('/created', [FormCategory::class, 'created'])->name('acp.formcategory.created');
                });
                Route::group(['middleware' => ['permission:ACP-formcategory-edit']], function(){
                    Route::get('/edit/{formcategory}', [FormCategory::class, 'edit'])->name('acp.formcategory.edit');
                    Route::patch('/edited/{formcategory}', [FormCategory::class, 'update'])->name('acp.formcategory.update');
                });
                Route::group(['middleware' => ['permission:ACP-formcategory-delete']], function() {
                    Route::patch('/delete/{formcategory}', [FormCategory::class, 'delete'])->name('acp.formcategory.delete');
                });
            });
        });

    });
});

Route::get('dropzone', 'DropZone\DropZoneController@index');

Route::post('dropzone/upload', 'DropZone\DropZoneController@upload')->name('dropzone.upload');

Route::get('dropzone/fetch', 'DropZone\DropZoneController@fetch')->name('dropzone.fetch');

Route::get('dropzone/delete', 'DropZone\DropZoneController@delete')->name('dropzone.delete');


