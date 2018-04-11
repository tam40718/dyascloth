<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>User / Lihat</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Alert -->
          <?php if ($this->session->flashdata('berhasil')) { echo '
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Berhasil!</strong> '.$this->session->flashdata('berhasil').'
          </div>
          ';}else if ($this->session->flashdata('gagal')) { echo '
            <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Gagal!</strong> '.$this->session->flashdata('gagal').'
          </div>
          ';}else{echo "";} ?>
          <script type="text/javascript">
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 4000);
          </script>
          <!-- Default box -->
          <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php 
              if ($user[0]['foto']) {
                $gambar = base_url().'assets/img/user/'.$user[0]['foto'];
              }else{
                $gambar = base_url().'assets/dist/img/avatar5.png';
              }
              ?>
              <p align="center"><img class="profile-user-img img-responsive img-circle" src="<?php echo $gambar ?>" alt="Gambar Profil User"></p>

              <h3 class="profile-username text-center"><?php echo $user[0]['nama'] ?></h3>

              <p class="text-muted text-center"><?php echo $akses[0]['nama'] ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Info Personal</a></li>
              <li><a href="#timeline" data-toggle="tab">Ubah Foto</a></li>
              <li><a href="#settings" data-toggle="tab">Ubah Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('user/user_ubah_nama') ?>">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" required name="nama" placeholder="Nama" value="<?php echo $user[0]['nama'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">No. KTP</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" required name="ktp" placeholder="No. KTP" value="<?php echo $user[0]['ktp'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">No. Telepon</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" required name="telpon" placeholder="No. Telepon" value="<?php echo $user[0]['telpon'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" required name="email" placeholder="Email" value="<?php echo $user[0]['email'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" required name="alamat" placeholder="Alamat"><?php echo $user[0]['alamat'] ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
                </form>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <form enctype="multipart/form-data" action="<?php echo base_url('user/ubah_foto') ?>" method='post' role="form">
                <!-- <?php echo form_open_multipart('user/ubah_foto') ?> -->
                          <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Tidak+ada+gambar" alt=""/>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 215px; max-height: 215px;">
                              </div>
                              <div>
                                <span class="btn btn-flat btn-default btn-file">
                                <span class="fileinput-new">
                                Pilih gambar </span>
                                <span class="fileinput-exists">
                                Ubah </span>
                                <input type="file" name="userfile" required>
                                </span>
                                <a href="#" class="btn btn-flat btn-danger fileinput-exists" data-dismiss="fileinput">
                                Hapus </a>
                              </div>
                            </div>
                            <div class="clearfix margin-top-10">
                              <span class="label label-danger">NB! </span>
                              <i> File maksimal 2MB </i>
                            </div>
                          </div>
                          <div class="margin-top-10">
                            <button type="submit" class="btn btn-flat btn-success"><i class="fa fa-save"></i> Simpan</button>
                          </div>
                        </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="<?php echo base_url('user/user_ubah_pass') ?>" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password Sekarang</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" required name="c_pass" placeholder="Password Sekarang">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Password Baru</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" minlength="8" required id="n_pass" name="n_pass" placeholder="Password Baru">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Ulangi Password</label>

                    <div class="col-sm-10" id="du_pass">
                      <input type="password" class="form-control" minlength="8" required id="u_pass" name="u_pass" onkeyup="npas()" placeholder="Ulangi Password">
                      <label class="control-label" for="inputSuccess" id="scp" style="display: none;"><i class="fa fa-check label-success"></i> Password cocok</label>
                      <label class="control-label" for="inputError" id="erp" style="display: none;"><i class="fa fa-times-circle-o label-danger"></i> Password tidak cocok</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" id="spass" class="btn btn-flat btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
                  <script type="text/javascript">
                    // $(document).ready(function(){
                      function npas() {
                        var np = $("#n_pass").val();
                        var up = $("#u_pass").val();
                        if (up==np) {
                          document.getElementById('scp').removeAttribute('style');
                          document.getElementById('spass').removeAttribute('disabled');
                          $("#du_pass").attr('class','col-sm-10 has-success');
                          $("#erp").attr('style','display: none;');
                          // console.log('benar');
                        }else{
                          document.getElementById('erp').removeAttribute('style');
                          $("#du_pass").attr('class','col-sm-10 has-error');
                          $("#scp").attr('style','display: none;');
                          $("#spass").attr('disabled','disabled');
                          // console.log('salah');
                        }
                      }
                    // });
                  </script>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
        </section><!-- /.content -->
      </div>
