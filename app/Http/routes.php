<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([], function () {
    Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
    Route::get('/page/{alias}', ['uses'=>'PageController@execute', 'as'=>'page']);

    Route::auth();
});

// For the Admin part
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function () {
    // admin
    Route::get('/', function (){
        if (view()->exists('admin.index')){
            $data = ['title'=>'Admin Panel'];
            return view('admin.index', $data);
        }
    });

    // admin/pages
    Route::group(['prefix'=>'pages'], function (){
        // admin/pages
        Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'pages']);
        // admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses'=>'AddPagesController@execute', 'as'=>'addPages']);
        // admin/pages/edit/1
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses'=>'EditPagesController@execute', 'as'=>'editPages']);
    });

    // admin/portfolio
    Route::group(['prefix'=>'portfolio'], function (){
        // admin/portfolio
        Route::get('/', ['uses'=>'PortfolioController@execute', 'as'=>'portfolio']);
        // admin/portfolio/add
        Route::match(['get', 'post'], '/add', ['uses'=>'AddPortfolioController@execute', 'as'=>'addPortfolio']);
        // admin/portfolio/edit/1
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses'=>'EditPortfolioController@execute', 'as'=>'editPortfolio']);
    });

    // admin/services
    Route::group(['prefix'=>'services'], function (){
        // admin/services
        Route::get('/', ['uses'=>'ServiceController@execute', 'as'=>'services']);
        // admin/services/add
        Route::match(['get', 'post'], '/add', ['uses'=>'AddServiceController@execute', 'as'=>'addService']);
        // admin/services/edit/1
        Route::match(['get', 'post', 'delete'], '/edit/{service}', ['uses'=>'EditServiceController@execute', 'as'=>'editService']);
    });

});

Route::auth();

Route::get('/home', 'HomeController@index');
