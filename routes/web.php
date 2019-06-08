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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hierarchy', 'HierarchiesController@index')->name('hierarchy');
Route::get('/hierarchy/new', 'HierarchiesController@new')->name('hierarchy-new');
Route::any('/hierarchy/create', 'HierarchiesController@create')->name('hierarchy-create');
Route::get('/count/criteria/{hier_id}', 'HierarchiesController@count')->name('hierarchy-count');
Route::post('/count/criteria/save/{hier_id}', 'HierarchiesController@saveCount')->name('hierarchy-count-save');
//Route::post('/hierarchy/update', 'HierarchiesController@update')->name('hierarchy-update');
//Route::get('/hierarchy/history/show', 'HierarchiesController@historyShow')->name('hierarchy-history-show');
//Route::post('/hierarchy/history', 'HierarchiesController@history')->name('hierarchy-history');
//Route::post('/hierarchy/post', 'HierarchiesController@post')->name('hierarchy-post');

//Route::get('/criteria/{hier_id}', 'CriteriaController@new')->name('criteria');
Route::post('/criteria/create/{hier_id}', 'CriteriaController@create')->name('criteria-create');
Route::get('/priority/{hier_id}', 'CriteriaController@priority')->name('priority');

Route::get('/alternative/{hier_id}', 'AlternativesController@new')->name('alternative');
Route::post('/alternative/create/{hier_id}', 'AlternativesController@create')->name('alternative-create');

Route::any('/calculate/{hier_id}', 'CriteriaController@calculate')->name('criteria-calculate');

Route::any('/count/{hier_id}', 'CriteriaController@count')->name('criteria-count');