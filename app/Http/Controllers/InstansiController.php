<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi;

class InstansiController extends Controller
{
    //
    public function index() {
        $instansis = Instansi::latest()->get();
        return view('instansi.index', compact('instansis'));
    }
    public function show(Instansi $Instansis){
        return view('instansi.show',[
            'instansis' => $Instansis
        ]);    
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_instansi' => 'required',
        ]);
        Instansi::create($validatedData);
        return redirect('/home/instansi')->with('success','Tamu Berhasil di Tambahkan!');
    }
    public function update(Request $request, Instansi $instansis){
        $rules = [
            'nama_instansi' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Instansi::where('id', $instansis->id)->update($validatedData);
        return redirect('/home/instansi')->with('warning', 'Tamu Berhasil di Update!');
    }
    public function destroy(Instansi $instansis){
        Instansi::destroy($instansis->id);
        return redirect('/home/instansi')->with('danger', 'Tamu berhasil di Hapus!.');
    }
}
