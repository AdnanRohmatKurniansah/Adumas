<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'pengaduans' => Pengaduan::orderBy('id', 'desc')->paginate(9)
    ]);
});

Route::get('/pengaduan/{pengaduan}', function (Pengaduan $pengaduan) {
    $tanggapans = Tanggapan::where('id_pengaduan', $pengaduan->id)->get();
    return view('detail', [
        'pengaduan' => $pengaduan,
        'tanggapans' => $tanggapans
    ]);
});

Route::middleware(['guest'])->prefix('auth')->group(function() {
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerMasyarakat']);
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::middleware('auth:masyarakat')->prefix('dashboard')->group(function() {
    Route::get('/pengaduan/checkSlug', [PengaduanController::class, 'checkSlug']);
    Route::get('/pengaduan', [PengaduanController::class, 'index']);
    Route::get('/pengaduan/create', [PengaduanController::class, 'create']);
    Route::post('/pengaduan', [PengaduanController::class, 'store']);
    Route::get('/pengaduan/{pengaduan}/edit', [PengaduanController::class, 'edit']);
    Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update']);
    Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'delete']);
});

Route::middleware('auth:masyarakat,petugas')->group(function() {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard/pengaduan/{pengaduan}', [PengaduanController::class, 'show']);
});

Route::middleware(['auth:petugas'])->prefix('dashboard')->group(function() {
    Route::get('/', function () {
        return view('dashboard.index', [
            'pengaduans' => Pengaduan::select(DB::raw('DATE_FORMAT(updated_at, "%M") AS date'), DB::raw('COUNT(*) AS count'))
            ->groupBy(DB::raw('DATE_FORMAT(updated_at, "%M")'))
            ->orderBy(DB::raw('DATE_FORMAT(updated_at, "%M")'))
            ->get()
        ]);
    });
    Route::get('/tanggapan', [TanggapanController::class, 'listPengaduan']);
    Route::put('/tanggapan/proses', [TanggapanController::class, 'verifikasi']);
    Route::post('/tanggapan/berikan', [TanggapanController::class, 'tanggapi']);
    Route::middleware('isAdmin')->group(function() {
        Route::resource('/petugas', PetugasController::class);
        Route::post('/pengaduan/generate', [PengaduanController::class, 'generateLaporan']);
    });
});
