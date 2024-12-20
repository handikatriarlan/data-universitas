@extends('dashboard.template')

@section('own_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/icon/icofont/css/icofont.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/component.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/datedropper/datedropper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/spectrum/spectrum.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/bower_components/jquery-minicolors/jquery.minicolors.css') }}">
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-6">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal"
                                            data-target="#large-Modal">Tambah Data</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item" style="float: left;">
                                            <a href="/"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item" style="float: left;"><a href="#!">Daftar
                                                Tenaga Pendidik</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Daftar Tenaga Pendidik</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table style="text-align: center" id="order-table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>No. </th>
                                                        <th>Tanggal Transaksi</th>
                                                        <th>Unit</th>
                                                        <th>Jurusan</th>
                                                        <th>Prodi</th>
                                                        <th>Professor PNS</th>
                                                        <th>Professor Non PNS</th>
                                                        <th>Lektor Kepala PNS</th>
                                                        <th>Lektor Kepala Non PNS</th>
                                                        <th>Lektor PNS</th>
                                                        <th>Lektor Non PNS</th>
                                                        <th>Asisten Ahli PNS</th>
                                                        <th>Asisten Ahli Non PNS</th>
                                                        <th>Tenaga Pengajar PNS</th>
                                                        <th>Tenaga Pengajar Non PNS</th>
                                                        <th>Terkualifikasi S3</th>
                                                        <th>Terkualifikasi Kompetensi Profesi</th>
                                                        <th>Terkualifikasi Praktisi</th>
                                                        <th>Pegawai PPPK</th>
                                                        <th>NIDN</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $index = 1; ?>
                                                    @foreach ($tenagaPendidiks as $tenagaPendidik)
                                                        <tr>
                                                            <td>{{ $index++ }}</td>
                                                            <td>{{ $tenagaPendidik->tgl_transaksi }}</td>
                                                            <td>{{ $tenagaPendidik->unit }}</td>
                                                            <td>{{ $tenagaPendidik->jurusan }}</td>
                                                            <td>{{ $tenagaPendidik->prodi }}</td>
                                                            <td>{{ $tenagaPendidik->professor_pns }}</td>
                                                            <td>{{ $tenagaPendidik->professor_non_pns }}</td>
                                                            <td>{{ $tenagaPendidik->lektor_kepala_pns }}</td>
                                                            <td>{{ $tenagaPendidik->lektor_kepala_non_pns }}</td>
                                                            <td>{{ $tenagaPendidik->lektor_pns }}</td>
                                                            <td>{{ $tenagaPendidik->lektor_non_pns }}</td>
                                                            <td>{{ $tenagaPendidik->asisten_ahli_pns }}</td>
                                                            <td>{{ $tenagaPendidik->asisten_ahli_non_pns }}</td>
                                                            <td>{{ $tenagaPendidik->tenaga_pengajar_pns }}</td>
                                                            <td>{{ $tenagaPendidik->tenaga_pengajar_non_pns }}</td>
                                                            <td>{{ $tenagaPendidik->terkualifikasi_s3 }}</td>
                                                            <td>{{ $tenagaPendidik->terkualifikasi_kompetensi_profesi }}</td>
                                                            <td>{{ $tenagaPendidik->terkualifikasi_praktisi }}</td>
                                                            <td>{{ $tenagaPendidik->pegawai_pppk }}</td>
                                                            <td>{{ $tenagaPendidik->nidn }}</td>
                                                            <td>
                                                                <i class="ti-pencil text-success edit"
                                                                    style="font-size: 18px"
                                                                    data-id={{ $tenagaPendidik->id }}></i>
                                                                <i class="ti-trash text-danger delete"
                                                                    style="font-size: 18px"
                                                                    data-id={{ $tenagaPendidik->id }}></i>
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

                </div>
            </div>
        </div>
    </div>

    {{-- modal tambah data --}}
    <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-block">
                            <form id="main" novalidate>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi"
                                            placeholder="Masukkan Tanggal Transaksi">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Unit</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="unit" id="unit"
                                            placeholder="Masukkan Unit">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jurusan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="jurusan" id="jurusan"
                                            placeholder="Masukkan Jurusan">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Prodi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="prodi" id="prodi"
                                            placeholder="Masukkan Prodi">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Professor Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="professor_pns" id="professor_pns"
                                            placeholder="Masukkan Professor Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Professor Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="professor_non_pns" id="professor_non_pns"
                                            placeholder="Masukkan Professor Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lektor Kepala Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="lektor_kepala_pns" id="lektor_kepala_pns"
                                            placeholder="Masukkan Lektor Kepala Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lektor Kepala Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="lektor_kepala_non_pns" id="lektor_kepala_non_pns"
                                            placeholder="Masukkan Lektor Kepala Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lektor Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="lektor_pns" id="lektor_pns"
                                            placeholder="Masukkan Lektor Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lektor Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="lektor_non_pns" id="lektor_non_pns"
                                            placeholder="Masukkan Lektor Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Asisten Ahli Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="asisten_ahli_pns" id="asisten_ahli_pns"
                                            placeholder="Masukkan Asisten_ahli Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Asisten Ahli Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="asisten_ahli_non_pns" id="asisten_ahli_non_pns"
                                            placeholder="Masukkan Asisten Ahli Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tenaga Pengajar Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="tenaga_pengajar_pns" id="tenaga_pengajar_pns"
                                            placeholder="Masukkan Tenaga Pengajar Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tenaga Pengajar Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="tenaga_pengajar_non_pns" id="tenaga_pengajar_non_pns"
                                            placeholder="Masukkan Tenaga Pengajar Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Terkualifikasi S3</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="terkualifikasi_s3" id="terkualifikasi_s3"
                                            placeholder="Masukkan Terkualifikasi S3">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Terkualifikasi Kompetensi Profesi</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="terkualifikasi_kompetensi_profesi" id="terkualifikasi_kompetensi_profesi"
                                            placeholder="Masukkan Terkualifikasi Kompetensi Profesi">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Terkualifikasi Praktisi</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="terkualifikasi_praktisi" id="terkualifikasi_praktisi"
                                            placeholder="Masukkan Terkualifikasi Praktisi">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pegawai PPPK</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="pegawai_pppk" id="pegawai_pppk"
                                            placeholder="Masukkan Pegawai PPPK">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">NIDN</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="nidn" id="nidn"
                                            placeholder="Masukkan NIDN">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect close-btn"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="store">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal edit data --}}
    <div class="modal fade" id="edit-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-block">
                            <form id="main" novalidate>
                                <input type="hidden" name="" id="id">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="edit_tgl_transaksi" id="edit_tgl_transaksi"
                                            placeholder="Masukkan Tanggal Transaksi">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Unit</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="edit_unit" id="edit_unit"
                                            placeholder="Masukkan Unit">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jurusan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="edit_jurusan" id="edit_jurusan"
                                            placeholder="Masukkan Jurusan">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Prodi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="edit_prodi" id="edit_prodi"
                                            placeholder="Masukkan Prodi">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Professor Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_professor_pns" id="edit_professor_pns"
                                            placeholder="Masukkan Professor Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Professor Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_professor_non_pns" id="edit_professor_non_pns"
                                            placeholder="Masukkan Professor Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lektor Kepala Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_lektor_kepala_pns" id="edit_lektor_kepala_pns"
                                            placeholder="Masukkan Lektor Kepala Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lektor Kepala Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_lektor_kepala_non_pns" id="edit_lektor_kepala_non_pns"
                                            placeholder="Masukkan Lektor Kepala Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lektor Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_lektor_pns" id="edit_lektor_pns"
                                            placeholder="Masukkan Lektor Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lektor Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_lektor_non_pns" id="edit_lektor_non_pns"
                                            placeholder="Masukkan Lektor Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Asisten Ahli Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_asisten_ahli_pns" id="edit_asisten_ahli_pns"
                                            placeholder="Masukkan Asisten_ahli Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Asisten Ahli Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_asisten_ahli_non_pns" id="edit_asisten_ahli_non_pns"
                                            placeholder="Masukkan Asisten Ahli Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tenaga Pengajar Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_tenaga_pengajar_pns" id="edit_tenaga_pengajar_pns"
                                            placeholder="Masukkan Tenaga Pengajar Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tenaga Pengajar Non Pns</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_tenaga_pengajar_non_pns" id="edit_tenaga_pengajar_non_pns"
                                            placeholder="Masukkan Tenaga Pengajar Non Pns">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Terkualifikasi S3</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_terkualifikasi_s3" id="edit_terkualifikasi_s3"
                                            placeholder="Masukkan Terkualifikasi S3">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Terkualifikasi Kompetensi Profesi</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_terkualifikasi_kompetensi_profesi" id="edit_terkualifikasi_kompetensi_profesi"
                                            placeholder="Masukkan Terkualifikasi Kompetensi Profesi">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Terkualifikasi Praktisi</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_terkualifikasi_praktisi" id="edit_terkualifikasi_praktisi"
                                            placeholder="Masukkan Terkualifikasi Praktisi">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pegawai PPPK</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_pegawai_pppk" id="edit_pegawai_pppk"
                                            placeholder="Masukkan Pegawai PPPK">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">NIDN</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="edit_nidn" id="edit_nidn"
                                            placeholder="Masukkan NIDN">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect close-btn"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="update">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('own_js')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/assets/pages/data-table/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/assets/pages/data-table/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/assets/pages/data-table/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>

    <script type="text/javascript" src="{{ asset('assets/bower_components/i18next/i18next.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/jquery-i18next/jquery-i18next.min.js') }}">
    </script>

    <script type="text/javascript" src="{{ asset('assets/assets/js/sweetalert.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/js/modal.js') }}"></script>


    <script type="text/javascript" src="{{ asset('assets/assets/js/modalEffects.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/js/classie.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/assets/pages/form-validation/validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/pages/form-validation/form-validation.js') }}"></script>

    <script type="text/javascript"
        src="{{ asset('assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/datedropper/datedropper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/spectrum/spectrum.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/jscolor/jscolor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/jquery-minicolors/jquery.minicolors.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/assets/pages/advance-elements/custom-picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/pages/advance-elements/moment-with-locales.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('own_assets/scripts/pages/tenaga-pendidik.js') }}"></script>
@endsection
