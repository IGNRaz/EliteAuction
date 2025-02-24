<?php
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logs', [AdminController::class, 'logs'])->name('admin.logs');
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::get('/ban/{user}', [AdminController::class, 'ban'])->name('admin.users.ban.form')->where('user', '[0-9]+');
    Route::post('/ban/{user}', [AdminController::class, 'banUser'])->name('admin.users.ban')->where('user', '[0-9]+');
    Route::post('/unban/{user}', [AdminController::class, 'unbanUser'])->name('admin.users.unban')->where('user', '[0-9]+');
    Route::get('/admin/auctions', [AdminController::class, 'auction'])->name('admin.auctions');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/myAuctions', [AuctionController::class, 'myAuctions'])->name('myAcutions');
    Route::get('/auction/{auction}', [AuctionController::class, 'viewAuctionDetails'])->name('viewAuctionDetails')->where('auction', '[0-9]+');
    Route::get('/auction/{auction}/edit', [AuctionController::class, 'edit'])->name('editAuction')->where('auction', '[0-9]+');
    Route::put('/auction/{auction}/update', [AuctionController::class, 'update'])->name('updateAuction')->where('auction', '[0-9]+');
});
require __DIR__.'/auth.php';
