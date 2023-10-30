<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengelolaan Data Kegiatan</li>
    </ol>
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
            <form class="form-search" method=POST>
                <span style="float: right">
                    <a href="<?php echo base_url(); ?>format/format_upload.xlsx"><button class="btn btn-xs btn-success" style="background-color: #13988A;" type="button">Download Format Exel</button></a>
                    <a class="btn btn-primary" type="button" href="/acara/create">Tambah</a>
                    <a href="/" class="btn btn-xs btn-warning" type="reset" data-action="collapse">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Kembali
                        </button></a>
                </span>
            </form>
        </div>
        <table class="table table-bordered table-striped mt-3">
            <thead class="thin-border-bottom mt-1">
                <tr>
                    <th class="center">No</th>
                    <th class="center">Judul Acara</th>
                    <th class="center">Penerima Sertifikat</th>
                    <th class="center" colspan="4">Tindakan</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="center">1</td>
                    <td class="center">
                        <h6>DAFTAR SERTIFIKAT</a></h3>
                            <b> 08:00 s.d 10:00 </b>
                            <table>
                                <tr>
                                    <th>Dengan Link kegiatan : <b> links </b></th>
                                </tr>
                            </table>
                            <hr>
                            Keterangan : ket
                            <hr>

                            <a href="#" data-toggle="modal">
                                <button type="submit" class="btn btn-sm btn-primary" style="border-radius: 50px; background-color: #171ad4; color: #ffffff; border: none;"><i class="ace-icon glyphicon glyphicon-plus"></i> Upload
                                    Materi</button></a>
                            <br><br>
                            <table class="table table-bordered table-striped" border="1">
                                <tr style="background-color: #7599fa;">
                                    <td>No</td>
                                    <td>Materi</td>
                                    <td>Narasumber</td>
                                    <td>Jpl</td>
                                    <td>File</td>
                                    <td>Tindakan</td>
                                </tr>
                                <tr style="background-color: #edf0f7;">
                                    <td>1</td>
                                    <td>tes</td>
                                    <td>aldi taher</td>
                                    <td>3</td>
                                    <td>sertifikat</td>
                                    <td class="center">
                                        <a href="/" class="btn btn-xs btn-danger" type="reset" data-action="collapse">
                                            <i class="ion-trash-b"></i>
                                            Hapus
                                            </button></a>
                                    </td>
                                </tr>
                            </table>
                    </td>

                    <td class="center">
                        <center><b>
                                <a class="blue" href="#">
                                    <span class="badge badge-warning">0</a></span></b></center>
                    </td>

                    <td class="center">
                        <table id="simple-table" class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>Upload Peserta</td>
                                <td><a href="#peserta" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Background Depan</td>
                                <td><a href="#depan" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Background Belakang</td>
                                <td><a href="#belakang" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Stample</td>
                                <td><a href="#stample" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Tanda Tangan</td>
                                <td><a href="#ttd" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Template</td>
                                <td><a href="#template" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                </td>
                            </tr>

                            

                            <!--MODAL UPLOAD BG DEPAN-->
                            <div class="modal small fade" id="depan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h5 id="myModalLabel">
                                                <center>Perhatian !<br>Silahkan Upload Background Depan
                                                </center>
                                            </h5>
                                        </div>
                                        <!-- < ?php echo form_open_multipart('c_acara/kirim_exel/' . $s->id_acara); ?> -->
                                        <div class="modal-body">
                                            <p class="error-text">
                                                <input type="file" name="userfile" size="20" />
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                            <button class="btn btn-info btn-sm" type="submit">
                                                <i class="ace-icon fa fa-floppy-o bigger-110"></i>
                                                Upload
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--MODAL UPLOAD BG bELAKANG-->
                            <div class="modal small fade" id="belakang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h5 id="myModalLabel">
                                                <center>Perhatian !<br>Silahkan Upload Background
                                                    Belakang</center>
                                            </h5>
                                        </div>
                                        <!-- < ?php echo form_open_multipart('c_acara/kirim_exel/' . $s->id_acara); ?> -->
                                        <div class="modal-body">
                                            <p class="error-text">
                                                <input type="file" name="userfile" size="20" />
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                            <button class="btn btn-info btn-sm" type="submit">
                                                <i class="ace-icon fa fa-floppy-o bigger-110"></i>
                                                Upload
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--MODAL UPLOAD Stample-->
                            <div class="modal small fade" id="stample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h5 id="myModalLabel">
                                                <center>Perhatian !<br>Silahkan Upload Stample</center>
                                            </h5>
                                        </div>
                                        <!-- < ?php echo form_open_multipart('c_acara/kirim_exel/' . $s->id_acara); ?> -->
                                        <div class="modal-body">
                                            <p class="error-text">
                                                <input type="file" name="userfile" size="20" />
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                            <button class="btn btn-info btn-sm" type="submit">
                                                <i class="ace-icon fa fa-floppy-o bigger-110"></i>
                                                Upload
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--MODAL UPLOAD TTD-->
                            <div class="modal small fade" id="ttd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h5 id="myModalLabel">
                                                <center>Perhatian !<br>Silahkan Upload Tanda Tangan
                                                </center>
                                            </h5>
                                        </div>
                                        <!-- < ?php echo form_open_multipart('c_acara/kirim_exel/' . $s->id_acara); ?> -->
                                        <div class="modal-body">
                                            <p class="error-text">
                                                <input type="file" name="userfile" size="20" />
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                            <button class="btn btn-info btn-sm" type="submit">
                                                <i class="ace-icon fa fa-floppy-o bigger-110"></i>
                                                Upload
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--MODAL UPLOAD TTD-->
                            <div class="modal small fade" id="template" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h5 id="myModalLabel">
                                                <center>Perhatian !<br>Silahkan Upload Template</center>
                                            </h5>
                                        </div>
                                        <!-- < ?php echo form_open_multipart('c_acara/kirim_exel/' . $s->id_acara); ?> -->
                                        <div class="modal-body">
                                            <p class="error-text">
                                                <input type="file" name="userfile" size="20" />
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                            <button class="btn btn-info btn-sm" type="submit">
                                                <i class="ace-icon fa fa-floppy-o bigger-110"></i>
                                                Upload
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
<?= $this->include('acara/modal-peserta') ?>
<?= $this->endSection() ?>