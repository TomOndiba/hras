<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Karyawan Habis Kontrak
            <a href="<?php echo site_url('admin/contract/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="controls" align="center">NO. SURAT</th>
                        <th class="controls" align="center">NAMA KARYAWAN</th>
                        <th class="controls" align="center">TGL HABIS KONTRAK</th>
                        <th class="controls" align="center">KONTRAK KE-</th>                        
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($contract)) {
                    foreach ($contract as $row) {
                        ?>
                        <tbody>
                            <tr>
                                <td ><?php echo $row['contract_number']; ?></td>
                                <td ><?php echo $row['employe_name']; ?></td>
                                <td ><?php echo pretty_date($row['contract_date'], 'd F Y', false); ?></td>
                                <td ><?php echo ($row['contract_ke'] == '1') ? 'Pertama' : 'Kedua' ?></td>                                
                                <td>
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/contract/detail/' . $row['contract_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/contract/edit/' . $row['contract_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/contract/printPdf/' . $row['contract_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>
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