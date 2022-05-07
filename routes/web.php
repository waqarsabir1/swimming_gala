<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\logoutController;
use App\http\Controllers\RaceController;
use App\http\Controllers\UserController;
use App\http\Controllers\SwimmerController;
use App\http\Controllers\ResultController;




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
Auth::routes(['register' => false]);

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::get('users/add-user', function () {
    return view('add-user');
})->middleware('agecheck');

Route::get('users/edit-user', function () {
    return view('edit-user');
})->middleware('auth');
 
Route::get('coaches/view-coaches', function () {
    return view('view-coaches');
})->middleware('auth');
 



Route::post("users/add-user",[UserController::class,'addData'])->middleware('usercheck');
Route::view("view-users",[UserController::class,'viewData'])->middleware('auth');
Route::get("users/view-users",[UserController::class,'viewData'])->middleware('auth');
Route::get("edit-user/{id}",[UserController::class,'editData'])->middleware('agecheck');
Route::post("edit-user/",[UserController::class,'updateData'])->middleware('usercheck');
Route::get("delete-user/del/{id}",[UserController::class,'deleteData'])->middleware('usercheck');

Route::get("swimmers/view-swimmers/",[SwimmerController::class,'viewSwimmers'])->middleware('auth');
Route::get("parents/view-parents",[SwimmerController::class,'viewParents'])->middleware('auth');
Route::get("coaches/view-coaches",[SwimmerController::class,'viewcoaches'])->middleware('auth');

//Route::post('races/add-race', function () {return view('add-race');});

  
Route::middleware(['auth'])->group(function () {
    //
});

Route::get("races/add-race",[RaceController::class,'ViewRace'])->middleware('auth');
Route::post("races/add-race",[RaceController::class,'AddRaceData'])->middleware('usercheck');

Route::get("races/view-races",[RaceController::class,'ViewRaces'])->middleware('auth');
Route::get("edit-race/{id}",[RaceController::class,'editRace'])->middleware('usercheck');
Route::post("edit-race/{id}",[RaceController::class,'updateRace'])->middleware('usercheck');
Route::get("races/race-details/{id}",[RaceController::class,'raceDetail'])->middleware('auth');
Route::get("races/delete-race/{id}",[RaceController::class,'deleteRace'])->middleware('usercheck');

Route::post('ajax/request/store', [ResultController::class, 'ajaxRequestStore'])->name('ajax.request.stores');

Route::get('helper', function(){ 
    $fullpath = helloWorld(); 
    dd($fullpath);
});

Route::post("logout", [logoutController::class,'logout']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

 
