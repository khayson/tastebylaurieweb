<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuDownloadController;
use App\Http\Controllers\Admin\PastEventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/services/{service}', function ($service) {
    if (!in_array($service, ['weddings', 'corporate', 'private'])) {
        abort(404);
    }
    return view('pages.service-detail', ['service' => $service]);
})->name('service.detail');

Route::get('/download-menu/{format}', [MenuDownloadController::class, 'download']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('past-events', PastEventController::class);
    });
});

Route::get('/events/{pastEvent}', [LandingController::class, 'show'])->name('events.show');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('testimonials', TestimonialController::class);
});

require __DIR__.'/auth.php';
