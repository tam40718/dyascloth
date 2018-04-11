<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kategori Menu
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>Kategori Menu / Lihat</a></li>
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
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nomor</th>
                        <th>Nama Kategori Menu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $a=0; foreach ($r_kat as $rm) { $a++;?>
                      <tr>
                        <td><?php echo $a?></td>
                        <td><?php echo $rm['nama_kat'] ?></td>
                        <td><?php if ($rm['status']==1) {
                          ?><a class="btn btn-flat btn-success" href="<?php echo base_url('kat/stat/'.$rm['id_kat']) ?>">Aktif</a>
                        <?php } else {?>
                        <a class="btn btn-flat btn-danger" href="<?php echo base_url('kat/stat/'.$rm['id_kat']) ?>">Tidak Aktif</a>
                        <?php } ?></td>
                        <td><a href="<?php echo base_url('kat/form_ubah/'.$rm['id_kat']) ?>" class="btn btn-flat btn-default"><i class="fa fa-pencil"></i> Ubah</a><a href="<?php echo base_url('kat/hapus/'.$rm['id_kat']) ?>" onclick="return confirm('Anda yakin menghapus data?'); return false;" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i> hapus</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nomor</th>
                        <th>Nama Kategori Menu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
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