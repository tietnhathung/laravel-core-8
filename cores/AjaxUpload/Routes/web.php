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

Route::get('/ajax_upload', 'AjaxUploadController@index');
Route::post('/ajax_upload/action', 'AjaxUploadController@action')->name('ajaxupload.action');
Route::post('/ajax_upload/uploadAvatar', 'AjaxUploadController@uploadAvatar')->name('ajaxupload.uploadAvatar');
