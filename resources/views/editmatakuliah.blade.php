@extends('layout.master')
@section('judul_halaman','Mata Kuliah')
@section('active3','active')
@section('isi')
    

<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="text-center">Masukan Data Mata Kuliah lengkap</h2>
        <form action="{{route("mata_kuliahs.update",['mata_kuliah'=>$mata_kuliah->id])}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="kode_mk">Nama</label>
                <input type="text" name="kode_mk" id="kode_mk" placeholder="Masukkan Kode Mata Kuliah" class="form-control" value="{{old('kode_mk') ?? $mata_kuliah->kode_mk}}">
                @error('kode_mk')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class=" mb-3">
                <label for="nama_mk">NPM</label>
                <input type="text" name="nama_mk" id="nama_mk" placeholder="Masukkan Nama Mata Kuliah" class="form-control" value="{{old('nama_mk') ?? $mata_kuliah->nama_mk}}">
                @error('nama_mk')
                    <div class="text-danger">{{$message}} </div>
                @enderror
            </div> 
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
    
@endsection