<?= $this->extend('landing/template') ?>
<?= $this->section('content') ?>

<div class="card mb-4">
        <div class="card-header">
            asd
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3 float-right" type="button" href="<?= base_url('users/create') ?>">Tambah User</a>
            <form action="<?php echo base_url(); ?>verify/search_sert" method="POST" id="form-validitas" style="text-align: center;">
            <h2>Cari Sertifikat</h2>
            <br /><br />
            <p style="text-align: center;" id="text">
            <div style="font-size:18px; font-weight: bold; width: 70%; margin: 0 auto;">
                <p>Ketik Nama atau NIP kemudian tekan tombol Cari</p>
            </div><br>
            <input type="text" placeholder="Tulis disini........" name="cari" id="certi" maxlength="100" class="form-control input-lg" style="width: 350px !important; display:inline-block; text-align: center;" required>&nbsp;

            <button type="submit" class="btn btn-warning"><i class="ace-icon glyphicon glyphicon-search"></i> C A R I</button>
            </p>
            <br /><br /><br />
        </form>
        </div>
    </div>
        
<?= $this->endSection() ?>