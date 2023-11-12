<form class="form-search" action="<?php echo base_url(); ?>sertifikat/cari_peserta" method=POST>
    <span class="input-icon">
        <input type="text" name="id_acara" value="<?php echo $id_acara; ?>" hidden>
        <input name="cari" type="text" placeholder="Cari......." class="nav-search-input" id="nav-search-input" autocomplete="on" />
        <i class="ace-icon fa fa-search nav-search-icon"></i>
        <button class="btn btn-info btn-sm" type="submit">
            <i class="ace-icon fa fa-search nav-search-icon bigger-110"></i>
            CARI
        </button>
    </span>
</form>
<div class="widget-toolbar">
    <a href="<?php echo base_url(); ?>c_acara/download_verifikasi_word/<?php echo $id_acara; ?>" data-toggle="modal"><button class="btn btn-xs btn-success" type="button">
            <i class="ace-icon glyphicon glyphicon-file bigger-110"></i>
            Export Word & QR Code
        </button></a>
    <a href="<?php echo base_url(); ?>c_acara/download_verifikasi/<?php echo $id_acara; ?>" data-toggle="modal"><button class="btn btn-xs btn-primary" type="button">
            <i class="ace-icon glyphicon glyphicon-file bigger-110"></i>
            Export exel
        </button></a>
    <a href="javascript:history.back()" class="btn btn-xs btn-warning" type="reset" data-action="collapse">
        <i class="ace-icon fa fa-undo bigger-110"></i>
        Kembali
        </button></a>
</div>


