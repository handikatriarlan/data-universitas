@extends('dashboard.template')

@section('own_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/icon/icofont/css/icofont.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/component.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/datedropper/datedropper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/spectrum/spectrum.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/jquery-minicolors/jquery.minicolors.css') }}">
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            {{-- <div class="page-header-title">
                                <div class="d-inline">
                                    <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#large-Modal">Tambah Data</button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-lg-6">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item" style="float: left;">
                                        <a href="/"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item" style="float: left;"><a href="#!">Daftar Peserta</a></li>
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
                                  <h5>Daftar Pasien</h5>
                                </div>
                                <div class="card-block">
                                  <div class="dt-responsive table-responsive">
                                    <table id="order-table" class="table table-striped table-bordered nowrap">
                                      <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama 1</th>
                                            <th>Nama 2</th>
                                            <th>Nama Toko</th>
                                            <th>Nomor Whatsapp</th>
                                            <th>Email</th>
                                            <th>Nama MD</th>
                                            <th>Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php $index = 1; ?>
                                        @foreach ($pesertas as $peserta)
                                            <tr>
                                                <td>{{ $index++ }}</td>
                                                <td>{{ $peserta->nama }} <br></td>
                                                <td>{{ $peserta->nama_pendamping }}</td>
                                                <td>{{ $peserta->nama_toko }}</td>
                                                <td>{{ $peserta->no_wa }}</td>
                                                <td>{{ $peserta->email }}</td>
                                                <td>{{ $peserta->nama_md }}</td>
                                                <td>
                                                    <i class="ti-pencil text-success edit" style="font-size: 18px" data-id={{ $peserta->id }}></i>
                                                    <i class="ti-trash text-danger delete" style="font-size: 18px" data-id={{ $peserta->id }}></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama 1</th>
                                            <th>Nama 2</th>
                                            <th>Nama Toko</th>
                                            <th>Nomor Whatsapp</th>
                                            <th>Email</th>
                                            <th>Nama MD</th>
                                            <th>Aksi</th>
                                        </tr>
                                      </tfoot>
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

{{-- modal edit data --}}
<div class="modal fade" id="edit-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Peserta</h4>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-block">
                  <form id="main" novalidate>
                    <input type="hidden" id="id_peserta">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Peserta</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama" id="edit_nama" placeholder="Masukkan Nama Peserta">
                          <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Pendamping</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama" id="edit_pendamping" placeholder="Masukkan Nama Pendamping">
                          <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Toko</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama" id="edit_toko" placeholder="Masukkan Nama Pendamping">
                          <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nomor Whatsapp</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama" id="edit_wa" placeholder="Masukkan No. Whatsapp" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                          <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama" id="edit_email" placeholder="Masukkan Email">
                          <span class="messages"></span>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama MD</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama" id="edit_md" placeholder="Masukkan Nama MD">
                          <span class="messages"></span>
                        </div>
                    </div> --}}
                      {{-- <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="date" id="edit_tanggal_masuk"/>
                            <span class="messages"></span>
                        </div>
                    </div> --}}
                  </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect close-btn" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary waves-effect waves-light" id="update">Save changes</button>
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
    <script src="{{ asset('assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/bower_components/i18next/i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/jquery-i18next/jquery-i18next.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/assets/js/sweetalert.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/js/modal.js') }}"></script>


    <script type="text/javascript" src="{{ asset('assets/assets/js/modalEffects.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/js/classie.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/assets/pages/form-validation/validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/pages/form-validation/form-validation.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/datedropper/datedropper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/spectrum/spectrum.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/jscolor/jscolor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bower_components/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/pages/advance-elements/custom-picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('own_assets/scripts/pages/peserta.js') }}"></script>
@endsection
