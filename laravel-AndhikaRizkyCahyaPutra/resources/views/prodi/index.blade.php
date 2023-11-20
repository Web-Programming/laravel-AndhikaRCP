@extends('layout.master')
@section('title','Halaman List Prodi')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Program Studi</h2>
        <div class="d-md-flex justify-content-md-end">
            <a href="{{route('prodi.create')}}" class="btn  btn-primary">Tambah</a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prodis as $item)
                    <tr>
                        <td>
                            <img src=" {{asset('storage/' .$item->foto)}}" width="100px" alt="">
                        </td>
                        <td> {{$item->nama}}</td>
                        <td>
                            {{-- <a href=" {{url('/prodi/'.$item->id)}} " class="btn btn-warning">Detail</a>
                            <a href="{{url('/prodi/' .$item->id .'/edit')}} " class="btn btn-info">Info</a> --}}
                             <form action="{{route('prodi.destroy',['prodi'=>$item->id])}} "
                            method="POST">
                            <a href="{{url('/prodi/'.$item->id)}}" class="btn btn-warning">
                        Detail
                        </a>
                         <a href="{{url('/prodi/'.$item->id .'/edit')}}" class="btn btn-info">
                        Ubah
                        </a>

                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>

                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
