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
                                    <h4 class="card-title">Input Form Tamu</h4>
                                </div>
                        <div class="card-content">
                                    <div class="card-body">
                                        <form action"{{ route('urusan_tujuan.store') }} method="POST" class="form" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Urusan Tujuan</label>
                                                        <input type="text" id="urusan_tujuan" class="form-control"
                                                            placeholder="Urusan Tujuan" name="urusan_tujuan">
                                                    </div>
                                                </div>
                                      
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
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


                <section class="section">
                        <div class="card">
                        <div class="card-header">
                            Data Tamu
                        </div>
                        <div class="card-body">
                             
                        
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Urusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buku_tamu as $buku_tamuku)
                                    <tr>
                                        <td>{{ $buku_tamuku->urusan_tujuans->urusan_tujuan }}</td>
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
            </div>

<script>
    function PreviewImage(field) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("thumbnail_photo" + field).files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview" + field).src = oFREvent.target.result;
            document.getElementById('uploadPreview-container' + field).style.display = 'block';
        };
    };
    function ResetImage(field) {
        document.getElementById('uploadPreview-container' + field).style.display = 'none';
        document.getElementById('thumbnail_photo' + field).value = '';
    };
    window.onload = function () {
        document.getElementById('thumbnail_photo1').addEventListener('change', checkImage, false);
        function checkImage(e) {
            var file_list = e.target.files;
            for (var i = 0, file; file = file_list[i]; i++) {
                PreviewImage(e.target.id.replace("thumbnail_photo", ""))
            }
        }
    }
</script>

@endsection