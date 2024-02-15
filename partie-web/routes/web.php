<?php

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
    return view('admin.dashboard');
});

Route::resource("modules" , \App\Http\Controllers\ModuleController::class);
Route::resource("filieres" , \App\Http\Controllers\FiliereController::class)->except(["show","create","edit"]);
Route::resource("emplois" , \App\Http\Controllers\EmploiDuTempsController::class)->except(["show","create","edit"]);
Route::resource("salles" , \App\Http\Controllers\SalleController::class)->except(["show","create"]);
Route::resource("departements" , \App\Http\Controllers\DepartementController::class);
Route::resource("elements" , \App\Http\Controllers\ElementController::class);
Route::resource("professeurs" , \App\Http\Controllers\ProfesseurController::class);
Route::resource("etudiants" , \App\Http\Controllers\EtudiantController::class);


Route::resource("seances" , \App\Http\Controllers\SeanceController::class)->except(["show","create","edit"]);
Route::resource("semestres" , \App\Http\Controllers\SemestreController::class)->except(["show","create","edit"]);
Route::resource("periodes" , \App\Http\Controllers\PeriodeController::class)->except(["show","create","edit"]);
Route::resource("absences" , \App\Http\Controllers\AbsenceController::class)->except(["show","create","edit"]);




