<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GradeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//====================================== SMS API Routes ========================================
Route::prefix('v1')->group(function () {

    // ---------------- Public Authentication Routes ----------------
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    // ---------------- Protected General Routes ----------------
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('users/me', [AuthController::class, 'me']);
    });

    // ---------------- Student Profile Routes ----------------
    Route::middleware(['auth:sanctum', 'role:student'])->group(function () {
        Route::get('students/profile', [StudentController::class, 'show']);
        Route::post('students/profile', [StudentController::class, 'update']);
    });
    // --------------Admin-only routes to manage student profiles-----------------
    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::get('admin/students/{id}/profile', [StudentController::class, 'show']);
        Route::post('admin/students/{id}/profile', [StudentController::class, 'update']);
    });

    // ---------------- Teacher Profile Routes ----------------
    Route::middleware(['auth:sanctum', 'role:teacher'])->group(function () {
        Route::get('teachers/profile', [TeacherController::class, 'show']);
        Route::post('teachers/profile', [TeacherController::class, 'update']);
    });
    //----------------Admin-only routes to manage teacher profiles-------------
    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::get('admin/teachers/{id}/profile', [TeacherController::class, 'show']);
        Route::post('admin/teachers/{id}/profile', [TeacherController::class, 'update']);
        Route::delete('admin/teachers/{id}/profile', [TeacherController::class, 'destroy']);
    });

    // ---------------- Student-only (completed profile) Routes ----------------
    Route::middleware(['auth:sanctum', 'role:student', 'is_completed'])->group(function () {
        Route::get('teachers/index', [TeacherController::class, 'index']);
    });

    // ================================== Courses & Enrollment (Team B) ==================================
    Route::middleware(['auth:sanctum'])->group(function () {

        // --- Course CRUD (Admin only) ---
        Route::middleware('role:admin')->group(function () {
            
        });

        // --- Enrollment (Students + Views) ---
        Route::middleware('role:student')->group(function () {
            
        });
        // ---------teacher or admin enrollment routes -----------
        Route::middleware(['role:teacher,admin'])->group(function () {
            
        });
    });


    // ================================== Feedback Module (Team A) ==================================

    Route::middleware(['auth:sanctum'])->group(function () {
        // ---------------Student feedback routes------------------
        Route::middleware('role:student')->group(function () {
            
    });

        // ------------------Admin feedback routes------------------------
        Route::middleware('role:admin')->group(function () {
            
        });

        // ----------------Teacher feedback routes-----------------------
        Route::middleware('role:teacher')->group(function () {
            
        });
    });

    // ================================== Grades Module (Team C) ==================================
    Route::middleware(['auth:sanctum'])->group(function () {
        // -----------Teacher grade routes---------
        Route::middleware('role:teacher')->group(function () {
            
        });

        // ----------Student grade routes------------
        Route::middleware('role:student')->group(function () {
            
        });

        // ------------Admin grade routes---------------
        Route::middleware('role:admin')->group(function () {
            
        });
    });
});
