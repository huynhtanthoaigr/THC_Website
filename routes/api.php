<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Listeners\SePayWebhookListener;
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

Route::post('/webhook/sepayout', function (Request $request) {
    $listener = new SePayWebhookListener();
    $listener->handle($request->all());

    return response()->json(['status' => 'success']);
});
