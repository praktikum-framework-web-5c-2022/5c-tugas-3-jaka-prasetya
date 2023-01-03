<?php

namespace App\Http\Controllers;

use App\Models\mahasiswas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class mahasiswasController extends Controller
{
    public function index(){
        $mahasiswass= mahasiswas::all();
        return view('mahasiswas.index',[
            'mahasiswass' => $mahasiswass
        ]);
    }
    public function create()
    {
        return view('mahasiswas.create');
    }

   
    public function store(Request $request, mahasiswas $mahasiswas)
    {
        $validate= $request->validate(
           [
            'nama' => 'required|max:30',
            'npm' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'photo' => 'required|file|image|max:2048'
           ]
        );
        
        if ($request->hasfile('photo')) {
            $validate['photo'] = $request->file('photo');
            $extension = $validate['photo']->getClientOriginalExtension(); 
            $filename = time() . '.' . $extension;
            request()->photo->move(public_path('storage/mahasiswas/'), $filename);
            $validate['photo'] = $filename;  
        }
        mahasiswas::create($validate);

        return redirect()->route('mahasiswass.index')->with('message',"Data {$validate['nama']} berhasil ditambahkan");
    }

    public function edit(mahasiswas $mahasiswas){
        return view('mahasiswas.edit',[
            'mahasiswas' => $mahasiswas
        ]);
    }


    public function update(Request $request, mahasiswas $mahasiswas){
        $validate= $request->validate(
            [
             'nama' => 'required|max:30',
             'npm' => 'required',
             'jenis_kelamin' => 'required',
             'alamat' => 'required',
             'tempat_lahir' => 'required',
             'tanggal_lahir' => 'required',
            ]
         );

         if ($request->hasfile('photo')) {
            if ($request->oldPhoto){
                unlink($request->oldPhoto);
            }
            $validate['photo'] = $request->file('photo');
            $extension = $validate['photo']->getClientOriginalExtension(); 
            $filename = time() . '.' . $extension;
            request()->photo->move(public_path('storage/mahasiswas/'), $filename);
            $validate['photo'] = $filename;  
        }

         mahasiswas::where('id', $mahasiswas->id)->update($validate);
         return redirect()->route('mahasiswass.index')->with('message',"Data {$validate['nama']} berhasil diedit");
    }

    public function destroy(mahasiswas $mahasiswas){
        $image_path ='storage/mahasiswas/'.$mahasiswas->photo;
        if (File::exists(public_path( $image_path ))){
            unlink($image_path);
         }
        mahasiswas::destroy($mahasiswas->id);
        return redirect()->route('mahasiswass.index')->with('message',"Data $mahasiswas->nama berhasil dihapus");

    }

    
}