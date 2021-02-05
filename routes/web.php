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


Route::get('/','HomeController@index')->name('home');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('navigations')->name('navigation.')->group(function () {
        Route::get('/', 'NavigationController@index')->name('index');
        Route::get('/create/', 'NavigationController@create')->name('create');
        Route::get('/{navigation}', 'NavigationController@show')->name('show');
        Route::put('/{navigation}', 'NavigationController@update')->name('update');
        Route::delete('/{navigation}', 'NavigationController@delete')->name('delete');
        Route::post('/', 'NavigationController@store')->name('store');
    });
    Route::prefix('navigation-categories')->name('navigation-category.')->group(function () {
        Route::get('/create', 'NavigationCategoryController@create')->name('create');
        Route::get('/{navigationCategory}', 'NavigationCategoryController@show')->name('show');
        Route::put('/{navigationCategory}', 'NavigationCategoryController@update')->name('update');
        Route::delete('/{navigationCategory}', 'NavigationCategoryController@delete')->name('delete');
        Route::post('/', 'NavigationCategoryController@store')->name('store');
    });
    Route::prefix('navigation-items')->name('navigation-item.')->group(function () {
        Route::get('/create', 'NavigationItemController@create')->name('create');
        Route::get('/{navigationItem}', 'NavigationItemController@show')->name('show');
        Route::put('/{navigationItem}', 'NavigationItemController@update')->name('update');
        Route::delete('/{navigationItem}', 'NavigationItemController@delete')->name('delete');
        Route::post('/', 'NavigationItemController@store')->name('store');
    });
});









