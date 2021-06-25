<?= form_open('pegawai/simpanDataBanyak', ['class' => 'formSimpanBanyak']); ?>
<?= csrf_field(); ?>
<button type="button" class="btn btn-warning mb-3 kembali">Kembali</button>
<button type="submit" class="btn btn-primary mb-3 simpanBanyak">Simpan Data</button>
<div class="table-responsive">
    <table class="table table-bordered" id="datapegawai">
        <thead>
            <tr>
                <!-- <th class="text-center">No.</th> -->
                <th class="text-center">NIP</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Tgl Lahir</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="formTambah">
            <tr>
                <td>
                    <input type="text" name="nip[]" class="form-control">
                </td>

                <td>
                    <input type="text" name="nama[]" class="form-control">
                </td>

                <td>
                    <input type="text" name="tmp_lahir[]" class="form-control">
                </td>

                <td>
                    <input type="date" name="tgl_lahir[]" class="form-control">
                </td>

                <td>
                    <select name="jk[]" class="form-control">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>

                <td class="text-center">
                    <button type="button" class="btn btn-primary addForm">
                        <i class="fa fa-plus"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?= form_close(); ?>

<script>
    $(document).ready(function(e) {

        $('.formSimpanBanyak').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.simpanBanyak').attr('disable', 'disabled');
                    $('.simpanBanyak').html('<i class="fa fa-spin fa-spinner">');
                },
                complete: function() {
                    $('.simpanBanyak').removeAttr('disable');
                    $('.simpanBanyak').html('Simpan');
                },
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        }).then((result) => {
                            datapegawai();
                        })
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });


        $('.addForm').click(function(e) {
            e.preventDefault();

            $('.formTambah').append(`
                <tr>
                    <td>
                        <input type="text" name="nip[]" class="form-control" required>
                    </td>

                    <td>
                        <input type="text" name="nama[]" class="form-control" required>
                    </td>

                    <td>
                        <input type="text" name="tmp_lahir[]" class="form-control" required>
                    </td>

                    <td>
                        <input type="date" name="tgl_lahir[]" class="form-control" required>
                    </td>

                    <td>
                        <select name="jk[]" class="form-control" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </td>

                    <td class="text-center">
                        <button type="button" class="btn btn-danger hapusForm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `);
        });

        $('.kembali').click(function(e) {
            e.preventDefault();
            datapegawai();
        });

    });

    $(document).on('click', '.hapusForm', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
    });
</script>