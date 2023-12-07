<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsAPIController;
use App\Http\Controllers\EventDetailAPIController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\TicketsAPIController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/v1/events", [EventsAPIController::class, "index"]);
Route::get("/v1/events/{id}", [EventsAPIController::class, "show"]);
Route::get("/v1/events/tickets/{id}", [TicketsAPIController::class, "getWorkshops"]);

Route::post("/v1/tickets", [TicketsAPIController::class, "buyTicket"]);
Route::post("/v1/orthertickets", [TicketsAPIController::class, "buyOtherTicket"]);
// Route::put("/v1/events/{id}", [EventsAPIController::class, "update"]);
// Route::post("/v1/events", [EventsAPIController::class, "store"]);
// Route::delete("/v1/events/{id}", [EventsAPIController::class, "destroy"]);

Route::get("/v1/organizers/{slug1}/events/{slug2}", [EventDetailAPIController::class, "show"]);

Route::post("/v1/login", [UserLoginController::class, "login"]);
Route::get("/v1/logout", [UserLoginController::class, "logout"]);

Route::post("/v1/organizers/{slug1}/events/{slug2}/registration", [EventDetailAPIController::class, "registration"]);

Route::get("/v1/registration?token={token}", [RegistrationAPIController::class,'registration']);
Route::get("/v1/tickets/{id}",[TicketsAPIController::class, "show"]);