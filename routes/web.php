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

/*Route::get('/', function () {
    return view('root');
});
*/



// Region CRUD
Route::get('/', 'CrudController@regions');
Route::get('/create_region', 'CrudController@create_region');
Route::post('/sendAndCreateRegion', 'CrudController@create_region_send');
Route::get('/{reg_id}/edit_region/{old_name}', 'CrudController@edit_region');
Route::post('/sendAndEditRegion', 'CrudController@edit_region_send');
Route::post('/delete_region', 'CrudController@delete_region');

// Provinces CRUD
Route::get('/{reg_id}', 'CrudController@provinces');
Route::get('/{reg_id}/create_province', 'CrudController@create_province');
Route::post('/sendAndCreateProvince', 'CrudController@create_province_send');
Route::get('/{reg_id}/{prov_id}/edit_province/{old_name}', 'CrudController@edit_province');
Route::post('/sendAndEditProvince', 'CrudController@edit_province_send');
Route::post('/delete_province', 'CrudController@delete_province');

// Municipalities CRUD
Route::get('/{reg_id}/{prov_id}', 'CrudController@municipalities');
Route::get('/{reg_id}/{prov_id}/create_municipality', 'CrudController@create_muni');
Route::post('/sendAndCreateMunicipality', 'CrudController@create_muni_send');
Route::get('/{reg_id}/{prov_id}/{muni_id}/edit_municipality/{old_name}', 'CrudController@edit_municipality');
Route::post('/sendAndEditMunicipality', 'CrudController@edit_municipality_send');
Route::post('/delete_municipality', 'CrudController@delete_municipality');

//Barangay CRUD
Route::get('/{reg_id}/{prov_id}/{muni_id}', 'CrudController@barangay');
Route::get('/{reg_id}/{prov_id}/{muni_id}/create_barangay', 'CrudController@create_barangay');
Route::post('/sendAndCreateBarangay', 'CrudController@create_barangay_send');
Route::get('/{reg_id}/{prov_id}/{muni_id}/{barangay_id}/edit_barangay/{old_name}', 'CrudController@edit_barangay');
Route::post('/sendAndEditBarangay', 'CrudController@edit_barangay_send');
Route::post('/delete_barangay', 'CrudController@delete_barangay');


