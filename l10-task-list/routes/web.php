<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

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
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function($id) {
//    $task = collect($tasks)->firstWhere('id', $id);
//
//    if (!$task) {
//        abort(Response::HTTP_NOT_FOUND);
//    }
    return view('show', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');

// Route::get('/greet/{name}', function($name) {
//     return 'Hello ' . $name . '!';
// });

// Route::get('/xxx', function() {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function() {
//     return redirect()->route('hello');
// });

Route::fallback(function() {
    return 'Still got somewhere';
});
