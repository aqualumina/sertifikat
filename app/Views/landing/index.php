<?= $this->extend('landing/template') ?>
<?= $this->section('content') ?>

<!-- <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <ul class="suggestions-lists m-0 p-0">
                              <li class="d-flex mb-4 align-items-center justify-content-between">
                                 <div class="col-sm-9 p-0">
                                    <div class="d-flex align-items-center">
                                       <div class="avatar-55 text-center rounded iq-bg-danger">
                                          <span>B5</span>
                                       </div>
                                       <div class="media-support-info ml-3">
                                          <h5>Loads</h5>
                                          <p class="mb-0">Online Participant</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-3 p-0">
                                    <div class="iq-progress-bar-linear d-inline-block mt-1 w-100">
                                       <div class="iq-progress-bar">
                                          <span class="bg-danger" data-percent="50" style="transition: width 2s ease 0s; width: 50%;"></span>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="d-flex align-items-center justify-content-between">
                                 <div class="col-sm-9 p-0">
                                    <div class="d-flex align-items-center">
                                       <div class="avatar-55 text-center rounded iq-bg-primary">
                                          <span>G2</span>
                                       </div>
                                       <div class="media-support-info ml-3">
                                          <h5>Requests</h5>
                                          <p class="mb-0">Offline Participant</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-3 p-0">
                                    <div class="iq-progress-bar-linear d-inline-block mt-1 w-100">
                                       <div class="iq-progress-bar">
                                          <span class="bg-primary" data-percent="80" style="transition: width 2s ease 0s; width: 80%;"></span>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div> -->
<div class="card mb-4">
        <div class="card-header">
          
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