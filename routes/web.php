<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('students', StudentController::class);
// Route::get('posts', function () {
//     \App\Models\Post::create([
//         'title'=> 'bangladesh',
//         'student_id'=> 2,
//     ]);
// });
Route::resource('posts', PostController::class);