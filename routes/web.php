<?php
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ExperienceController;
use App\Http\Controllers\Dashboard\ConfigController;
use App\Http\Controllers\Dashboard\EditFormController;
use App\Http\Controllers\Dashboard\FormDataController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',function(){
    return view('index');
});

Route::get('/configuracion',[ConfigController::class, 'index']);

Route::get('/registro',[ReservationController::class, 'create']);
Route::get('/registroReservasHoy',[ReservationController::class, 'getReservationsToday']);
Route::get('/registroReservasPasadas',[ReservationController::class, 'getPastReservations']);
Route::get('/registroReservasFuturas',[ReservationController::class, 'getFutureReservations']);
Route::get('/buscar', [ReservationController::class, 'search']);
Route::get('/buscarBorrar', [ReservationController::class, 'searchDelete']);
Route::delete('/deleteRegister/{id}', [ReservationController::class, 'destroy']);

Route::get('/NuevaExperiencia',function(){
    return view('experiences.newExp');
});
Route::post('/StoreExperience', [ExperienceController::class, 'storeExperience']);

Route::get('/EditarFormulario/{id}',[EditFormController::class,'show']);

Route::get('/TextosLegales/{id}',[EditFormController::class,'legalTexts']);
Route::post('/StoreLegalTextForm',[EditFormController::class,'storeLegalText']);
Route::put('/putLegalTextForm/{id}',[EditFormController::class,'putLegalText']);

Route::get('/Campos/{id}',[EditFormController::class,'fields']);


Route::get('/experiences/{id}', [ExperienceController::class, 'show']);

Route::put('/form-data/{id}',[FormDataController::class, 'create']);

Route::get('/NuevaReserva',[ReservationController::class,'getExperiences']);
Route::post('/AgregarReserva',[ReservationController::class,'store']);

// Route::get('/experiences/{name}', function(){
//     return view('experiences/show');
// });

// Route::resource('user', UserController::class);
// Route::resource('experience', ExperienceController::class);
