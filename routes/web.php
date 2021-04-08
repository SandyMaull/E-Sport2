<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomepageController@index');
// AUTH ROUTE 
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

// ADMIN ROUTE
Route::prefix('/home')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/verifyanggota', 'HomeController@verifyanggota')->name('verifypage');
    Route::post('/verifyanggota', 'HomeController@verifyanggotapost')->name('verifypost');
});

// ANGGOTA ROUTE 
Route::prefix('/anggota')->name('anggota.')->namespace('Anggota')->group(function(){
    //AUTH
    Route::get('/register', 'RegisterController@index')->name('registerpage');
    Route::post('/register', 'RegisterController@create')->name('registerpost');
    Route::get('/login','LoginController@index')->name('login');
    Route::post('/login','LoginController@login')->name('loginpost');
    Route::post('/logout','LoginController@logout')->name('logout');
    //STUFF
    Route::get('/', 'PrimaryController@index')->name('home');

  });
