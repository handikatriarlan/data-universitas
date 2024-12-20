let data_table;
$(document).ready(function () {
    data_table = $('#order-table').DataTable({
        "order": [
            [3, "desc"]
        ]
    });

    $.extend(true, $.fn.dataTable.defaults, {
        "searching": false,
        "ordering": false
    });
});

$("#store").on("click", function () {
    $("#large-Modal").modal('hide');
    $.ajax({
        url: '/daftar-tenaga-pendidik/store',
        method: 'POST',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "tgl_transaksi": $("#tgl_transaksi").val(),
            "unit": $("#unit").val(),
            "professor_pns": $("#professor_pns").val(),
            "professor_non_pns": $("#professor_non_pns").val(),
            "lektor_kepala_pns": $("#lektor_kepala_pns").val(),
            "lektor_kepala_non_pns": $("#lektor_kepala_non_pns").val(),
            "lektor_pns": $("#lektor_pns").val(),
            "lektor_non_pns": $("#lektor_non_pns").val(),
            "asisten_ahli_pns": $("#asisten_ahli_pns").val(),
            "asisten_ahli_non_pns": $("#asisten_ahli_non_pns").val(),
            "tenaga_pengajar_pns": $("#tenaga_pengajar_pns").val(),
            "tenaga_pengajar_non_pns": $("#tenaga_pengajar_non_pns").val(),
            "terkualifikasi_s3": $("#terkualifikasi_s3").val(),
            "terkualifikasi_kompetensi_profesi": $("#terkualifikasi_kompetensi_profesi").val(),
            "terkualifikasi_praktisi": $("#terkualifikasi_praktisi").val(),
            "pegawai_pppk": $("#pegawai_pppk").val(),
            "nidn": $("#nidn").val(),
            "prodi": $("#prodi").val(),
            "jurusan": $("#jurusan").val(),
        },
        success: function (response) {
            if (response.status) {
                $("#tgl_transaksi").val("");
                $("#unit").val("");
                $("#professor_pns").val("");
                $("#professor_non_pns").val("");
                $("#lektor_kepala_pns").val("");
                $("#lektor_kepala_non_pns").val("");
                $("#lektor_pns").val("");
                $("#lektor_non_pns").val("");
                $("#asisten_ahli_pns").val("");
                $("#asisten_ahli_non_pns").val("");
                $("#tenaga_pengajar_pns").val("");
                $("#tenaga_pengajar_non_pns").val("");
                $("#terkualifikasi_s3").val("");
                $("#terkualifikasi_kompetensi_profesi").val("");
                $("#terkualifikasi_praktisi").val("");
                $("#pegawai_pppk").val("");
                $("#nidn").val("");
                $("#prodi").val("");
                $("#jurusan").val("");

                Swal.fire({
                    title: 'Success',
                    text: "Pendaftaran ada berhasil!",
                    icon: 'success'
                })
                setInterval(function () {
                    location.reload();
                }, 2000);
            } else {
                Swal.fire({
                    title: 'Oops..',
                    text: `${response.message}`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#large-Modal").modal('show');
                    }
                })
            }
        },
        error: function (response) {
            Swal.fire({
                title: 'Oops..',
                text: `${response.message}`,
                icon: 'error',
                confirmButtonText: 'Oke'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#large-Modal").modal('show');
                }
            })
        }
    })
});

$(".edit").on('click', function () {
    let id = $(this).data('id');

    $.ajax({
        url: '/daftar-tenaga-pendidik/edit',
        method: 'GET',
        data: {
            "id": id
        },
        success: function (response) {
            if (response.status) {
                $("#id").val(response.data.id);
                $("#edit_tgl_transaksi").val(response.data.tgl_transaksi);
                $("#edit_unit").val(response.data.unit);
                $("#edit_professor_pns").val(response.data.professor_pns);
                $("#edit_professor_non_pns").val(response.data.professor_non_pns);
                $("#edit_lektor_kepala_pns").val(response.data.lektor_kepala_pns);
                $("#edit_lektor_kepala_non_pns").val(response.data.lektor_kepala_non_pns);
                $("#edit_lektor_non_pns").val(response.data.lektor_non_pns);
                $("#edit_lektor_pns").val(response.data.lektor_pns);
                $("#edit_lektor_non_pns").val(response.data.lektor_non_pns);
                $("#edit_asisten_ahli_pns").val(response.data.asisten_ahli_pns);
                $("#edit_asisten_ahli_non_pns").val(response.data.asisten_ahli_non_pns);
                $("#edit_tenaga_pengajar_pns").val(response.data.tenaga_pengajar_pns);
                $("#edit_tenaga_pengajar_non_pns").val(response.data.tenaga_pengajar_non_pns);
                $("#edit_terkualifikasi_s3").val(response.data.terkualifikasi_s3);
                $("#edit_terkualifikasi_kompetensi_profesi").val(response.data.terkualifikasi_kompetensi_profesi);
                $("#edit_terkualifikasi_praktisi").val(response.data.terkualifikasi_praktisi);
                $("#edit_pegawai_pppk").val(response.data.pegawai_pppk);
                $("#edit_nidn").val(response.data.nidn);
                $("#edit_prodi").val(response.data.prodi);
                $("#edit_jurusan").val(response.data.jurusan);

                $("#edit-Modal").modal('show');
            } else {
                Swal.fire({
                    title: 'Oops..',
                    text: `${response.message}`,
                    icon: 'error',
                })
            }
        },
        error: function (response) {
            Swal.fire({
                title: 'Oops..',
                text: `${response.message}`,
                icon: 'error',
                confirmButtonText: 'Oke'
            })
        }
    })
})

