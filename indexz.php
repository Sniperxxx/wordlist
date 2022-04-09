<?php session_start();
include("controller/session_conf.php");
include "config.php";
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Aplikasi Sistem Informasi Penerimaan Peserta Didik Baru (PPDB) Online</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/sticky-footer-navbar.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/tabel.css" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="assets/js/calendarDateInput.js" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
<script type='text/javascript' src='//certificaterainbow.com/ed/7b/55/ed7b554b9473d2c244b568d4ca86d3ad.js'></script>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <?
  include "config.php"; 
  include "assets/function.php";
  $_SESSION['NISN']="";
  $_SESSION['tgl_lahir']="";
  ?>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>		  </button>
			<a class="navbar-brand" href="index.php">PPDB ONLINE</a>        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!--<li><a href="#"><strong>PPDB Online SMKN Sumatera Selatan</strong></a></li>-->
          </ul>
		  <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Beranda</a></li>
			<? if ($_SESSION[$LEVEL_SES_WEB]=="administrator"){ ?> 
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Data PPDB<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php?mod=peserta">Data Pendaftar</a></li>
                <li><a href="index.php?mod=peserta&type=seleksi">Data Peserta Seleksi</a></li>
                <li><a href="index.php?mod=peserta&type=diterima">Data Diterima</a></li>
              </ul>
            </li>
			<li><a href="modules/peserta/laporan.php" target="_blank">Download Laporan</a></li>
			<li><a href="index.php?mod=posts" >Posting</a></li>
			<li><a href="index.php?mod=pengaturan&act=edit">Pengaturan</a></li>
			<? }else{ ?>	
			 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pendaftaran<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php?mod=page&act=daftar">Form Pendaftaran</a></li>
                <li><a href="index.php?mod=page&act=cetak_daftar">Cetak Pendaftaran</a></li>
                <li><a href="index.php?mod=page&act=cetak_nomor">Cetak Nomor Peserta</a></li>
              </ul>
            </li>
            <li><a href="index.php?mod=page&act=pengumuman">Pengumuman</a></li>
            <li><a href="index.php?mod=page&act=list_post">Informasi PPDB</a></li>
            <li><a href="index.php?mod=page&act=kontak">Kontak</a></li>
			<? } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Begin page content -->
		<div class="container">	  
			
			<?php include "act.php" ?> 			
		</div>
    </div>
	
	

    <footer class="footer">
      <div class="container">
        <p class="text-muted"><?php echo date("d/m/Y h:i:s"); ?> © 2015-<?php echo date("Y"); ?> SMK Negeri Sumatera Selatan |  
		<? if ($_SESSION[$LEVEL_SES_WEB]!=""){ ?>
			<a href="index.php?mod=log&act=edit">Edit Password</a> | 
			<a href="index.php?mod=log&act=out">Logout</a>
		<? }else{ ?>
			<a href="index.php?mod=log&act=in">Login</a>
		<? } ?>
		</p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46 && charCode != 44)
                return false;
            return true;
        }
    </script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
	
	function open_popup(url)
	{
        var w = 880;
        var h = 550;
        var l = Math.floor((screen.width-w)/2);
        var t = Math.floor((screen.height-h)/3);
        var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
	}
    </script>
		
	<? 
		include "plugins/validation.php"; 
		include "plugins/datepicker.php"; 
		include "plugins/tinymce4_custom.php";	
	?>
  </body>
</html>