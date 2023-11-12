<!-- <div class="modal small fade" id="modalpeserta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Silahkan Upload Peserta</h5>
            </div>
            <div class="modal-body">
            <form action="/acara/import" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
                <p class="error-text">
                    <input type="file" name="userfile" class="form-control" accept=".xls,.xlsx">
                    </div>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button class="btn btn-info btn-sm" type="submit">
                    <i class="ace-icon fa fa-floppy-o bigger-110"></i>
                    Upload
                </button>
            </div>
            </form>
        </div>
    </div>
</div> -->
<?php foreach ($result as $value) : ?>
<div class="modal fade" id="modalpeserta<?= $value['id_acara'] ?>" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data Excel <?= $value['id_acara'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/acara/import/<?= $value['id_acara'] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="excelFile">Pilih File Excel</label>
                        <input type="file" class="form-control-file" id="excelFile" name="formatpeserta" accept=".xls, .xlsx" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>