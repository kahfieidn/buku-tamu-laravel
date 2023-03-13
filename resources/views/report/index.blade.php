@extends('layouts.main')

@section('content')

<div class="page-heading">
    <h3>Daftar Presensi</h3>
</div>
<div class="page-content">
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Report</h4>
                        </div>
                        
                        <div class="card-content">
                            <div class="card-body">
                            <h4 class="card-title">Unduh Seluruh Laporan Surat Masuk</h4>
                            <form action="{{ route('report.cetak_pdf') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Unduh Seluruh Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="card-body">
                            <h4 class="card-title">Unduh Berdasarkan Periode Bulan</h4>
                            <form action="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Bulan Awal</label>
                                            <input type="month" id="tglawal" class="form-control" name="tglawal" placeholder="Tanggal Awal"">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Bulan Akhir</label>
                                            <input type="month" id="tglakhir" class="form-control" name="tglakhir" placeholder="Tanggal Akhir"">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="" class="btn btn-primary me-1 mb-1" onclick="this.href='/home/report/index_pdf_by_range/' + document.getElementById('tglawal').value +
                                        '/' + document.getElementById('tglakhir').value "target="_blank">Lihat Data</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>

@endsection