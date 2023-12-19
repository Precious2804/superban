<?php

use EdenLife\Superban\Middleware\SuperbanMiddleware;
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

Route::middleware([SuperbanMiddleware::class . ':200,2,1440'])->group(function () {
    Route::post('/thisroute', function () {
        // Your logic for /thisroute
        return response('This route is accessible.');
    });

    Route::post('/anotherroute', function () {
        // Your logic for /anotherroute
        return response('Another route is accessible.');
    });
});
