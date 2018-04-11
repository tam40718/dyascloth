<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>AB-Lientang Apps</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/img/logo.png"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url().'assets/'; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url().'assets/'; ?>plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url().'assets/'; ?>plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url().'assets/'; ?>plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url().'assets/'; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- file input -->
    <link href="<?php echo base_url().'assets/'; ?>plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url().'assets/'; ?>bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url().'assets/'; ?>dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'assets/'; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="<?php echo base_url().'assets/'; ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- daterange picker -->
    <link href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the 
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |  
  |---------------------------------------------------------|
  
  -->
  <body class="skin-yellow">
    <!-- Bootstrap ckeditor -->
    <script src="<?php echo base_url().'assets/'; ?>plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url().'assets/'; ?>plugins/jQuery/jQuery-3.1.1.min.js"></script>
    <!-- bootstrap-fileinput -->
    <script src="<?php echo base_url().'assets/'; ?>plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url().'assets/'; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url().'assets/'; ?>plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/'; ?>plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <div class="wrapper">

      <!-- Main Header -->
      <?php $this->load->view("header"); ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php $this->load->view("sidebar"); ?>

      <!-- Content Wrapper. Contains page content -->
      <?php $this->load->view($main); ?>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?php $this->load->view("footer"); ?>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/'; ?>dist/js/app.min.js" type="text/javascript"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->
  </body>
</html>