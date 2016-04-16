<section class="content-header">
    <h1><i class="fa fa-file-excel-o text-green"></i> Upload Data Karyawan</h1>

    <body>
        <div class="form-body">
            <?php echo form_open_multipart(current_url()) ?>
            <div class="form-group"> 
                <label class="col-md-3 control-label">Pilih File Excel</label>
                <div class="col-md-9">
                    <input type="file" name="file" required>
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


