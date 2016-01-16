<?php $this->load->view('admin/datepicker') ?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar History Surat Panggilan
        </h3>
        <span class="pull-right">
                <a class="btn btn-sm btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-align-justify"></span></a>
                <a class="btn btn-sm btn-success" href="<?php echo site_url('admin/memorandum/export' . '/?' . http_build_query($q)) ?>" ><span class="glyphicon glyphicon-print"></span></a>
                
            </span>
        </h3>
        <div class="collapse" id="collapseExample">
            <?php echo form_open(current_url(), array('method'=>'get')) ?>
            <div class="row">                
                <div class="col-md-3">
                    <input type="text" name="ds" placeholder="Tanggal Mulai" value="" class="form-control datepicker">
                </div>
                <div class="col-md-3">
                    <input type="text" name="de" placeholder="Tanggal Akhir" value="" class="form-control datepicker">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-success" value="Filter">
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
        <?php echo validation_errors() ?>
        <br>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>                    
                        <th class="controls" align="center">NIK</th>
                        <th class="controls" align="center">NAMA KARYAWAN</th>
                        <th class="controls" align="center">TGL EMAIL</th>
                        <th class="controls" align="center">TGL MANGKIR</th>
                        <th class="controls" align="center">STATUS</th>
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($memorandum)) {
                    foreach ($memorandum as $row) {
                        ?>
                        <tbody>
                            <tr>                                
                                <td ><?php echo $row['employe_nik']; ?></td>
                                <td ><?php echo $row['employe_name']; ?></td>
                                <td ><?php echo pretty_date($row['memorandum_email_date'], 'd F Y', false); ?></td>
                                <td ><?php echo pretty_date($row['memorandum_absent_date'], 'd F Y', false); ?></td>
                                <td ><?php echo $row['memorandum_finished_desc']; ?></td>
                                <td>
                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/memorandum/detail/' . $row['memorandum_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>                  
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