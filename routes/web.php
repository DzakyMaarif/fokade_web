<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DetailDivisiController;
use App\Http\Controllers\DetailSchoolController;
use App\Http\Controllers\DetailProgramsController;
use App\Http\Controllers\DetailNewsController;

/*
|--------------------------------------------------------------------------
| Public Routes (tanpa autentikasi)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/divisi', [DetailDivisiController::class, 'index'])
     ->name('detail_divisi.index');
Route::get('/divisi/{division}/members', [DetailDivisiController::class, 'members'])
     ->name('detail_divisi.members');

Route::get('/detail-school', [DetailSchoolController::class, 'index'])
     ->name('detail_school.index');
Route::get('/detail-school/{school}', [DetailSchoolController::class, 'delegates'])
     ->name('detail_school.delegates');

Route::get('/detail-programs', [DetailProgramsController::class, 'index'])
     ->name('detail_programs.index');

Route::get('/detail-news', [DetailNewsController::class, 'index'])
     ->name('detail_news.index');
Route::get('/detail-news/{news}', [DetailNewsController::class, 'show'])
     ->name('detail_news.show');

/*
|--------------------------------------------------------------------------
| Authentication (login/logout), tanpa registrasi public
|--------------------------------------------------------------------------
*/
Auth::routes(['register' => false]);

/*
|--------------------------------------------------------------------------
| Admin‑only Routes (harus login + role:Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:Admin'])->group(function () {
     Route::resource('organizations', OrganizationController::class);
     Route::resource('divisions',     DivisionController::class);
     Route::resource('schools',       SchoolController::class);
     Route::resource('batches',       BatchController::class);
     Route::resource('members',       MemberController::class);
     Route::resource('programs',      ProgramController::class);
     Route::resource('news',          NewsController::class);
     Route::get('/dashboard-admin-ganteng', function () {
          return view('welcome');
     })->name('dashboard');
});
