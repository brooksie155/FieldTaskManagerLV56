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
    'uses' => 'API\ClientManager@getAction'
]);

Route::get('/clients/listAction', [
    'as' => 'client_list',
    'uses' => 'API\ClientManager@listAction'
]);

Route::get('/clients/search', [
    'as' => 'client_search',
    'uses' => 'API\ClientManager@searchAction'
]);

/*
 * curl -X POST -d "company=test1&firstname=Bob&lastname=jim&email=bob@bob.bob" -H "X-Requested-With: XMLHttpRequest" http://thefield-tm.test/api/clients/add
 */
Route::post('/clients/add', [                
    'as' => 'client_add',
    'uses' => 'API\ClientManager@addAction'    
]);

// SWTICH TO POST
Route::get('/clients/update', [                
    'as' => 'client_update',
    'uses' => 'API\ClientManager@updateAction'    
]);

// SWTICH TO POST
Route::get('/clients/delete', [                
    'as' => 'client_delete',
    'uses' => 'API\ClientManager@deleteAction'    
]);

Route::get('/clients/deleted', [               
    'as' => 'client_deleted',
    'uses' => 'API\ClientManager@listDeletedAction'    
]);

// will have similar routes for other entities .
//  ... can theny be generated dynamically?

