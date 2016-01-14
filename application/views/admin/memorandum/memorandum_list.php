<?php $this->load->view('admin/datepicker') ?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Surat Panggilan Selesai
        </h3>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="controls" align="center">NO. SURAT</th>
                        <th class="controls" align="center">NIK</th>
                        <th class="controls" align="center">NAMA KARYAWAN</th>
                        <th class="controls" align="center">TGL MANGKIR</th>
                        <th class="controls" align="center">TGL DIKIRIM</th>
                        <th class="controls" align="center">TGL PANGGILAN</th>
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($memorandum)) {
                    foreach ($memorandum as $row) {
                        ?>
                        <tbody>
                            <tr>
                                <td ><?php echo $row['memorandum_number']; ?></td>
                                <td ><?php echo $row['employe_nik']; ?></td>
                                <td ><?php echo $row['employe_name']; ?></td>
                                <td ><?php echo pretty_date($row['memorandum_absent_date'], 'd F Y', false); ?></td>
                                <td ><?php echo pretty_date($row['memorandum_date_sent'], 'd F Y', false); ?></td>
                                <td ><?php echo pretty_date($row['memorandum_call_date'], 'd F Y', false); ?></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/memorandum/detail/' . $row['memorandum_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>                                    
                                    <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/memorandum/printPdf/' . $row['memorandum_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>                                    
                                    <?php if ($row['memorandum_finished_desc'] == NULL) { ?>
                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal<?php echo $row['memorandum_id'] ?>"><span class="fa fa-check"></span>&nbsp; Selesai</button> 
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="modal<?php echo $row['memorandum_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <?php echo form_open(site_url('admin/memorandum1/add/' . $row['memorandum_id'])) ?>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Keterangan Pemanggilan Selesai</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="memorandum_id" value="<?php echo $row['memorandum_id']; ?>" />
                                        <input type="hidden" name="from_finished" value="TRUE" >
                                        <label >Keterangan *</label>
                                        <textarea required="" name='memorandum_finished_desc' class='form-control'></textarea>
                                        <p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <tbody>
                        <tr id="row">
                            <td colspan="7" align="center">Data Kosong</td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>   
            </table>
        </div>
        <div >
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>