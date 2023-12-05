<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengelolaan Data Peserta</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Form Ubah User -->
                <form action="<?= base_url('peserta/edit/' . $result['id_peserta']) ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                        <button class="btn btn-danger" type="reset">Batal</button>
                    </div>
                </form>
                <!--  -->
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>