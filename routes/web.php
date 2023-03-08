<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminPetugasController;
use App\Http\Controllers\AdminSiswaController;
use App\Http\Controllers\AdminSppController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryPayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserV2Controller;
use App\Http\Controllers\RegisterV2Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::view('/about', 'about');

Route::post('/user/home', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/user/history/pay', HistoryPayController::class);
});

Route::middleware('auth', 'admin')->group(function () {
    Route::view('/admin/siswa/import', 'admin.siswa.import')->name('siswa.import');
    Route::post('/admin/siswa/import-siswa', [AdminSiswaController::class, 'import'])->name('import-siswa');
    Route::resource('/admin/siswa', AdminSiswaController::class);
    Route::resource('/admin/petugas', AdminPetugasController::class);
    Route::resource('/admin/kelas', AdminKelasController::class);
    Route::resource('/admin/cspp', AdminSppController::class);
    Route::resource('/admin/contacts', ContactController::class);
    Route::resource('/payment/spp', PaymentController::class);
    Route::put('/payment/spp/{id}/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/spp/pdf', [PaymentController::class, 'expdf'])->name('payment.pdf');
    Route::get('/spp/export/{siswa_id}', [PaymentController::class, 'export'])->name('payment.export');
    Route::get('/dash', [AdminDashboardController::class, 'index'])->name('admin.panel');


});
Route::middleware('auth', 'petugas')->group(function () {
    Route::resource('/payment/spps', PaymentController::class);
});



require __DIR__.'/auth.php';
