<?php $this->load->view('admin/datepicker'); ?>

<?php
if (isset($bpjstk)) {   
    $inputNpp = $bpjstk['bpjstk_npp'];    
    $inputName = $bpjstk['bpjstk_name'];
    $inputCard = $bpjstk['bpjstk_card'];
    $inputDate = $bpjstk['bpjstk_date'];
    $inputEntry = $bpjstk['bpjstk_entry_date'];
    $inputDesc = $bpjstk['bpjstk_desc'];
} else {    
    $inputNpp = set_value('bpjstk_npp');   
    $inputName = set_value('bpjstk_name');
    $inputCard = set_value('bpjstk_card');
    $inputDate = set_value('bpjstk_date');
    $inputEntry = set_value('bpjstk_entry_date');
    $inputDesc = set_value('bpjstk_desc');
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <?php if (!isset($bpjstk)) echo validation_errors(); ?>
        <?php echo form_open_multipart(current_url()); ?>
        <div>
            <h3><?php echo $operation; ?> BPJS Ketenagakerjaan</h3><br>
        </div>

        <div class="row">
            <div class="col-sm-9 col-md-9">
                <?php if (isset($bpjstk)): ?>
                    <input type="hidden" name="bpjstk_id" value="<?php echo $bpjstk['bpjstk_id']; ?>" />
                <?php endif; ?>
                <label >Nama *</label>
                <input name="bpjstk_name" placeholder="Nama" type="text" class="form-control" value="<?php echo $inputName; ?>"><br>
                <label >Nama *</label>
                <input name="bpjstk_card" placeholder="Nomor Kartu" type="text" class="form-control" value="<?php echo $inputCard; ?>"><br>
                <label >NPP </label>
                <input name="bpjstk_npp" placeholder="NPP" type="text" class="form-control" value="<?php echo $inputNpp; ?>"><br>
                <label >Tanggal Kepesertaan Awal *</label>
                <input name="bpjstk_entry_date" placeholder="Tanggal Kepesertaan" type="text" class="form-control datepicker" value="<?php echo $inputEntry; ?>"><br>
                <label >Pilih Tujuan *</label>
                <select name="bpjstk_desc" class="form-control">
                <option value="">--- Pilihan ---</option>
                <option value="Belum Mendapatkan Kartu Peserta BPJS Ketenagakerjaan Plastik">Belum Mendapatkan Kartu</option>
                <option value="Kartu BPJS Ketenagakerjaan Plastik Hilang">Kartu BPJS Hilang</option>
                <option value="Koreksi Kartu Kepesertaan">Koreksi Kartu Kepesertaan</option></select><br>
                <label >Tanggal Surat *</label>
                <input name="bpjstk_date" placeholder="Tanggal Surat" type="text" class="form-control datepicker" value="<?php echo $inputDate; ?>"><br>                           
                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group">
                    <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/bpjstk'); ?>" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</a>
                    <?php if (isset($bpjstk)): ?>
                        <a href="<?php echo site_url('admin/bpjstk/delete/' . $bpjstk['bpjstk_id']); ?>" class="btn btn-danger btn-form" ><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php if (isset($bpjstk)): ?>
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
                <?php echo form_open('admin/bpjstk/delete/' . $bpjstk['bpjstk_id']); ?>
                <div class="modal-footer">
                    <a><button style="float: right;margin-left: 10px" type="button" class="btn btn-default" data-dismiss="modal">Tidak</button></a>
                    <input type="hidden" name="del_id" value="<?php echo $bpjstk['bpjstk_id'] ?>" />
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

