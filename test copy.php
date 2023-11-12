<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/acara">Acara</a></li>
            <li class="breadcrumb-item active" aria-current="page">Peserta</li>
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role/Group</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($result as $value) : ?>
                        <tr>
                            <td><?= $no++  ?></td>
                            <td><?= $value['firstname'] ?></td>
                            <td><?= $value['lastname']  ?></td>
                            <td><?= $value['user_name']  ?></td>
                            <td><?= $value['user_email']  ?></td>
                            <td><?= $value['role']  ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?= base_url('users/edit/' . $value['id'])  ?>" role="button">Edit</a>
                                <form action="<?= base_url('users/' . $value['id'])  ?>" method="post" class="d-inline">
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