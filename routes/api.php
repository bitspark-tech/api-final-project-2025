<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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


//======================================SMS API Routes========================================
Route::prefix('v1')->group(function () {

    //public authentication routes
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    //protected general routes
    Route::middleware('auth:sanctum')->group(function () {
        //authenticated user routes
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('users/me', [AuthController::class, 'me']);
    });

    // Student routes - student views/updates own profile
    Route::middleware(['auth:sanctum', 'role:student'])->group(function () {
        Route::get('students/profile', [StudentController::class, 'show']);
        Route::post('students/profile', [StudentController::class, 'update']);
    });

    // Admin routes - admin manages any student profile by ID
    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::get('admin/students/{id}/profile', [StudentController::class, 'show']);
        Route::post('admin/students/{id}/profile', [StudentController::class, 'update']);
    });


    // Teacher routes - teacher views/updates own profile
    Route::middleware(['auth:sanctum', 'role:teacher'])->group(function () {
        Route::get('teachers/profile', [TeacherController::class, 'show']);
        Route::post('teachers/profile', [TeacherController::class, 'update']);
    });

    // Admin routes - admin manages any teacher profile by ID
    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::get('admin/teachers/{id}/profile', [TeacherController::class, 'show']);
        Route::post('admin/teachers/{id}/profile', [TeacherController::class, 'update']);
        Route::delete('admin/teachers/{id}/profile', [TeacherController::class, 'destroy']);
    });


    //student profile completion middleware
    Route::middleware(['auth:sanctum', 'role:student', 'is_completed'])->group(function () {
        Route::get('teachers/index', [TeacherController::class, 'index']);
    });
});

