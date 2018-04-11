<header class="main-header">

        <!-- Logo -->
        <a href="<?php echo base_url('welcome'); ?>" class="logo"><img src="<?php echo base_url(); ?>assets/img/logo.png" style='width: 30px'><b style="color: #222222"> AB-</b>Lientang</a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <?php 
                  if ($this->session->userdata('foto')) {
                    $gambar = base_url().'assets/img/user/'.$this->session->userdata('foto');
                  }else{
                    $gambar = base_url().'assets/dist/img/avatar5.png';
                  }
                  ?>
                  <img src="<?php echo $gambar ?>" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo $gambar; ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('nama'); ?>
                      <small><?php echo $this->session->userdata('email'); ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url('user/lp'); ?>" class="btn btn-default btn-flat"><i class="fa fa-user"></i>&nbspProfil</a>
                    </div>
                    <div class="pull-right">
                      <a onclick="logout();" class="btn btn-default btn-flat"><i class="fa fa-sign-out"> </i>&nbspKeluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <script type="text/javascript">
          var base_url = '<?php echo base_url() ?>';
            function logout() {
              var r = confirm('Anda ingin keluar?');
              if (r) {
                window.location.replace(base_url+'login/logout'); 
                // console.log('tt : '+base_url+'login/logout');
              }
            }
          </script>
        </nav>
      </header>