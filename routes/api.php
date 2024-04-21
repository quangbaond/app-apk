<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::post('upload', [ApiController::class, 'upload']);
Route::get('get-one-file-random-apk', [ApiController::class, 'getOneFileRandomApk']);
Route::post('delete-file-by-url', [ApiController::class, 'deleteFileByUrl']);
Route::get('count-files-in-folder', [ApiController::class, 'countFilesInFolder']);
Route::post('download', [ApiController::class, 'getOneFileRandomApk']);
