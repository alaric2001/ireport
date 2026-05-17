<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OurteamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\TerminalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('pp', function () {
    return view('user/profile_');
});

Route::get('about', function () {
    return view('about');
});

Route::get('/our_team', [OurteamController::class, 'OurteamUser']);

Auth::routes();

Route::get('/terminal', [TerminalController::class, 'terminal']);
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/{id}', [LaporanController::class, 'satudata']);
Route::get('/laporan_/{provinsi}', [LaporanController::class, 'showFilter']);
Route::get('/laporan/create', [ProvinsiController::class, 'provinsi']);
Route::get('/berita_user', [BeritaController::class, 'indexBeritaUser']);
Route::get('/laporanupvote/{id}', [LaporanController::class, 'upvote']);
Route::get('/laporandownvote/{id}', [LaporanController::class, 'downvote']);

// admin
Route::middleware(['role:1'])->group(function () {
    Route::get('/beritaAdmin', [BeritaController::class, 'indexBerita']);
    Route::get('/beritaAdmin_', [BeritaController::class, 'inputPage']);
    Route::post('/beritaAdmin', [BeritaController::class, 'inputData']);
    Route::get('/beritaAdmin/{id}/edit', [BeritaController::class, 'editPage']);
    Route::put('/beritaAdmin/{id}', [BeritaController::class, 'editData']);
    Route::delete('/beritaAdmin/{id}', [BeritaController::class, 'delete']);

    Route::get('/laporanAdmin', [LaporanController::class, 'indexAdmin']);

    Route::get('/ourteam', [OurteamController::class, 'indexOurteam']);
    Route::get('/ourteam_', [OurteamController::class, 'inputPage']);
    Route::post('/ourteam', [OurteamController::class, 'inputData']);
    Route::get('/ourteam/{id}/edit', [OurteamController::class, 'editPage']);
    Route::put('/ourteam/{id}', [OurteamController::class, 'editData']);
    Route::delete('/ourteam/{id}', [OurteamController::class, 'delete']);
});

// reporter
Route::middleware(['role:2'])->group(function () {
    Route::get('/createLaporan', [ProvinsiController::class, 'provinsi']);
    Route::post('/laporan', [LaporanController::class, 'inputData']);
    Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit']);
    Route::put('/laporan/{id}', [LaporanController::class, 'update']);
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy']);
    Route::get('/myreport', [LaporanController::class, 'indexmyreport']);
    Route::get('/laporanupvote/{id}', [LaporanController::class, 'upvote']);
    Route::get('/laporandownvote/{id}', [LaporanController::class, 'downvote']);
    Route::post('/laporan/{id}', [KomentarController::class, 'inputdata']);
    Route::delete('/laporan/{id}', [KomentarController::class, 'hapus']);
    Route::get('/editkomen/{id}', [KomentarController::class, 'editpage']);
    Route::put('/editdatakomen/{id}', [KomentarController::class, 'editdata']);
});

// profile routes
Route::get('/profile', [ProfileController::class, 'editpage']);
Route::get('/pengajuan', [ProfileController::class, 'indexadmin']);
Route::put('/profile/{id}', [ProfileController::class, 'update']);
Route::put('/pengajuan/{id}', [ProfileController::class, 'pengajuan']);
Route::put('/jadiadmin/{user_id}', [ProfileController::class, 'jadiadmin']);
Route::delete('/hapusakun/{user_id}', [ProfileController::class, 'delete']);
