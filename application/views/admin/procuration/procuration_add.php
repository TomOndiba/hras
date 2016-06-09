<?php $this->load->view('admin/datepicker'); $this->load->view('admin/tinymce_init');?>


<?php
if (isset($procuration)) {
    $inputNumber = $procuration['procuration_number'];
    $inputDesc = $procuration['procuration_desc'];
    $inputDate = $procuration['procuration_date'];     
    $inputEmployeNik = $procuration['procuration_employe_nik'];
    $inputEmployeName = $procuration['procuration_employe_name'];
    $inputEmployePos = $procuration['procuration_employe_position'];
} else {
    $inputNumber = set_value('procuration_number');
    $inputDesc = set_value('procuration_desc');  
    $inputDate = set_value('procuration_date');      
    $inputEmployeNik = set_value('employe_nik');
    $inputEmployeName = set_value('employe_name');
    $inputEmployePos = set_value('employe_position');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($procuration)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Surat Kuasa</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($procuration)): ?>
                    <input type="hidden" name="procuration_id" value="<?php echo $procuration['procuration_id']; ?>" />
                <?php endif; ?>
                <label >Karyawan *</label>
                <input name="employe_nik" id="field_id" type="hidden" class="form-control"  value="<?php echo $inputEmployeNik ?>">
                <input name="employe_name" id="field_name" type="hidden" class="form-control"  value="<?php echo $inputEmployeName ?>">
                <input name="employe_position" id="field_pos" type="hidden" class="form-control"  value="<?php echo $inputEmployePos ?>">
                <input id="field" type="text" class="form-control" placeholder="Ketik NIK atau Nama karyawan.." value="<?php echo (isset($procuration)) ? $procuration['procuration_employe_name'] : '' ?>">
                <br>
                <label >Deskripsi *</label>
                <textarea name="procuration_desc" rows="5" placeholder="Keterangan" type="text" class="form-control mce-init"><?php echo $inputDesc; ?></textarea><br>                                
                <label>Tanggal Surat *</label>
                <input name="procuration_date" placeholder="Tanggal Surat" type="text" class="form-control datepicker" value="<?php echo $inputDate; ?>"></input><br>
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/procuration'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($procuration)): ?>
                        <a href="<?php echo site_url('admin/procuration/delete/' . $procuration['procuration_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($procuration)): ?>
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
                <?php echo form_open('admin/procuration/delete/' . $procuration['procuration_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $procuration['procuration_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $procuration['procuration_number'] ?>" />
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