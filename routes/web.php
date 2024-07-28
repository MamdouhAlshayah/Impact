<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
})->name('ddd');



Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');  */

Auth::routes();
    ######################### Begin Articles Routes ########################
    Route::group(['prefix' => 'articles'], function () {

        Route::get('/','articlesController@index') -> name('articles');
      
        Route::group(['middleware' => 'checkArticleOwner'], function() {

            Route::get('create','articlesController@create') -> name('articles.create');

            Route::post('store','articlesController@store') -> name('articles.store');

            Route::get('edit/{id}', 'ArticlesController@edit')->name('articles.edit');

            Route::post('update/{id}', 'ArticlesController@update')->name('articles.update');

            Route::get('delete/{id}', 'ArticlesController@destroy')->name('articles.delete');

        });

    });
    ######################### End Articles Routes  ########################
 

  
    ########################### Begin profile Routes ######################

    Route::get('/profile', 'ProfileController@show')->name('profile')->middleware('auth');

    Route::post('profile/{id}','ProfileController@update')->name('profile.update');
    
    Route::post('/logout', 'LogoutController@logout')->name('logout');


    ########################### End profile Routes  ######################
 


    ######################### Begin comment Routes ########################

    Route::group(['middleware' => 'checkArticleOwner'], function() {

    Route::post('store-Comment/{id}','CommentController@store') -> name('comment.store');

    });

    Route::get('blog-details/{id}', 'CommentController@show')->name('blog-details');  

    ######################### End comment Routes  ######################



    ######################### Begin Front Routes ########################

    /*Route::get('/blog-details', function () {
      return view('front.blog-details');
  })->name('blog-details');*/
  
  Route::get('/', function () { return view('front.index-front');})->name('index-front');

  Route::get('/portfolio-details', function () {return view('front.portfolio-details');})->name('portfolio-details');

  Route::get('/service-details', function () {  return view('front.service-details');})->name('service-details');

  Route::get('/starter-page', function () { return view('front.starter-page');})->name('starter-page'); 
 
  
 ######################### End Front Routes  ########################
