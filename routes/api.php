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


 $api = app('Dingo\Api\Routing\Router');

 $api->version('v1', function ($api) {

     /**
      * get list of episodes
      */
     $api->get('episodes', 'App\Http\Controllers\EpisodeController@episodes');
     //$api->post('episode/{episode}/comment/create', 'App\Http\Controllers\CommentController@create');
 });
