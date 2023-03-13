<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController, SuratController, DisposisiController, InstansiController, UserController, ReportController, ClientController
};


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

// Route::get('/', function () {
//     return view('homepage.index');
// });

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
  ]);

Route::group(['middleware' => ['role:admin']], function () {

//HomePage
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('homepage.index');

//Route Surat
Route::get('/home/surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('/home/surat/show/{surats}', [SuratController::class, 'show'])->name('surat.show');
Route::post('/home/surat', [SuratController::class, 'store'])->name('surat.store');
Route::put('/home/surat/update/{surats}', [SuratController::class, 'update'])->name('surat.update');
Route::delete('/home/surat/{surats}', [SuratController::class, 'destroy'])->name('surat.destroy');

//Route Disposisi
Route::get('/home/disposisi', [DisposisiController::class, 'index'])->name('disposisi.index');
Route::get('/home/disposisi/show/{disposisis}', [DisposisiController::class, 'show'])->name('disposisi.show');
Route::post('/home/disposisi', [DisposisiController::class, 'store'])->name('disposisi.store');
Route::put('/home/disposisi/update/{disposisis}', [DisposisiController::class, 'update'])->name('disposisi.update');
Route::delete('/home/disposisi/{disposisis}', [DisposisiController::class, 'destroy'])->name('disposisi.destroy');

//Route Instansi
Route::get('/home/instansi', [InstansiController::class, 'index'])->name('instansi.index');
Route::get('/home/instansi/show/{instansis}', [InstansiController::class, 'show'])->name('instansi.show');
Route::post('/home/instansi', [InstansiController::class, 'store'])->name('instansi.store');
Route::put('/home/instansi/update/{instansis}', [InstansiController::class, 'update'])->name('instansi.update');
Route::delete('/home/instansi/{instansis}', [InstansiController::class, 'destroy'])->name('instansi.destroy');

//Route User
Route::get('/home/user', [UserController::class, 'index'])->name('user.index');
Route::get('/home/user/show/{users}', [UserController::class, 'show'])->name('user.show');
Route::post('/home/user', [UserController::class, 'store'])->name('user.store');
Route::put('/home/user/update/{users}', [UserController::class, 'update'])->name('user.update');
Route::delete('/home/user/{users}', [UserController::class, 'destroy'])->name('user.destroy');

//Route Report
Route::get('/home/report/', [ReportController::class, 'index'])->name('report.index');
Route::get('/home/report/index_pdf', [ReportController::class, 'index_pdf'])->name('report.index_pdf');
Route::get('/home/report/cetak_pdf', [ReportController::class, 'cetak_pdf'])->name('report.cetak_pdf');
Route::get('/home/report/index_pdf_by_range/{tglawal}/{tglakhir}', [ReportController::class, 'index_pdf_by_range'])->name('report.index_pdf_by_range');
Route::get('/home/report/cetak_pdf_by_range/{tglawal}/{tglakhir}', [ReportController::class, 'cetak_pdf_by_range'])->name('report.cetak_pdf_by_range');

});

Route::get('/client', [ClientController::class, 'index'])->name('client.index');