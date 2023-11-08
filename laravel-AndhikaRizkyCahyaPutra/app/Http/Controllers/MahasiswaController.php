<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama, tempat_lahir, tanggal_lahir,created_at) values (?, ?, ?, ?, ?)',['2226250071','Andhika Rizky Cahya Putra','Palembang','2004-03-26', now()]);
        dump($result);

    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama = "Ali",updated_at = now() where npm = ?',['2226250069']);
        dump($result);

    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?',['2226250071']);
    }

    public function select()
    {
        $kampus = 'Universitas Multi Data Palembang';
        $result = DB::select('select * from mahasiswas');
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result,'kampus' => $kampus]);
    }
    public function insertElq()
    {

        //Single Assigment
        // $mhs = new Mahasiswa();
        // $mhs->nama = "Andhika Rizky Cahya Putra";
        // $mhs->npm = "2226250072";
        // $mhs->tempat_lahir = "Palembang";
        // $mhs->tanggal_lahir = date("Y-m-d");
        // $mhs->save();
        // dump($mhs);

        //Mass Assigment ( kolom harus di set filable)
        $mhs = Mahasiswa::insert(
            [
                [
                'nama' => 'Cahya',
                'npm' => '2226250075',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => date('Y-m-d')
                ],
                [
                'nama' => 'Putra',
                'npm' => '2226250074',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => date('Y-m-d')
                ],
            ]
            );
            dump($mhs);
    }

    public function updateElq(){
        $mhs = Mahasiswa::where('npm','2226250071')->first();
        $mhs->nama = 'Andhika Rizky Cahya Putra';
        $mhs->save();
        dump($mhs);
    }

    public function DeleteElq(){
         $mhs = Mahasiswa::where('npm','2226250071')->first();
         $mhs->delete();
         dump($mhs);
    }

    public function SelectElq(){
         $kampus = 'Universitas Multi Data Palembang';
         $mhs = Mahasiswa::all();
        $result = DB::select('select * from mahasiswas');
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result,'kampus' => $kampus]);
    }

    public function insertQb()
    {
        $result = DB::table('mahasiswas')->insert(
           [
                'nama' => 'Dr. Andhika,S.Kom, M.Sc',
                'npm' => '2226250071',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => date('Y-m-d'),
                'created_at' => now()
            ]
        );
        dump($result);
    }
    public function updateQb()
    {
        $result = DB::table('mahasiswas')
        -> where('npm','2226250071')
        ->update(
            [
                'nama' => 'Andhika, S.Kom, M.Sc, PhD',
                'updated_at' => now()

            ]
            );
            dump($result);
    }
    public function DeleteQb(){
        $result = DB::table('mahasiswas')
        ->where('npm','2226250071')
        -> delete();
         dump($result);
    }

    public function selectQb()
    {
           $kampus = 'Universitas Multi Data Palembang';
        $result = DB::table('mahasiswas')->get();
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result,'kampus' => $kampus]);
    }

    public function allJoinElq() {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswas = Mahasiswa::has('prodi')->get();
        return view('mahasiswa.index',['allmahasiswa'=>$mahasiswas,'kampus'=>$kampus]);
    }


}