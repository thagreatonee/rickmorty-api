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

    //show a list of episodes
    $api->get('episodes', 'App\Http\Controllers\EpisodeController@show');
    //add comment to an episode
    $api->post('episode/{episode}/comment/create', 'App\Http\Controllers\CommentController@create')->where('episode', '[1-9]+');
    //retrieve a list of comments for the currently viewed episode
    $api->get('episode/{episode}/comments', 'App\Http\Controllers\CommentController@view')->where('episode', '[1-9]+');
    //retrieve a list of characters for that episode
    $api->get('episode/{episode}/characters', 'App\Http\Controllers\CharacterController@show')->where('episode', '[1-9]+');
    //show all the comments 
    $api->get('comments', 'App\Http\Controllers\CommentController@show');
});
