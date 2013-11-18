
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
	<style>
		body{
			margin:20px;
			padding:0px;
			}
	</style>
	
    <script src="<?php echo base_url(); ?>asset/js/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tab.js"></script>
	<link href="<?php echo base_url(); ?>asset/css/chosen.css" rel="stylesheet" type="text/css">
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/sunny/jquery-ui.css" type="text/css" rel="stylesheet"/>	
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.ui.i18n.all.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$.datepicker.setDefaults($.datepicker.regional['id']);
		$('#tanggal_lahir').datepicker({dateFormat: 'dd MM yy'});
		});
	</script>
  </head>
  	 <div class="container">
	
	<div class="well">
	  <div class="row">
		<div class="span">
		  <h3><?php echo $judul_lengkap.' '.$instansi; ?></h3>
		  <p><?php echo $alamat; ?></p>
		</div>
	  </div>
	</div>
  <body>
	<div class="well">
	
	<?php echo form_open_multipart('anggota/simpan','class="form-horizontal"'); ?>
	
       
        
    </ul>
    <?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="dtpegawai">
                
        <div class="control-group">
			<label class="control-label" for="nip">No BA</label>
			<div class="controls">
				<input type="text" class="span6" name="no_ba" id="no_ba" value="<?php echo set_value('no_ba'); ?>" placeholder="No BA">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nip_lama">Nama Lengkap</label>
			<div class="controls">
				<input type="text" class="span6" name="nama_lengkap" id="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>" placeholder="Nama Lengkap"></div>
			</div>
		</div>	
		<div class="control-group">
			<label class="control-label" for="nip_lama">No. KTP</label>
			<div class="controls">
				<input type="text" class="span6" name="no_ktp" id="no_ktp" value="<?php echo set_value('no_ktp'); ?>" placeholder="Nama Lengkap"></div>
			</div>
		</div>	
		  		  <div class="control-group">
			<label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
			<div class="controls">
				<select data-placeholder="Jenis Kelamin" class="chzn-select" style="width:500px;" tabindex="2" name="jenis_kelamin" id="jenis_kelamin">
					
          			<option value="" </option>
          			<option value="Laki-Laki" >Laki-Laki</option>
          			<option value="Perempuan" >Perempuan</option>
				</select>
			</div>
		  </div>
		  
		 
		  <div class="control-group">
			<label class="control-label" for="tempat_lahir">Tempat Lahir</label>
			<div class="controls">
			
			  <input type="text" class="span6" name="tempat_lahir" id="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" placeholder="Tempat Lahir">
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="tanggal_lahir">Tanggal Lahir</label>
			<div class="controls">
			
			  <input type="text" class="span6" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" placeholder="Tanggal Lahir ex:12-10-1992">
			
			</div>
		  </div>	
		  <div class="control-group">
			<label class="control-label" for="no_telp">No. Telp / HP</label>
			<div class="controls">
			
			  <input type="text" class="span6" name="no_telp" id="no_telp" value="<?php echo set_value('no_telp'); ?>" placeholder="No. Telp / HP">
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="alamat">Alamat Lengkap</label>
			<div class="controls">
			
				<textarea class="span6" style="outline:none; resize:none;" name="alamat" id="alamat" placeholder= "Alamat"><?php echo set_value('alamat'); ?></textarea>
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="lingkungan">Lingkungan (Kring) / Stasi</label>
			<div class="controls">
			
			  <input type="text" class="span6" name="lingkungan" id="lingkungan" value="<?php echo set_value('lingkungan'); ?>" placeholder="Lingkungan (Kring) / Stasi">
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="pekerjaan">Pekerjaan</label>
			<div class="controls">
			
			  <input type="text" class="span6" name="pekerjaan" id="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>" placeholder=
			  "Pekerjaan">
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="alamat_pekerjaan">Alamat Pekerjaan</label>
			<div class="controls">
			
				<textarea class="span6" style="outline:none; resize:none;" name="alamat_pekerjaan" id="alamat_pekerjaan" placeholder= "Alamat"><?php echo set_value('alamat_pekerjaan'); ?></textarea>
			
			</div>
		  </div>
       	  <div class="control-group">
			<label class="control-label" for="nama_suamiisteri">Nama Suami / Isteri</label>
			<div class="controls">
			
				<input type="text" class="span6" name="nama_suamiisteri" id="nama_suamiisteri" value="<?php echo set_value('nama_suamiisteri'); ?>" placeholder=
			  "Nama Suami / Isteri">
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="orang_tua">Orang Tua</label>
			<div class="controls">
			
				<input type="text" class="span6" name="orang_tua" id="orang_tua" value="<?php echo set_value('orang_tua'); ?>" placeholder=
			  "Orang Tua">
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="uang_pangkal">Uang Pangkal (Non Saham)</label>
			<div class="controls">
				
				<input type="text" class="span6" name="uang_pangkal" id="uang_pangkal" value="<?php echo set_value('uang_pangkal'); ?>" placeholder="Rp. 40.000,-"></div>
			</div>
		
		 <div class="control-group">
			<label class="control-label" for="simpanan_wajib">Simpanan Wajib (Simpanan Tiap Bulan)</label>
			<div class="controls">
				<input type="text" class="span6" name="simpanan_wajib" id="simpanan_wajib" value="<?php echo set_value('simpanan_wajib'); ?>" placeholder="Rp. 20.000,-"></div>
			</div>
		
		 <div class="control-group">
			<label class="control-label" for="simpanan_pokok">Simpanan Pokok</label>
			<div class="controls">
				<input type="text" class="span6" name="simpanan_pokok" id="simpanan_pokok" value="<?php echo set_value('simpanan_pokok'); ?>" placeholder="Rp. 200.000,-"></div>
			</div>
			
		<div class="control-group">
			<label class="control-label" for="iuran_sumbangan">Iuran Sumbangan Wajib Duka Anggota</label>
			<div class="controls">
				<input type="text" class="span6" name="iuran_sumbangan" id="iuran_sumbangan" value="<?php echo set_value('iuran_sumbangan'); ?>" placeholder="Rp. 50.000,-"></div>
			</div>
		
		<div class="control-group">
			<label class="control-label" for="simpanan_sukarela">Simpanan Sukarela (Minimal Rp. 1000,-) </label>
			<div class="controls">
				<input type="text" class="span6" name="simpanan_sukarela" id="simpanan_sukarela" value="<?php echo set_value('simpanan_sukarela'); ?>" placeholder="Rp. 50.000,-"></div>
			</div>
		

		  
	
	
		  <div class="control-group">
			<div class="controls">
			  <button type="submit" class="btn btn-primary">Simpan Data</button>
			  <button type="reset" class="btn">Hapus Data</button>
			</div>
		  </div>
		  
		  
		 
		  <input type="hidden" name="frame" value="frame">
		  <script src="http://localhost/sgmc/asset/js/chosen.jquery.js" type="text/javascript"></script>
			<script type="text/javascript"> 
				$(".chzn-select").chosen();
			</script>

		<?php echo form_close(); ?>

	</div>    
	
  </body>
</html>
