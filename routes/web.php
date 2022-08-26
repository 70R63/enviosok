<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LtdController;

use App\Dto\Estafeta;

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


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('ltds','LtdController');
Route::resource('coberturas','CoberturasController');
Route::resource('tarifas','TarifaController');
Route::resource('guia','GuiaController');

Route::get("/estafeta",function( ){

    $estafeta = new Estafeta();
    $estafeta -> init();


    $data = "estafeta";
    dd($data);
});


//USUARIO
    Route::resource('users','Roles\UsersController');//->middleware('roles:sysadmin,admin,cliente'); 
//FIN USUARIO
//ROLES
    Route::resource('roles','Roles\RolesController');//->middleware('roles:sysadmin,admin'); 
//FIN ROLES

    Route::resource('profile','userProfileController');


require __DIR__.'/auth.php';
