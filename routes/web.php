<?php

use \App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DesignTemplatesController;
use App\Http\Controllers\ClientReviewController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FreeResourcesController;
use App\Http\Controllers\PortfolioController;
use \App\Http\Controllers\HireMeController;
use \App\Http\Controllers\AlertController;
use \App\Models\ClientReview;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'reviews' => ClientReview::all(),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/hire-me', [HireMeController::class, 'store'])->name('hireme.request');
    Route::get('/hire-me', [HireMeController::class, 'index'])->name('hireme.view');
    Route::patch('/request-reply/{request_id}', [HireMeController::class, 'update'])->name('hireme.reply');
    Route::patch('/request-status/{request_id}', [HireMeController::class, 'updateReadStatus'])->name('hireme.read');
    Route::get('/hire-me/reply/{request_id}', [HireMeController::class, 'replyHireMe']);
    Route::post('/addsubscriber', [RegisteredUserController::class, 'addSubscriber'])->name('addsubscriber');
    Route::get('/subscribers', [RegisteredUserController::class, 'viewSubscriber'])->name('view-subscriber');
    Route::delete('/delete-subscriber/{user_id}', [RegisteredUserController::class, 'destroy'])->name('delete-subscriber');
    Route::get('/users/create', [RegisteredUserController::class, 'adminCreateUser'])->name('admin-create-user');
    Route::get('/users/view', [RegisteredUserController::class, 'adminViewUser'])->name('admin-view-user');
    Route::post('/admin/add-user', [RegisteredUserController::class, 'adminAddUser'])->name('admin-add-user');
    Route::get('/reviews/create', [ClientReviewController::class, 'create'])->name('reviews-create');
    Route::post('/review/create', [ClientReviewController::class, 'store']);
    Route::get('/reviews/all', [ClientReviewController::class, 'index'])->name('review-view');
    Route::get('/portfolio/create/new', [PortfolioController::class, 'create'])->name('portfolio-create');
    Route::post('/portfolio/create/new', [PortfolioController::class, 'store'])->name('portfolio-store');
    Route::get('/portfolio/view', [PortfolioController::class, 'adminView'])->name('portfolio-view');
});

    Route::get('/design-templates', [DesignTemplatesController::class, 'index'])->name('desings-template.index');
    Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
    Route::get('/free-resources', [FreeResourcesController::class, 'index'])->name('free-courses.index');
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/{slug}', [PortfolioController::class, 'viewProject'])->name('portfolio.show');
    Route::get('/alert', [AlertController::class, 'returnAlert'])->name('alert');





require __DIR__.'/auth.php';
