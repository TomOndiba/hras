<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($disn)) {
    $inputNumber = $disn['disn_number'];    
    $inputEmployeNik = $disn['disn_nik'];
    $inputEmployeName = $disn['disn_name'];
    $inputEmployePos = $disn['disn_position'];
    $inputEntry = $disn['disn_entry_date'];
    $inputEnd = $disn['disn_end_date'];
} else {
    $inputNumber = set_value('disn_number');          
    $inputEmployeNik = set_value('disn_nik');
    $inputEmployeName = set_value('disn_name');
    $inputEmployePos = set_value('disn_position');
    $inputEntry = set_value('disn_entry_date');
    $inputEnd = set_value('disn_end_date');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="post-inherit">
        <?php if (!isset($disn)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Surat Keterangan Disnaker</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($disn)): ?>
                    <input type="hidden" name="disn_id" value="<?php echo $disn['disn_id']; ?>" />
                <?php endif; ?>
                <label >NIK Karyawan *</label>
                <input name="disn_nik" placeholder="NIK" type="text" class="form-control" value="<?php echo $inputEmployeNik; ?>">
                <br>
                <label >Nama Karyawan *</label>
                <input name="disn_name" placeholder="Nama" type="text" class="form-control" style="text-transform:uppercase" value="<?php echo $inputEmployeName; ?>">
                <br>
                <label >Jabatan *</label>
                <input name="disn_position" placeholder="Jabatan" type="text" class="form-control" style="text-transform:capitalize" value="<?php echo $inputEmployePos; ?>">
                <br>
                <label >Tanggal Masuk Karyawan *</label>
                <input name="disn_entry_date" placeholder="Tanggal Masuk" type="text" class="form-control datepicker" value="<?php echo $inputEntry; ?>">
                <br>
                <label >Tanggal Keluar Karyawan *</label>
                <input name="disn_end_date" placeholder="Tanggal Keluar" type="text" class="form-control datepicker" value="<?php echo $inputEnd; ?>">
                <br>                
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/disn'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($disn)): ?>
                        <a href="<?php echo site_url('admin/disn/delete/' . $disn['disn_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($disn)): ?>
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
                <?php echo form_open('admin/disn/delete/' . $disn['disn_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $disn['disn_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $disn['disn_number'] ?>" />
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