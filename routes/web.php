<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController; // Ensure this controller exists in the specified namespace
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;



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
});

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







require __DIR__.'/auth.php';
