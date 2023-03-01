<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\GuzzleCountryController;


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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/countries', [GuzzleCountryController::class, 'getAllCountries'])->name('Countries');
// youtube 
Route::post('/youtubeVideos', [YoutubeController::class, 'getYoutubeVideinfo'])->name('YtVideoInfo');
Route::get('/youtubeIndex', [YoutubeController::class, 'index'])->name('YtIndex');
