<?php $this->load->view('admin/datepicker') ?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail History Panggilan
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/memorandum') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/memorandum1/edit/' . $memorandum['memorandum_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>                        
                        <tr>         
                            <td>NIK</td>
                            <td>:</td>
                            <td><?php echo $memorandum['employe_nik'] ?></td>
                        </tr>  
                        <tr>         
                            <td>Nama Karyawan</td>
                            <td>:</td>
                            <td><?php echo $memorandum['employe_name'] ?></td>
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
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4><strong>
                    Surat Panggilan Pertama
                </strong></h4>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="controls" align="center">NO. SURAT</th>
                                <th class="controls" align="center">TGL DIKIRIM</th>
                                <th class="controls" align="center">TGL PANGGILAN</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td ><?php echo $memorandum['memorandum_number']; ?></td>
                                <td ><?php echo pretty_date($memorandum['memorandum_date_sent'], 'd F Y',false); ?></td>
                                <td ><?php echo pretty_date($memorandum['memorandum_call_date'], 'd F Y',false); ?></td>
                                
                            </tr>
                        </tbody>


                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4><strong>
                        Surat Panggilan Kedua
                    </strong></h4>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="controls" align="center">NO. SURAT</th>
                                    <th class="controls" align="center">TGL DIKIRIM</th>
                                    <th class="controls" align="center">TGL PANGGILAN</th>                                    
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

                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>
                         Surat Pemberitahuan Kualifikasi
                     </strong></h4>
                 </div>
                 <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="controls" align="center">NO. SURAT</th>
                                    <th class="controls" align="center">TGL DIKIRIM</th>
                                    <th class="controls" align="center">TGL PANGGILAN</th>                                        
                                    <th class="controls" align="center">TGL KUALIFIKASI</th>
                                </tr>
                            </thead>
                            <?php
                            if (!empty($memorandum3)) {
                                foreach ($memorandum3 as $row) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td ><?php echo $row['memorandum_number']; ?></td>
                                            <td ><?php echo pretty_date($row['memorandum_date_sent'], 'd F Y',false); ?></td>
                                            <td ><?php echo pretty_date($row['memorandum_call_date'], 'd F Y',false); ?></td>                                                
                                            <td ><?php echo pretty_date($row['memorandum2_call_date'], 'd F Y',false); ?></td> 
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
        </div> 