@extends('layout.master')
@section('judul_halaman','Mahasiswa')
@section('active2','active')
@section('judul','Mahasiswa')
@section('intro')
    <p>Halaman ini menampilkan data <span class="text-danger">Mahasiswa</span></p>
@endsection
@section('isi')


<a href="{{route('mahasiswas.create')}}" class="btn btn-primary mb-3">Tambah</a>

@if(session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@endif

<table class="table table-bordered border-dark table-hover">
    <thead>
        <th>#</th>
        <th>Nama</th>
        <th>NPM</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Tempat lahir</th>
        <th>Tanggal lahir</th>
        <th>Foto</th>
        <th>Action</th>
    </thead>
    <tbody>
        @forelse ($mahasiswas as $mahasiswa)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$mahasiswa->npm}}</td>
            <td>{{$mahasiswa->nama}}</td>
            <td>{{$mahasiswa->jenis_kelamin}}</td>   
            <td>{{$mahasiswa->alamat}}</td>   
            <td>{{$mahasiswa->tempat_lahir}}</td>   
            <td>{{$mahasiswa->tanggal_lahir}}</td>
            <td>
                 <img src="{{asset('storage/mahasiswa/'. $mahasiswa->photo)}}" alt="" style="height:50px; width:50px;">
            <td>
                <a href="{{route('mahasiswas.edit', ['mahasiswa' => $mahasiswa->id])}}" class="btn btn-warning">Update</a>
                <form action="{{route('mahasiswas.destroy', ['mahasiswa' => $mahasiswa->id])}}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>   
        </tr>
        @empty
        <td colspan="9">Tidak Ada Data</td>   
        @endforelse
    </tbody>
</table>

@endsection