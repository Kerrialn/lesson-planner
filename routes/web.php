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


Route::get('/', 'AppController@index', function () {
})->name('welcome');

Route::post('/search', 'AppController@front_search', function () {
})->name('front.search');

Route::get('/about', 'AppController@about', function () {
})->name('about');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// rate resource
Route::post('/rate/resource/{id}', 'HomeController@rate_resource', function ($id) {
})->name('rate.resource');


// new resource page
Route::get('/resource/create', 'HomeController@getCreatePage', function () {
})->name('new.resource');

// handle creating new resoource
Route::post('/resource/create', 'HomeController@save_new_resource', function () {
})->name('create.resource');



// create new warm up
Route::post('/resource/create-warmup/{id}', 'HomeController@create_warmup', function ($id) {
})->name('new.warmup');

// destroy warm up
Route::post('/resource/destroy-warmup/{id}', 'HomeController@destroy_warmup', function ($id) {
})->name('warmup.destroy');



// create new phrase 
Route::post('/resource/create-phrase/{id}', 'HomeController@create_phrase', function ($id) {
})->name('new.phrase');
// destroy phrase 
Route::post('/resource/destroy-phrase/{id}', 'HomeController@destroy_phrase', function ($id) {
})->name('phrase.destroy');



//create new meida
Route::post('/resource/create-media/{id}', 'HomeController@create_media', function ($id) {
})->name('new.media');

// detroy media
Route::post('/resource/destroy-media/{id}', 'HomeController@destroy_media', function ($id) {
})->name('media.destroy');





//create new article
Route::post('/resource/create-article/{id}', 'HomeController@create_article', function ($id) {
})->name('new.article');

// destroy article 
Route::post('/resource/destroy-article/{id}', 'HomeController@destroy_article', function ($id) {
})->name('article.destroy');



//create new vocab
Route::post('/resource/create-vocab/{id}', 'HomeController@create_vocab', function ($id) {
})->name('new.vocab');
// destroy vocab 
Route::post('/resource/destroy-vocab/{id}', 'HomeController@destroy_vocab', function ($id) {
})->name('vocab.destroy');



//create new question
Route::post('/resource/create-question/{id}', 'HomeController@create_question', function ($id) {
})->name('new.question');

// destory question
Route::post('/resource/destroy-question/{id}', 'HomeController@destroy_question', function ($id) {
})->name('question.destroy');



//create new script
Route::post('/resource/create-script/{id}', 'HomeController@create_script', function ($id) {
})->name('new.script');
// destory script
Route::post('/resource/destroy-script/{id}', 'HomeController@destroy_script', function ($id) {
})->name('script.destroy');


//create new script
Route::post('/resource/create-homework/{id}', 'HomeController@create_homework', function ($id) {
})->name('new.homework');
// destory script
Route::post('/resource/destroy-homework/{id}', 'HomeController@destroy_homework', function ($id) {
})->name('homework.destroy');




//user account
Route::get('/account', 'HomeController@getUserAccount', function () {
})->name('user.account');

//update user account
Route::post('/user-update', 'HomeController@updateUserAccount', function () {
})->name('update.user');




Route::get('/resource/view/{id}', 'HomeController@getResource', function ($id) {
})->name('view.resource');

Route::post('/resource/update/{id}', 'HomeController@update_resource', function ($id) {
})->name('update.resource');


Route::post('/resource/delete/{id}', 'HomeController@destroy_resource', function ($id) {
})->name('destroy.resource');







Route::get('/download/{pdf}', 'DownloadController@downloadPDF', function ($filename) {
})->name('download.pdf');

Route::get('/resource/{level}', 'AppController@getLevel', function ($level) {
})->name('resource.level');


Route::get('/resource/{level}/{id}', 'AppController@getItem', function ($level, $id) {
})->name('resource.item');







Route::get('logout', 'Auth\LoginController@logout');