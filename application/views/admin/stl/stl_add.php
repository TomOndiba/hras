<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($stl)) {
    $inputNumber = $stl['stl_number'];
    $inputBatch = $stl['stl_batch'];
    $inputIpk = $stl['stl_ipk'];
    $inputDesc = $stl['stl_desc'];
    $inputDate = $stl['stl_date'];     
    $inputEmployeNik = $stl['stl_employe_nik'];
    $inputEmployeName = $stl['stl_employe_name'];
    $inputEmployePos = $stl['stl_employe_position'];
} else {
    $inputNumber = set_value('stl_number');
    $inputBatch = set_value('stl_batch');
    $inputIpk = set_value('stl_ipk');
    $inputDesc = set_value('stl_desc');
    $inputDate = set_value('stl_date');    
    $inputEmployeNik = set_value('employe_nik');
    $inputEmployeName = set_value('employe_name');
    $inputEmployePos = set_value('employe_position');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($stl)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Surat Tanda Lulus</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9"> 
                <?php if (isset($stl)): ?>
                    <input type="hidden" name="stl_id" value="<?php echo $stl['stl_id']; ?>" />
                <?php endif; ?>
                <label >Karyawan *</label>
                <input name="employe_nik" id="field_id" type="hidden" class="form-control"  value="<?php echo $inputEmployeNik ?>">
                <input name="employe_name" id="field_name" type="hidden" class="form-control"  value="<?php echo $inputEmployeName ?>">
                <input name="employe_position" id="field_pos" type="hidden" class="form-control"  value="<?php echo $inputEmployePos ?>">
                <input id="field" type="text" class="form-control" placeholder="Ketik NIK atau Nama karyawan.." value="<?php echo (isset($stl)) ? $stl['employe_name'] : '' ?>">
                <br>
                <label >Periode Studi *</label>
                <input name="stl_date" placeholder="Periode" type="text" class="form-control datepicker" value="<?php echo $inputDate; ?>"><br>
                <label >Batch *</label>
                <input name="stl_batch" placeholder="Batch" type="text" class="form-control" value="<?php echo $inputBatch; ?>"><br>
                <label >Nilai IPK *</label>
                <input name="stl_ipk" placeholder="Nilai" type="text" class="form-control" value="<?php echo $inputIpk; ?>"><br> 
                <label >Predikat *</label>
                <select name="stl_desc" class="form-control">
                <option value="">--- Pilih Predikat ---</option>
                <option value="Cum Laude">Cum Laude</option>
                <option value="Sangat Memuaskan">Sangat Memuaskan</option>
                <option value="Memuaskan">Memuaskan</option>
                <option value="Kurang Memuaskan">Kurang Memuaskan</option>
                <option value="Tidak Memuaskan">Tidak Memuaskan</option>
                    
                </select><br>               
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/stl'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($stl)): ?>
                        <a href="<?php echo site_url('admin/stl/delete/' . $stl['stl_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($stl)): ?>
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
                <?php echo form_open('admin/stl/delete/' . $stl['stl_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $stl['stl_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $stl['stl_number'] ?>" />
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