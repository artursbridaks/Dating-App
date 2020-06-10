<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user-card', 'UserCardProfileController')->name('user-card');
Route::get('/user-gallery/{user}', 'UserGalleryController@userPictures');

Route::get('/profile', 'EditUserProfileController')->name('profile.edit');
Route::put('/profile', 'UpdateUserProfileController')->name('profile.update');

Route::get('/dating', 'MatchController@show')->name('match.show');
Route::post('/dating/{user}/like', 'MatchController@like')->name('match.like');
Route::post('/dating/{user}/dislike', 'MatchController@dislike')->name('match.dislike');

Route::get('/matches', 'MatchController@index')->name('match.index');


