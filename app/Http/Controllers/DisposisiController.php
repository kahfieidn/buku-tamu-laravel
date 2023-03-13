<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disposisi;

class DisposisiController extends Controller
{
    //
    public function index() {
        $disposisis = Disposisi::latest()->get();
        return view('disposisi.index', compact('disposisis'));
    }
    public function show(Disposisi $disposisis){
        return view('disposisi.show',[
            'disposisis' => $disposisis
        ]);    
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_disposisi' => 'required',
        ]);
        Disposisi::create($validatedData);
        return redirect('/home/disposisi')->with('success','Tamu Berhasil di Tambahkan!');
    }
    public function update(Request $request, Disposisi $disposisis){
        $rules = [
            'nama_disposisi' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Disposisi::where('id', $disposisis->id)->update($validatedData);
        return redirect('/home/disposisi')->with('warning', 'Tamu Berhasil di Update!');
    }
    public function destroy(Disposisi $disposisis)
    {
        Disposisi::destroy($disposisis->id);
        return redirect('/home/disposisi')->with('danger', 'Tamu berhasil di Hapus!.');
    }
}
