<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);



//Route::get('pegawai/{id}/showKontrakdanJabatan', 'JabatanController@tampil');

//Route::resource('/chart', 'ChartController');

//Route::resource('pegawai.KontrakdanJabatan', 'JabatanController');
//Route::get('pegawai/KontrakdanJabatan/{id}', 'JabatanController@pel');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/', [PegawaiController::class, 'halamanutama']);

    Route::get('/pegawai', [PegawaiController::class, 'index']); //READ

    Route::post('/pegawai/store', [PegawaiController::class, 'store']); //CREATE

    Route::put('/edit/pegawai/{id}', [PegawaiController::class, 'update']); //UPDATE

    Route::get('/show/pegawai/{id}', [PegawaiController::class, 'show']); //SHOW ATAU MENAMPILKAN DATA BERDASARKAN ID

    Route::get('/edit/pegawai/delete/{id}', [PegawaiController::class, 'destroy']); //DELETE 

    //Route::get('pegawai/pdf', 'PegawaiController@pdf')->name('pegawai-pdf');
    //Route::resource('/pegawai', [PegawaiController]);

    //Route::resource('/KontrakdanJabatan', 'JabatanController');

    Route::get('/KontrakdanJabatan', [JabatanController::class, 'index']);

    Route::post('/KontrakdanJabatan/store', [JabatanController::class, 'store']); //CREATE

    Route::put('/edit/JabatanController/{id}', [JabatanController::class, 'update']); //UPDATE

    Route::get('/show/KontrakdanJabatan/{id}', [JabatanController::class, 'tampil']); //SHOW ATAU MENAMPILKAN DATA BERDASARKAN ID

    Route::get('/edit/JabatanController/delete/{id}', [JabatanController::class, 'destroy']); //DELETE 

    Route::get('/show/edit/KontrakdanJabatan/{id}', [JabatanController::class, 'edit']); //SHOW ATAU MENAMPILKAN DATA BERDASARKAN ID

    Route::get('/show/pel/KontrakdanJabatan/{id}', [JabatanController::class, 'pel']); //SHOW ATAU MENAMPILKAN DATA BERDASARKAN ID
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
