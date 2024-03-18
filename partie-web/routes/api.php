<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SeanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::resource("classrooms" , \App\Http\Controllers\ClassRoomController::class);
Route::post('/absences', [\App\Http\Controllers\AbsenceController::class, 'ajouterAbsence'])->middleware('auth:sanctum');

Route::post("/recordQRCodeScan",[\App\Http\Controllers\EtudiantController::class,"recordQRCodeScan"]);


Route::post('/commentaires', [\App\Http\Controllers\CommentaireController::class, 'ajouterCommentaire'])->middleware('auth:sanctum');
Route::put('/commentaires/{commentaire}', [\App\Http\Controllers\CommentaireController::class, 'modifierCommentaire'])->middleware('auth:sanctum');
Route::delete('/commentaires/{commentaire}', [\App\Http\Controllers\CommentaireController::class, 'supprimerCommentaire'])->middleware('auth:sanctum');

Route::get('/etudiant/{student_id}/classrooms', [\App\Http\Controllers\ClassRoomControllerApi::class, 'getClassroomsForCurrentSemester']);

Route::apiResource("justifications",\App\Http\Controllers\JustificationController::class)->middleware('auth:sanctum');

Route::get('/etudiant/{student_id}/absences', [AbsenceController::class, 'getAbsencesByStudent'])->middleware('auth:sanctum');

Route::get('/seances/{idEtudiant}', [SeanceController::class, 'getSeancesByDate'])->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'loginEtd']);

// Logout route
Route::post('/logout', [AuthController::class, 'logoutEtd'])->middleware('auth:sanctum');

// Token creation route
Route::get('/token', [AuthController::class, 'createToken'])->middleware('auth:sanctum');
