<?php
use Illuminate\Support\Facades\DB;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/tasks', 'TaskController@create');
$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/{id}', 'TaskController@show');
$router->put('/tasks/{id}', 'TaskController@update');
$router->delete('/tasks/{id}', 'TaskController@delete');

$router->get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'success', 'message' => 'Database connection is working!']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Database connection error: ' . $e->getMessage()]);
    }
});