<?php

namespace App\Http\Controllers;
use App\Models\dosens;
use App\Models\mahasiswas;
use App\Models\matakuliahs;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {   
        $jumlah_dosen = dosens::count(); 
        $jumlah_mahasiswa = mahasiswas::count(); 
        $jumlah_matkul = matakuliahs::count();  
        return view('Dashboard.dashboard', compact('jumlah_dosen', 'jumlah_mahasiswa', 'jumlah_matkul'));
    }
}