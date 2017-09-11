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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/newStudent', [
    'uses'=>'HomeController@getNewStudent',
    'as'=>'newStudent'
]);

Route::get('/batch/{id}',[
    'uses'=>'HomeController@getByBatch',
    'as'=>'batch'
]);

Route::post('/student_update',[
    'uses'=>'HomeController@postUpdate',
    'as'=>'student_update'
]);
