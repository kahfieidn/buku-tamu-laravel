<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Instansi;
use App\Models\Disposisi;

use PDF;
class ReportController extends Controller
{
    public function index(){

        return view('report.index');
    }

    public function index_pdf(Surat $surats) {
        $surats = Surat::all();
    	// return view('index_pdf',['index_pdf'=>$buku_tamu]);            
        return view('report.index_pdf', compact('surats'));
    }
    public function cetak_pdf() {
        $surats = Surat::all();
        
        $pdf = PDF::loadview('report.index_pdf', ['surats'=>$surats])->setOptions(['defaultFont' => 'sans-serif']);        
        
        return $pdf->download('laporan-surat-all.pdf');
    }
    
    public function index_pdf_by_range($tglawal, $tglakhir) {
        // dd("Tanggal Awal : ". $tglawal, "Tanggal Akhir : ". $tglakhir);
        $surats = Surat::all()->whereBetween('tanggal_surat', [$tglawal, $tglakhir]);
        $instansis = Instansi::latest()->get();
        $disposisis = Disposisi::latest()->get();
        return view('report.index_pdf_by_range', compact('surats', 'instansis', 'disposisis'));
    }
    public function cetak_pdf_by_range($tglawal, $tglakhir) {
        $surats = Surat::all()->whereBetween('tanggal_surat', [$tglawal, $tglakhir]);
        $instansis = Instansi::latest()->get();
        $disposisis = Disposisi::latest()->get();
        
        $pdf = PDF::loadview('report.index_pdf_by_range', ['surats'=>$surats, 'instansis'=>$instansis, 'disposisis'=>$disposisis])->setOptions(['defaultFont' => 'sans-serif']);        
        return $pdf->download('laporan-surat-by-range.pdf');
    }
}
