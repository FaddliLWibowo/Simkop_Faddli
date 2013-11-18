
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
		$('#tanggal_pengangkatan_cpns').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_sk_pangkat').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_mulai_pangkat').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_selesai_pangkat').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_sk_jabatan').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_mulai_jabatan').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_selesai_jabatan').datepicker({dateFormat: 'dd MM yy'});
		$('#tmt_eselon').datepicker({dateFormat: 'dd MM yy'});
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
	
	<?php echo form_open_multipart('master_pegawai_koperasi/simpan','class="form-horizontal"'); ?>
	
       
        
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
			<label class="control-label" for="nip">NIP</label>
			<div class="controls">
				<input type="text" class="span6" name="nip" id="nip" value="<?php echo set_value('nip'); ?>" placeholder="NIP">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama_lengkap">Nama Lengkap</label>
			<div class="controls">
				<input type="text" class="span6" name="nama_lengkap" id="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>" placeholder="Nama Lengkap"></div>
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
			
			  <input type="text" class="span6" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" placeholder="Tanggal Lahir ex:12-10-1992">
			
			</div>
		  </div>	
		  <div class="control-group">
			<label class="control-label" for="no_telp">No. Telp / HP</label>
			<div class="controls">
			
			  <input type="text" class="span6" name="no_telp" id="no_telp" value="<?php echo set_value('no_telp'); ?>" placeholder="No. Telp / HP">
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="alamat_lengkap">Alamat Lengkap</label>
			<div class="controls">
			
			  <textarea class="span6" style="outline:none; resize:none;" name="alamat_lengkap" id="alamat_lengkap" placeholder= "Alamat"><?php echo set_value('alamat_lengkap'); ?></textarea>
			
			</div>
		  </div>
		 <div class="control-group">
		  <label class="control-label" for="id_jabatan">Jabatan</label>
			<div class="controls">
				<select data-placeholder="Jabatan" class="chzn-select" style="width:500px;" tabindex="2" name="id_jabatan" id="id_jabatan">
					<option value=""></option>
			  			<?php
			  				foreach($jabatan->result_array() as $mj)
			  			{
			  				if($id_jabatan==$mj['id_jabatan'])
			  			{
			  	?>
			  		<option value="<?php echo $mj['id_jabatan']; ?>" selected="selected"><?php echo $mj['nama_jabatan']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $mj['id_jabatan']; ?>"><?php echo $mj['nama_jabatan']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>

				</select>
			</div>
		 </div>
		  <div class="control-group">
			<label class="control-label" for="alamat_pekerjaan">Alamat Pekerjaan</label>
			<div class="controls">
			
				<textarea class="span6" style="outline:none; resize:none;" name="alamat_pekerjaan" id="alamat_pekerjaan" placeholder= "Alamat"><?php echo set_value('alamat_pekerjaan'); ?></textarea>
			
			</div>
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
