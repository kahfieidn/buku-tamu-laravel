<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Surat Masuk</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
                <!-- Basic Tables start -->
                <section class="section">
                    <div class="row" id="basic-table">
                        <div class="col-12 col-md-12">
                            <div class="card" style="text-align: center;overflow:hidden;">
                                <div class="card-header">
                                        <u><h3>Laporan Surat Masuk Bulan</h3></u>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Table with outer spacing -->
                                        <div class="table-responsive">
                                            <table class="table table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>No. Surat</th>
                                                        <th>Tanggal Surat</th>
                                                        <th>Perihal</th>
                                                        <th>Asal Instansi</th>
                                                        <th>Disposisi</th>
                                                        <th>Waktu Disposisi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($surats as $surat)
                                                <tr>
                                                    <td>{{ $surat->nomor_surat }}</td>
                                                    <td>{{ Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}</td>
                                                    <td>{{ $surat->perihal_surat }} </td>
                                                    <td>{{ $surat->instansis->nama_instansi }}</td>
                                                    <td>{{ $surat->disposisis->nama_disposisi }}</td>
                                                    <td>{{ $surat->created_at}}</td>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Tables end -->


    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/main.js"></script>
</body>

</html>