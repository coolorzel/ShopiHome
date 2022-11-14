<?php

use App\Http\Controllers\Admin\ACPController;
use App\Http\Controllers\admin\ACPUserController;
use App\Http\Controllers\HomeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role_or_permission:admin']], function () {
    Route::group(['prefix' => 'acp'], function() {
        Route::get('/', [ACPController::class, 'index'])->name('acp.index');
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [ACPController::class, 'users'])->name('acp.users');
            Route::get('/roles', [ACPController::class, 'roles'])->name('acp.roles');
            Route::get('/permissions', [ACPController::class, 'permission'])->name('acp.permissions');
        });
        Route::group(['prefix' => 'user'], function(){
            Route::get('/edit/{user}', [ACPUserController::class, 'edit_user'])->name('acp.user.edit');
            Route::patch('/edited/{user}', [ACPUserController::class, 'update_user'])->name('acp.user.edited');
            Route::patch('/edited-avatar/{user}', [ACPUserController::class, 'update_avatar'])->name('acp.user.edited.avatar');
            Route::patch('/edited-password/{user}', [ACPUserController::class, 'update_password'])->name('acp.user.edited.password');
            Route::patch('/delete/{user}', [ACPUserController::class, 'destroy'])->name('acp.user.delete');
        });
        Route::group(['prefix' => 'role'], function() {

        });
        Route::group(['prefix' => 'permission'], function() {

        });
    });
});

