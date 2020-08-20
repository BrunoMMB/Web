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

// Route::get('/', function () {
//     return view('welcome');
// });


/*home*/
Route::get('/', function () {
    return view('temp/index');
})->name('main');

Route::get('/criar', 'people_controller@fullfil_register')->name('criar');

Auth::routes();

/*login*/
Route::get('/login', function () {
    return view('login_view');
})->name('login');

Route::post('/autentication', 'people_controller@autentication')->name('autentication');

/*Insert person*/
Route::post('/save', 'people_controller@save_register')->name('save');

/*List all*/
Route::get('/list', 'people_controller@peopleList')->name('list');

/*Update*/
Route::get('/search', 'people_controller@update_search_user')->name('search_user');
Route::post('/update', 'people_controller@choose_update')->name('update');
Route::post('/up', 'people_controller@user_up')->name('up');

/*Delete*/
Route::get('/SD', 'people_controller@delete_search_user')->name('search_delete');
Route::post('/delete', 'people_controller@delete_user')->name('delete');
Route::post('/del_pass', 'people_controller@delete_passenger')->name('del_pass');

