<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="row mt-4">
    <div class="col-sm-12">
        <div>
            <th class="left" colspan="9">
                <form class="form-search" action="<?php echo site_url(); ?>c_acara/cari" method=POST>
                    <span class="input-icon" style="float : left">
                        <input name="cari" type="text" placeholder="Cari......." class="nav-search-input" id="nav-search-input" autocomplete="on" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                    <div class="widget-toolbar">
                        <span style="float: right">
                            <a href="<?php echo base_url(); ?>format/format_upload.xlsx"><button class="btn btn-xs btn-success" style="background-color: #13988A;" type="button">Download Format Exel</button></a>
                            <a href="<?php echo base_url(); ?>acara/create" data-toggle="modal"><button class="btn btn-xs btn-primary" type="button">
                                    <i class="ace-icon glyphicon glyphicon-plus bigger-110"></i>
                                    Tambah
                                </button></a>

                            <a href="/" class="btn btn-xs btn-warning" type="reset" data-action="collapse">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Kembali
                                </button></a>
                        </span>
                    </div>
        </div>
        </form>
        <hr>

        <div class="widget-box transparent">
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-striped">
                            <thead class="thin-border-bottom">
                                <tr>
                                    <th colspan="6">
                                        <h3 class="widget-title blue smaller">DAFTAR SERTIFIKAT</a></h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="center">No</th>
                                    <th class="center">Judul Acara</th>
                                    <th class="center">Penerima Sertifikat</th>
                                    <th class="center" colspan="4">Tindakan</th>
                                </tr>
                            </thead>


                    </div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
    </div>
    </p>
</div><!-- /.col -->

</div>

</div>
</div>
<?= $this->endSection() ?>