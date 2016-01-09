<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Surat Panggilan Ketiga
            <a href="<?php echo site_url('admin/memorandum3/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
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
                        <th class="controls" align="center">TGL KUALIFIKASI</th>
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
                                <td ><?php echo pretty_date($row['memorandum1_absent_date'], 'd F Y',false); ?></td>
                                <td ><?php echo pretty_date($row['memorandum_date_sent'], 'd F Y',false); ?></td>
                                <td ><?php echo pretty_date($row['memorandum_call_date'], 'd F Y',false); ?></td>
                                <td ><?php echo pretty_date($row['memorandum2_call_date'], 'd F Y',false); ?></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/memorandum3/detail/' . $row['memorandum_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/memorandum3/printPdf/' . $row['memorandum_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/memorandum3/present/' . $row['memorandum_id']); ?>" ><span class="fa fa-check"></span></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                } else {
                    ?>
                    <tbody>
                        <tr id="row">
                            <td colspan="5" align="center">Data Kosong</td>
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