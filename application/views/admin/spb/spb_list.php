<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Surat Pengantar Bank
            <a href="<?php echo site_url('admin/spb/add'); ?>" ><span class="fa fa-plus-square"></span></a>
        </h3>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-a">
                    <tr>
                        <th class="controls" align="center">NO. SURAT</th>                        
                        <th class="controls" align="center">TANGGAL KIRIM</th>
                        <th class="controls" align="center">NAMA BANK</th>                        
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($spb)) {
                    foreach ($spb as $row) {
                        ?>
                        <tbody class="table-a">
                            <tr>
                                <td ><?php echo $row['spb_number']; ?></td>                                
                                <td ><?php echo pretty_date($row['spb_date'], 'd F Y', false); ?></td>
                                <td ><?php echo $row['bank_name']; ?></td>                                
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/spb/detail/' . $row['spb_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/spb/edit/' . $row['spb_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Print Surat" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/spb/printPdf/' . $row['spb_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>
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