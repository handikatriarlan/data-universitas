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
        url: '/daftar-jumlah-mahasiswa-berprestasi/store',
        method: 'POST',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "tgl_transaksi": $("#tgl_transaksi").val(),
            "fakultas": $("#fakultas").val(),
            "prodi": $("#prodi").val(),
            "jurusan": $("#jurusan").val(),
            "kategori": $("#kategori").val(),
            "bidang": $("#bidang").val(),
            "jenis": $("#jenis").val(),
            "jumlah": $("#jumlah").val(),
        },
        success: function (response) {
            if (response.status) {
                $("#tgl_transaksi").val("");
                $("#fakultas").val("");
                $("#prodi").val("");
                $("#jurusan").val("");
                $("#kategori").val("");
                $("#bidang").val("");
                $("#jenis").val("");
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
        url: '/daftar-jumlah-mahasiswa-berprestasi/edit',
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
                $("#edit_kategori").val(response.data.kategori);
                $("#edit_bidang").val(response.data.bidang);
                $("#edit_jenis").val(response.data.jenis);
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
        url: '/daftar-jumlah-mahasiswa-berprestasi/update',
        method: 'POST',
        data: {
            "_token": $("meta[name='csrf-token']").attr('content'),
            "id": $("#id").val(),
            "tgl_transaksi": $("#edit_tgl_transaksi").val(),
            "fakultas": $("#edit_fakultas").val(),
            "prodi": $("#edit_prodi").val(),
            "jurusan": $("#edit_jurusan").val(),
            "kategori": $("#edit_kategori").val(),
            "bidang": $("#edit_bidang").val(),
            "jenis": $("#edit_jenis").val(),
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
                url: '/daftar-jumlah-mahasiswa-berprestasi/delete',
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
