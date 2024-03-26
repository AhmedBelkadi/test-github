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
//Route::get('/sse', 'SSEController@stream');
    Route::get("/stream",[\App\Http\Controllers\SSEController::class,"stream"]);

//Route::get('/', function () {
//    return view('admin.dashboard');
//})->name("admin.index");
Route::resource("classrooms" , \App\Http\Controllers\ClassRoomController::class);
Route::resource("commentaires" , \App\Http\Controllers\CommentaireController::class);
Route::resource("posts" , \App\Http\Controllers\PostController::class);
Route::resource("documents" , \App\Http\Controllers\DocumentController::class);
Route::view("/login","login")->name("showLogin");
Route::view("/","master")->name("master");
Route::get("/dashboard",[\App\Http\Controllers\EtudiantController::class,"dashboard"])->name("admin.index");


Route::resource("modules" , \App\Http\Controllers\ModuleController::class);
Route::resource("filieres" , \App\Http\Controllers\FiliereController::class);
Route::resource("seances" , \App\Http\Controllers\SeanceController::class)->except("show");
Route::post("/emplois/chercher",[\App\Http\Controllers\EmploiDuTempsController::class,"chercher"])->name("emplois.chercher");

Route::resource("emplois" , \App\Http\Controllers\EmploiDuTempsController::class);
Route::resource("salles" , \App\Http\Controllers\SalleController::class);
Route::resource("departements" , \App\Http\Controllers\DepartementController::class);
Route::resource("elements" , \App\Http\Controllers\ElementController::class);
Route::get("/professeurs/exporter",[\App\Http\Controllers\ProfesseurController::class,"exporter"])->name("professeurs.exporter");


Route::get("/absences/exporteAdmin",[\App\Http\Controllers\AbsenceController::class,"exporterAdmin"])->name("absences.exporter.admin");
Route::get("/absences/exporterProfesseur",[\App\Http\Controllers\AbsenceController::class,"exporterProfesseur"])->name("absences.exporter.professeur");

Route::get("/absences/exportePdf",[\App\Http\Controllers\AbsenceController::class,"exporterPdf"])->name("absences.exporter.pdf");
Route::get("/etudiants/exportePdf",[\App\Http\Controllers\EtudiantController::class,"exporterPdf"])->name("etudiants.exporter.pdf");
Route::get("/professeurs/exportePdf",[\App\Http\Controllers\ProfesseurController::class,"exporterPdf"])->name("professeurs.exporter.pdf");
//Route::get("/absences/exporterProfesseurPdf",[\App\Http\Controllers\AbsenceController::class,"exporterProfesseurPdf"])->name("absences.exporter.professeur.pdf");


Route::resource("professeurs" , \App\Http\Controllers\ProfesseurController::class);
Route::post("/professeurs/search", [\App\Http\Controllers\ProfesseurController::class, "search"])->name("professeurs.search");
Route::get("/etudiants/exporter",[\App\Http\Controllers\EtudiantController::class,"exporter"])->name("etudiants.exporter");
Route::resource("etudiants" , \App\Http\Controllers\EtudiantController::class);
//Route::post("/etudiants/importer",[\App\Http\Controllers\EtudiantController::class,"importer"])->name("etudiants.importer");
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

Route::post('/mark-absences', [AbsenceController::class, 'markAbsences'])->name('mark.absences');
