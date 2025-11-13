<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryImageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TransactionController;
use App\Models\User;
use Illuminate\Database\Events\TransactionRolledBack;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ModelRumahController;
use App\Http\Controllers\InvoiceController;


Route::get('/category', [UserController::class, 'showModel'])->name('show.kategory');
Route::get('/contact', [UserController::class, 'showContact'])->name('show.contact');
Route::get('/about_us', [UserController::class, 'showAboutUs'])->name('show.about_us');
Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/model', [UserController::class, 'Daftar'])->name('show.model');
Route::get('daftar/category/{id}', [UserController::class, 'daftarCategory'])->name('daftar.category');
Route::get('/desain/{id}', [UserController::class, 'showCategory'])->name('kategori.detail');


Route::get('/dashboard', function () {
    return view('customer.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/developinfo', function () {
    return view('customer.dashboard.developinfo');})
    ->name('developinfo');

// Custom Activity Akun User
Route::middleware('auth')->group(function () {
    Route::post('/profile/store', [UserController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/change/password', [UserController::class, 'ChangePassword'])->name('change.password');
    Route::post('/user/passwrod/update', [UserController::class, 'PasswordUpdate'])->name('user.password.update');
    Route::get('/user/history/order', [UserController::class, 'HistoryOrder'])->name('user.history.order');
    Route::get('/user/history/transaksi', [UserController::class, 'HistoryTransaksi'])->name('user.history.transaksi');

    // tampilan detail kategory
    Route::get('/order/desain/{id}', [OrderController::class, 'CreateOrder'])->name('user.order');
    Route::post('/user/order/desain', [OrderController::class, 'StoreOrder'])->name('user.order.desain');

    // invoice
    Route::get('/invoice/{id}/download', [InvoiceController::class, 'downloadPdf'])->name('invoice.download');

    // transaksi
    Route::get('/user/transaksi/{order}', [TransactionController::class, 'CreateTransaksi'])->name('user.transaksi');
    Route::post('/user/transaksi/done/{order}', [TransactionController::class, 'TransaksiStore'])->name('user.transaksi.desain');
    Route::get('/user/thanks/{id}', [TransactionController::class, 'Thanks'])->name('user.thanks');

    // Ulasan
    Route::get('/user/{order}/review', [ReviewController::class, 'CreateReview'])->name('user.review');
    Route::post('/user/review/{order}', [ReviewController::class, 'StoreReview'])->name('user.create.review');
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
        Route::get('/admin/detail/category/{id}', 'DetailCategory')->name('admin.detail.category');
        Route::patch('/admin/category/{id}/status', 'ToggleStatus')->name('admin.category.status');

        Route::get('/admin/model-rumah/{id}/categories', 'AllDesain')->name('admin.all.desain');

    });


    // All Admin Image Category    
    Route::controller(CategoryImageController::class)->group(function () {
        // Route::get('/all/cat_image', 'AllCatImage')->name('all.catimage');
        // Route::get('/add/cat_image', 'AddCatImage')->name('add.catimage');
        // Route::get('/edit/cat_image/{id}', 'EditCatImage')->name('edit.catimage');
        // Route::post('/update/cat_image', 'UpdateCatImage')->name('update.catimage');
        Route::post('/delete/cat_image/{id}', 'DeleteCatImage')->name('delete.catimage');
        Route::post('/add/cat_image/{id}', 'StoreCatImage')->name('catimage.store');
    });

    //All Admin Model Rumah
    Route::controller(ModelRumahController::class)->group(function () {
        Route::get('/admin/model_rumah', 'index')->name('admin.model_rumah.index');
        Route::get('/admin/model_rumah/create', 'create')->name('admin.model_rumah.create');
        Route::post('/admin/model_rumah/store', 'store')->name('admin.model_rumah.store');
        Route::get('admin/edit/model_rumah/{id}', 'EditModelRumah')->name('admin.edit.model_rumah');
        Route::post('admin/update/model_rumah/{id}', 'UpdateModelRumah')->name('admin.update.model_rumah');

        // Tampilan filter by model desain
        // Route::get('admin/desain/model_rumah/{nama_model}', 'AllDesain')->name('admin.all.desain');

        // Route::get('/admin/model_rumah/edit{id}', 'edit')->name('admin.model_rumah.edit');
        // Route::put('/admin/model_rumah/update{id}', 'update')->name('admin.model_rumah.update');
        Route::delete('/admin/model_rumah/delete/{id}', 'HapusModelRumah')->name('admin.model_rumah.destroy');


    });

    // All Admin Orders
    Route::controller(OrderController::class)->group(function () {
        Route::get('/all/orders', 'AllOrder')->name('all.order');
        Route::get('/edit/orders/{order}', 'EditCatgery')->name('edit.order');
        Route::post('/update/orders/{order}', 'UpdateOrder')->name('update.order');
        Route::get('/delete/order/{id}', 'DeleteOrder')->name('delete.order');

    });

    // AllTransaksi
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/admin/all/transaksi', 'AllTransaksi')->name('transaksi');
        Route::get('/admin/edit/transaksi/{transaction}', 'EditTransaksi')->name('admin.edit.transaksi');
        Route::post('/admin/transactions/{transaction}/status', 'UpdateTransaksi')->name('admin.update.transaksi');
        Route::post('/admin/transaksi/delete/{id}', 'DeleteTransaksi')->name('transaksi.delete');

    });

    // AllReview
    Route::controller(ReviewController::class)->group(function () {
        Route::get('/admin/all/ulasan', 'AdminReview')->name('ulasan');
        Route::post('/admin/approve/ulasan/{id}', 'ApproveReview')->name('admin.approve.ulasan');
        Route::patch('/admin/reviews/{review}/unapprove', 'unapprove')->name('admin.unapprove.ulasan');

    });

    //Banner
    Route::controller(BannerController::class)->group(function (): void {
        Route::get('/admin/banner', 'BannerView')->name('admin.banner');
        Route::get('/admin/tambahbannner', 'TambahBanner')->name('admin.tambah.banner');
        Route::post('/admin/banner/store', 'BannerStore')->name('admin.banner.store');
        Route::post('/admin/delete/banner/{id}', 'BannerDelete')->name('admin.banner.delete');
        Route::patch('/admin/banner/{id}/status', 'BannerStatus')->name('admin.banner.status');

    });
});



