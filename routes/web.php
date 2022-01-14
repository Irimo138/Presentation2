<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\EventController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterController2;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
// route for the landin page
Route::get('/', [EventController::class, 'index'])->name('index');


//multilanguage
Route::group(['middleware' => ['web']], function () {
    
    Route::get('lang/{lang}', function ($lang) {
            session(['lang' => $lang]);
            App::setLocale($lang);
            return Redirect::back();
        })->where([
            'lang' => 'eu|en'
        ]);
    });

//take events from the api
//Route::get('/',  [AppController::class, 'getData'] );
//refresh function
Route::get('/refreshEvent', [AppController::class, 'refresh'])->name('get.data2')->middleware("admin");

//userRegister

Route::get('/registerStore', function () {
    return view('auth.register');
})->name('registerStore');



//artist register
Route::get('/registerArtistView', function () {
    return view('auth.registerArtist');
})->name('registerArtistView');
Route::get('/register', [RegisterController::class, 'create'])->name('user.store'); 
//Route::post('/registerArtist', [RegisterController2::class, 'create'])->name('registerArtist'); 




//para verificar lso que estan dentro de middleware "verified"
Auth::routes(['verify' => true]);

//Al iniciar sesion

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/adminPage', [UserController::class, 'admin'])->name('adminBlade')->middleware("admin");

//show events user
Route::get('/event/show/user/{id}', [EventController::class, 'showUser'])->name('event.show.user');
//artist view
//show artist info
Route::get('/event/show/artist/{id}', [UserController::class, 'showArtist'])->name('event.show.artist');

//crear evento
Route::get('/createEvent', function () {

    $type=Type::all();

    return view('createEvent',['typeList'=> $type]);
})->name('createEvent')->middleware("admin");

//admin view

//event store admin
Route::post('/eventStore', [EventController::class, 'store'])->name('event.store.admin');
//event delete for admin
Route::delete('/event/delete/{id}' , [EventController::class, 'destroy'])->name('event.destroy.admin')->middleware("admin");
//event show for admin
Route::get('/event/show/checked', [EventController::class, 'showChecked'])->name('event.show.checked')->middleware("admin");
Route::get('/event/show/notChecked', [EventController::class, 'shownotChecked'])->name('event.show.notChecked')->middleware("admin");
//event edit for admin
Route::get('/event/show/{id}', [EventController::class, 'show'])->name('event.show')->middleware("admin");
Route::put('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');

//user
Route::get('/showUsers', [UserController::class, 'indexUser'])->name('indexUser')->middleware("admin");
Route::delete('/user/delete/{id}' , [UserController::class, 'destroy'])->name('user.destroy.admin');
Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show')->middleware("admin");
Route::put('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
//artist
Route::get('/showArtists', [UserController::class, 'indexArtist'])->name('indexArtist')->middleware("admin");
//end of admin view