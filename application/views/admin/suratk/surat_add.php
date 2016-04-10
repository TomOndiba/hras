<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($surat)) {
    $inputNumber = $surat['sk_number'];
    $inputDescription = $surat['sk_description'];
    $inputSkDate = $surat['sk_date'];    
    $inputEmployeNik = $surat['sk_employe_nik'];
    $inputEmployeName = $surat['sk_employe_name'];
    $inputEmployePos = $surat['sk_employe_position'];
    $inputEmployeReg = $surat['sk_employe_date_register'];
} else {
    $inputNumber = set_value('sk_number');
    $inputDescription = set_value('sk_description');
    $inputSkDate = set_value('sk_date'); 
    $inputSkSt = set_value('sk_status');       
    $inputEmployeNik = set_value('employe_nik');
    $inputEmployeName = set_value('employe_name');
    $inputEmployePos = set_value('employe_position');
    $inputEmployeReg = set_value('employe_date_register');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($surat)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Surat Keterangan</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($surat)): ?>
                    <input type="hidden" name="sk_id" value="<?php echo $surat['sk_id']; ?>" />
                <?php endif; ?>
                <label >Karyawan *</label>
                <input name="employe_nik" id="field_id" type="hidden" class="form-control"  value="<?php echo $inputEmployeNik ?>">
                <input name="employe_name" id="field_name" type="hidden" class="form-control"  value="<?php echo $inputEmployeName ?>">
                <input name="employe_position" id="field_pos" type="hidden" class="form-control"  value="<?php echo $inputEmployePos ?>">
                <input name="employe_date_register" id="field_date" type="hidden" class="form-control"  value="<?php echo $inputEmployeReg ?>">
                <input id="field" type="text" class="form-control" placeholder="Ketik NIK atau Nama karyawan.." value="<?php echo (isset($surat)) ? $surat['sk_employe_name'] : '' ?>">
                <br>
                <label >Tanggal Surat *</label>
                <input name="sk_date" placeholder="Tanggal Surat" type="text" class="form-control datepicker" value="<?php echo $inputSkDate; ?>"><br>
                <label >Status Karyawan *</label>
                <select name="sk_status" class="form-control">                
                <option value="tetap">Tetap</option>
                <option value="kontrak">Kontrak</option>                
                </select><br> 
                <label >Keterangan Untuk *</label>
                <input name="sk_description" placeholder="Keterangan" type="text" class="form-control" value="<?php echo $inputDescription; ?>"><br>                
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/suratk'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($surat)): ?>
                        <a href="<?php echo site_url('admin/suratk/delete/' . $surat['sk_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($surat)): ?>
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
                <?php echo form_open('admin/suratk/delete/' . $surat['sk_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $surat['sk_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $surat['sk_number'] ?>" />
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

<script>
    $(function() {

        var employe_list = [
<?php foreach ($employe as $row): ?>
                {
                    "id": "<?php echo $row['employe_position'] ?>",
                    "value": "<?php echo $row['employe_name'] ?>",
                    "label": "<?php echo $row['employe_name'] ?>",
                    "reg": "<?php echo $row['employe_date_register'] ?>",
                    "label_nik": "<?php echo $row['employe_nik'] ?>"
                },
<?php endforeach; ?>
        ];
        function custom_source(request, response) {
            var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
            response($.grep(employe_list, function(value) {
                return matcher.test(value.label)
                        || matcher.test(value.label_nik);
            }));
        }

        $("#field").autocomplete({
            source: custom_source,
            minLength: 1,
            select: function(event, ui) {
                // feed hidden id field
                $("#field_id").val(ui.item.label_nik);
                $("#field_name").val(ui.item.value);
                $("#field_pos").val(ui.item.id);
                $("#field_date").val(ui.item.reg);
                // update number of returned rows
            },
            open: function(event, ui) {
                // update number of returned rows
                var len = $('.ui-autocomplete > li').length;
            },
            close: function(event, ui) {
                // update number of returned rows
            },
            // mustMatch implementation
            change: function(event, ui) {
                if (ui.item === null) {
                    $(this).val('');
                    $('#field_id').val('');
                }
            }
        });

        // mustMatch (no value) implementation
        $("#field").focusout(function() {
            if ($("#field").val() === '') {
                $('#field_id').val('');
            }
        });
    });
</script>