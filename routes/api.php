<?php

use App\Http\Controllers\Api\Blog\BlogCategoriesController;
use App\Http\Controllers\Api\School\SchoolCoursesController;
use App\Http\Controllers\Api\School\SchoolSectionsController;
use App\Http\Controllers\Api\School\SchoolLessonsController;
use App\Http\Controllers\Api\School\SchoolHomeworkController;
use App\Http\Controllers\Api\Profile\ProfilePurchasesController;
use App\Http\Controllers\Api\PagesController;
use App\Http\Controllers\Api\AvatarsController;
use App\Http\Controllers\Api\ImagesController;
use App\Http\Controllers\Api\MarksController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\CommentsController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', [\App\Http\Controllers\Api\TestController::class, 'index']);

Route::middleware('auth:api')->prefix('user')->group(function () {
    Route::get('/', [ProfileController::class, 'show']);
    Route::put('/', [ProfileController::class, 'update']);
    Route::delete('/', [ProfileController::class, 'destroy']);
});

Route::get('pages', [PagesController::class, 'index']);
Route::get('marks', [MarksController::class, 'index']);
Route::get('images', [ImagesController::class, 'index']);
Route::get('comments', [CommentsController::class, 'index']);

Route::middleware('auth:api')->group(function () {
    Route::prefix('pages')->group(function () {
        Route::post('/', [PagesController::class, 'store']);
        Route::get('/{id}', [PagesController::class, 'show']);
        Route::put('/{id}', [PagesController::class, 'update']);
        Route::delete('/{id}', [PagesController::class, 'destroy']);
    });
    Route::prefix('marks')->group(function () {
        Route::post('/', [MarksController::class, 'store']);
        Route::get('/{id}', [MarksController::class, 'show']);
        Route::put('/{id}', [MarksController::class, 'update']);
        Route::delete('/{id}', [MarksController::class, 'destroy']);
    });
    Route::prefix('images')->group(function () {
        Route::post('/', [ImagesController::class, 'store']);
        Route::get('/{id}', [ImagesController::class, 'show']);
        Route::put('/{id}', [ImagesController::class, 'update']);
        Route::delete('/{id}', [ImagesController::class, 'destroy']);
    });
    Route::prefix('comments')->group(function () {
        Route::post('/', [CommentsController::class, 'store']);
        Route::get('/{id}', [CommentsController::class, 'show']);
        Route::put('/{id}', [CommentsController::class, 'update']);
        Route::delete('/{id}', [CommentsController::class, 'destroy']);
    });
});

Route::prefix('blog')->group(function () {
    //Route::resource('categories', BlogCategoriesController::class);
    Route::prefix('categories')->group(function () {
        Route::post('/', [BlogCategoriesController::class, 'store']);
        Route::get('/{id}', [BlogCategoriesController::class, 'show']);
        Route::put('/{id}', [BlogCategoriesController::class, 'update']);
        Route::delete('/{id}', [BlogCategoriesController::class, 'destroy']);
    });
});

Route::prefix('profile')
    ->middleware('auth:api')
    ->group(function () {
    Route::get('purchases', [ProfilePurchasesController::class, 'index']);
    Route::post('purchases', [ProfilePurchasesController::class, 'store']);
});

Route::prefix('school')->group(function () {
    //Route::resource('courses', SchoolCoursesController::class);
    Route::get('courses', [SchoolCoursesController::class, 'index']);
    Route::middleware('auth:api')->prefix('courses')->group(function () {
        Route::post('/', [SchoolCoursesController::class, 'store']);
        Route::get('/{id}', [SchoolCoursesController::class, 'show']);
        Route::put('/{id}', [SchoolCoursesController::class, 'update']);
        Route::delete('/{id}', [SchoolCoursesController::class, 'destroy']);
    });

    Route::middleware('auth:api')->group(function () {
        Route::prefix('sections')->group(function () {
            Route::get('/', [SchoolSectionsController::class, 'index']);
            Route::post('/', [SchoolSectionsController::class, 'store']);
            Route::get('/{id}', [SchoolSectionsController::class, 'show']);
            Route::put('/{id}', [SchoolSectionsController::class, 'update']);
            Route::delete('/{id}', [SchoolSectionsController::class, 'destroy']);
        });
        Route::prefix('lessons')->group(function () {
            Route::get('/', [SchoolLessonsController::class, 'index']);
            Route::post('/', [SchoolLessonsController::class, 'store']);
            Route::get('/{id}', [SchoolLessonsController::class, 'show']);
            Route::put('/{id}', [SchoolLessonsController::class, 'update']);
            Route::delete('/{id}', [SchoolLessonsController::class, 'destroy']);
        });
        Route::prefix('homework')->group(function () {
            Route::get('/', [SchoolHomeworkController::class, 'index']);
            Route::post('/', [SchoolHomeworkController::class, 'store']);
            Route::get('/{id}', [SchoolHomeworkController::class, 'show']);
            Route::put('/{id}', [SchoolHomeworkController::class, 'update']);
            Route::delete('/{id}', [SchoolHomeworkController::class, 'destroy']);
        });
        /*
        Route::resource('courses/{course_id}/sections', SchoolSectionsController::class)->except('edit', 'create');
        Route::resource('courses/{course_id}/sections/{section_id}/lessons', SchoolLessonsController::class)->except('edit', 'create');
        Route::resource('courses/{course_id}/sections/{section_id}/lessons/{lesson_id}/homework', SchoolHomeworkController::class)->except('edit', 'create');
    */
    });
});
