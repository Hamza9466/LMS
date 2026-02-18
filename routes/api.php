<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\AllUsersController;
use App\Http\Controllers\Api\LessonViewController;
use App\Http\Controllers\Api\QuizResultController;
use App\Http\Controllers\Api\QuizAttemptController;
use App\Http\Controllers\Api\SectionViewController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\CourseReviewController;
use App\Http\Controllers\Api\CourseCategoryController;
use App\Http\Controllers\Api\EnrolledCourseController;
use App\Http\Controllers\Api\PurchaseHistoryController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// all users
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [AllUsersController::class, 'index']);   // Get all users
    Route::get('/users/{id}', [AllUsersController::class, 'show']); // Get user by ID
    Route::put('/users/{id}', [AllUsersController::class, 'update']); // Update user
    Route::delete('/users/{id}', [AllUsersController::class, 'destroy']); // Delete user
});

// course categories
Route::get('/course-categories', [CourseCategoryController::class, 'index']);
Route::get('/course-categories/{id}', [CourseCategoryController::class, 'show']);
Route::post('/course-categories', [CourseCategoryController::class, 'store']);
Route::put('/course-categories/{id}', [CourseCategoryController::class, 'update']);
Route::delete('/course-categories/{id}', [CourseCategoryController::class, 'destroy']);

// profile   
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
});

// enrolled courses
Route::middleware('auth:sanctum')->get('/enrolled-courses', [EnrolledCourseController::class, 'index']);
Route::middleware('auth:sanctum')->get('/sections/{section}', [SectionViewController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/lessons/{lesson}', [LessonViewController::class, 'show']); // View lesson
    Route::post('/lessons/{lesson}/progress', [LessonViewController::class, 'progress']); // Save progress
    Route::post('/lessons/{lesson}/complete', [LessonViewController::class, 'complete']); // Mark complete
    Route::get('/lessons/{lesson}/download', [LessonViewController::class, 'download']); // Download PDF
});

// coures reviews
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/courses/{course}/reviews', [CourseReviewController::class, 'index']); // list approved reviews
    Route::post('/courses/{course}/reviews', [CourseReviewController::class, 'store']); // add review
    Route::get('/my-reviews', [CourseReviewController::class, 'my']); // my reviews

    // admin-only
    Route::put('/reviews/{id}', [CourseReviewController::class, 'update']);
    Route::delete('/reviews/{id}', [CourseReviewController::class, 'destroy']);
});

// purchase histroy
Route::middleware('auth:sanctum')->get('/purchase-history', [PurchaseHistoryController::class, 'index']);

// announcements
Route::middleware('auth:sanctum')->get('/announcements', [AnnouncementController::class, 'index']);

// quiz attempts
Route::middleware('auth:sanctum')->get('/quiz-attempts', [QuizAttemptController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/quiz-attempts/{attempt}', [QuizResultController::class, 'show']);
});