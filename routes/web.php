<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Models\Car;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function (){
    return view('about');
})->name("about");

Route::get('/colors', function (){
    return view('colors', ['colors' => ['red', 'blue', 'green', 'yellow']]);
})->name("colors");

Route::get('/display-car', function () {
    $myCar = Car::create(['Tesla', 2023, 1000]);
    return $myCar->toHtml();
});

Route::get('/contact/create', [ContactController::class, 'contact'])->name("contact.page");
Route::get('/feedback', [ContactController::class, 'index'])->name("contact.index");
Route::post('/contact/create', [ContactController::class, 'store'])->name("contact.store");
Route::get('/posts', [PostController::class, 'index'])->name("posts.index");
Route::get('/posts/create', [PostController::class, 'create'])->name("posts.create");
Route::post('/posts', [PostController::class, 'store'])->name("posts.store");
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name("posts.edit");
Route::put('/posts/{post}/update', [PostController::class, 'update'])->name("posts.update");
Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])->name("posts.destroy");
Route::get('/posts/{post}', [PostController::class, 'show'])->name("posts.show");
Route::patch('/posts/{post}', [PostController::class, 'status'])->name("posts.status");
