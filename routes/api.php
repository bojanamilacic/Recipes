<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Routes for UserController
Route::post('/users', 'App\Http\Controllers\UserController@store');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::put('/users/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy');

// Routes for IngredientController
Route::post('/ingredients', 'App\Http\Controllers\IngredientController@store');
Route::get('/ingredients/{id}', 'App\Http\Controllers\IngredientController@show');
Route::get('/ingredients', 'App\Http\Controllers\IngredientController@index');
Route::put('/ingredients/{id}', 'App\Http\Controllers\IngredientController@update');
Route::delete('/ingredients/{id}', 'App\Http\Controllers\IngredientController@destroy');

// Routes for RecipeController
Route::post('/recipes', 'App\Http\Controllers\RecipeController@store');
Route::get('/recipes/{id}', 'App\Http\Controllers\RecipeController@show');
Route::get('/recipes', 'App\Http\Controllers\RecipeController@index');
Route::put('/recipes/{id}', 'App\Http\Controllers\RecipeController@update');
Route::delete('/recipes/{id}', 'App\Http\Controllers\RecipeController@destroy');

// Routes for CommentController
Route::post('/comments', 'App\Http\Controllers\CommentController@store');
Route::get('/comments/{id}', 'App\Http\Controllers\CommentController@show');
Route::get('/comments', 'App\Http\Controllers\CommentController@index');
Route::put('/comments/{id}', 'App\Http\Controllers\CommentController@update');
Route::delete('/comments/{id}', 'App\Http\Controllers\CommentController@destroy');

// Routes for RatingController
Route::post('/ratings', 'App\Http\Controllers\RatingController@store');
Route::get('/ratings/{id}', 'App\Http\Controllers\RatingController@show');
Route::get('/ratings', 'App\Http\Controllers\RatingController@index');
Route::put('/ratings/{id}', 'App\Http\Controllers\RatingController@update');
Route::delete('/ratings/{id}', 'App\Http\Controllers\RatingController@destroy');