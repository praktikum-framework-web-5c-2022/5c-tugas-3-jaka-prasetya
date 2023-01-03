<?php

namespace App\Http\Controllers;

use App\Models\matakuliahs;
use Illuminate\Http\Request;



class MataKuliahController extends Controller
{
    public function index(){
        $matakuliahss= matakuliahs::all();
        return view('matakuliahs.index',[
            'matakuliahss' => $matakuliahss
        ]);
    }
    public function create()
    {
        return view('matakuliahs.create');
    }

   
    public function store(Request $request, matakuliahs $matakuliahs)
    {
        $validate= $request->validate(
           [
            'kode_mk' => 'required',
            'nama_mk' => 'required|max:30',
           ]
        );
        
        matakuliahs::create($validate);

        return redirect()->route('matakuliahss.index')->with('message',"Data {$validate['nama_mk']} berhasil ditambahkan");
    }

    public function edit(matakuliahs $matakuliahs){
        return view('matakuliahs.edit',[
            'matakuliahs' => $matakuliahs
        ]);
    }


    public function update(Request $request, matakuliahs $matakuliahs){
        $validate= $request->validate(
            [
             'kode_mk' => 'required',
             'nama_mk' => 'required|max:30',
            ]
         );

         matakuliahs::where('id', $matakuliahs->id)->update($validate);
         return redirect()->route('matakuliahss.index')->with('message',"Data {$validate['nama_mk']} berhasil diedit");
    }

    public function destroy(matakuliahs $matakuliahs){
        matakuliahs::destroy($matakuliahs->id);
        return redirect()->route('matakuliahss.index')->with('message',"Data $matakuliahs->nama_mk berhasil dihapus");

    }

    
}