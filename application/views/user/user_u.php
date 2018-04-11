
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>User / Ubah</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah User </h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" align="center">
              <?php 
                $attributes = array('class' => 'form-horizontal');
                echo form_open_multipart('user/ubah',$attributes); ?>
                <input type="hidden" name="id_user" value="<?php echo $r_user[0]['id_user'] ?>">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Nama User:</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" required class="form-control" placeholder="Nama User" value="<?php echo $r_user[0]['nama'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Hak Akses:</label>
                  <div class="col-sm-10">
                    <select name="akses" class="form-control" required>
                      <?php foreach ($r_akses as $rk) { ?>
                        <option value="<?php echo $rk['id_akses'] ?>" <?php if ($r_user[0]['id_akses']==$rk['id_akses']) {echo "selected";} ?>><?php echo $rk['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Nomor KTP:</label>
                  <div class="col-sm-10">
                    <input type="text" name="ktp" maxlength="16" required class="form-control" placeholder="Nomor KTP" value="<?php echo $r_user[0]['ktp'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Nomor Telepon:</label>
                  <div class="col-sm-10">
                    <input type="text" name="telpon" maxlength="12" required class="form-control" placeholder="Nomor Telepon" value="<?php echo $r_user[0]['telpon'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Email:</label>
                  <div class="col-sm-10">
                    <input type="Email" name="email" required class="form-control" placeholder="Email" value="<?php echo $r_user[0]['email'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Alamat:</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" placeholder="Alamat" required><?php echo $r_user[0]['alamat'] ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Gambar:</label>
                  <div class="col-sm-10">
                    <div class="form-group" align="left">
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
                          <input type="file" name="userfile">
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
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10 pull-right">
                    <a href="#" class="btn btn-warning btn-flat" onclick="history.go(-1);"><i class="fa fa-reply"></i> Kembali</a>
                    <button class="btn btn-success btn-flat" type="submit" ><i class="fa fa-save"></i> Simpan</button>
                  </div>
                </div>
              </form>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>