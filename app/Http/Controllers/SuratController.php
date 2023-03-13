<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Disposisi;
use App\Models\Instansi;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class SuratController extends Controller
{
    public function index() {
        $surats = Surat::latest()->get();
        $instansis = Instansi::latest()->get();
        $disposisis = Disposisi::latest()->get();
        return view('surat.index', compact('surats', 'instansis', 'disposisis'));
    }

    public function show(Surat $surats){
        $instansis = Instansi::latest()->get();
        $disposisis = Disposisi::latest()->get();
        return view('surat.show',[
            'surats' => $surats,
            'instansis' => $instansis,
            'disposisis' => $disposisis
        ]);    
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'perihal_surat' => 'required',
            'instansi_id' => 'required',
            'disposisi_id' => 'required',
            'file_surat' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
        ]);

        $file = $request->file('file_surat');
        $file_name = uniqid().'.'. $file->getClientOriginalExtension();
        $request->file_surat->move(public_path('dokumen/'), $file_name);
        $validatedData['file_surat'] = 'dokumen/'. $file_name;

        Surat::create($validatedData);
        return redirect('/home/surat')->with('success','Tamu Berhasil di Tambahkan!');
    }

    public function update(Request $request, Surat $surats){
        $rules = [
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'perihal_surat' => 'required',
            'instansi_id' => 'required',
            'disposisi_id' => 'required',
            'file_surat' => 'file|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
        ];
        $validatedData = $request->validate($rules);
        if($request->file('file_surat')){
            if(\File::exists($surats->file_surat)) {
                \File::delete($surats->file_surat);
            } 
            $file = $request->file('file_surat');
            $file_name = uniqid().'.'. $file->getClientOriginalExtension();
            $request->file_surat->move(public_path('dokumen/'), $file_name);
            $validatedData['file_surat'] = 'dokumen/'. $file_name;
        }
        Surat::where('id', $surats->id)->update($validatedData);
        return redirect('/home/surat')->with('warning', 'Tamu Berhasil di Update!');
    }

    public function destroy(Surat $surats)
    {
        if(\File::exists($surats->file_surat)) {
            \File::delete($surats->file_surat);
        } 
        Surat::destroy($surats->id);
        return redirect('/home/surat')->with('danger', 'Tamu berhasil di Hapus!.');
    }

}
