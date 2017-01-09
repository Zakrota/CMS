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
/*Route::get('/', function () {
	//return "Ya Welcome";
    return view('welcome');
});*/

Route::get("/","FrontEndController@getIndex");


Route::controller("AccountEQ","AccountEQController");
Route::controller("CMS/Home","CMS\HomeController");
Route::controller("CMS/Admin","CMS\AdminController");
Route::controller("CMS/Menu","CMS\MenuController");
Route::controller("CMS/Article","CMS\ArticleController");
Route::controller("CMS/StaticPage","CMS\StaticPageController");
Route::controller("CMS/Slider","CMS\SliderController");


Route::controller("FrontEnd","FrontEndController");

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/CMS', 'CMS\HomeController@getIndex');
