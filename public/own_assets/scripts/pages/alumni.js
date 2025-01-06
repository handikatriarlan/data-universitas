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
        url: '/daftar-alumni/store',
        method: 'POST',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "tgl_transaksi": $("#tgl_transaksi").val(),
            "fakultas": $("#fakultas").val(),
            "prodi": $("#prodi").val(),
            "jurusan": $("#jurusan").val(),
            "bekerja": $("#bekerja").val(),
            "belum_bekerja": $("#belum_bekerja").val(),
            "lanjut_kuliah": $("#lanjut_kuliah").val(),
            "wiraswasta": $("#wiraswasta").val(),
            "jumlah": $("#jumlah").val(),
        },
        success: function (response) {
            if (response.status) {
                $("#tgl_transaksi").val("");
                $("#fakultas").val("");
                $("#prodi").val("");
                $("#jurusan").val("");
                $("#bekerja").val("");
                $("#belum_bekerja").val("");
                $("#lanjut_kuliah").val("");
                $("#wiraswasta").val("");
                $("#jumlah").val("");

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
        url: '/daftar-alumni/edit',
        method: 'GET',
        data: {
            "id": id
        },
        success: function (response) {
            if (response.status) {
                $("#id").val(response.data.id);
                $("#edit_tgl_transaksi").val(response.data.tgl_transaksi);
                $("#edit_fakultas").val(response.data.fakultas);
                $("#edit_prodi").val(response.data.prodi);
                $("#edit_jurusan").val(response.data.jurusan);
                $("#edit_bekerja").val(response.data.bekerja);
                $("#edit_belum_bekerja").val(response.data.belum_bekerja);
                $("#edit_lanjut_kuliah").val(response.data.lanjut_kuliah);
                $("#edit_wiraswasta").val(response.data.wiraswasta);
                $("#edit_jumlah").val(response.data.jumlah);

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
        url: '/daftar-alumni/update',
        method: 'POST',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "id": $("#id").val(),
            "tgl_transaksi": $("#edit_tgl_transaksi").val(),
            "fakultas": $("#edit_fakultas").val(),
            "prodi": $("#edit_prodi").val(),
            "jurusan": $("#edit_jurusan").val(),
            "bekerja": $("#edit_bekerja").val(),
            "belum_bekerja": $("#edit_belum_bekerja").val(),
            "lanjut_kuliah": $("#edit_lanjut_kuliah").val(),
            "wiraswasta": $("#edit_wiraswasta").val(),
            "jumlah": $("#edit_jumlah").val(),
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
                url: '/daftar-alumni/delete',
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
