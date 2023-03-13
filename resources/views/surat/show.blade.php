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
                            <form action="{{ route('surat.update', $surats->id) }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nomor Surat</label>
                                            <input type="text" id="nomor_surat" class="form-control" name="nomor_surat" placeholder="Nomor Surat" value="{{ $surats->nomor_surat }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Tanggal Surat</label>
                                            <input type="date" id="tanggal_surat" class="form-control" name="tanggal_surat" placeholder="Tanggal Surat" value="{{ $surats->tanggal_surat }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Perihal Surat</label>
                                            <input type="text" id="perihal_surat" class="form-control" name="perihal_surat" placeholder="Perihal Surat" value="{{ $surats->perihal_surat }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <h6>Pilih Instansi Asal</h6>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            <select class="form-select" id="instansi_id" name="instansi_id">
                                                <option selected>Pilih...</option>
                                                @foreach($instansis as $instansi)
                                                    @if(old('instansi_id', $instansi->id) ==
                                                    $surats->instansi_id)
                                                    <option value="{{ $instansi->id }}" selected>{{ $instansi->nama_instansi }}</option>
                                                    @else
                                                    <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                                                    @endif
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
                                                    @if(old('disposisi_id', $disposisi->id) ==
                                                    $surats->disposisi_id)
                                                    <option value="{{ $disposisi->id }}" selected>{{ $disposisi->nama_disposisi }}</option>
                                                    @else
                                                    <option value="{{ $disposisi->id }}">{{ $disposisi->nama_disposisi }}</option>
                                                    @endif
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="contact-info-vertical">File Surat Saat Ini : {{ url($surats->file_surat) }}</label>
                                        <fieldset>
                                            <div class="input-group">
                                                <input accept=".pdf" value="{{ old('$surats->file_surat') }}" type="file" class="form-control" id="file_surat" name="file_surat" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-primary" type="button" id="inputGroupFileAddon04">Upload Surat</button>
                                            </div>
                                        </fieldset>
                                        <label for="contact-info-vertical">Note : Unggah ulang jika ingin mengganti file!</label>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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

<script>
    function PreviewImage(field) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("thumbnail_photo" + field).files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("uploadPreview" + field).src = oFREvent.target.result;
            document.getElementById('uploadPreview-container' + field).style.display = 'block';
        };
    };

    function ResetImage(field) {
        document.getElementById('uploadPreview-container' + field).style.display = 'none';
        document.getElementById('thumbnail_photo' + field).value = '';
    };
    window.onload = function() {
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