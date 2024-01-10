<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CompetitionController;
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

Route::post('create_user', [UserController::class, 'createUser']);
Route::post('login', [AuthenticationController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(
    function(){
        //User Routing
        Route::get('all_user', [UserController::class, 'getAllUser']);
        Route::get('check_password', [UserController::class, 'checkPassword']);
        Route::get('get_user', [UserController::class, 'getUser']);
        Route::delete('logout', [AuthenticationController::class, 'logout']);
        Route::patch('update_user', [UserController::class, 'updateUser']);
        Route::delete('delete_user', [UserController::class, 'deleteUser']);

        //Court Routing
        Route::get('court',[CourtController::class,'showCourts']);
        Route::get('court/{id}', [CourtController::class, 'courtById']);
        Route::post('court',[CourtController::class, 'createCourt']);
        Route::patch('court', [CourtController::class,'updateCourt']);
        Route::delete('court',[CourtController::class, 'deleteCourt']);

        //Review Routing
        Route::get('review',[ReviewController::class,'showCourtReview']);
        Route::post('review',[ReviewController::class, 'createReview']);
        Route::delete('review',[ReviewController::class, 'deleteReview']);

        //Schedule Routing
        Route::get('user_schedule', [ScheduleController::class,'showUserSchedule']);
        Route::get('court_schedule', [ScheduleController::class,'showCourtSchedule']);
        Route::post('schedule', [ScheduleController::class,'createSchedule']);
        Route::post('add_player', [ScheduleController::class,'addPlayer']);

        //Competition Routing
        Route::get('competition', [CompetitionController::class, 'showCompetition']);
    }
);
