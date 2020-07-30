<?php
Route::get('countries','LocationController@country');
Route::get('regions','LocationController@region');
Route::get('states','LocationController@state');
Route::get('districts','LocationController@district');
Route::resource('locations', 'LocationController');