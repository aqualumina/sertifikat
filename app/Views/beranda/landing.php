<?= $this->extend('layout-landing/template-landing') ?>
<?= $this->section('content') ?>

<main>
    <section class="bg-landing">
        <div class="container-landing">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body">
                    <form action="<?= base_url('/landing') ?>" method="post" style="text-align: center;">
                        <h2 class="cari-sertif pt-2" style="color: #13998A; font-weight:800;">CARI SERTIFIKAT</h2>
                        <br>

                        <div style="font-size:18px; font-weight: bold; width: 70%; margin: 0 auto;">
                            <p style="color: #13998A;">Ketik NIP Kemudian Tekan Tombol Cari</p>
                        </div><br>
                        <input type="text" placeholder="Ketikan NIP disini..." name="cari" id="certi" maxlength="100" class="form-control input-lg" style="width: 350px !important; display:inline-block; text-align: center;" required="">
                        <button type="submit" class="btn" style="background-color: #13998A; color:#FFFFFF"><i class="fa fa-search"></i><strong>C A R I</strong></button>
                        <button type="reset" class="btn btn-danger" onclick="resetInput()"><strong>R E S E T</strong></button>
                        <br>
                    </form>
                    <style>
                        .scroll {
                            height: 220px;
                            overflow: scroll;
                            overflow-x: hidden;
                        }
                    </style>

                    <!-- Tambahkan untuk menampilkan hasil pencarian -->
                    
                        <?php if (!empty($result)) : ?>
                            <div class="container-fluid">
                                <h3 style="color: #13998A;">Hasil Pencarian:</h3>
                                <div class="scroll">
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
                            </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
    </section>
</main>
<script>
    function resetInput() {
        document.getElementById("certi").value = '';
    }
</script>
<?= $this->endSection() ?>