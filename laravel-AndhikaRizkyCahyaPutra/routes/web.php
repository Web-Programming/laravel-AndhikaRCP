<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

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
Route::get('/mahasiswa/all-join-elq', [MahasiswaController::class, 'allJoinElq']);

Route::get('/prodi/all-join-facade', [ProdiController::class, 'allJoinFacade']);

Route::get('/prodi/all-join-elq', [ProdiController::class, 'allJoinElq']);


Route::get('/dosen',function() {
    return view('dosen');
});

Route::get('/dosen/index',function() {
    return view('dosen.index');
});


Route::get('/fakultas', function() {
    // return view('fakultas.index' , ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
    //   return view('fakultas.index', ["fakultas" => ['Fakultas Ilmu Komputer dan Rekayasa', "Fakultas Ilmu Ekonomi"]]);
    //   return view('fakultas.index')->with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);
    $kampus = "Universitas Multi Data Palembang";
    // $fakultas = [];
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas','kampus'));
//
});

Route::get('/', function () {
    return view('welcome');
});

Route::get("/profile", function () {
    return view("profile");
});

//Parameter yang wajib di isi
// Route::get('/mahasiswa/{nama}',function($nama='Andhika') {
//     echo "<h2> Halo Semua </h2>";
//     echo "Nama saya $nama";
// });
//Parameter yang tidak wajib di isi
// Route::get('/mahasiswa/{nama?}',function($nama='Andhika') {
//     echo "<h2> Halo Semua </h2>";
//     echo "Nama saya $nama";
// });

//Route parameter > 1
// Route::get('/mahasiswa/{nama?}/{pekerjaan?}',
// function($nama='Andhika', $pekerjaan='kerja') {
//     echo "<h2> Halo Semua </h2>";
//     echo "Nama saya $nama <br>";
//     echo "Pekerjaan : $pekerjaan";
// });

//Redirect dan Named Route
Route::get('/hubungi',function() {
    echo "<h1> Hubungi Kami ,</h1>";
})->name('call'); //named route

Route::redirect('/contact','/hubungi');

Route::get('/halo', function() {
    echo "<a href='".route('call') ."'>" .route('call') ."</a>";
});

//Route Group
//Memudahkan kita mengelompokkan route per modul
Route::prefix('/dosen')->group(function() {
    Route::get('/jadwal', function() {
        echo "<h1> Jadwal Dosen </h1>";
    });
    Route::get('/materi', function() {
        echo "<h1>Materi Perkuliahan</h1>";
    });
});

//php artisan route:list
Route::get('/prodi',[prodiController::class,'index']);

//Jika controller terdapat resource ( Resource Controller)

Route::resource('/kurikulum',KurikulumController::class);

//API Controller

Route::apiResource("/dosen",DosenController::class);
//tes
//1

///////////////////////////////////////

Route::get('/mahasiswa/insert',[MahasiswaController::class, 'insert']);
Route::get('/mahasiswa/update',[MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete',[MahasiswaController::class, 'delete']);
Route::get('/mahasiswa/select',[MahasiswaController::class, 'select']);

Route::get('/mahasiswa/insert-elq',[MahasiswaController::class, 'insertElq']);
Route::get('/mahasiswa/update-elq',[MahasiswaController::class, 'updateElq']);
Route::get('/mahasiswa/delete-elq',[MahasiswaController::class, 'deleteElq']);
Route::get('/mahasiswa/select-elq',[MahasiswaController::class, 'selectElq']);

Route::get('/mahasiswa/insert-qb',[MahasiswaController::class, 'insertQb']);
Route::get('/mahasiswa/update-qb',[MahasiswaController::class, 'updateQb']);
Route::get('/mahasiswa/delete-qb',[MahasiswaController::class, 'deleteQb']);
Route::get('/mahasiswa/select-qb',[MahasiswaController::class, 'selectQb']);