<br>
<hr>
<?php echo '<div class="pesan">' . $this->session->flashdata('message') . '</div>'; ?>
<form action="<?php echo base_url('c_acara/render_all'); ?>" method="post">
    <input type="text" id="form-field-1" placeholder="Auto" class="col-xs-10 col-sm-2" name="action" value="aksi" hidden />
    <!--Pilihan  Generate QR CODE atau Kirim sts_pesan-->
    <div class="row">
        <div class="col-md-12">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <tr>
                    <td>
                        Silahkan beri tanda check box dibawah untuk memilih aksi <br>
                        <input type="radio" name="filter" value="1"> <b>GENERATE QR CODE SERTIFIKAT</b><br>
                        <input type="radio" name="filter" value="2"> <b>KIRIM SERTIFIKAT (WHATSAPP)</b><br>
                        <input type="radio" name="filter" value="3"> <b>KIRIM SERTIFIKAT (EMAIL)</b><br>
                        <?php echo '<input class="btn btn-xs btn-warning" type="submit" name="submit" value="PROSES PILIHAN" onclick="return confirm(\'Apakah anda yakin akan memproses pilihan  ini  ?\')">' ?>
                </tr>
            </table>
        </div>

    </div>
    <hr>
    <h3>DATA PESERTA TERVERIFIKASI</h3>
    <div class="box-body table-responsive no-padding">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <tr>
                <th class="center">No</th>
                <th class="center" width="3">Pilih</th>
                <th class="center">Profil</th>
                <th class="center">Email</th>
                <th class="center">No Handphone</th>
                <th class="center">QRCODE</th>
                <th class="center">Tindakan</th>
            </tr>
            <tbody>
                <?php $no = $num + 1;
                foreach ($daftar_hadir as $s) { ?>


                    <tr>
                        <td class="center"><?php echo $no; ?></td>
                        <?php
                        echo '<td class="center">
		                    <label class="pos-rel">
		          	        <input type="checkbox" name="msg[]" value="' . $s->id_tamu . '" class="ace" checked />
			                   <span class="lbl"></span>
		                     </label>
	                        </td>'; ?>
                        <input type="text" name="id_acara" value="<?php echo $s->id_acara; ?>" required placeholder="" hidden>
                        <td>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <tr>
                                    <td width="20%">Nama</td>
                                    <td><?php echo $s->nama; ?></td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td><?php echo $s->nip; ?></td>
                                </tr>
                                <tr>
                                    <td>Unit</td>
                                    <td><?php echo $s->unit_kerja; ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td><?php echo $s->jabatan; ?></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td><?php echo $s->kategori; ?></td>
                                </tr>
                                <tr>
                                    <td>Judul</td>
                                    <td><?php echo $s->judul; ?></td>
                                </tr>
                                <tr>
                                    <td>Sertifikat Cetak</td>
                                    <td><a href="<?php echo base_url(); ?>verify/v/<?php echo $s->unik; ?>/<?php echo $s->id_acara; ?>" target="_blank"><span class="label label-success">DOWNLOAD VERSI CETAK</span></a><br>
                                </tr>
                                <tr>
                                    <td><a href="#ubah_<?php echo $s->id_tamu; ?>" data-toggle="modal"><button class="btn btn-info btn-sm" type="">UBAH DATA</button></a></td>
                                    <td><a href="#" data-toggle="modal"><button class="btn btn-success btn-sm" type="">GENERATE KODE</button></a> <?php echo $s->unik; ?></td>
                                </tr>
                            </table>
                        </td>
            </tbody>
        </table>
</form>


<div class="modal small fade" id="ubah_<?php echo $s->id_tamu; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sx">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 id="myModalLabel">
                    <center>UBAH DATA </center>
                </h5>

            </div>
            <!-- <div class="modal-body">
                <p class="error-text">
                    <?php echo form_open_multipart('sertifikat/ubah/' . $s->id_tamu . '/' . $s->id_acara); ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="text" class="form-control" name="nama" required placeholder="Nama Lengkap" value="<?php echo $s->nama; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw  fa-building-o"></i></span>
                        <input type="text" class="form-control" name="nip" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="NIP" value="<?php echo $s->nip; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-bank"></i></span>
                        <input type="text" class="form-control" name="unit_kerja" required placeholder="Unit Kerja" value="<?php echo $s->unit_kerja; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-briefcase"></i></span>
                        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="<?php echo $s->jabatan; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-building"></i></span>
                        <input type="text" class="form-control" name="kategori" placeholder="Kategori" value="<?php echo $s->kategori; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-building"></i></span>
                        <textarea class="textarea" id="editor1" placeholder="Judul Karya" name="judul" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $s->judul; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Alamat Email" value="<?php echo $s->email; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-phone-square"></i></span>
                        <input type="text" class="form-control" name="no_hp" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Nomor WhatsApp" value="<?php echo $s->no_hp; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Lampiran Sertifikat (.pdf)</label>
                    <input type="file" name="userfile" accept=".pdf"></input>
                    <p class="help-block">Lampirkan file scan Sertifikat format pdf</p>
                </div>

                </p>
            </div> -->
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button class="btn btn-info btn-sm" type="submit">
                    <i class="ace-icon fa fa-floppy-o bigger-110"></i>
                    Simpan
                </button>

            </div>
            </form>
        </div>
    </div>


    </td>

    <td><?php echo $s->email; ?></td>
    <td><?php echo $s->no_hp; ?></td>
    <td>
        <?php if ($s->unik != NULL) {; ?>
            <a href="<?php echo base_url(); ?>verify/v/<?php echo $s->unik; ?>/<?php echo $s->id_acara; ?>" target="_blank"><img src="<?php echo site_url(); ?>c_qrcode/index_besar/<?php echo $s->unik; ?>"></a>
        <?php } ?>
    </td>
    <?php echo '
	<td class="center"><a class="blue" href="' . base_url() . 'sertifikat/hapus_peserta/' . $s->id_acara . '/' . $s->id_tamu . '" onclick="return confirm(\'Anda yakin menghapus ' . $s->nama . ' dari daftar ?\')"  ><i class="fa fa-fw fa-trash-o"></i></a></td>
	'; ?>
    </tr>

<?php $no++;
                } ?>
</tbody>
</table>
</div>