<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use App\Models\Surat;
use App\Http\Resources\SuratResource;

class SuratController extends Controller
{
    //
    public function index()
    {
        $data = Surat::latest()->get();
        return response()->json([SuratResource::collection($data), 'Surat fetched.']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'perihal_surat' => 'required',
            'file_surat' => 'required',
            'instansi_id' => 'required',
            'disposisi_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $surat = Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal_surat' => $request->perihal_surat,
            'file_surat' => $request->file_surat,
            'instansi_id' => $request->instansi_id,
            'disposisi_id' => $request->disposisi_id,

         ]);
        
        return response()->json(['Surat created successfully.', new SuratResource($surat)]);
    }

    public function show($id)
    {
        $surat = Surat::find($id);
        if (is_null($surat)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new SuratResource($surat)]);
    }
    public function destroy(Surat $surat_api)
    {
        if (is_null($surat_api)) {
            return response()->json('Data not found', 404); 
        }
        $surat_api->delete();
        return response()->json('Surat deleted successfully');
    }

    public function update(Request $request, Surat $surat)
    {
        $validator = Validator::make($request->all(),[
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'perihal_surat' => 'required',
            'file_surat' => 'required',
            'instansi_id' => 'required',
            'disposisi_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $surat->nomor_surat = $request->nomor_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->perihal_surat = $request->perihal_surat;
        $surat->file_surat = $request->file_surat;
        $surat->instansi_id = $request->instansi_id;
        $surat->disposisi_id = $request->disposisi_id;
        $surat->save();
        return response()->json(['Surat updated successfully.', new SuratResource($surat)]);
    }
}
