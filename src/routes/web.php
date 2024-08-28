<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Home to tasks index
Route::get('/',function(){
    return redirect()->route('tasks.index');
});


// Task routes
Route::resource('tasks', TaskController::class)->only('index','store','destroy');

// Task completion
Route::post('tasks/{id}/complete',[TaskController::class,'complete'])->name('tasks.complete');
