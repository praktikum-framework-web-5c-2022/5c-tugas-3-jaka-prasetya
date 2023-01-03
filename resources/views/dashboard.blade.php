@extends('layout.master')
@section('judul_halaman','Dashboard')
@section('active0','active')
@section('judul','Dashboard')
@section('intro')
    <p>Halaman ini menampilkan statistik <span class="text-danger">SIAKAD</span></p>
@endsection
@section('isi')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                Dosen
                <i class="fa-solid fa-user" style="position:relative; left:16.5rem;"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Dosen</h5>
                    <p class="card-text">{{$jumlah_dosen}} Dosen</p>
                    <a href="/dosens/" class="btn btn-primary">Detail..</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                Mahasiswa
                <i class="fa-solid fa-users" style="position:relative; left:14rem;"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Mahasiswa</h5>
                    <p class="card-text">{{$jumlah_mahasiswa}} Mahasiswa</p>
                    <a href="/mahasiswas/" class="btn btn-primary">Detail..</a>
                    </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                Mata Kuliah
                <i class="fa-solid fa-rectangle-list" style="position:relative; left:14rem;"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Jumlah Mata Kuliah</h5>
                    <p class="card-text">{{$jumlah_matkul}}</p>
                    <a href="/mata_kuliahs/" class="btn btn-primary">Detail..</a>
                </div>
            </div>
        </div>
    </div>
@endsection