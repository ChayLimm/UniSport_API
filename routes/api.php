<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\CheckpointController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Crud participants
Route::resource('participant',ParticipantController::class);

//Crud race
Route::resource('race',RaceController::class);

Route::post('race/{id}/startRace', [RaceController::class,'startRace']);
Route::post('race/{id}/endRace', [RaceController::class,'endRace']);
Route::post('race/{id}/participant', [RaceController::class,'showParticipant']);
Route::post('race/{id}/segments', [RaceController::class,'getSegmentByRaceID']);
Route::post('race/{id}/segments-finish', [RaceController::class,'markSegmentFinish']);
Route::get('race/{id}',[RaceController::class,'getRaceByID']);

Route::get('/checkpoint/{id}/segment', [CheckpointController::class, 'getCheckpointBySegmentID']);
Route::post('/checkpoint', [CheckpointController::class, 'createCheckpoint']);
Route::get('/checkpoint', [CheckpointController::class, 'getCheckpoint']);


Route::post('createparticipant',[ParticipantController::class,'create'] );
Route::post('updateparticipant',[ParticipantController::class,'update'] );
Route::post('deleteparticipant',[ParticipantController::class,'delete'] );



