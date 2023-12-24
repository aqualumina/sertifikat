<?php foreach ($result as $value) : ?>
    <div class="modal small fade" id="depan<?= $value['id_acara'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Silahkan Upload Background Depan</h5>
                </div>
                <div class="modal-body">
                    <form action="/acara/upload/<?= $value['id_acara'] ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <p class="error-text">
                            <input type="file" name="bgdepan" size="20" />
                        </p>
                        <button class="btn btn-danger btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button class="btn btn-primary btn" type="submit">
                            <i class="fa fa-save"></i>
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