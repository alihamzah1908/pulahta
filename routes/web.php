<?php

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

Route::get('/', function () {
    // return view('welcome');
    return view('landing');
});
Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/get_perangkat','\App\Http\Controllers\OpdController@get_perangkat')->name('data.perangkat');
Route::post('/prosess', 'App\Http\Controllers\AuthController@prosess')->name('prosess.login');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/admin/opd/file', function () {
        return view('admin.opdfile.index');
    })->name('opd.file');
    Route::get('/admin/opd/tambah', function () {
        return view('admin.opd.form');
    })->name('opd.form');
    Route::get('/admin/opd/tambah_file', function () {
        return view('admin.opdfile.form');
    })->name('opdfile.form');
    Route::get('/admin/opd/uptd', function () {
        return view('admin.opd.uptd');
    })->name('opd.uptd');
    Route::get('/dataset', function(){
        return view('frontend.dataset');
    })->name('dataset');
    Route::get('/dataset/detail', function(){
        return view('frontend.dataset_detail');
    })->name('dataset.detail');
    Route::get('/dataset/upload', function(){
        return view('frontend.upload_file_opd');
    })->name('dataset.upload');
    Route::get('/dataset/statistik', function(){
        return view('frontend.statistik');
    })->name('statistik');
    Route::get('/user/ubah_password', function(){
        return view('user.ubah_password');
    })->name('ubah.password');
    Route::get('/admin/opd/metadata', function(){
        return view('admin.opdfile.metadata');
    })->name('file.metadata');
    Route::post('/user/proses_ubah_password','App\Http\Controllers\UserController@proses_ubah_password')->name('proses.ubah_password');
    Route::get('/admin/opd/datatable_opd', 'App\Http\Controllers\OpdController@datatable')->name('opd.data');
    Route::get('/admin/opd/datatable_opd_parent', 'App\Http\Controllers\OpdController@datatable_opd_parent')->name('opd_parent.data');
    Route::get('/admin/opd/get_uptd', 'App\Http\Controllers\OpdController@get_uptd')->name('data.uptd');
    Route::delete('/admin/opd/hapus_opd','App\Http\Controllers\OpdController@hapus_opd')->name('uptd.delete_data');
    Route::resource('/admin/opd', 'App\Http\Controllers\OpdController');
    Route::resource('/admin/opdfile', 'App\Http\Controllers\OpdFileController');
    Route::get('/admin/user/index', 'App\Http\Controllers\UserController@index')->name('user.index');
    Route::post('/admin/user/store', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::delete('/admin/user/delete', 'App\Http\Controllers\UserController@destroy')->name('user.delete');
    Route::delete('/admin/user/delete_parent', 'App\Http\Controllers\UserController@delete_parent')->name('user.delete_parent');
    Route::get('/admin/user/datatable', 'App\Http\Controllers\UserController@datatable')->name('user.datatable');
    Route::get('/admin/user/parent_datatable', 'App\Http\Controllers\UserController@parent_datatable')->name('user_parent.datatable');
    Route::get('/opdfile/get_download', 'App\Http\Controllers\OpdFileController@get_download')->name('opdfile.download');
    Route::get('/opdfile/download_all', 'App\Http\Controllers\OpdFileController@download_all')->name('opdfile.download_all');
   
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
    Route::post('/dataset/upload_file', 'App\Http\Controllers\OpdFileController@upload_file')->name('upload.file');
    Route::post('/dataset/upload_metadata', 'App\Http\Controllers\OpdFileController@upload_metadata')->name('upload.metadata');
    Route::post('/dataset/update_status', 'App\Http\Controllers\OpdFileController@update_status')->name('file.update_status');
    Route::delete('/admin/opd/delete','App\Http\Controllers\OpdFileController@destroy')->name('opd.delete');
    Route::delete('/admin/opd_file/delete','App\Http\Controllers\OpdFileController@file_delete')->name('opd_file.delete');

    Route::get('/admin/api', 'App\Http\Controllers\CkanController@index')->name('api.index');
    Route::get('/admin/api/sinkronisasi', 'App\Http\Controllers\CkanController@sinkronisasi')->name('api.sikronisasi');
    Route::get('/admin/api/datatable', 'App\Http\Controllers\CkanController@datatable')->name('api.data');
});
