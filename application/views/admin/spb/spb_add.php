<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($spb)) {
    $inputNumber = $spb['spb_number'];    
    $inputDate = $spb['spb_date'];
    $inputName1 = $spb['spb_name1'];
    $inputName2 = $spb['spb_name2'];
    $inputName3 = $spb['spb_name3']; 
    $inputName4 = $spb['spb_name4'];     
    $inputName5 = $spb['spb_name5']; 
    $inputName6 = $spb['spb_name6']; 
    $inputName7 = $spb['spb_name7']; 
    $inputName8 = $spb['spb_name8']; 
    $inputName9 = $spb['spb_name9']; 
    $inputName10 = $spb['spb_name10']; 
    $inputNik1 = $spb['spb_nik1']; 
    $inputNik2 = $spb['spb_nik2'];
    $inputNik3 = $spb['spb_nik3'];
    $inputNik4 = $spb['spb_nik4'];
    $inputNik5 = $spb['spb_nik5'];
    $inputNik6 = $spb['spb_nik6'];
    $inputNik7 = $spb['spb_nik7'];
    $inputNik8 = $spb['spb_nik8'];
    $inputNik9 = $spb['spb_nik9'];
    $inputNik10 = $spb['spb_nik10'];   
    $inputBank = $spb['bank_bank_id'];
} else {
    $inputNumber = set_value('spb_number');    
    $inputDate = set_value('spb_date');
    $inputName1 = set_value('spb_name1');
    $inputName2 = set_value('spb_name2');
    $inputName3 = set_value('spb_name3');
    $inputName4 = set_value('spb_name4');    
    $inputName5 = set_value('spb_name5'); 
    $inputName6 = set_value('spb_name6');
    $inputName7 = set_value('spb_name7');
    $inputName8 = set_value('spb_name8');
    $inputName9 = set_value('spb_name9');
    $inputName10 = set_value('spb_name10');
    $inputNik1 = set_value('spb_nik1');
    $inputNik2 = set_value('spb_nik2');
    $inputNik3 = set_value('spb_nik3');
    $inputNik4 = set_value('spb_nik4');
    $inputNik5 = set_value('spb_nik5');
    $inputNik6 = set_value('spb_nik6');
    $inputNik7 = set_value('spb_nik7');
    $inputNik8 = set_value('spb_nik8');
    $inputNik9 = set_value('spb_nik9');
    $inputNik10 = set_value('spb_nik10');
    $inputBank = set_value('bank_id');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="post-inherit">
        <?php if (!isset($spb)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> Surat Pengantar Bank</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($spb)): ?>
                    <input type="hidden" name="spb_id" value="<?php echo $spb['spb_id']; ?>" />
                <?php endif; ?>
                <label >Tanggal Surat *</label>
                <input name="spb_date" placeholder="Tanggal Surat" type="text" class="form-control datepicker" value="<?php echo $inputDate; ?>"><br>
                <label >Pilih BANK *</label>
                <select name="bank_id" class="form-control">
                <option value="">-- Pilih Bank --</option>
                    <?php
                    foreach ($bank as $row):
                        ?>
                    <option value="<?php echo $row['bank_id']; ?>"> <?php echo $row['bank_name']; ?></option>

                    <?php
                    endforeach;
                    ?>
                </select><br>
                <div class="row">
                    <div class="col-md-6">                 
                        <label >Nama *</label>
                        <input name="spb_name1" placeholder="Nama 1" type="text" class="form-control" value="<?php echo $inputName1; ?>"><br>
                    </div>
                    <div class="col-md-6">
                        <label >Nomor KTP *</label>
                        <input name="spb_nik1" placeholder="NIK 1" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik1; ?>"><br>
                    </div>
                    <div class="col-md-6">
                        <input name="spb_name2" placeholder="Nama 2" type="text" class="form-control" value="<?php echo $inputName2; ?>"><br>
                    </div>
                    <div class="col-md-6">
                        <input name="spb_nik2" placeholder="NIK 2" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik2; ?>"><br>
                    </div>
                    <div class="col-md-6">
                        <input name="spb_name3" placeholder="Nama 3" type="text" class="form-control" value="<?php echo $inputName3; ?>"><br>
                    </div>
                    <div class="col-md-6">
                        <input name="spb_nik3" placeholder="Nik 3" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik3; ?>"><br>
                    </div>
                    <div class="col-md-6">    
                        <input name="spb_name4" placeholder="Nama 4" type="text" class="form-control" value="<?php echo $inputName4; ?>"><br>
                    </div>
                    <div class="col-md-6"> 
                        <input name="spb_nik4" placeholder="Nik 4" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik4; ?>"><br>
                    </div>
                    <div class="col-md-6">   
                        <input name="spb_name5" placeholder="Nama 5" type="text" class="form-control" value="<?php echo $inputName5; ?>"><br>
                    </div>
                    <div class="col-md-6">                        
                        <input name="spb_nik5" placeholder="Nik 5" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik5; ?>"><br>
                    </div>
                    <div class="col-md-6">    
                        <input name="spb_name6" placeholder="Nama 6" type="text" class="form-control" value="<?php echo $inputName6; ?>"><br>
                    </div>
                    <div class="col-md-6">    
                        <input name="spb_nik6" placeholder="Nik 6" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik6; ?>"><br>
                    </div>
                    <div class="col-md-6">    
                        <input name="spb_name7" placeholder="Nama 7" type="text" class="form-control" value="<?php echo $inputName7; ?>"><br>
                    </div>
                    <div class="col-md-6">    
                        <input name="spb_nik7" placeholder="Nik 7" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik7; ?>"><br>
                    </div>
                    <div class="col-md-6">  
                        <input name="spb_name8" placeholder="Nama 8" type="text" class="form-control" value="<?php echo $inputName8; ?>"><br>
                    </div>
                    <div class="col-md-6">   
                        <input name="spb_nik8" placeholder="Nik 8" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik8; ?>"><br>
                    </div>
                    <div class="col-md-6">    
                        <input name="spb_name9" placeholder="Nama 9" type="text" class="form-control" value="<?php echo $inputName9; ?>"><br>
                    </div>
                    <div class="col-md-6">   
                        <input name="spb_nik9" placeholder="Nik 9" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik9; ?>"><br>
                    </div>
                    <div class="col-md-6"> 
                        <input name="spb_name10" placeholder="Nama 10" type="text" class="form-control" value="<?php echo $inputName10; ?>"><br>
                    </div>
                    <div class="col-md-6">   
                        <input name="spb_nik10" placeholder="Nik 10" maxlength="16" onkeypress="validate(event)" type="text" class="form-control" value="<?php echo $inputNik10; ?>"><br>
                        <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
                    </div></div></div><br>
                    <div class="col-sm-9 col-md-3">
                        <div class="form-group">
                            <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                            <a href="<?php echo site_url('admin/spb'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                            <?php if (isset($spb)): ?>
                                <a href="<?php echo site_url('admin/spb/delete/' . $spb['spb_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <?php if (isset($spb)): ?>
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
                        <?php echo form_open('admin/spb/delete/' . $spb['spb_id']); ?>
                        <div class="modal-footer">
                            <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                            <input type="hidden" name="del_id" value="<?php echo $spb['spb_id'] ?>" />
                            <input type="hidden" name="del_name" value="<?php echo $spb['spb_number'] ?>" />
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


<script type="text/javascript">
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>