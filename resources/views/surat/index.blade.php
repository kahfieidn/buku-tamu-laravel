@extends('layouts.main')

@section('content')
<div class="page-heading">
    <h3>Halo! {{ Auth::user()->name }}</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">

        </div>

        <section class="section">
            <div class="card">

                <div class="card-body">
                    <!-- Button trigger for primary themes modal -->
                    <button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#primary">
                        Tambah Surat
                    </button>
                    <!--primary theme Modal -->
                    <form action="{{ route('surat.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title white" id="myModalLabel160">
                                        Tambah Surat
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row match-height">
                                        <div class="col-md-12 col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-body">
                                                        <form class="form form-vertical">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="first-name-vertical">Nomor Surat</label>
                                                                            <input type="text" id="nomor_surat" class="form-control" name="nomor_surat" placeholder="Nomor Surat">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="email-id-vertical">Tanggal Surat</label>
                                                                            <input type="date" id="tanggal_surat" class="form-control" name="tanggal_surat" placeholder="Tanggal Surat">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="contact-info-vertical">Perihal Surat</label>
                                                                            <input type="text" id="perihal_surat" class="form-control" name="perihal_surat" placeholder="Perihal Surat">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <h6>Pilih Instansi Asal</h6>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                            <select class="form-select" id="instansi_id" name="instansi_id">
                                                                                <option selected>Pilih...</option>
                                                                                @foreach($instansis as $instansi)
                                                                                <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</options>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <h6>Pilih Disposisi</h6>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                            <select class="form-select" id="disposisi_id" name="disposisi_id">
                                                                                <option selected>Pilih...</option>
                                                                                @foreach($disposisis as $disposisi)
                                                                                <option value="{{ $disposisi->id }}">{{ $disposisi->nama_disposisi }}</options>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <label for="contact-info-vertical">File Surat</label>
                                                                        <fieldset>
                                                                            <div class="input-group">
                                                                                <input accept=".pdf" type="file" class="form-control" id="file_surat" name="file_surat" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                                                <button class="btn btn-primary" type="button" id="inputGroupFileAddon04">Upload Surat</button>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" id="start_date" name="start_date">
                            <input type="date" class="form-control" id="end_date" name="end_date">
                            <button class="btn btn-primary" type="submit">Filter Berdasarkan Tanggal</button>
                            <a class="btn btn-danger" href="{{ route('report.index') }}">Download PDF</a>
                        </div>
                    </form>


                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No. Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Asal Instansi</th>
                                <th>Disposisi</th>
                                <th>Waktu Disposisi</th>
                                <th>File Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $number = 1; ?>
                            @foreach ($surats as $surat)
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $surat->nomor_surat }}</td>
                                <td>{{ Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}</td>
                                <td>{{ $surat->perihal_surat }} </td>
                                <td>{{ $surat->instansis->nama_instansi }}</td>
                                <td>{{ $surat->disposisis->nama_disposisi }}</td>
                                <td>{{ $surat->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary rounded-pill" href="{{ url($surat->file_surat) }}" target="_blank">Lihat Surat</a>
                                </td>
      
                                <td>
                                <div class="buttons">
                                    <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-warning rounded-pill">Edit</a>
                                    <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $surat->id }}">Hapus</button>
                                </div>
                                </td>
                            </tr>
                            <?php $number++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </section>
</div>

@foreach ($surats as $surat)
<div class="modal fade" id="exampleModalCenter{{ $surat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Yakin ingin menghapus ini ?
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Dengan menekan "Ya", Artinya anda setuju untuk menghapus {{ $surat->nomor_surat }} dari data anda.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tidak</span>
                </button>
                <form action="{{ route('surat.destroy', $surat->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <!-- <button type="submit" class="btn btn-primary ml-1"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya</span> -->
                    <!-- </button> -->
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script src="assets/js/main.js"></script>



<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    //KETIKA PERTAMA KALI DI-LOAD MAKA TANGGAL NYA DI-SET TANGGAL SAA PERTAMA DAN TERAKHIR DARI BULAN SAAT INI
    $(document).ready(function() {
        let start = moment().startOf('month')
        let end = moment().endOf('month')

        //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
        $('#exportpdf').attr('href', '/home/reports/order/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

        //INISIASI DATERANGEPICKER
        $('#created_at').daterangepicker({
            startDate: start,
            endDate: end
        }, function(first, last) {
            //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
            $('#exportpdf').attr('href', '/home/reports/order/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
        })
    })
</script>



@endsection