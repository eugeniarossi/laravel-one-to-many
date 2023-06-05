<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// eliminata funzione anonima - view welcome gestita dal controller

//Route::get('/dashboard', function () {
  //  return view('admin.dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])
  ->name('admin.') // aggiunge un prefisso al nome della rotta = dashboard -> admin.dashboard
  ->prefix('admin')  // aggiunge un prefisso all'uri della rotta = / -> /admin/
  ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // se sposto fuori da auth, vedo la dashboard anche da non loggato

        Route::resource('projects', ProjectController::class)->parameters(['projects'=>'project:slug']); // default prende come parametro id, quindi specifico slug
});

require __DIR__.'/auth.php';
