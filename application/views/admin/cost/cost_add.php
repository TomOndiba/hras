<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($cost)) {
    $inputCode= $cost['cost_code'];  
    $inputName= $cost['cost_name'];    
} else {
    $inputCode = set_value('cost_code');  
    $inputName = set_value('cost_name');    
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($cost)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Cost Center</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-3">
                <?php if (isset($cost)): ?>
                    <input type="hidden" name="cost_id" value="<?php echo $cost['cost_id']; ?>" />
                <?php endif; ?>
                <label >Kode Cost Center *</label>
                <input name="cost_code" placeholder="Kode Cost Center" type="text" class="form-control" value="<?php echo $inputCode ?>"><br>
                <label >Nama Cost Center *</label>
                <input name="cost_name" placeholder="Nama Cost Center" type="text" class="form-control" value="<?php echo $inputName ?>"><br>
                
                
            </div> </div>           
            
            <div class="row">
            <div class="col-sm-6 col-md-3 col-xs-3">
            <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
            <a href="<?php echo site_url('admin/cost'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
            <?php if (isset($cost)): ?>
                <a href="<?php echo site_url('admin/cost/delete/' . $cost['cost_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
</div>
</div>

<?php if (isset($cost)): ?>
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
                <?php echo form_open('admin/cost/delete/' . $cost['cost_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $cost['cost_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $cost['cost_name'] ?>" />
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