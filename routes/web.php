<?php

use App\Models\Article;
use App\Models\TypeArticle;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/articles', function () {
    return Article::with("type")->paginate(5);
});


Route::get('/types', function () {
    return TypeArticle::with("articles")->paginate(5);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
