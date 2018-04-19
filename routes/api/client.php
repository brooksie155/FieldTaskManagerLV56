<?php

//use App\Http\Controllers\API\ClientManager;

$crudControllers = [
    'client' => 'API\ClientManager',
    'project' => 'API\ProjectManager',
];
        
$crudRoutes = [
    'get' => ['id'],
    'list' => [],
    'search' => []
];

Route::get('/client/get/{id}', [
    'as' => 'client_get',
    'uses' => 'API\ClientManager@getAction'
]);

Route::get('/client/list', [
    'as' => 'client_list',
    'uses' => 'API\ClientManager@listAction'
]);

Route::get('/client/search', [
    'as' => 'client_search',
    'uses' => 'API\ClientManager@searchAction'
]);

/*
 * curl -X POST -d "company=test1&firstname=Bob&lastname=jim&email=bob@bob.bob" -H "X-Requested-With: XMLHttpRequest" http://thefield-tm.test/api/clients/add
 */
Route::post('/client/add', [                
    'as' => 'client_add',
    'uses' => 'API\ClientManager@addAction'    
]);

/*
 * curl -X POST -d "company=test1ww22" -H "X-Requested-With: XMLHttpRequest" http://thefield-tm.test/api/clients/update/2
 */
Route::post('/client/update/{id}', [                
    'as' => 'client_update',
    'uses' => 'API\ClientManager@updateAction'    
]);

/*
 * curl -X POST -H "X-Requested-With: XMLHttpRequest" http://thefield-tm.test/api/clients/delete/3
 */
Route::post('/client/delete/{id}', [                
    'as' => 'client_delete',
    'uses' => 'API\ClientManager@deleteAction'    
]);

/*
 * curl -X GET -H "X-Requested-With: XMLHttpRequest" http://thefield-tm.test/api/clients/deleted
 */
Route::get('/client/deleted', [               
    'as' => 'client_deleted',
    'uses' => 'API\ClientManager@listDeletedAction'    
]);

/*
 * curl -X POST -d "company=test1&firstname=Bob&lastname=jim&email=bob@bob.bob" -H "X-Requested-With: XMLHttpRequest" http://thefield-tm.test/api/clients/restore/{id}
 */
Route::post('/client/restore/{id}', [               
    'as' => 'client_restore',
    'uses' => 'API\ClientManager@restoreAction'    
]);

/*
 * curl -X POST -d "company=test1&firstname=Bob&lastname=jim&email=bob@bob.bob" -H "X-Requested-With: XMLHttpRequest" http://thefield-tm.test/api/clients/expunge/{id}
 */
Route::post('/client/expunge/{id}', [               
    'as' => 'client_expunge',
    'uses' => 'API\ClientManager@expungeAction'    
]);

