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

Route::get('/', 'PagesController@homePage');


Route::get('/new', 'PagesController@newPostPage');

Route::get('/about', 'PagesController@aboutPage');

Route::get('/checkout', 'PagesController@checkoutPage');

Route::post('/cart','AjaxController@cart');

Route::post('/price','AjaxController@price');

Route::get('/cart','PagesController@cartCheckout');

Route::resource('posts','PostsController');

// Route::get('addmoney/stripe', array('as' => 'addmoney.paywithstripe','uses' => 'AddMoneyController@payWithStripe'));
// Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'AddMoneyController@postPaymentWithStripe'));

Route::get('stripe', 'StripePaymentController@stripe');

Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('Ecommerce Dashboard');
