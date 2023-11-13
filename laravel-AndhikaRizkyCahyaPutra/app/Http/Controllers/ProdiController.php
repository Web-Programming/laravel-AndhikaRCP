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

    public function create(){
        return view('prodi.create');
    }

    public function store(Request $request){
        // dump($request);
        // echo $request->nama;

        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);
        // dump($validateData);
        // echo $validateData['nama'];

        $prodi = new Prodi();
        $prodi->nama = $validateData['nama'];
        $prodi->save();

        $request->session()->flash('info',"Data Prodi $prodi->nama berhasil disimpan ke database");
        return redirect('prodi/create');
    }

    public function index(){
        $prodi = Prodi::all();
        return view('prodi.index')->with('prodis',$prodi);
    }

    public function show(Prodi $prodi)
    {
        return view('prodi.show',['prodi'=>$prodi]);
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit',['prodi'=>$prodi]);
    }

    public function update(Request $request, Prodi $prodi)
    {
        //dump($request)->all();
        //dump($prodi)
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);

        Prodi::where('id' ,$prodi->id)->update($validateData);
        $request->session()->flash('info', "Data prodi $prodi->nama berhasil diubah");
        return redirect('prodi');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect('prodi')->with("info","Prodi $prodi->nama berhasil dihapus");
    }
}