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
                        @if (session('success'))
                        <div class="alert alert-info alert-dismissible show fade">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                        @endif
                        <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('admin.update', $buku_tamu->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Nama Pemohon</label>
                                                        <input type="text" id="nama_pemohon" class="form-control"
                                                            placeholder="Nama Pemohon" name="nama_pemohon" value="{{ $buku_tamu->nama_pemohon }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="city-column">Tanggal Lahir</label>
                                                        <input type="date" id="tanggal_lahir" class="form-control"
                                                            placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{ $buku_tamu->tanggal_lahir }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="country-floating">Urusan Tujuan</label>
                                                    <div class="form-group">
                                                    <select class="choices form-select" name="urusan_tujuan_id" id="urusan_tujuan_id">
                                                    <option selected>--Pilih Urusan Tujuan --</option>
                                                    @foreach($urusan_tujuans as $urusan_tujuanku)
                                                    @if(old('urusan_tujuan_id', $urusan_tujuanku->id) ==
                                                    $buku_tamu->urusan_tujuan_id)
                                                    <option value="{{ $urusan_tujuanku->id }}" selected>{{ $urusan_tujuanku->urusan_tujuan }}</option>
                                                    @else
                                                    <option value="{{ $urusan_tujuanku->id }}">{{ $urusan_tujuanku->urusan_tujuan }}</option>
                                                    @endif
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <label for="country-floating">Photo</label>
                                                <div class="input-group mb-6">
                                                        <label class="input-group-text" for="inputGroupFile01"><i
                                                                class="bi bi-upload"></i></label>
                                                        <input type="file" name="thumbnail_photo" id="thumbnail_photo1" accept=".png, .jpg, .jpeg" class="form-control @error('thumbnail_photo') is-invalid @enderror">
                                                        
                                                        @error('thumbnail_photo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror

                                                        <input type="hidden" name="oldImage" value="{{ $buku_tamu->thumbnail_photo }}">
                                                        @if ($buku_tamu->thumbnail_photo)
                                                        <div id="uploadPreview-container1" style="max-width:500px;">
                                                        <img src="{{ url($buku_tamu->thumbnail_photo) }}" id="uploadPreview1" class="img-fluid w-50 p-2 mb-2">
                                                        </div>
                                                        @else
                                                        <div id="uploadPreview-container1" style="display:none">
                                                        <img id="uploadPreview1" class="img-fluid w-50 p-2 mb-2">
                                                        </div>
                                                        @endif
                                                     

                                                        
                                                    </div>

                                                    <div class="mt-2">
                                                        <a href="javascript:void(0)" onclick="ResetImage(1)" class="btn btn-primary me-1 mb-1" type"button" id="uploadReset1">Bersihkan</a>
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