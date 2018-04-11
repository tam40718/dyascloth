<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pemesanan
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>Pemesanan / Lihat Menu</a></li>
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
          ';} if ($this->session->flashdata('gagal')) { echo '
            <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Gagal!</strong> '.$this->session->flashdata('gagal').'
          </div>
          ';}?>
          <script type="text/javascript">
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 5000);
          </script>
          <!-- Default box -->
          <div class="row">
            <div class="col-xs-12">
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kategori Menu <a href="<?php echo base_url('kat/form_tambah') ?>" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Tambah</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
            <div class="row">
              <?php foreach ($r_menu as $m){ ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><img src="<?php echo base_url().'assets/img/menu/'.$m['gambar'] ?>" style="width: 70px;height: 70px"></span>
                <div class="info-box-content">
                  <span class="info-box-text"><?php echo $m['nama'] ?></span>
                  <span class="info-box-number"><?php echo $m['harga'] ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                  <input type="hidden" name="id[]" value="<?php echo $m['id_menu'] ?>">
                    <div class="col-lg-8">
                      <textarea name="ket[]" class="form-control" placeholder="Catatan"></textarea>
                    </div>
                    <div class="col-lg-4">
                      <input type="text" name="jml[]" value="0" class="form-control">
                    </div>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
              <?php }?>
              </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
        </section><!-- /.content -->
      </div>
<!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
      });
    </script>