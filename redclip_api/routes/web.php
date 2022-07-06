<?php
/** @var \Laravel\Lumen\Routing\Router $router */
// use App\Http\Controllers\PostsController;
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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', function() use ($router) {
    return "Lumen RESTful API By Rodrigo Antunes";
});
  
$router->group(['prefix' => 'api/v1',], function($router)
{
    $router->get('posts','PostsController@index');
   
    $router->get('posts/{id}','PostsController@getPost');

    $router->get('posts/{id}/comments/','PostsController@getComments');
       
    $router->post('posts','PostsController@createPost');
       
    $router->put('posts/{id}','PostsController@editPost');
       
    $router->put('posts/{id}','PostsController@updatePost');
    
    // $router->put('posts/{id}','PostsController@updateLike');
    // $router->put('posts/{id}','PostsController@updateDislike');
       
    $router->delete('posts/{id}','PostsController@destroyPost');
});