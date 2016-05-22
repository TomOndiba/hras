<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($par)) {
    $inputNumber = $par['par_number'];
    $inputAcc = $par['par_employe_account'];    
    $inputEmployeNik = $par['par_employe_nik'];
    $inputEmployeName = $par['par_employe_name'];
    $inputEmployePos = $par['par_employe_position'];
    $inputEmployeUni = $par['par_employe_unit'];
    $inputEmployeBuss = $par['par_employe_bussiness'];
    $inputEmployeDept = $par['par_employe_departement'];
    $inputPaid = $par['par_paid'];
    $inputCost = $par['cost_cost_id'];
} else {
    $inputNumber = set_value('par_number');
    $inputAcc = set_value('par_employe_account');    
    $inputEmployeNik = set_value('employe_nik');
    $inputEmployeName = set_value('employe_name');
    $inputEmployePos = set_value('employe_position');
    $inputEmployeUni = set_value('par_employe_unit');
    $inputEmployeBuss = set_value('par_employe_bussiness');
    $inputEmployeDept = set_value('par_employe_departement');
    $inputPaid = set_value('par_paid');
    $inputCost = set_value('cost_id');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($par)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> PAR Nikah</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($par)): ?>
                    <input type="hidden" name="par_id" value="<?php echo $par['par_id']; ?>" />
                <?php endif; ?>
                <label >Nomor PAR *</label>
                <input name="par_number" placeholder="Contoh: 001" type="text" class="form-control" value="<?php echo $inputNumber; ?>"><br>  
                <label >Karyawan *</label>
                <input name="employe_nik" id="field_id" type="hidden" class="form-control"  value="<?php echo $inputEmployeNik ?>">
                <input name="employe_name" id="field_name" type="hidden" class="form-control"  value="<?php echo $inputEmployeName ?>">
                <input name="employe_position" id="field_pos" type="hidden" class="form-control"  value="<?php echo $inputEmployePos ?>">
                <input name="employe_unit" id="field_unit" type="hidden" class="form-control"  value="<?php echo $inputEmployeUni ?>">
                <input name="employe_bussiness" id="field_buss" type="hidden" class="form-control"  value="<?php echo $inputEmployeBuss ?>">
                <input name="employe_account" id="field_acc" type="hidden" class="form-control"  value="<?php echo $inputAcc ?>">
                <input name="employe_departement" id="field_dept" type="hidden" class="form-control"  value="<?php echo $inputEmployeDept ?>">
                <input id="field" type="text" class="form-control" placeholder="Ketik NIK atau Nama karyawan.." value="<?php echo (isset($par)) ? $par['par_employe_name'] : '' ?>">
                <br>
                <label >Cost Center *</label>
                <select name="cost_id" class="form-control">
                <option value="">-- Pilih Cost Center --</option>
                    <?php
                    foreach ($cost as $row):
                        ?>
                    <option value="<?php echo $row['cost_id']; ?>"> <?php echo $row['cost_code'];?> - <?php echo $row['cost_name'];?> </option>

                    <?php
                    endforeach;
                    ?>
                </select><br> 
                <label >Nominal *</label>
                <input name="par_paid" placeholder="Nominal PAR (Hanya Angka)" type="text" class="form-control" value="<?php echo $inputPaid; ?>"><br>                
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/par'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($par)): ?>
                        <a href="<?php echo site_url('admin/par/delete/' . $par['par_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($par)): ?>
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
                <?php echo form_open('admin/par/delete/' . $par['par_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $par['par_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $par['par_number'] ?>" />
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
            "uni": "<?php echo $row['employe_unit'] ?>",
            "bus": "<?php echo $row['employe_bussiness'] ?>",
            "acc": "<?php echo $row['employe_account'] ?>",
            "dep": "<?php echo $row['employe_departement'] ?>",
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
                $("#field_unit").val(ui.item.uni);
                $("#field_buss").val(ui.item.bus);
                $("#field_acc").val(ui.item.acc);
                $("#field_dept").val(ui.item.dep);
                                  

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