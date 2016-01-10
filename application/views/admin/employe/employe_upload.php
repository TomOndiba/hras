<section class="content-header">
	<h1><i class="fa fa-file-excel-o text-green"></i> Upload Data Karyawan</h1>
	
	<body>
		<div class="well"><?php echo form_open_multipart('admin/employe');?>
			<input type="file" id="file_upload" name="userfile" size="20" />
			<br />
			<input type="submit" value="Upload" />
			<?php echo form_close();?>
		</section>