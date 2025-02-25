
<?php

use App\Http\Controllers\APIBookController;
use App\Http\Controllers\APINewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['access.code'])->group(function () {
    Route::get('/image-host', [APINewsController::class, 'imageHost']);
    Route::get('/news', [APINewsController::class, 'index']);
    Route::get('/latest/news', [APINewsController::class, 'latest']);
    Route::get('/news/{id}', [APINewsController::class, 'show']);

    Route::get('/book', [APIBookController::class, 'index']);
    Route::get('/book/{id}/section', [APIBookController::class, 'section']);
    Route::get('/section/{id}', [APIBookController::class, 'content']);
});
