<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

Route::get('/bookrent', function () {
    return User::where('id', 1)->with('recentRent')->get();
});

Route::post('/books',[BooksController::class,'store']);

Route::patch('/books/{book}',[BooksController::class,'update']);
