<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Transaksi Menu
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>Transaksi Menu / Lihat</a></li>
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
                  <h3 class="box-title">Data Transaksi Menu </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Member</th>
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Ambil</th>
                        <th>Pembayaran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($r_transaksi as $rm) { ?>
                      <tr>
                        <td><?php echo $rm['id_pesan']?></td>
                        <td><?php echo $rm['nama'] ?></td>
                        <td><?php echo $rm['tgl_pesan'] ?></td>
                        <td><?php echo $rm['tgl_ambil'] ?></td>
                        <td><?php if ($rm['status_bayar']==0) {?>
                          <span class="badge bg-yellow">Belum Melakukan Pembayaran</span>
                        <?php } else if ($rm['status_bayar']==1 || $rm['status_bayar']==2){?>
                          <span class="badge bg-green">Pembayaran Lunas</span>
                        <?php }else if ($rm['status_bayar']==3){?>
                          <span class="badge bg-orange">Pembayaran DP</span>
                        <?php } else{ ?>
                          <span class="badge bg-red">Transaksi Batal</span> <?php } ?> </td>
                        <td><a href="<?php echo base_url('transaksi/form_ubah/'.$rm['id_pesan']) ?>" class="btn btn-flat btn-default"><i class="fa fa-pencil"></i> Detail</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Member</th>
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Ambil</th>
                        <th>Pembayaran</th>
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