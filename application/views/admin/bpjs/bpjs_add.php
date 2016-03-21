<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($bpjs)) {
    $inputNoka = $bpjs['bpjs_noka'];
    $inputKtp = $bpjs['bpjs_ktp'];
    $inputNpp = $bpjs['bpjs_npp'];    
    $inputName = $bpjs['bpjs_name'];
    $inputHub = $bpjs['bpjs_hub'];
    $inputDate = $bpjs['bpjs_date'];
    $inputTmt = $bpjs['bpjs_tmt'];
    $inputFaskes = $bpjs['bpjs_faskes'];
    $inputKelas = $bpjs['bpjs_kelas'];
} else {    
    $inputNoka = set_value('bpjs_noka');
    $inputKtp = set_value('bpjs_ktp');
    $inputNpp = set_value('bpjs_npp');   
    $inputName = set_value('bpjs_name');
    $inputHub = set_value('bpjs_hub');
    $inputDate = set_value('bpjs_date');
    $inputTmt = set_value('bpjs_tmt');
    $inputFaskes = set_value('bpjs_faskes');
    $inputKelas = set_value('bpjs_kelas');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($bpjs)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> BPJS Kesehatan</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($bpjs)): ?>
                    <input type="hidden" name="bpjs_id" value="<?php echo $bpjs['bpjs_id']; ?>" />
                <?php endif; ?>
                <label >NOKA *</label>
                <input name="bpjs_noka" placeholder="NOKA" type="text" class="form-control" value="<?php echo $inputNoka; ?>"><br>
                <label >No KTP *</label>
                <input name="bpjs_ktp" placeholder="NIK" type="text" class="form-control" value="<?php echo $inputKtp; ?>"><br>
                <label >NPP *</label>
                <input name="bpjs_npp" placeholder="NPP" type="text" class="form-control" value="<?php echo $inputNpp; ?>"><br>
                <label >Nama *</label>
                <input name="bpjs_name" placeholder="Nama" type="text" class="form-control" value="<?php echo $inputName; ?>"><br>
                <label >Hubungan Keluarga *</label>
                <input name="bpjs_hub" placeholder="Hubungan" type="text" class="form-control" value="<?php echo $inputHub; ?>"><br>
                <label >Tanggal Lahir *</label>
                <input name="bpjs_date" placeholder="Tanggal Lahir" type="text" class="form-control datepicker" value="<?php echo $inputDate; ?>"><br>
                <label >TMT Date *</label>
                <input name="bpjs_tmt" placeholder="TMT Date" type="text" class="form-control datepicker" value="<?php echo $inputTmt; ?>"><br>
                <label >Faskes *</label>
                <input name="bpjs_faskes" placeholder="Faskes" type="text" class="form-control" value="<?php echo $inputFaskes; ?>"><br>
                <label >Kelas Rawat *</label>
                <input name="bpjs_kelas" placeholder="Kelas Rawat" type="text" class="form-control" value="<?php echo $inputKelas; ?>"><br>                               
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/bpjs'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($bpjs)): ?>
                        <a href="<?php echo site_url('admin/bpjs/delete/' . $bpjs['bpjs_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($bpjs)): ?>
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
                <?php echo form_open('admin/bpjsk/delete/' . $bpjs['bpjs_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $bpjs['bpjs_id'] ?>" />
                    <input type="hidden" name="del_name" value="<?php echo $bpjs['bpjs_noka'] ?>" />
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

