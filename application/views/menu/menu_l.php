<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Menu
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>Menu / Lihat</a></li>
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
                  <h3 class="box-title">Data Menu <?php if ($this->session->userdata('akses')!=3) { ?>
                    <a href="<?php echo base_url('menu/form_tambah') ?>" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Tambah</a></h3> <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode Menu</th>
                        <th>Kategori Menu</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($r_menu as $rm) { ?>
                      <tr>
                        <td><?php echo $rm['id_menu'] ?></td>
                        <td><?php foreach ($r_kat as $rk) {
                          if ($rm['id_kat']==$rk['id_kat']) {
                            echo $rk['nama_kat'];
                          }
                        } ?></td>
                        <td><?php echo $rm['nama'] ?></td>
                        <td><?php echo $rm['harga'] ?></td>
                        <td><?php if ($rm['status']==1) {
                          ?><a class="btn btn-flat btn-success" href="<?php echo base_url('menu/stat/'.$rm['id_menu']) ?>">Aktif</a>
                        <?php } else {?>
                        <a class="btn btn-flat btn-danger" href="<?php echo base_url('menu/stat/'.$rm['id_menu']) ?>">Tidak Aktif</a>
                        <?php } ?></td>
                        <td><a href="<?php echo base_url('menu/form_ubah/'.$rm['id_menu']) ?>" class="btn btn-flat btn-default"><i class="fa fa-pencil"></i> Detail</a>
                          <?php if ($this->session->userdata('akses')!=3) { ?>
                          <a href="<?php echo base_url('menu/hapus/'.$rm['id_menu']) ?>" onclick="return confirm('Anda yakin menghapus data?'); return false;" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i> hapus</a><?php } ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kode Menu</th>
                        <th>Kategori Menu</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
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