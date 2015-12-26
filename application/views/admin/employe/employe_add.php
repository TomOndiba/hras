<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($employe)) {
    $inputName= $employe['employe_name'];
    $inputPhone= $employe['employe_phone'];
    $inputAddress = $employe['employe_address'];
    $inputDivisi = $employe['employe_divisi'];
    $inputPosition = $employe['employe_position'];
    $inputDepartement = $employe['employe_departement'];
    $inputRegister = $employe['employe_date_register'];
    $inputStatus = $employe['employe_is_active'];
} else {
    $inputName = set_value('employe_name');
    $inputPhone = set_value('employe_phone');
    $inputAddress = set_value('employe_address');
    $inputDivisi = set_value('employe_divisi');
    $inputPosition = set_value('employe_position');
    $inputDepartement = set_value('employe_departement');
    $inputRegister = set_value('employe_date_register');
    $inputStatus = set_value('employe_is_active');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($employe)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Karyawan</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($employe)): ?>
                    <input type="hidden" name="employe_id" value="<?php echo $employe['employe_id']; ?>" />
                <?php else: ?>
                <label >NIK *</label>
                <input name="employe_nik" placeholder="NIK Karyawan" type="text" class="form-control" value="<?php echo set_value('employe_nik'); ?>"><br>
                <?php endif; ?>
                <label >Nama Karyawan *</label>
                <input name="employe_name" placeholder="Nama Karyawan" type="text" class="form-control" value="<?php echo $inputName; ?>"><br>
                <label >Jabatan *</label>
                <input name="employe_position" placeholder="Jabatan" type="text" class="form-control" value="<?php echo $inputPosition; ?>"><br>
                <label >Departement *</label>
                <input name="employe_departement" placeholder="Departement" type="text" class="form-control" value="<?php echo $inputDepartement; ?>"><br>
                <label >Divisi *</label>
                <input name="employe_divisi" placeholder="Divisi" type="text" class="form-control" value="<?php echo $inputDivisi; ?>"><br>
                <label >No. Telepon *</label>
                <input name="employe_phone" placeholder="No. telepon" type="text" class="form-control" value="<?php echo $inputPhone; ?>"><br>                           
                <label >Tanggal Bekerja *</label>
                <input name="employe_date_register" placeholder="Tanggal Bekerja" type="text" class="datepicker form-control" value="<?php echo $inputRegister; ?>"><br>
                <label >Alamat *</label>
                <textarea name="employe_address" rows="5" class="form-control"><?php echo $inputAddress; ?></textarea><br/>
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <label>Status</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="employe_is_active" value="0" <?php echo ($inputStatus == 0) ? 'checked' : ''; ?>> Non-Aktif
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="employe_is_active" value="1" <?php echo ($inputStatus == 1) ? 'checked' : ''; ?>> Aktif
                        </label>
                    </div>
                    <br>
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/employe'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($employe)): ?>
                        <a href="<?php echo site_url('admin/employe/delete/' . $employe['employe_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($employe)): ?>
    <!-- Delete Confirmation -->
    <div class="modal fade" id="confirm-del">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><b><span class="fa fa-warning"></span> Konfirmasi Penghapusan</b></h4>
                </div>
                <div class="modal-body">
                    <p>Data yang dipilih akan dihapus oleh sistem, apakah anda yakin?;</p>
                </div>
                <?php echo form_open('admin/employe/delete/' . $employe['employe_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $employe['employe_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $employe['employe_name'] ?>" />
                    <button type="submit" class="btn btn-danger"> Ya</button>
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php if ($this->session->flashdata('delete')) { ?>
        <script type="text/javascript">
            $(window).load(function() {
                $('#confirm-del').modal('show');
            });
        </script>
    <?php }
    ?>
<?php endif; ?>