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

Route::get('/', 'PagesController@index');
Route::get('/home', 'PagesController@home');

Route::resource('postfix/domains', 'PostfixDomainController');
Route::resource('postfix/domains.mailboxes', 'PostfixMailboxController');

Route::resource('powerdns/zones', 'PowerdnsDomainController');
Route::resource('powerdns/zones.records', 'PowerdnsRecordController');

//Route::resource('powerdns/domains', 'PowerdnsDomainController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
