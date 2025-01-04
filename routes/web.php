<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController; // Ensure this controller exists in the specified namespace

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');// Use this one for the welcome page
Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/contact', 'contact-us')->name('contact-us');
Route::view('/newsletters', 'welcome')->name('newsletters'); // New route for newsletters page



Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'showForm'])->name('contact.form');
    Route::post('/', [ContactController::class, 'store'])->name('contact.store');


});

Route::middleware('auth')->group(function () {
    Route::get('/admin/contact-messages', [ContactController::class, 'showMessages'])->name('contact.messages');
    Route::post('/admin/contact-messages/{message}/respond', [ContactController::class, 'respond'])->name('contact.respond');
    Route::post('/admin/contact-messages/clear-backlog', [ContactController::class, 'clearBacklog'])->name('contact.clearBacklog');

});
Route::get('/newsletters/create', [WelcomeController::class, 'create'])->name('newsletters.create');
Route::get('/newsletters/{newsletter}', [WelcomeController::class, 'show'])->name('newsletters.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/newsletters/create', [WelcomeController::class, 'create'])->name('newsletters.create');
    Route::post('/newsletters', [WelcomeController::class, 'store'])->name('newsletters.store');
    Route::get('/newsletters/{id}/edit', [WelcomeController::class, 'edit'])->name('newsletters.edit');
    Route::put('/newsletters/{id}', [WelcomeController::class, 'update'])->name('newsletters.update');
    Route::delete('/newsletters/{id}', [WelcomeController::class, 'destroy'])->name('newsletters.destroy');
    Route::post('/newsletters/{newsletter}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    
   
});

Route::get('/qa', [QAController::class, 'index'])->name('qa.user');
Route::post('/qa', [QAController::class, 'store'])->name('qa.store');


Route::middleware(['auth'])->group(function () {
    
    Route::get('/qa/admin', [CategoryController::class, 'manage'])->name('qa.admin');
    Route::post('/qa/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/qa/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/qa/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/qa/admin', [QAController::class, 'showAdmin'])->name('qa.admin');
    Route::delete('/qa/admin/questions/{question}', [QAController::class, 'destroy'])->name('qa.destroy');
    Route::put('/qa/admin/questions/{question}/respond', [QAController::class, 'respond'])->name('qa.respond');
    Route::put('/qa/{question}/update-answer', [QAController::class, 'updateAnswer'])->name('qa.updateAnswer');
    Route::put('/update-question/{question}', [QAController::class, 'updateQuestion'])->name('qa.updateQuestion');

    
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user_management.index');
    Route::post('/user-management/create', [UserManagementController::class, 'store'])->name('user_management.store');
    Route::patch('/user-management/{user}/update-role', [UserManagementController::class, 'updateRole'])->name('user_management.update_role');
    Route::delete('/user-management/{user}', [UserManagementController::class, 'destroy'])->name('user_management.destroy');
});

// routes/web.php



Route::middleware(['auth'])->group(function () {
    // Route to view the profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Route to update the profile information
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Route for the dashboard (if it doesn't exist already)
});


Route::middleware(['auth'])->group(function () {
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});




Route::get('/profiles', [UserProfileController::class, 'index'])->name('user.profiles');
Route::get('/dashboard/{id}', [UserProfileController::class, 'dashboard'])->name('user.dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::delete('/posts/{post}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');




require __DIR__.'/auth.php';
