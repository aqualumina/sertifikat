<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penyelenggara</li>
        </ol>
    </nav>
    <!-- Start Flash Data -->
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
    <!-- End Flash Data -->
    <div class="card mb-4">
        <div class="card-header">
            <?= $title ?>
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3 float-right" type="button" href="<?= base_url('penyelenggara/create') ?>">Tambah Penyelenggara</a>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Penyelenggara</th>
                        <th>Nama Penandatangan</th>
                        <th>NIP</th>
                        <th>Tanda Tangan</th>
                        <th>Cap</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($result as $value) : ?>
                        <tr>
                            <td><?= $no++  ?></td>
                            <td><?= $value['nama_penyelenggara'] ?></td>
                            <td><?= $value['nama_ttd']  ?></td>
                            <td><?= $value['nip_ttd']  ?></td>
                            <td>
                                <img src="images/ttd/<?= $value['ttd'] ?>" alt="" width="100">
                            </td>
                            <td>
                                <img src="images/cap/<?= $value['cap'] ?>" alt="" width="100">
                            </td>
                            <td>
                                <a class="btn btn-warning" href="<?= base_url('penyelenggara/edit/' . $value['id_penyelenggara'])  ?>" role="button">Edit</a>
                                <form action="<?= base_url('penyelenggara/' . $value['id_penyelenggara'])  ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" role="button" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?= $this->endSection() ?>