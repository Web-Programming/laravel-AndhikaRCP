<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\prodi;
use DB;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    // public function index()
    // {
    //     $kampus = "Universitas Multi Data Palembang";
    //     return view("prodi.index")->with("kampus",$kampus);
    // }

    public function allJoinElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswas = Mahasiswa::has('prodi')->get();
        return view('mahasiswa.index',['allmahasiswa' => $mahasiswas, 'kampus' => $kampus]);
    }
    public function allJoinFacade()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = \Illuminate\Support\Facades\DB::select('select mahasiswas.*, prodis.nama as nama_prodi from prodis, mahasiswas where prodis.id = mahasiswas.prodi_id');
        return view('prodi.index',['allmahasiswaprodi' => $result, 'kampus' => $kampus]);
    }

    // public function allJoinElq ()
    // {
    //     $prodis = prodi::with('mahasiswas')->get();
    //     foreach ($prodis as $prodi ) {
    //         echo "<h3>{$prodi->nama}</h3>";
    //         echo "<hr>Mahasiswa: ";
    //         foreach ($prodi ->mahasiswas as $mhs ) {
    //             echo $mhs->nama . ", ";
    //         }
    //         echo "<hr>";
    //     }
    // }
}