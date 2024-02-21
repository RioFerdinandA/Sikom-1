<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;

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

// Route::get('/', function () {
//     return view('template_back.layout');
// });

//ROUTE LOGIN
Route::get('/',[LoginController::class, 'login'])->name('login'); // ROUTE LOGIN
Route::post('/auth', [LoginController::class, 'auth'])->name('auth'); // ROUTE UNTUK PROSES LOGIN
Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi'); // ROUTE REGISTRASI
Route::post('registrasi/auth', [LoginController::class, 'auth_regis'])->name('auth_regis'); // ROUTE PROSES REGISTRASI

//SETELAH LOGIN
Route::get('/logout',[LoginController::class, 'logout'])->name('logout'); // ROUTE LOGOUT


//ROUTE CRUD BUKU
Route::resource('buku', BukuController::class);

/*------------------------------ ROUTE EXPORT PDF ----------------------------*/
Route::get('/export_pdf_buku',[BukuController::class, 'export_pdf'])->name('export_pdf_buku'); // BUKU

 //-----------------------------ROUTE EXPORT EXCEL-----------------------------//
 Route::get('/export_excel_buku',[BukuController::class,'export_excel'])->name('export_excel_buku');

 //-----------------------------ROUTE IMPORT EXCEL-----------------------------//
 Route::post('/import_excel_buku',[BukuController::class,'import_excel'])->name('import_excel_buku');