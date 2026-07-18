<?php

use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', 'guest');

Route::view('/report-policy', 'static.report-policy')->name('reportPolicy');
Route::get('/health', HealthCheckController::class)->name('health');

Route::get('/author-guidelines', function () {
    $guidelines = file_get_contents(base_path('Author Status Rules & Regulations.md'));

    return view('static.author-guidelines', compact('guidelines'));
})->name('authorGuidelines');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/admin.php';
