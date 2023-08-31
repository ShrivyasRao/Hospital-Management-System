<?php

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

use App\Handles;
use App\Customer;
use App\Medicines;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/edit/{id}','MedicineController@edit');

Route::post('/editQry','MedicineController@editQry');

Route::get('/delete/{id}','MedicineController@delQry');

Route::post('/addData', function() {
    $c = App\Medicines::all();
    $x = count($c);
    return view('insert',compact('x'));
});

Route::get('/addData', function() {
    $c = App\Medicines::all();
    $x = count($c);
    return view('insert',compact('x'));
});

Route::post('/add','MedicineController@add');

Route::get('/sortAsc/{id?}','HomeController@index');


Route::get('/userLogin', function() {
    return view('user.userLogin');
});

Route::get('/userRegister', function(){
    return view('user.userRegister');
});

Route::post('/logUser','UserController@loginUser');

Route::post('/regUser','UserController@registerUser');

Route::get('/logCustomer', function() {
    return view('user.custLogin');
});

Route::get('/regCustomer', function() {
    return view('user.custRegister');
});

Route::post('/logCustomer','CustomerController@loginCustomer');

Route::post('/regCustomer','CustomerController@registerCustomer');

Route::get('/customerPage', function() {
    return view('customer');
});

Route::post('/logout','CustomerController@alogout');

Route::get('/addCon', function() {
    $res = Customer::all();
    $res1 = App\User::all();
    return view('connect',compact('res'),compact('res1'));
});

Route::post('/addConnect','HandleController@insert');

Route::get('/viewCon', function(){
    $res = Handles::all();
    return view('viewConnection',compact('res'));
});

Route::get('/min', function() {
    $temp = Medicines::all()->min('price');
    $res = Medicines::all()->where('price',$temp);
    return view('home',compact('res'));
});

Route::get('/max', function() {
    $temp = Medicines::all()->max('price');
    $res = Medicines::all()->where('price',$temp);
    return view('home',compact('res'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
