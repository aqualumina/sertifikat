<?php foreach ($result as $value) : ?>
    <div class="modal small fade" id="belakang<?= $value['id_acara'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $value['id_acara'] ?> Silahkan Upload Background Belakang</h5>
                </div>
                <div class="modal-body">
                    <form action="/acara/uploadbg/<?= $value['id_acara'] ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <p class="error-text">
                            <input type="file" name="bgbelakang" size="20" />
                        </p>
                        <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button class="btn btn-info btn-sm" type="submit">
                            <i class="ace-icon fa fa-floppy-o bigger-110"></i>
                            Upload
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>