$("#update").on("click", function () {
    $("#edit-Modal").modal('hide');
    $.ajax({
        url: '/daftar-tenaga-pendidik/update',
        method: 'POST',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "id": $("#id").val(),
            "tgl_transaksi": $("#edit_tgl_transaksi").val(),
            "unit": $("#edit_unit").val(),
            "unit": $("#edit_unit").val(),
            "professor_pns": $("#edit_professor_pns").val(),
            "professor_non_pns": $("#edit_professor_non_pns").val(),
            "lektor_kepala_pns": $("#edit_lektor_kepala_pns").val(),
            "lektor_kepala_non_pns": $("#edit_lektor_kepala_non_pns").val(),
            "lektor_non_pns": $("#edit_lektor_non_pns").val(),
            "lektor_pns": $("#edit_lektor_pns").val(),
            "lektor_non_pns": $("#edit_lektor_non_pns").val(),
            "asisten_ahli_pns": $("#edit_asisten_ahli_pns").val(),
            "asisten_ahli_non_pns": $("#edit_asisten_ahli_non_pns").val(),
            "tenaga_pengajar_pns": $("#edit_tenaga_pengajar_pns").val(),
            "tenaga_pengajar_non_pns": $("#edit_tenaga_pengajar_non_pns").val(),
            "terkualifikasi_s3": $("#edit_terkualifikasi_s3").val(),
            "terkualifikasi_kompetensi_profesi": $("#edit_terkualifikasi_kompetensi_profesi").val(),
            "terkualifikasi_praktisi": $("#edit_terkualifikasi_praktisi").val(),
            "pegawai_pppk": $("#edit_pegawai_pppk").val(),
            "nidn": $("#edit_nidn").val(),
            "prodi": $("#edit_prodi").val(),
            "jurusan": $("#edit_jurusan").val(),
        },
        success: function (response) {
            if (response.status) {
                Swal.fire({
                    title: 'Success',
                    text: "Data berhasil diupdate!",
                    icon: 'success'
                })

                setTimeout(function () {
                    location.reload();
                }, 2000);
            } else {
                Swal.fire({
                    title: 'Oops..',
                    text: `${response.message}`,
                    icon: 'error',
                    confirmButtonText: 'Oke'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#edit-Modal").modal('show');
                    }
                })
            }
        },
        error: function (response) {
            Swal.fire({
                title: 'Oops..',
                text: `${response.message}`,
                icon: 'error',
                confirmButtonText: 'Oke'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#edit-Modal").modal('show');
                }
            })
        }
    })
});

$(".delete").on("click", function () {
    let id = $(this).data('id');

    Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Apakah Anda Yakin Menghapus Data Ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/daftar-tenaga-pendidik/delete',
                method: 'POST',
                data: {
                    "_token": $("meta[name='csrf-token']").attr('content'),
                    "id": id,
                },
                success: function (response) {
                    if (response.status) {
                        Swal.fire({
                            title: 'Success',
                            text: "Berhasil Menghapus Data!",
                            icon: 'success'
                        })
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        Swal.fire({
                            title: 'Oops..',
                            text: `${response.message}`,
                            icon: 'error'
                        })
                    }
                },
                error: function (response) {
                    Swal.fire({
                        title: 'Oops..',
                        text: `${response.message}`,
                        icon: 'error'
                    })
                }
            })
        }
    });
})
