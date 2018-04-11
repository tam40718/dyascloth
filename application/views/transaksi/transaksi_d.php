
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Transaksi
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i>Transaksi / Detail</a></li>
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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Transaksi <?php if ($r_transaksi[0]['status_bayar']==0) {?>
                          <span class="badge bg-yellow">Belum Melakukan Pembayaran</span>
                        <?php } else if ($r_transaksi[0]['status_bayar']==1 || $r_transaksi[0]['status_bayar']==2){?>
                          <span class="badge bg-green">Pembayaran Lunas</span>
                        <?php } else if ($r_transaksi[0]['status_bayar']==0){ ?>
                          <span class="badge bg-orange">Pembayaran DP</span> 
                        <?php }else{ ?>
                          <span class="badge bg-red">Transaksi Batal</span> 
                          <?php } ?> </h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <?php 
                $attributes = array('class' => 'form-horizontal');
                echo form_open_multipart('transaksi/ubah',$attributes); ?>
                <input type="hidden" name="id_pesan" value="<?php echo $r_transaksi[0]['id_pesan'] ?>">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="id_pesan">ID Transaksi:</label>
                  <div class="col-sm-10">
                    <?php echo $r_transaksi[0]['id_pesan'] ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="nama_member">Nama Member :</label>
                  <div class="col-sm-10">
                    <?php echo $r_transaksi[0]['nama'] ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="nama_member">Tanggal Pesan :</label>
                  <div class="col-sm-10">
                    <?php echo $r_transaksi[0]['tgl_pesan'] ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="nama_member">Tanggal Kirim :</label>
                  <div class="col-sm-10">
                    <?php echo $r_transaksi[0]['tgl_ambil'] ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="nama_member">Tempat Kirim :</label>
                  <div class="col-sm-10">
                    <?php echo $r_transaksi[0]['tempat'] ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="nama_member">Keterangan :</label>
                  <div class="col-sm-10">
                    <?php echo $r_transaksi[0]['ket'] ?>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label class="control-label col-sm-2" for="judul">Status:</label>
                  <div class="col-sm-10">
                    <div class="col-sm-1"><input type="radio" name="stat" value="1" <?php if ($r_transaksi[0]['status']==1) { echo "checked";} ?>> Aktif</div>
                    <div class="col-sm-2"><input type="radio" name="stat" value="0" <?php if ($r_transaksi[0]['status']==0) { echo "checked";} ?>> Tidak Aktif</div>
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <div class="col-sm-10 pull-right">
                    <a href="#" class="btn btn-warning btn-flat" onclick="history.go(-1);"><i class="fa fa-reply"></i> Kembali</a>
                  </div>
                </div> -->
              </form>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          <div class="row">
            <div class="col-xs-12">
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Pembayaran Transaksi </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Jumlah</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $sub=0;
                foreach ($r_item as $ri) {
                  $sub+=($ri['jumlah']*$ri['harga']);
                  ?>
                  <tr>
                    <td><?php echo $ri['jumlah'] ?></td>
                    <td><?php echo $ri['nama'] ?></td>
                    <td><?php echo $ri['desk'] ?></td>
                    <td><?php echo $ri['harga'] ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
                <div class="box-header">
              <div class="col-xs-6"></div>
              <div class="col-xs-6">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><?php echo $sub ?></td>
                  </tr>
                  <tr>
                    <th>Biaya Pengiriman:</th>
                    <td><?php echo $r_transaksi[0]['ongkir'] ?></td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><?php echo $r_transaksi[0]['ongkir']+$sub ?></td>
                  </tr>
                </table>
              </div>
                </div><!-- /.box-header -->
            </div><!-- /.col -->
                </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div>
        <!-- /.col -->
      </div>
      <div class="row">
            <div class="col-xs-12">
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Transaksi Menu
                  <?php if ($r_transaksi[0]['status_bayar']==0 || $r_transaksi[0]['status_bayar']==3)  { 
                    if ($this->session->userdata('akses')!=3 || $this->session->userdata('akses')==2){?>
                  <button onclick="mdl_req()" class="btn btn-flat btn-success"><i class="fa fa-plus"> </i> Tambah</button>
                  <?php } }?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nomor</th>
                        <th>Tanggal Bayar</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <!-- <th>Foto</th> -->
                        <th>Validasi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach ($r_bayar as $rm) { $i++;?>
                      <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $rm['tgl'] ?></td>
                        <td><?php echo $rm['total'] ?></td>
                        <td><?php if ($rm['status_pembayaran']==1) {?>
                          Cash
                        <?php } else if ($rm['status_pembayaran']==2){?>
                          Transfer
                        <?php } else{ ?>
                          Poin<?php } ?> </td>
                        <!-- <td><?php
                          if ($rm['foto']!=0 && !is_null($rm['foto'])) {
                            $gambar = base_url().'assets/img/transfer/'.$rm['foto']; ?>
                            <a href="<?php echo $gambar ?>"><img class="profile-user-img img-responsive" src="<?php echo $gambar ?>" alt="Gambar Profil User"></a>
                          <?php }else{
                            $gambar = base_url().'assets/img/img_404.jpg'; ?>
                            <p align="center"><img class="profile-user-img img-responsive" src="<?php echo $gambar ?>" alt="Gambar Profil User"></p>
                          <?php } ?>
                          </td>  -->
                        <td><?php if ($rm['validasi']==0) {?>
                          <a href="<?php echo base_url('transaksi/stat/'.$rm['id_bayar'].'/1/'.$id_pesan); ?>" class="btn btn-flat btn-success" onclick="return confirm('Yakin validasi data?'); return false;"><i class='fa fa-check'> Valid</i></a><a href="<?php echo base_url('transaksi/stat/'.$rm['id_bayar'].'/2/'.$id_pesan); ?>" class="btn btn-flat btn-danger" onclick="return confirm('Yakin tolak data?'); return false;"><i class='fa fa-close'> Tolak</i></a>
                        <?php } else if ($rm['validasi']==1){?>
                          <span class="badge bg-green">Valid</span>
                        <?php } else{ ?>
                          <span class="badge bg-red">Ditolak</span><?php } ?> </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nomor</th>
                        <th>Tanggal Bayar</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <!-- <th>Foto</th> -->
                        <th>Validasi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>
        <!-- /.col -->
      </div>
        </section><!-- /.content -->
      </div>
      <div class="modal fade" id="modal_request" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Tambah Pembayaran</h4>
        </div>
        <div class="modal-body" style="overflow:auto;">
          <form action="<?php echo base_url('transaksi/bayar_tambah');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="col-xs-12">
          <div class="col-xs-4">
            <div class="form-group">
              Nominal
            </div>
          </div>
          <div class="col-xs-8">
            <div class="form-group">
              <input type="text" name="bayar" id="nominal" placeholder="Masukkan Nominal Pembayaran" class="form-control">
              <input type="hidden" name="id" value="<?php echo $id_pesan ?>">
              <input type="hidden" name="nbayar" value="<?php echo ($r_transaksi[0]['ongkir']+$sub)-$t_bayar ?>">
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
          <div class="col-xs-4">
            <div class="form-group">
              Pembayaran
            </div>
          </div>
          <div class="col-xs-8">
            <div class="form-group">
              <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="radio" id="optionsRadios1" value="1" checked>
                          Lunas
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="radio" id="optionsRadios2" value="2">
                          DP
                        </label>
                      </div>
                    </div>
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
      <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
      });

      function mdl_req(){
        var a = '<?php echo ($r_transaksi[0]['ongkir']+$sub)-$t_bayar ?>';
        $('#modal_request').modal('show');
            $('.modal').on('shown.bs.modal', function() {
              $(this).find('[autofocus]').focus();
              document.getElementById('nominal').value=a;
            });
      }
    </script>