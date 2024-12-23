<?php

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Todo;
use App\Models\Example;

// Get
Route::get('/', function () {
    return redirect()->route('todo.index');
});

// Get
Route::get('/todo', function () {
    return view('welcome', [
        'todos' => Todo::paginate(5),
    ]);
})->name('todo.index');

// For Create
Route::view('/todo/create', 'create')->name('todo.create');

// Query Update
Route::get('/todo/edit/{todo}', function (Todo $todo) {
    return view('edit', ['todo' => $todo]);
})->name('todo.edit');

Route::get('/todo/{todo}', function (Todo $todo) {
    return view('show', ['todo' => $todo]);
})->name('todo.show');

// Post
Route::post('/todo', function (TodoRequest $request) {
    $todo = Todo::create($request->validated());

    return redirect()
        ->route('todo.index')
        ->with('success', 'Create Todo Success!');
})->name('todo.store');

// Update
Route::put('/todo/{todo}', function (Todo $todo, TodoRequest $request) {
    $todo->update($request->validated());

    return redirect()
        ->route('todo.show', ['todo' => $todo->id])
        ->with('success', 'Updated Todo Success!');
})->name('todo.update');

// Completed
Route::put('/todo/toggle-completed/{todo}', function (Todo $todo) {

    $todo->toggleCompleted();

    return redirect()
        ->route('todo.show', ['todo' => $todo->id])
        ->with('success', 'Update Todo Success!');
})->name('todo.toggle-completed');

// Delete
Route::delete('/todo/{todo}', function (Todo $todo) {
    $todo->deleteTodo();

    return redirect()
        ->route('todo.index', ['todo' => $todo])
        ->with('success', 'Todo has Deleted!');
})->name('todo.destroy');

// Fallback
Route::fallback(function () {
    return 'Not Found Sir';
})->name('404');

// Example Test
Route::get('/product', function () {
    // $result = Example::all();

    $result = Example::select('name', 'price', 'qty')
        ->where('id', 1)
        ->get();

    return view('product', ['example' => $result]); // Use an associative array
})->name('product.index');
