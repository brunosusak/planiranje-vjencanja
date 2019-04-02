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

Route::get('/', 'MainController@home')->name('home');

/*
 *          ADMIN ROUTES
 */

Route::get('/admin', 'AdminController@index')->name('admin-index');

Route::get('/admin/user', 'AdminController@UserList')->name('user-list');

Route::post('/admin/set', 'AdminController@SetAsAdmin')->name('set-as-admin')->middleware('super-admin-middleware');

/*
 *          ADMIN OFFERS
 */

Route::get('/admin/offers/all', 'AdminController@getAllOffers')->name('offers-all');

Route::get('admin/offers/create', 'AdminController@getOffersCreateTemplate')->name('offers-create');

Route::post('admin/offers/create', 'AdminController@createOffer')->name('create-offer');

Route::get('admin/offer/{offer_id}', 'AdminController@getSingleOfferAdmin')->name('single-offer');

Route::post('admin/offer/edit/{offer_id}', 'AdminController@editOffer')->name('edit-offer');

Route::get('offers/{offer_type_id}', 'MainController@getOffersById')->name('offers-by-id');

Route::get('offer/{offer_id}', 'MainController@getSingleOffer')->name('offer-single');

Route::post('offer/delete/{offer_id}', 'AdminController@deleteOffer')->name('offer-delete');

/*
 *          END OF ADMIN OFFERS
 */

/*
 *          END OF ADMIN ROUTES
 */
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
