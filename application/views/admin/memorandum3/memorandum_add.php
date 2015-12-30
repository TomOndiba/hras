<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($memorandum)) {
    $inputNumber= $memorandum['memorandum_number'];
    $inputDateSent = $memorandum['memorandum_date_sent'];
    $inputCallDate = $memorandum['memorandum_call_date'];
    $inputMemorandum2 = $memorandum['memorandum2_memorandum_id'];
} else {
    $inputNumber = set_value('memorandum_number');
    $inputDateSent = set_value('memorandum_date_sent');
    $inputCallDate = set_value('memorandum_call_date');
    $inputMemorandum1 = set_value('memorandum1_id');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($memorandum)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Surat Panggilan Ketiga</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($memorandum)): ?>
                    <input type="hidden" name="memorandum_id" value="<?php echo $memorandum['memorandum_id']; ?>" />
                <?php endif; ?>
                <label >Surat Panggilan Pertama *</label>
                <select name="memorandum1_id" class="form-control">
                    <?php foreach ($memorandum1 as $row): ?>
                    <option value="<?php echo $row['memorandum_id'] ?>"><?php echo $row['memorandum_number'] ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label >Tanggal Dikirim *</label>
                <input name="memorandum_date_sent" placeholder="Tanggal Dikirim" type="text" class="form-control datepicker" value="<?php echo $inputDateSent; ?>"><br>
                <label >Tanggal Panggilan *</label>
                <input name="memorandum_call_date" placeholder="Tanggal Panggilan" type="text" class="form-control datepicker" value="<?php echo $inputCallDate; ?>"><br>
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/memorandum3'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($memorandum)): ?>
                        <a href="<?php echo site_url('admin/memorandum3/delete/' . $memorandum['memorandum_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($memorandum)): ?>
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
                <?php echo form_open('admin/memorandum3/delete/' . $memorandum['memorandum_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $memorandum['memorandum_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $memorandum['memorandum_number'] ?>" />
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