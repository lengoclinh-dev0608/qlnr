<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SickController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\SeedController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function () {
    Route::get('/', [testController::class, 'test']);
    Route::get('/list-snacks', [SnackController::class, 'getSnacks']);
    Route::get('/add-snack', [testController::class, 'addSnack']);
    Route::get('/list-medicines', [MedicineController::class, 'getMedicines']);
    Route::get('/list-sicks', [SickController::class, 'getSicks']);
    Route::get('/list-seeds', [SeedController::class, 'getSeeds']);
    Route::get('/import-foods', [SeedController::class, 'getSeeds']);
    Route::get('/import-tools', [SeedController::class, 'getSeeds']);
    Route::get('/import-medicines', [SeedController::class, 'getSeeds']);
});


Route::get('/tests', [ToolController::class, 'index']);
