<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Grupo de rutas 
Route::prefix('v1')->namespace('App\Http\Controllers')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('comments', CommentController::class);
    Route::apiResource('tickets', TicketController::class);

      //  rutas para gráficos
      Route::get('tickets/total', 'TicketController@totalTickets');
      Route::get('tickets/total-abiertos', 'TicketController@totalTicketsAbiertos');
      Route::get('tickets/total-cerrados', 'TicketController@totalTicketsCerrados');
      Route::get('tickets/tickets-por-categoria', 'TicketController@ticketsPorCategoria');
});



