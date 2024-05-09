<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Main Page';
});

Route::get('/xxx', function () {
    return 'Hello';
})->name('hello');

Route::get('/hallo', function () {
    return redirect()->route('hello');
});

Route::get('/greet/{name}', function ($name) {
    return 'Hello, ' . $name . '!';
});

Route::fallback(function(){
    return 'Page not found';
});


//Get gets data from the server
//Post sends data to the server
//Put updates data on the server
//Delete deletes data on the server
