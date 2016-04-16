<section class="content-header">
    <h1><i class="fa fa-file-excel-o text-green"></i> Upload Data Entitas BPJS Kesehatan</h1>

    <body><br>
    <h4>Petunjuk Singkat</h4>
            <p>Penginputan data karyawan bisa dilakukan melalui upload file excel. Format file excel harus sesuai kebutuhan aplikasi. Silahkan download formatnya <a href="<?=site_url('admin/bpjs/download');?>"><span class="label label-success">Disini</span></a>
            <br>
            <strong>CATATAN :</strong>
            <ol>
                <li>Pengisian data tanggal masuk pada kolom <strong>TANGGAL LAHIR</strong> diisi dengan format <strong>DD/MM/YYYY.</strong><br> Contoh : Jika tanggal lahirnya 10 Desember 1994 maka diisi dengan format :<strong> 10/12/1994</strong></li><br>
                <li>Pengisian data tanggal TMT Date pada kolom <strong>TMT DATE</strong> diisi dengan format <strong>DD/MM/YYYY.</strong><br> Contoh : Jika tanggal TMT Datenya 01 Juli 2015 maka diisi dengan format :<strong> 01/07/2015</strong></li>                  
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


