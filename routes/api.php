<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/client/{id}', [
    'as' => 'client_get',
    'uses' => 'API\ClientManager@getClient'
]);

Route::get('/clients/list', [
    'as' => 'client_list',
    'uses' => 'API\ClientManager@listClients'
]);