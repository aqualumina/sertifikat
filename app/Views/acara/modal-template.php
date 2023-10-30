                            <!--MODAL UPLOAD TTD-->
                            <div class="modal small fade" id="template" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
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