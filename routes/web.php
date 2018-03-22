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

/**
* Main page route 'middleware' => 'web'
*/
Route::group([], function (){
	//pages  + UserSender is absent
	Route::match(['get','post'],'/',['uses'=>'IndexController@execute','as'=>'home']);

 	
 	//WEBmenu is apsent
    Route::get('/page/{alias}',['uses'=>'PageController@execute','as'=>'page']);
 	Route::get('/portfolio/{alias}',['uses'=>'PageController@executePortfolio','as'=>'portfolio']);

 	 
   
    //filter prases is apsent
    Route::get('/wordbook/{name}',function(){
	return redirect('/');
	})->where('name','[A-Za-z]+');
	Route::resource('wordbook','PageController');
	Route::post('getData','PageController@getData');
	});
	//confirmmail is apsent, further... 
/**
* AdminPanel page route
*/

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
         //on the laravel
// Route::get('api/{somevar}', 'ApiController@index')->name('admin');
// public function index(Somevar $somevar)
//     {
//		$result = '';
//         switch ($somevar)
//         {

//         	case 'someFunction':

//         	$result = $this->someFunction($_GET['name']);
//         	break;

//         }
//         echo json_encode(([$responce => $somevar]));
        
//     } 

			// on the angular
// privat function someFunction($FirstName)
//     {
//         return "I'm $FirstName";
        
//     }     
/**
* Admin page route
*/

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){

 	 	
/**
* WITH RESOURCE
*/


Route::resource('logos', 'LogosController');
Route::resource('socials', 'SocialysController');
Route::resource('portfolios', 'PortfoliosController');
Route::resource('services', 'ServicesController');
Route::resource('peoples', 'PeoplesController');
Route::prefix('peoples/{people}')->group(function () {
	Route::resource('socialPeoples', 'SocialPeoplesController');	    
	 
});

//Route::get('portfolioRestore', 'PortfoliosController@restore')->name('restore');
Route::prefix('portfolios/{portfolio}')->group(function () {
	Route::get('topic', 'PagesController@topic')->name('topic');
	Route::resource('pages', 'PagesController');

	Route::prefix('pages/{page}')->group(function () {
		Route::resource('socialAlls', 'SocialAllsController');
		Route::resource('portfolioAlls', 'PortfolioAllsController');
		Route::resource('peopleAlls', 'PeopleAllsController');

		//Route::prefix('peopleAlls/{peopleAll}')->group(function () {
			//Route::resource('socialPeopleAlls', 'SocialPeopleAllsController');	    
	 
		//});
	});	
});

});	
