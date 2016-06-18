<section class="content-header">
    <h1><i class="fa fa-file-excel-o text-green"></i> Upload Data Surat Disnaker</h1>

    <body><br>
    <h4>Petunjuk Singkat</h4>
            <p>Penginputan data karyawan bisa dilakukan melalui upload file excel. Format file excel harus sesuai kebutuhan aplikasi. Silahkan download formatnya <a href="<?=site_url('admin/disn/download');?>"><span class="label label-success">Disini</span></a>
            <br>
            <strong>CATATAN :</strong>
            <ol>
                <li>Pengisian data tanggal masuk pada kolom <strong>TANGGAL MASUK</strong> diisi dengan format <strong>DD/MM/YYYY.</strong><br> Contoh : Jika tanggal masuknya 21 September 2012 maka diisi dengan format :<strong> 21/09/2012</strong></li><br>
                <li>Pengisian data tanggal masuk pada kolom <strong>TANGGAL KELUAR</strong> diisi dengan format <strong>DD/MM/YYYY.</strong><br> Contoh : Jika tanggal keluarnya 15 Juni 2016 maka diisi dengan format :<strong> 15/06/2016</strong></li>                  
            </ol>
            </p>
        </div>
        <br>
        <div class="form-body">
            <?php echo form_open_multipart(current_url()) ?>
            <div class="form-group"> 
                <label class="col-md-3 control-label">Pilih File Excel (.xls)</label>
                <div class="col-md-9">
                    <input type="file" name="file" required>
                    <input type="hidden" name="upload" value="ok" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" name="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-upload"></i> Upload</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
</section>


