<?php

Route::group(['middleware' => 'language'], function () {
    //  Authencation Route
    Auth::routes();

    //  Tasks Resource
    Route::resource('/tasks', 'TaskController');

    //  Language Route
    Route::get('/lang/{lang}', 'LanguageController@setLanguage')->name('lang');
});
