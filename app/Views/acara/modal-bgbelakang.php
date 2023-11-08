<div class="modal small fade" id="belakang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Silahkan Upload Background Belakang</h5>
            </div>
            <!-- < ?php echo form_open_multipart('c_acara/kirim_exel/' . $s->id_acara); ?> -->
            <div class="modal-body">
                <p class="error-text">
                    <input type="file" name="userfile" size="20" />
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>Cancel</button>
                <button class="btn btn-primary btn" type="submit">
                <i class="fa fa-save"></i>
                    Upload
                </button>
            </div>
        </div>
    </div>
</div>