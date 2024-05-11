<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/tasks', function () {

    return view('index', [
        'tasks' => Task::latest()->get()
    ]);

})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task){

    return view('edit', [
        'task' => $task
    ]);

})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task){

    return view('show', [
        'task' => $task
    ]);

})->name('tasks.show');


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::fallback(function(){
    return 'Page not found';
});

Route::post('/tasks', function (TaskRequest $request){

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request){

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task){

    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

//Get gets data from the server
//Post sends data to the server
//Put updates data on the server
//Delete deletes data on the server
