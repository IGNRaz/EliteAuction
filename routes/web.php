<?php
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\MyWalletController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersDocController;
use App\Http\Controllers\WalletController;
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
    //تحقق من الهوية
    Route::get('/admin/activewallet', [AdminController::class, 'activewallet'])->name('active.wallet');
    Route::post('/admin/activewallet/sorte/{id}', [AdminController::class, 'activewallet_sorte'])->name('active.wallet.sorte');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/myAuctions', [AuctionController::class, 'myAuctions'])->name('myAcutions');
    Route::get('/auction/{auction}', [AuctionController::class, 'viewAuctionDetails'])->name('viewAuctionDetails')->where('auction', '[0-9]+');
    Route::get('/auction/{auction}/edit', [AuctionController::class, 'edit'])->name('editAuction')->where('auction', '[0-9]+');
    Route::put('/auction/{auction}/update', [AuctionController::class, 'update'])->name('updateAuction')->where('auction', '[0-9]+');
    // Route::delete();

    // Route::get('/MyWallet', [UsersDocController::class,"index"])->name("MyWallet");
    Route::get('/MyWallet/add', [UsersDocController::class,"add"])->name("MyWallet.add");
    Route::post('/MyWallet/add', [UsersDocController::class,"store"])->name("MyWallet.store");
});

//فورم المزاد
Route::get('/auction/create', [AuctionController::class, 'create'])->name('auction.create');
Route::post('/auction/store', [AuctionController::class, 'store'])->name('auction.store');
Route::get('/auction/index', [AuctionController::class, 'index'])->name('auction.index');
//عرض مزادات حسب الفئة
Route::get('/auctions/filter', [AuctionController::class, 'filterByCategory'])->name('filterAuctionsByCategory');
//اضافة مزايدة
Route::post('/auctions/{auction}/bid', [AuctionController::class, 'bid'])->name('auctions.bid')->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/wallet', [WalletController::class, 'show'])->name('wallet.show');
    Route::post('/wallet/deposit', [WalletController::class, 'deposit'])->name('wallet.deposit');
    Route::post('/wallet/withdraw', [WalletController::class, 'withdraw'])->name('wallet.withdraw');
});

require __DIR__.'/auth.php';
