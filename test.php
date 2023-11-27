<td class="center">
    <h5><?= $value['nama_acara'] ?></h5>
    <br>
    <b> <?= $value['tgl_acara_mulai'] ?> s/d <?= $value['tgl_acara_selesai'] ?></b>
    <table>
        <tr>
            <th>Dengan Link kegiatan : <b> links </b></th>
        </tr>
    </table>
    <br><br>

    <a href="#" data-toggle="modal">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-plus"></i>Upload Materi</button></a>
    <br><br>
    <table class="table table-bordered table-striped" border="1">
        <tr style="background-color: #7599fa;">
            <td>Materi</td>
            <td>Narasumber</td>
            <td>Jpl</td>
            <td>Tindakan</td>
        </tr>

        <tr style="background-color: #edf0f7;">
            <td><?= $value['materi'] ?></td>
            <td><?= $value['narasumber'] ?></td>
            <td><?= $value['jpl'] ?></td>
            <td class="center">
                <form action="<?= base_url('acara/' . $value['id_acara'])  ?>" method="post" class="d-inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" role="button" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
    </table>
</td>