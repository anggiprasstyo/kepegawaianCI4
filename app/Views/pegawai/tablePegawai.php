<?= form_open('pegawai/hapusBanyak', ['class' => 'hapusBanyak']) ?>
<?= csrf_field(); ?>
<button type="submit" class="btn btn-danger mb-3">
    <i class="fa fa-trash-o"> Hapus Banyak</i>
</button>
<div class="table-responsive">
    <table class="table table-striped" id="datapegawai">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="centangSemua">
                </th>
                <th class="text-center">No.</th>
                <th class="text-center">NIP</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Tgl Lahir</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($getPegawai as $row) :
                $no++;
            ?>
                <tr>
                    <td>
                        <input type="checkbox" name="id_pegawai[]" class="centangId" value="<?= $row['id_pegawai']; ?>">
                    </td>
                    <td class="text-center"><?= $no; ?></td>
                    <td class="text-center"><?= $row['nip']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td class="text-center"><?= $row['tmp_lahir']; ?></td>
                    <td class="text-center"><?= $row['tgl_lahir']; ?></td>
                    <td class="text-center"><?= $row['jk']; ?></td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <button data-id="<?= $row['id_pegawai']; ?>" class="btn btn-info btn-sm btn_edit"><i class="fa fa-edit"></i> Ubah</button>
                            <button data-id="<?= $row['id_pegawai']; ?>" class="btn btn-danger btn-sm btn_hapus"><i class="fa fa-trash-o"></i> Hapus</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= form_close(); ?>
</div>


<script>
    $(document).ready(function() {
        $('#datapegawai').DataTable();

        $('#centangSemua').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangId').prop('checked', true);
            } else {
                $('.centangId').prop('checked', false);
            }
        });

        // Hapus Data Banyak
        $('.hapusBanyak').submit(function(e) {
            e.preventDefault();
            let jmlData = $('.centangId:checked');

            if (jmlData.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Terhapus!',
                    text: 'Silahkan pilih data yang akan dihapus.',
                })
            } else {

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: `${jmlData.length} Data Pegawai akan dihapus`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus data!',
                    cancelButtonText: 'Batal!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            data: $(this).serialize(),
                            dataType: "json",
                            success: function(response) {
                                if (response.sukses) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.sukses,
                                    })
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
                            `${jmlData.length} Data Pegawai batal dihapus`,
                            'error'
                        )
                    }
                })
            }

        });

    });
</script>