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

/**
 * Use for route construction ?? WIP
 */
$routing = [
    'client' => [
        'post' => ['add','update','delete','restore','expunge'],
        'get' => ['list','search','deleted']
    ]
];

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

include('api/client.php');
include('api/project.php');
include('api/task.php');
include('api/researcher.php');
include('api/respondent.php');


