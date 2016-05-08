<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Surat Kuasa
            <a href="<?php echo site_url('admin/procuration/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-a">
                    <tr>
                        <th class="controls" align="center">NO. SURAT</th>
                        <th class="controls" align="center">NIK</th>
                        <th class="controls" align="center">NAMA KARYAWAN</th>                        
                        <th class="controls" align="center">TANGGAL</th>                        
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($procuration)) {
                    foreach ($procuration as $row) {
                        ?>
                        <tbody class="table-a">
                            <tr>
                                <td ><?php echo $row['procuration_number']; ?></td>
                                <td ><?php echo $row['procuration_employe_nik']; ?></td>
                                <td ><?php echo $row['procuration_employe_name']; ?></td>                                                                
                                <td ><?php echo pretty_date($row['procuration_date'], 'd F Y', false); ?></td>                                
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/procuration/detail/' . $row['procuration_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/procuration/edit/' . $row['procuration_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Print Surat" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/procuration/printPdf/' . $row['procuration_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                } else {
                    ?>
                    <tbody>
                        <tr id="row">
                            <td colspan="6" align="center">Data Kosong</td>
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