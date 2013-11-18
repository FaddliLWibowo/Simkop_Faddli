
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_lengkap.' - '.$instansi; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
  
    <script src="<?php echo base_url(); ?>asset/js/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
  <script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
  <script>
      $(document).ready(function(){
        //Examples of how to assign the ColorBox event to elements
        $(".medium-box").colorbox({rel:'group', iframe:true, width:"90%", height:"90%"});
  
      });
  </script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url(); ?>"><?php echo $judul_pendek; ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i> Master <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>dashboard_admin"><i class="icon-question-sign"></i>Master Anggota</a></li>
                  <li><a href="<?php echo base_url(); ?>master_pegawai_koperasi"><i class="icon-tag"></i>Master Pegawai</a></li>
                  <li><a href="<?php echo base_url(); ?>master_jabatan_koperasi"><i class="icon-question-sign"></i> Master Jabatan</a></li>
                  
                </ul>
              </li>
        
               <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-tasks icon-white"></i> Laporan <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>anggota/cetak_anggota"><i class="icon-tag"></i> Laporan Daftar Anggota</a></li>
                  <li><a href="<?php echo base_url(); ?>anggota/cetak_anggota_bayar"><i class="icon-ok-sign"></i> Laporan Pembayaran Wajib Anggota</a></li>
                </ul>
              </li>
            </ul>
            </ul>
            <div class="btn-group pull-right">
        <button class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('nama'); ?></button>
        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
        <li><a href="<?php echo base_url(); ?>app/change_password"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
        <li><a href="<?php echo base_url(); ?>manage_user"><i class="icon-tasks"></i> Manajemen User</a></li>
        <li><a href="<?php echo base_url(); ?>app/logout"><i class="icon-off"></i> Log Out</a></li>
        </ul>
      </div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
	
	<div class="well">
	  <div class="row">
		<div class="span">
		  <h3><?php echo $judul_lengkap.' '.$instansi; ?></h3>
		  <p><?php echo $alamat; ?></p>
		</div>
	  </div>
	</div>
	

