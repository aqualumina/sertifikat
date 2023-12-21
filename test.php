<div class="card mb-4">
    <div class="card-header">
        <?= $title ?>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="thin-border-bottom mt-1">
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>NIP</th>
                <th>Nama Acara</th>
                <th>Aksi</th>
            </tr>
        </thead>


        <tbody>
            <?php $no = 1;
            foreach ($result as $value) : ?>
                <tr>
                    <td><?= $no++  ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['nip']  ?></td>
                    <td><?= $value['nama_acara']  ?></td>
                    <td>
                        <a class="btn btn-primary" href="#" role="button">Download</a>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>