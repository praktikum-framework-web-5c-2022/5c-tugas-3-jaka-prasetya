@extends('layout.master')
@section('judul_halaman','Mata Kuliah')
@section('active3','active')
@section('judul','Mata Kuliah')
@section('intro')
    <p>Halaman ini menampilkan data <span class="text-danger">Mata Kuliah</span></p>
@endsection
@section('isi')

<a href="{{route('mata_kuliahs.create')}}" class="btn btn-primary mb-3">Tambah</a>

@if(session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@endif

<table class="table table-bordered border-dark table-hover">
    <thead>
        <th>#</th>
        <th>Kode Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>Action</th>
    </thead>
    <tbody>
        @forelse ($mata_kuliahs as $mk)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$mk->kode_mk}}</td>
            <td>{{$mk->nama_mk}}</td>
            <td>
                <a href="{{route('mata_kuliahs.edit', ['mata_kuliah' => $mk->id])}}" class="btn btn-warning">Update</a>
                <form action="{{route('mata_kuliahs.destroy', ['mata_kuliah' => $mk->id])}}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>   
        </tr>
        @empty
        <td colspan="4">Tidak Ada Data</td>   
        @endforelse
    </tbody>
</table>

@endsection