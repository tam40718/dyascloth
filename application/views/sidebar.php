<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image"><?php 
                  if ($this->session->userdata('foto')) {
                    $gambar = base_url().'assets/img/user/'.$this->session->userdata('foto');
                  }else{
                    $gambar = base_url().'assets/dist/img/avatar5.png';
                  }
                  ?>
              <img src="<?php echo $gambar?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nama'); ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
          <?php if ($this->session->userdata('akses')==1) { ?>
            <li class="header">Admin</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview <?php if ($aktif=='transaksi') { echo "active";} ?>">
              <a href="<?php echo base_url('transaksi') ?>"><span class="fa fa-bar-chart-o">&nbspTransaksi</span></a>
            </li>
            <!-- <li class="treeview <?php if ($aktif=='pembayaran') { echo "active";} ?>">
              <a href="<?php echo base_url('pembayaran') ?>"><span class="fa fa-money">&nbspPembayaran</span></a>
            </li> -->
            <li class="treeview <?php if ($aktif=='menu') { echo "active";} ?>">
              <a href="#"><span class="fa fa-cutlery">&nbspMenu</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('menu') ?>"><i class="fa fa-circle-o"></i> Kelola menu</a></li>
                <li><a href="<?php echo base_url('kat') ?>"><i class="fa fa-circle-o"></i> Kelola kategori menu</a></li>
              </ul>
            </li>
            <li class="treeview <?php if ($aktif=='user') { echo "active";} ?>">
              <a href="<?php echo base_url('user') ?>"><span class="fa fa-user">&nbspUser</span></a>
            </li>
            <li class="treeview <?php if ($aktif=='member') { echo "active";} ?>">
              <a href="<?php echo base_url('member') ?>"><span class="fa fa-users">&nbspMember</span></a>
            </li>
            <li class="treeview <?php if ($aktif=='poin') { echo "active";} ?>">
              <a href="<?php echo base_url('poin') ?>"><span class="fa fa-ticket">&nbspPoin</span></a>
            </li>
            <?php }else if ($this->session->userdata('akses')==3) {?>
            <li class="header">Manajer</li>
            <li class="treeview <?php if ($aktif=='transaksi') { echo "active";} ?>">
              <a href="<?php echo base_url('transaksi') ?>"><span class="fa fa-bar-chart-o">&nbspTransaksi</span></a>
            </li>
            <li class="treeview <?php if ($aktif=='menu') { echo "active";} ?>">
              <a href="<?php echo base_url('menu') ?>"><span class="fa fa-cutlery">&nbspMenu</span></a>
            </li>
            <li class="treeview <?php if ($aktif=='user') { echo "active";} ?>">
              <a href="<?php echo base_url('user') ?>"><span class="fa fa-users">&nbspUser</span></a>
            </li>
            <li class="treeview <?php if ($aktif=='member') { echo "active";} ?>">
              <a href="<?php echo base_url('member') ?>"><span class="fa fa-users">&nbspMember</span></a>
            </li>
            <li class="treeview <?php if ($aktif=='poin') { echo "active";} ?>">
              <a href="<?php echo base_url('poin') ?>"><span class="fa fa-ticket">&nbspPoin</span></a>
            </li>
            <?php }else{ ?>
            <li class="header">Kasir</li>
            <li class="treeview <?php if ($aktif=='transaksi') { echo "active";} ?>">
              <a href="<?php echo base_url('transaksi') ?>"><span class="fa fa-bar-chart-o">&nbspTransaksi</span></a>
            </li>
            <li class="treeview <?php if ($aktif=='menu') { echo "active";} ?>">
              <a href="<?php echo base_url('transaksi') ?>"><span class="fa fa-cutlery">&nbspMenu</span></a>
            </li>
            <li class="treeview <?php if ($aktif=='member') { echo "active";} ?>">
              <a href="<?php echo base_url('transaksi') ?>"><span class="fa fa-users">&nbspMember</span></a>
            </li>
            <li class="treeview <?php if ($aktif=='poin') { echo "active";} ?>">
              <a href="<?php echo base_url('poin') ?>"><span class="fa fa-ticket">&nbspPoin</span></a>
            </li>
            <?php } ?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>