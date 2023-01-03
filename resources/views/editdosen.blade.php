@extends('layout.master')
@section('judul_halaman','Dosen')
@section('active0','active')
@section('isi')

<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="text-center">Masukan Data Dosen lengkap</h2>
        <form enctype="multipart/form-data" action="{{route("dosens.update",['dosen'=>$dosen->id])}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" class="form-control" value="{{old('nama') ?? $dosen->nama}}">
                @error('nama')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class=" mb-3">
                <label for="nidn">NIDN</label>
                <input type="text" name="nidn" id="nidn" placeholder="Masukkan NIDN" class="form-control" value="{{old('nidn') ?? $dosen->nidn}}">
                @error('nidn')
                    <div class="text-danger">{{$message}} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                    <option value="Laki-laki" {{old('jenis_kelamin') ?? $dosen->jenis_kelamin=="Laki-laki"? "selected" : " "}}>Laki-laki</option>
                    <option value="Perempuan" {{old('jenis_kelamin') ?? $dosen->jenis_kelamin=="Perempuan"? "selected" : " "}}>Perempuan</option>
                </select>
                @error('nama')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat" class="form-control">{{old('alamat')?? $dosen->alamat}}</textarea>
                @error('alamat')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat lahir" class="form-control" value="{{old('tempat_lahir') ?? $dosen->tempat_lahir}}">
                @error('tempat_lahir')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
                <div class="form-group mb-3">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{old('tanggal_lahir')?? $dosen->tanggal_lahir}}">
                @error('tanggal_lahir')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                </div>
            <div class="mb-3">
                <h6>Foto Lama</h6>
                <img src="{{asset('storage/dosen/'. $dosen->photo)}}" alt="" style="height: 200px; width:200px;">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Masukan Foto Baru</label>
                <input type="hidden" name="oldPhoto" value="{{'storage/dosen/' . $dosen->photo}}">
                <input class="form-control" type="file" id="photo" name="photo">
                @error('photo')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
                
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

@endsection