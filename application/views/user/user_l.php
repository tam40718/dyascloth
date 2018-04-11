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
                  <h3 class="box-title">Data User <?php if ($this->session->userdata('akses')!=3) { ?>
                  <a href="<?php echo base_url('user/form_tambah') ?>" class="btn btn-flat btn-success"><i class="fa fa-plus"></i> Tambah</a><?php } ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Hak Akses</th>
                        <th>Nama User</th>
                        <th>Nomor KTP</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($r_user as $rm) { ?>
                      <tr>
                        <td><?php foreach ($r_akses as $rk) {
                          if ($rm['id_akses']==$rk['id_akses']) {
                            echo $rk['nama'];
                          }
                        } ?></td>
                        <td><?php echo $rm['nama'] ?></td>
                        <td><?php echo $rm['ktp'] ?></td>
                        <td><?php echo $rm['telpon'] ?></td>
                        <td><?php echo $rm['alamat'] ?></td>
                        <td><a href="<?php echo base_url('user/form_ubah/'.$rm['id_user']) ?>" class="btn btn-flat btn-default"><i class="fa fa-pencil"></i> Detail</a><a href="<?php echo base_url('user/hapus/'.$rm['id_user']) ?>" onclick="return confirm('Anda yakin menghapus data?'); return false;" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i> hapus</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Hak Akses</th>
                        <th>Nama User</th>
                        <th>Nomor KTP</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
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