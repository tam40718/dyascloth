
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kategori Menu
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>Kategori Menu / Ubah</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Kategori Menu </h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" align="center">
              <?php 
                $attributes = array('class' => 'form-horizontal');
                echo form_open_multipart('kat/ubah',$attributes); ?>
                <input type="hidden" name="id_kat" value="<?php echo $r_kat[0]['id_kat'] ?>">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Nama Kategori:</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" required class="form-control" placeholder="Nama Kategori" value="<?php echo $r_kat[0]['nama_kat'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Status:</label>
                  <div class="col-sm-10">
                    <div class="col-sm-1"><input type="radio" name="stat" value="1" <?php if ($r_kat[0]['status']==1) { echo "checked";} ?>> Aktif</div>
                    <div class="col-sm-2"><input type="radio" name="stat" value="0" <?php if ($r_kat[0]['status']==0) { echo "checked";} ?>> Tidak Aktif</div>
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