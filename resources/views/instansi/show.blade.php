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
                            <form action="{{ route('instansi.update', $instansis->id) }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama Instansi</label>
                                            <input type="text" id="nama_instansi" class="form-control" name="nama_instansi" placeholder="Nama Instansi" value="{{ $instansis->nama_instansi }}">
                                        </div>
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