<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Pengaturan</strong>
        </h3>
        <br>
        <!-- Indicates a successful or positive action -->
        <div class="col-md-8">

            <?php echo form_open_multipart(current_url()) ?>
            <div class="row">
                <div class="col-md-4">
                    <label>Nama Branch</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="setting_branch" value="<?php echo $setting_branch['setting_value'] ?>" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label>Inisial Branch</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="setting_initial" value="<?php echo $setting_initial['setting_value'] ?>" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label>Alamat Kantor</label>
                </div>
                <div class="col-md-8">
                    <input name="setting_address" type="text" value="<?php echo $setting_address['setting_value'] ?>" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label>Kota/Kab</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="setting_city" value="<?php echo $setting_city['setting_value'] ?>" class="form-control">
                </div>
            </div><br>            
            <div class="row">
                <div class="col-md-4">
                    <label>Nama PDM / GSM</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="setting_employe_name" value="<?php echo $setting_employe_name['setting_value'] ?>" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label>NIK PDM / GSM</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="setting_employe_nik" value="<?php echo $setting_employe_nik['setting_value'] ?>" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label>Jabatan PDM / GSM</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="setting_employe_position" value="<?php echo $setting_employe_position['setting_value'] ?>" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label>Nama PIC Personnel</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="setting_pic" value="<?php echo $setting_pic['setting_value'] ?>" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="Simpan" class="btn btn-info pull-right">
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
        <div class="col-md-4">
            <div class="alert alert-warning">
                Kolom tidak boleh kosong, Jika ingin di nonaktifkan silakan beri tanda ( - ) pada kolom yang tersedia.
            </div>
        </div>
    </div>
</div>