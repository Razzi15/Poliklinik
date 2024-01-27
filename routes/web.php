<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/RegisterPasien', function () {
//     return view('RegisterPasien');
// });

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/loginpasien', [PasienController::class, 'loginPasien']);
Route::get('/daftarpoli', [PasienController::class, 'daftarpoli']);
Route::post('/register', [PasienController::class, 'register'])->name('register');
Route::post('/daftarpolipasien', [PasienController::class, 'daftarpolipasien'])->name('daftarpolipasien');
