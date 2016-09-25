<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($bank)) {
    $inputName= $bank['bank_name'];    
} else {
    $inputName = set_value('bank_name');    
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="post-inherit">
        <?php if (!isset($bank)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> BANK</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-3">
                <?php if (isset($bank)): ?>
                    <input type="hidden" name="bank_id" value="<?php echo $bank['bank_id']; ?>" />
                <?php endif; ?>
                <label >Nama BANK *</label>
                <input name="bank_name" placeholder="Nama Bank" type="text" class="form-control" value="<?php echo $inputName ?>"><br>
                
                
            </div> </div>           
            
            <div class="row">
            <div class="col-sm-6 col-md-3 col-xs-3">
            <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
            <a href="<?php echo site_url('admin/bank'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
            <?php if (isset($bank)): ?>
                <a href="<?php echo site_url('admin/bank/delete/' . $bank['bank_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
</div>
</div>

<?php if (isset($bank)): ?>
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
                <?php echo form_open('admin/bank/delete/' . $bank['bank_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $bank['bank_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $bank['bank_name'] ?>" />
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