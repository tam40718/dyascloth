<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Poin
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>Poin / Lihat</a></li>
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
                  <h3 class="box-title">Data Poin Aktif <?php if ($this->session->userdata('akses')==2) { ?>
                  <button onclick="mdl_req()" class="btn btn-flat btn-success"><i class="fa fa-send"> </i> Request</button><?php } ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Poin (%)</th>
                        <th>Tanggal Aktif</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($r_poin as $rm) { ?>
                      <tr>
                        <td><?php echo $rm['nama'] ?></td>
                        <td><?php echo $rm['persen'] ?></td>
                        <td><?php echo $rm['tgl'] ?></td>
                        <td><?php echo $rm['ket'] ?></td>
                        <td><button onclick="mdl_ubah()" class="btn btn-flat btn-default"><i class="fa fa-pencil"> </i> Ubah</button></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>User</th>
                        <th>Poin (%)</th>
                        <th>Tanggal Aktif</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Poin Request</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Poin (%)</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <?php if ($this->session->userdata('akses')!=2) { ?>
                        <th>Aksi</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($r_poin_r)) {
                        echo "<tr><td colspan='5'>Data poin request tidak ada ...</td></tr>";
                      }else{foreach ($r_poin_r as $rm) { 
                      ?>
                      <tr>
                        <td><?php echo $rm['nama'] ?></td>
                        <td><?php echo $rm['persen'] ?></td>
                        <td><?php echo $rm['tgl'] ?></td>
                        <td><?php echo $rm['ket'] ?></td>
                        <?php if ($this->session->userdata('akses')!=2) { ?>
                        <td><a href="<?php echo base_url('poin/stat/'.$rm['id_poin'].'/1'); ?>" class="btn btn-flat btn-success" onclick="return confirm('Yakin validasi data?'); return false;"><i class='fa fa-check'> Valid</i></a><a href="<?php echo base_url('poin/stat/'.$rm['id_poin'].'/0'); ?>" class="btn btn-flat btn-danger" onclick="return confirm('Yakin tolak data?'); return false;"><i class='fa fa-close'> Tolak</i></a></td>
                        <?php } ?>
                      </tr>
                      <?php }} ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>User</th>
                        <th>Poin (%)</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>

                        <?php if ($this->session->userdata('akses')!=2) { ?>
                        <th>Aksi</th>
                          <?php } ?>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Poin Lama</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Poin (%)</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($r_poin_o)) {
                        echo "<tr><td colspan='5'>Data poin lama tidak ada ...</td></tr>";
                      }else{foreach ($r_poin_o as $rm) { ?>
                      <tr>
                        <td><?php echo $rm['nama'] ?></td>
                        <td><?php echo $rm['persen'] ?></td>
                        <td><?php echo $rm['tgl'] ?></td>
                        <td><?php echo $rm['ket'] ?></td>
                        <td><a href="<?php echo base_url('poin/hapus/'.$rm['id_poin']) ?>" onclick="return confirm('Anda yakin menghapus data?'); return false;" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i> hapus</a></td>
                      </tr>
                      <?php }} ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>User</th>
                        <th>Poin (%)</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
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
<div class="modal fade" id="modal_request" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Request Poin</h4>
        </div>
        <div class="modal-body" style="overflow:auto;">
          <form action="<?php echo base_url('poin/req');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="col-xs-12">
          <div class="col-xs-4">
            <div class="form-group">
              Nilai poin (%)
            </div>
          </div>
          <div class="col-xs-8">
            <div class="form-group">
              <input type="text" name="persen" placeholder="Masukkan nilai poin" class="form-control">
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
              Keterangan
            </div>
          </div>
          <div class="col-xs-8">
            <div class="form-group">
              <textarea name="ket" class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="overflow:auto;">
              <div class="form-group">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
          </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Ubah Poin</h4>
        </div>
        <div class="modal-body" style="overflow:auto;">
          <form action="<?php echo base_url('poin/req');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="col-xs-12">
          <div class="col-xs-4">
            <div class="form-group">
              Nilai poin (%)
            </div>
          </div>
          <div class="col-xs-8">
            <div class="form-group">
              <input type="text" name="persen" id="persen" placeholder="Masukkan nilai poin" class="form-control">
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
              Keterangan
            </div>
          </div>
          <div class="col-xs-8">
            <div class="form-group">
              <textarea name="ket" id="ket" class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="overflow:auto;">
              <div class="form-group">
                  <button type="submit" class="btn btn-success" onclick="return confirm('Yakin ubah data poin?'); return false;">Simpan</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
          </div>
        </form>
      </div>
    </div>
</div>
<!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
      });

      function mdl_req(){
        $('#modal_request').modal('show');
            $('.modal').on('shown.bs.modal', function() {
              $(this).find('[autofocus]').focus();
            });
      }

      function mdl_ubah(){
        var a = '<?php echo $r_poin[0]['persen'] ?>';
        var b = '<?php echo $r_poin[0]['ket'] ?>';
        console.log(a+' : '+b);
        $('#modal_ubah').modal('show');
            $('.modal').on('shown.bs.modal', function() {
              $(this).find('[autofocus]').focus();
              document.getElementById('persen').value=a;
              document.getElementById('ket').value=b;
            });
      }
    </script>