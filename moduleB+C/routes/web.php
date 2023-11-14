<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\ReportController; 

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

// Route::get('/', function () {
    
//     echo Hash::make('654321');
// });


Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/events', [EventController::class, 'index'])
    ->middleware('checkLogin')
    ->name('event');


Route::get('/events/create', [EventController::class, 'create'])
    ->middleware('checkLogin')
    ->name('events.create');

Route::post('/events', [EventController::class, 'store'])
    ->middleware('checkLogin')
    ->name('events.store');


Route::get('/events/{id}', [EventController::class, 'show'])
    ->middleware('checkLogin')
    ->name('events.show');

Route::get('/events/{id}/edit', [EventController::class, 'edit'])
    ->middleware('checkLogin')
    ->name('events.edit');

Route::put('/events/{id}', [EventController::class, 'update'])
    ->middleware('checkLogin')
    ->name('events.update');

    
Route::get('/tickets/create/{id}', [TicketsController::class, 'create'])
    ->middleware('checkLogin')
    ->name('tickets.create');

Route::get('/channels/create/{id}', [ChannelsController::class, 'create'])
    ->middleware('checkLogin')
    ->name('channels.create');

Route::get('/rooms/create', [RoomsController::class, 'create'])
    ->middleware('checkLogin')
    ->name('rooms.create');

Route::get('/sessions/create', [SessionsController::class, 'create'])
    ->middleware('checkLogin')
    ->name('sessions.create');

Route::get('/sessions/edit', [SessionsController::class, 'edit'])
    ->middleware('checkLogin')
    ->name('sessions.edit');

Route::get('/reports', [ReportController::class,'index'])
    ->middleware('checkLogin')
    ->name('reports');

