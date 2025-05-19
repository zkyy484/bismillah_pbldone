<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Database\Events\TransactionRolledBack;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('customer.home');
// });

// Route::get('/kategori', [UserController::class, 'Kategori'])->name('customer.detail');

// View About
Route::get('/about_us', [UserController::class, 'showAbout'])->name('show.kategory');

// View Contact
Route::get('/contact', [UserController::class, 'showContact'])->name('show.contact');

Route::get('/', [UserController::class, 'index'])->name('index');


Route::get('/dashboard', function () {
    return view('customer.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Custom Activity Akun User
Route::middleware('auth')->group(function () {
    Route::post('/profile/store', [UserController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/change/password', [UserController::class, 'ChangePassword'])->name('change.password');
    Route::post('/user/passwrod/update', [UserController::class, 'PasswordUpdate'])->name('user.password.update');
    Route::get('/user/history/order', [UserController::class, 'HistoryOrder'])->name('user.history.order');

    // tampilan detail kategory
    Route::get('/kategori/{id}', [UserController::class, 'showCategory'])->name('kategori.detail');
    Route::get('/order/desain', [OrderController::class, 'CreateOrder'])->name('user.order');
    Route::post('/user/order/desain', [OrderController::class, 'StoreOrder'])->name('user.order.desain');

    // transaksi
    Route::get('/user/transaksi/{order}', [TransactionController::class, 'CreateTransaksi'])->name('user.transaksi');
    Route::post('/user/transaksi/done/{order}', [TransactionController::class, 'TransaksiStore'])->name('user.transaksi.desain');

    Route::get('/user/thanks/{id}', [TransactionController::class, 'Thanks'])->name('user.thanks');
});


require __DIR__ . '/auth.php';



// Middleware Akun Admin
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
});



// Custom Activity Akun Admin
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/login_submit', [AdminController::class, 'AdminLoginSubmit'])->name('admin.login_submit');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/admin/forget_password', [AdminController::class, 'AdminForgetPassword'])->name('admin.forget_password');
Route::post('/admin/password_submit', [AdminController::class, 'AdminPasswordSubmit'])->name('admin.password_submit');
Route::get('/admin/reset_password/{token}/{email}', [AdminController::class, 'AdminResetPassword']);
Route::post('/admin/reset_password_submit', [AdminController::class, 'AdminResetPasswordSubmit'])->name('admin.reset_password_submit');





// Middleware Data Master Admin
Route::middleware('admin')->group(function () {

    // All Admin Category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category', 'AllCategory')->name('all.category');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/add/category', 'StoreCategory')->name('category.store');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category', 'UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    // All Admin Image Category    
    Route::controller(CategoryImageController::class)->group(function () {
        Route::get('/all/cat_image', 'AllCatImage')->name('all.catimage');
        Route::get('/add/cat_image', 'AddCatImage')->name('add.catimage');
        Route::post('/add/cat_image', 'StoreCatImage')->name('catimage.store');
        Route::get('/edit/cat_image/{id}', 'EditCatImage')->name('edit.catimage');
        Route::post('/update/cat_image', 'UpdateCatImage')->name('update.catimage');
        Route::get('/delete/cat_image/{id}', 'DeleteCatImage')->name('delete.catimage');

    });

    // All Admin Orders
    Route::controller(OrderController::class)->group(function () {
        Route::get('/all/orders', 'AllOrder')->name('all.order');
        Route::get('/edit/orders/{order}', 'EditCatgery')->name('edit.order');
        Route::post('/update/orders/{order}', 'UpdateOrder')->name('update.order');
        Route::get('/delete/order/{id}', 'DeleteOrder')->name('delete.order');

    });

    // AllTransaksi
    Route::controller(TransactionController::class)->group(function() {
        Route::get('/admin/all/transaksi', 'AllTransaksi')->name('transaksi');
    });
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
//     Route::post('order', [OrderController::class, 'store'])->name('order.store');
// });

// Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
//     Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
//     Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');
//     Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
// });


// Route::middleware(['auth'])->group(function () {
//     // Form & simpan order
//     Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
//     Route::post('/order', [OrderController::class, 'store'])->name('order.store');

//     // Form & simpan transaksi (pembayaran)
//     Route::get('/payment/{order}', [TransactionController::class, 'create'])->name('payment.create');
//     Route::post('/payment/{order}', [TransactionController::class, 'store'])->name('payment.store');

//     // Halaman terima kasih
//     Route::get('/order/thankyou', [OrderController::class, 'thankYou'])->name('order.thankyou');
// });



// transaksi admin
// Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/transactions', [TransactionAdminController::class, 'index'])->name('transactions.index');
//     Route::get('/transactions/{transaction}', [TransactionAdminController::class, 'show'])->name('transactions.show');
//     Route::post('/transactions/{transaction}/confirm', [TransactionAdminController::class, 'confirm'])->name('transactions.confirm');
//     Route::post('/transactions/{transaction}/reject', [TransactionAdminController::class, 'reject'])->name('transactions.reject');
// });