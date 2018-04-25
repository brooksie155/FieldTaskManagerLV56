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

/*
|--------------------------------------------------------------------------
| Crud Routes
|--------------------------------------------------------------------------
| Most controllers expose add, update, deleted, deleted, expunge, list and search
| methods and use the CrudControllerTrait to provide theses. This section generates 
| the routes for those actions.
|
| @todo - investigate if it is possible/feasible to lookup which controllers 
| implement the CrudControllerTrait and create routes automatically
|
| @todo break out into coroutines, yield data rather than nested loops
|     lambda, closure, coroutine ... ?
*/
$crudRoutes = [
    
    'get' => [
        'get' => [
           'params' => ['id' => '[0-9]+']
        ],
        'list' => [],
        'search' => [], 
        'deleted' => [],
    ],
    
    'post' => [
       'add' => [],
       'update' => [
            'params' => ['id' => '[0-9]+']
        ],
       'delete' => [
            'params' => ['id' => '[0-9]+']
        ],
       'restore' => [
            'params' => ['id' => '[0-9]+']
        ],
       'expunge' => [
            'params' => ['id' => '[0-9]+']
        ]       
    ]
    
];

$crudControllers = [
    
    'research_client' => [
        'controller' => 'API\ResearchClientManager',
        'route' => 'research_client',
        'routes' => $crudRoutes        
    ],

    'research_client_user' => [
        'controller' => 'API\ResearchClientUserManager',
        'route' => 'research_client_user',
        'routes' => $crudRoutes        
    ],    
    
    'respondent' => [
        'controller' => 'API\RespondentManager',
        'route' => 'respondent',
        'routes' => $crudRoutes        
    ],   
    
    'task' => [
        'controller' => 'API\TaskManager',
        'route' => 'task',
        'routes' => $crudRoutes
    ],
    
    'task_response' => [
        'controller' => 'API\TaskResponseManager',
        'route' => 'task_response',
        'routes' => $crudRoutes
    ],    
    
    'project' => [
        'controller' => 'API\ProjectManager',
        'route' => 'project',
        'routes' => $crudRoutes
    ],
    
    'admin_user' => [
        'controller' => 'API\AdminUserManager',
        'route' => 'admin_user',
        'routes' => $crudRoutes
    ],
    
    'recruiter' => [
        'controller' => 'API\RecruiterManager',
        'route' => 'recruiter',
        'routes' => $crudRoutes
    ],    
    
];

foreach($crudControllers as $crudRouteMeta) {
    
    foreach($crudRouteMeta['routes'] as $routeMethod => $routes) {
                
        foreach($routes as $routeEndPoint => $routeMeta) {
            
            // construct params for route
            $params = $routeMeta['params'] ?? [];
            $routeParams = (!empty($params))
                ? '{' . implode('}/{', array_keys($params)) . '}'
                : '';
            
            $route = "{$crudRouteMeta['route']}/{$routeEndPoint}/{$routeParams}";
            switch ($routeMethod) {

                case 'get':
                    Route::get($route, [
                        'as' => "{$crudRouteMeta['route']}_{$route}",
                        'uses' => "{$crudRouteMeta['controller']}@{$routeEndPoint}Action"
                    ])->where($params);      

                case 'post':
                    Route::post($route, [
                        'as' => "{$crudRouteMeta['route']}_{$route}",
                        'uses' => "{$crudRouteMeta['controller']}@{$routeEndPoint}Action"
                    ])->where($params);                 
            }
        }
    }
}

/*
|--------------------------------------------------------------------------
| Specific Routes per controller
|--------------------------------------------------------------------------
| In order to prevent this file from becoming unweildly in length, each controller
| should have it's own route file included rather than list them all here. 
|
*/

include('api/client.php');

//include('api/project.php');
//include('api/task.php');
//include('api/researcher.php');
//include('api/respondent.php');


