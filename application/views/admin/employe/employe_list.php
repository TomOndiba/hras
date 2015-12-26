<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Karyawan
            <a href="<?php echo site_url('admin/employe/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="controls" align="center">NIK</th>
                        <th class="controls" align="center">NAMA</th>
                        <th class="controls" align="center">JABATAN</th>
                        <th class="controls" align="center">DEPARTEMEN</th>
                        <th class="controls" align="center">STATUS</th>
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($employe)) {
                    foreach ($employe as $row) {
                        ?>
                        <tbody>
                            <tr>
                                <td ><?php echo $row['employe_nik']; ?></td>
                                <td ><?php echo $row['employe_name']; ?></td>
                                <td ><?php echo $row['employe_position']; ?></td>
                                <td ><?php echo $row['employe_departement']; ?></td>
                                <td ><?php echo $row['employe_is_active'] == 1? 'Aktif' : 'Non-Aktif'; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/employe/detail/' . $row['employe_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/employe/edit/' . $row['employe_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
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