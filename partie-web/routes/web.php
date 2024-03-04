<?php

use App\Http\Controllers\AbsenceController;
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

//Route::get('/', function () {
//    return view('admin.dashboard');
//})->name("admin.index");
Route::view("/","login")->name("showLogin");
Route::get("/dashboard",[\App\Http\Controllers\EtudiantController::class,"dashboard"])->name("admin.index");


Route::resource("modules" , \App\Http\Controllers\ModuleController::class);
Route::resource("filieres" , \App\Http\Controllers\FiliereController::class);
Route::resource("seances" , \App\Http\Controllers\SeanceController::class)->except("show");
Route::post("/emplois/chercher",[\App\Http\Controllers\EmploiDuTempsController::class,"chercher"])->name("emplois.chercher");

Route::resource("emplois" , \App\Http\Controllers\EmploiDuTempsController::class);
Route::resource("salles" , \App\Http\Controllers\SalleController::class);
Route::resource("departements" , \App\Http\Controllers\DepartementController::class);
Route::resource("elements" , \App\Http\Controllers\ElementController::class);
Route::resource("professeurs" , \App\Http\Controllers\ProfesseurController::class);
Route::post("/professeurs/search", [\App\Http\Controllers\ProfesseurController::class, "search"])->name("professeurs.search");
Route::resource("etudiants" , \App\Http\Controllers\EtudiantController::class);
Route::post("/etudiants/search", [\App\Http\Controllers\EtudiantController::class, "search"])->name("etudiants.search");




Route::resource("semestres" , \App\Http\Controllers\SemestreController::class);
Route::resource("periodes" , \App\Http\Controllers\PeriodeController::class);
Route::resource("absences" , \App\Http\Controllers\AbsenceController::class);




Route::post("/absences/chercher",[\App\Http\Controllers\AbsenceController::class,"chercher"])->name("absences.chercher");
Route::post("/chercherEtdsParFiliere",[\App\Http\Controllers\EtudiantController::class,"chercherEtdsParFiliere"])->name("etudiants.chercherEtdsParFiliere");
Route::post("/codeQrParSeance",[\App\Http\Controllers\EtudiantController::class,"codeQrParSeance"])->name("etudiants.codeQrParSeance");
Route::post('/absences/search-by-student', [\App\Http\Controllers\AbsenceController::class, 'searchByStudent'])->name('absences.searchByStudent');
Route::get('/professeur/', [\App\Http\Controllers\AbsenceController::class, 'test'])->name("indexProf");

Route::post("/login",[\App\Http\Controllers\AuthController::class,"login"])->name("login");
Route::get("/logout",[\App\Http\Controllers\AuthController::class,"logout"])->name("logout");

