<?php

namespace App\Http\Controllers;

use App\Models\dosens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class dosensController extends Controller
{
    public function index(){
        $dosenss= dosens::all();
        return view('dosens.index',[
            'dosenss' => $dosenss
        ]);
    }
    public function create()
    {
        return view('dosens.create');
    }

   
    public function store(Request $request, dosens $dosens)
    {
        $validate= $request->validate(
           [
            'nama' => 'required|max:30',
            'nidn' => 'required',
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
            request()->photo->move(public_path('storage/dosens/'), $filename);
            $validate['photo'] = $filename;  
        }
        dosens::create($validate);

        return redirect()->route('dosenss.index')->with('message',"Data {$validate['nama']} berhasil ditambahkan");
    }

    public function edit(dosens $dosens){
        return view('dosens.edit',[
            'dosens' => $dosens
        ]);
    }


    public function update(Request $request, dosens $dosens){
        $validate= $request->validate(
            [
             'nama' => 'required|max:30',
             'nidn' => 'required',
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
            request()->photo->move(public_path('storage/dosens/'), $filename);
            $validate['photo'] = $filename;  
        }

         dosens::where('id', $dosens->id)->update($validate);
         return redirect()->route('dosenss.index')->with('message',"Data {$validate['nama']} berhasil diedit");
    }

    public function destroy(dosens $dosens){
        $image_path ='storage/dosens/'.$dosens->photo;
        if (File::exists(public_path( $image_path ))){
           unlink($image_path);
        }
        
        dosens::destroy($dosens->id);
        return redirect()->route('dosenss.index')->with('message',"Data $dosens->nama berhasil dihapus");

    }

    
}