<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="col-sm-12">
    <div class="page-title-box">

        <h4 class="page-title">Data Pegawai</h4>
    </div>
</div>

<div class="col-sm-12">
    <div class="card m-b-30">
        <div class="card-body">

            <div class="card-title">
                <!-- Tombol tambah data -->
                <button type="button" class="btn btn-primary modalShow" data-toggle="modal" data-target="#modalTambah">
                    <i class="fa fa-user-plus"></i> Tambah Data
                </button>

                <!-- Tombol tambah data banyak -->
                <button type="button" class="btn btn-info tambahBanyak">
                    <i class="fa fa-users"></i> Tambah Data Banyak
                </button>
            </div>

            <div class="viewdata">
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('pegawai/simpanData', ['class' => 'formPegawai']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3">Foto</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/images/profile/default.jpg') ?>" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <div class="invalid-feedback errorFoto">
                                    </div>
                                    <label class="custom-file-label" for="foto">Pilih foto</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nip" name="nip">
                        <div class="invalid-feedback errorNIP">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tmp_lahir" class="col-sm-3 col-form-label">Tmp Lahir</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir">
                        <div class="invalid-feedback errorTmpLahir">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-3 col-form-label">Tgl Lahir</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                        <div class="invalid-feedback errorTglLahir">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-3 col-form-label">J. Kelamin</label>
                    <div class="col-sm-5">
                        <select name="jk" id="jk" class="form-control">
                            <option value=""> - Pilih - </option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <div class="invalid-feedback errorJK">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnSimpan"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('pegawai/ubahData', ['class' => 'editPegawai']) ?>
            <?= csrf_field(); ?>
            <input type="hidden" class="form-control" id="idPeg" name="idPeg">
            <input type="hidden" class="form-control" id="fotoLama" name="fotoLama">
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3">Foto</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/images/profile/default.jpg') ?>" class="img-thumbnail imgPreview">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="editFoto" name="editFoto">
                                    <div class="invalid-feedback errorEditFoto">
                                    </div>
                                    <label class="custom-file-label namaFoto" for="editFoto">Pilih foto</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editNip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="editNip" name="editNip">
                        <div class="invalid-feedback errorEditNIP">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editNama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="editNama" name="editNama">
                        <div class="invalid-feedback errorEditNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editTmp_lahir" class="col-sm-3 col-form-label">Tmp Lahir</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="editTmp_lahir" name="editTmp_lahir">
                        <div class="invalid-feedback errorEditTmpLahir">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editTgl_lahir" class="col-sm-3 col-form-label">Tgl Lahir</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" id="editTgl_lahir" name="editTgl_lahir">
                        <div class="invalid-feedback errorEditTglLahir">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editJk" class="col-sm-3 col-form-label">J. Kelamin</label>
                    <div class="col-sm-5">
                        <select name="editJk" id="editJk" class="form-control">
                            <option value=""> - Pilih - </option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <div class="invalid-feedback errorEditJK">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Ubah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    function datapegawai() {
        $.ajax({
            url: "<?= base_url('pegawai/ambildata'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#foto").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);

            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
                $('.custom-file-label').text(filename);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    function editReadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#editFoto").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);

            reader.onload = function(e) {
                $('.imgPreview').attr('src', e.target.result);
                $('.namaFoto').text(filename);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $(document).ready(function() {
        datapegawai();

        //Tampilkan modal tambah
        $(".modalShow").on('click', function() {

            $("#foto").val('');
            $('.img-preview').attr('src', '<?= base_url('assets/images/profile/default.jpg') ?>');
            $('.custom-file-label').text('Pilih foto');

            $('#nip').val('');
            $('#nip').removeClass('is-invalid');
            $('.errorNIP').html('');

            $('#nama').val('');
            $('#nama').removeClass('is-invalid');
            $('.errorNama').html('');

            $('#tmp_lahir').val('');
            $('#tmp_lahir').removeClass('is-invalid');
            $('.errorTmp_lahir').html('');

            $('#tgl_lahir').val('');
            $('#tgl_lahir').removeClass('is-invalid');
            $('.errorTgl_lahir').html('');

            $('#jk').val('');
            $('#jk').removeClass('is-invalid');
            $('.errorJK').html('');
        });

        $("#foto").change(function() {
            readURL(this);
        });

        $("#editFoto").change(function() {
            editReadURL(this);
        });

        $('.formPegawai').submit(function(e) {
            e.preventDefault();

            // untuk multipart/form-data
            let form = $('.formPegawai')[0];
            let data = new FormData(form);
            //

            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                // untuk form biasa
                // data: $(this).serialize(),

                // untuk multipart/form-data
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                //

                dataType: "json",
                beforeSend: function() {
                    $('.btnSimpan').attr('disable', 'disabled');
                    $('.btnSimpan').html('<i class="fa fa-spin fa-spinner">');
                },
                complete: function() {
                    $('.btnSimpan').removeAttr('disable');
                    $('.btnSimpan').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.foto) {
                            $('#foto').addClass('is-invalid');
                            $('.errorFoto').html(response.error.foto);
                        } else {
                            $('#foto').removeClass('is-invalid');
                            $('.errorFoto').html('');
                        }

                        if (response.error.nip) {
                            $('#nip').addClass('is-invalid');
                            $('.errorNIP').html(response.error.nip);
                        } else {
                            $('#nip').removeClass('is-invalid');
                            $('.errorNIP').html('');
                        }

                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }

                        if (response.error.tmp_lahir) {
                            $('#tmp_lahir').addClass('is-invalid');
                            $('.errorTmpLahir').html(response.error.tmp_lahir);
                        } else {
                            $('#tmp_lahir').removeClass('is-invalid');
                            $('.errorTmpLahir').html('');
                        }

                        if (response.error.tgl_lahir) {
                            $('#tgl_lahir').addClass('is-invalid');
                            $('.errorTglLahir').html(response.error.tgl_lahir);
                        } else {
                            $('#tgl_lahir').removeClass('is-invalid');
                            $('.errorTglLahir').html('');
                        }

                        if (response.error.jk) {
                            $('#jk').addClass('is-invalid');
                            $('.errorJK').html(response.error.jk);
                        } else {
                            $('#jk').removeClass('is-invalid');
                            $('.errorJK').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        })

                        $('#modalTambah').modal('hide');
                        datapegawai();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });

        //Memunculkan modal ubah
        $(".viewdata").on('click', '.btn_edit', function(e) {
            e.preventDefault();
            var id_pegawai = $(this).attr('data-id');
            $.ajax({
                url: '<?= base_url('pegawai/pegawaiById'); ?>',
                type: 'POST',
                data: {
                    id_pegawai: id_pegawai
                },
                dataType: 'json',
                success: function(response) {
                    // console.log(response);

                    $('#fotoLama').val(response.foto);
                    $('#editFoto').val('');

                    $('.imgPreview').attr('src', '<?= base_url('assets/images/profile') ?>' + '/' + response.foto);
                    $('.namaFoto').text(response.foto);

                    $("#modalEdit").modal('show');
                    $("#idPeg").val(response.id_pegawai);

                    $("#editNip").val(response.nip);
                    $('#editNip').removeClass('is-invalid');
                    $('.errorEditNIP').html('');

                    $("#editNama").val(response.nama);
                    $('#editNama').removeClass('is-invalid');
                    $('.errorEditNama').html('');

                    $("#editTmp_lahir").val(response.tmp_lahir);
                    $('#editTmp_lahir').removeClass('is-invalid');
                    $('.errorEditTmpLahir').html('');

                    $("#editTgl_lahir").val(response.tgl_lahir);
                    $('#editTgl_lahir').removeClass('is-invalid');
                    $('.errorEditTglLahir').html('');

                    $('#editJk option[value="' + response.jk + '"]').prop('selected', true);
                    $('#editJk').removeClass('is-invalid');
                    $('.errorEditJK').html('');
                }
            });
        });


        $('.editPegawai').submit(function(e) {
            e.preventDefault();

            // untuk multipart/form-data
            let form = $('.editPegawai')[0];
            let data = new FormData(form);
            //

            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                // untuk form biasa
                // data: $(this).serialize(),

                // untuk multipart/form-data
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                //

                dataType: "json",
                beforeSend: function() {
                    $('.btnEdit').attr('disable', 'disabled');
                    $('.btnEdit').html('<i class="fa fa-spin fa-spinner">');
                },
                complete: function() {
                    $('.btnEdit').removeAttr('disable');
                    $('.btnEdit').html('Ubah');
                },
                success: function(response) {
                    console.log(response);
                    if (response.error) {
                        if (response.error.editFoto) {
                            $('#editFoto').addClass('is-invalid');
                            $('.errorEditFoto').html(response.error.editFoto);
                        } else {
                            $('#editFoto').removeClass('is-invalid');
                            $('.errorEditFoto').html('');
                        }

                        if (response.error.editNip) {
                            $('#editNip').addClass('is-invalid');
                            $('.errorEditNIP').html(response.error.editNip);
                        } else {
                            $('#editNip').removeClass('is-invalid');
                            $('.errorEditNIP').html('');
                        }

                        if (response.error.editNama) {
                            $('#editNama').addClass('is-invalid');
                            $('.errorEditNama').html(response.error.editNama);
                        } else {
                            $('#editNama').removeClass('is-invalid');
                            $('.errorEditNama').html('');
                        }

                        if (response.error.editTmp_lahir) {
                            $('#editTmp_lahir').addClass('is-invalid');
                            $('.errorEditTmpLahir').html(response.error.editTmp_lahir);
                        } else {
                            $('#editTmp_lahir').removeClass('is-invalid');
                            $('.errorEditTmpLahir').html('');
                        }

                        if (response.error.editTgl_lahir) {
                            $('#editTgl_lahir').addClass('is-invalid');
                            $('.errorEditTglLahir').html(response.error.editTgl_lahir);
                        } else {
                            $('#editTgl_lahir').removeClass('is-invalid');
                            $('.errorEditTglLahir').html('');
                        }

                        if (response.error.editJk) {
                            $('#editJk').addClass('is-invalid');
                            $('.errorEditJK').html(response.error.editJk);
                        } else {
                            $('#editJk').removeClass('is-invalid');
                            $('.errorEditJK').html('');
                        }
                    } else {

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        })

                        $('#modalEdit').modal('hide');
                        datapegawai();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });

        $(".viewdata").on('click', '.btn_hapus', function(e) {
            e.preventDefault();
            var id_pegawai = $(this).attr('data-id');

            swal.fire({
                title: 'Apakah anda yakin?',
                text: 'Data Pegawai akan dihapus',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus data!',
                cancelButtonText: 'Batal!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: '<?= base_url('pegawai/hapusPegawai'); ?>',
                        type: 'POST',
                        data: {
                            id_pegawai: id_pegawai
                        },
                        dataType: "json",
                        success: function(response) {

                            if (response.sukses) {

                                swal.fire(
                                    'Berhasil',
                                    response.sukses,
                                    'success'
                                )

                                datapegawai();
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swal.fire(
                        'Batal Terhapus',
                        'Data Pegawai batal dihapus',
                        'error'
                    )
                }
            })

        });

        // Tambah data banyak
        $('.tambahBanyak').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('pegawai/formTambahBanyak'); ?>",
                dataType: "json",
                beforeSend: function() {
                    $('.viewdata').html('<i class="fa fa-spin fa-spinner"></i>')
                },
                success: function(response) {
                    $('.viewdata').html(response.data).show();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

    });
</script>

<?= $this->endSection(); ?>