@extends('layouts.main')

@section('content')
<div class="page-heading">
                <h3>Halo! {{ Auth::user()->name }}</h3>
                
            </div>

            

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Followers</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Following</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                      
                        </div>
                    
                        <section class="section">
                        <div class="card">
                        <div class="card-header">
                            Data Tamu
                        </div>
                        <div class="card-body">
                             
                        <form action="{{ route('admin') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" id="start_date" name="start_date">
                            <input type="date" class="form-control" id="end_date" name="end_date">
                            <button class="btn btn-primary" type="submit">Filter Berdasarkan Tanggal</button>
                            <a class="btn btn-danger" href="/home/cetak_pdf">Download PDF</a>
                        </div>
                    </form>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Pemohon</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Urusan Tujuan</th>
                                        <th>Waktu Datang</th>
                                        <th>Thumbnail Photo</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buku_tamu as $buku_tamuku)
                                    <tr>
                                        <td>{{ $buku_tamuku->nama_pemohon }}</td>
                                        <td>{{ $buku_tamuku->tanggal_lahir }} </td>
                                        <td>{{ $buku_tamuku->urusan_tujuans->urusan_tujuan }}</td>
                                        <td>{{ $buku_tamuku->created_at}}</td>
                                        <td>
                                            <img src="{{ url($buku_tamuku->thumbnail_photo) }}" style="vertical-align: middle;width: 150px;height: 150px;border-radius: 50%;border: 2px solid gray;object-fit: cover;" > 
                                        <td>

                                        <div class="buttons">
                                        <a href="{{ route('admin.show', $buku_tamuku->id) }}" class="btn btn-warning rounded-pill">Edit</a>
                                        <button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $buku_tamuku->id }}">Hapus</button>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </section>
                    </div>



            @foreach ($buku_tamu as $buku_tamuku)
            <div class="modal fade" id="exampleModalCenter{{ $buku_tamuku->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Yakin ingin menghapus ini ?
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Dengan menekan "Ya", Artinya anda setuju untuk menghapus {{ $buku_tamuku->nama_pemohon }} dari data anda.
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Tidak</span>
                                                        </button>
                                                        <form action="{{ route('admin.delete', $buku_tamuku->id) }}" method="POST">
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
