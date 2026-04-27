<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Models\Car;
use App\Models\Event;


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
    $data = [
        'name' => "Tesla",
        'year' => 2023,
        'totalDistance' => 1000,
    ];
    return view('cars.show', ['data' => $data]);
});
Route::get('/display-cars', function () {
    $cars = [
        Car::create(["Toyota", 2020, 5000]),
        Car::create(["BMW", 2010, 0]),
        Car::create(["Renault", 2025, 200]),
    ];
    return view("cars.index", ["cars" => $cars]);
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
Route::post('/posts/{post}/duplicate', [PostController::class, 'duplicate'])->name("posts.duplicate");
Route::get('/display-event', [EventController::class, 'show'])->name("event.show");
