
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kategori Menu
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>Kategori Menu / Tambah</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kategori Menu </h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" align="center">
              <?php 
                $attributes = array('class' => 'form-horizontal');
                echo form_open_multipart('kat/tambah',$attributes); ?>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Nama Kategori:</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" required class="form-control" placeholder="Nama Kategori">
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