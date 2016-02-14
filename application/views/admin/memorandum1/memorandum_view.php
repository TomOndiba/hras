<?php $this->load->view('admin/datepicker') ?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Surat Panggilan Pertama
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/memorandum1') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/memorandum1/edit/' . $memorandum['memorandum_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                    <a href="<?php echo site_url('admin/memorandum1/printPdf/' . $memorandum['memorandum_id']) ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span>&nbsp; Cetak</a> 
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>No. Surat</td>
                            <td>:</td>
                            <td><?php echo $memorandum['memorandum_number'] ?></td>
                        </tr>
                        <tr>         
                            <td>NIK</td>
                            <td>:</td>
                            <td><?php echo $memorandum['memorandum_employe_nik'] ?></td>
                        </tr>  
                        <tr>         
                            <td>Karyawan</td>
                            <td>:</td>
                            <td><?php echo $memorandum['memorandum_employe_name'] ?></td>
                        </tr>  
                        <tr>
                            <td>Tanggal Email</td>
                            <td>:</td>
                            <td><?php echo pretty_date($memorandum['memorandum_email_date'], 'd F Y', false) ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Mangkir</td>
                            <td>:</td>
                            <td><?php echo pretty_date($memorandum['memorandum_absent_date'], 'd F Y', false) ?></td>
                        </tr>                        
                        <tr>                            
                            <td>Tanggal Dikirim</td>
                            <td>:</td>
                            <td><?php echo pretty_date($memorandum['memorandum_date_sent'], 'd F Y', false) ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Panggilan</td>
                            <td>:</td>
                            <td><?php echo pretty_date($memorandum['memorandum_call_date'], 'd F Y', false) ?></td>
                        </tr>         
                        <tr>
                            <td>Tanggal Input</td>
                            <td>:</td>
                            <td><?php echo pretty_date($memorandum['memorandum_input_date'], 'l, d F Y', false) ?></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>:</td>
                            <td><?php echo $memorandum['user_full_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>
                    Surat Panggilan kedua
                    <span class="pull-right">
                        <?php if(empty($memorandum2)){ ?>
                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalKedua"><span class="fa fa-plus"></span>&nbsp; Buat Surat Panggilan kedua</button> 
                        <?php } ?>
                    </span>
                </h4>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="controls" align="center">NO. SURAT</th>
                                <th class="controls" align="center">TGL DIKIRIM</th>
                                <th class="controls" align="center">TGL PANGGILAN</th>
                                <th class="controls" align="center">AKSI</th>
                            </tr>
                        </thead>
                        <?php
                        if (!empty($memorandum2)) {
                            foreach ($memorandum2 as $row) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td ><?php echo $row['memorandum_number']; ?></td>
                                        <td ><?php echo pretty_date($row['memorandum_date_sent'], 'd F Y',false); ?></td>
                                        <td ><?php echo pretty_date($row['memorandum_call_date'], 'd F Y',false); ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/memorandum2/detail/' . $row['memorandum_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                            }
                        } else {
                            ?>
                            <tbody>
                                <tr id="row">
                                    <td colspan="4" align="center">Data Kosong</td>
                                </tr>
                            </tbody>
                            <?php
                        }
                        ?>   
                    </table>
                </div>
            </div>
            
        </div>
        <div class="modal fade" id="modalKedua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo form_open(site_url('admin/memorandum2/add')) ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Surat Panggilan Kedua</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="memorandum1_id" value="<?php echo $memorandum['memorandum_id']; ?>" />
                        <input type="hidden" name="from_memorandum1" value="TRUE" >
                        <label >Tanggal Dikirim *</label>
                        <input name="memorandum_date_sent" placeholder="Tanggal Dikirim" type="text" class="form-control datepicker"><br>
                        <label >Tanggal Panggilan *</label>
                        <input name="memorandum_call_date" placeholder="Tanggal Panggilan" type="text" class="form-control datepicker"><br>
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
    </div>
</div>