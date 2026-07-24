<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
route::get('/', function () {
    return view('welcome');
})->name('welcome');
route::get('/dashboard', [UserController::class,'index'])->name('index')->middleware('auth');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/register',[UserController::class,'register'])->name('register');
Route::post('/logout',[UserController::class,'logout'])->name('logout');
route::get('/create-event', [EventController::class, 'showform'])->name('create-event');
Route::post("stor_event",[EventController::class,"StoreEvent"])->name("stor_event");
route::post("/register-for-event/{id}",[ReservationController::class,"reserve"])->name("register-for-event");
route::get("/my-tickets",[TicketController::class,"ShowTicket"])->name("my-tickets");
route::delete("/events.destroy/{id}",[EventController::class,"EventDestroy"])->name("events.destroy");route::get("/events.edit/{id}",[EventController::class,"EventUpdateshow"])->name("events.edit");
route::get("/events.edit/{id}",[EventController::class,"EventShow"])->name("events.edit");
route::put("/events.update/{id}",[EventController::class,"EventUpdate"])->name("events.update");