<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Pengaturan
            <a href="<?php echo site_url('admin/set/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="controls" align="center">BRANCH</th>                                                
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($set)) {
                    foreach ($set as $row) {
                        ?>
                        <tbody>
                            <tr>
                                <td ><?php echo $row['set_branch']; ?></td>                                                                                         
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/set/detail/' . $row['set_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/set/edit/' . $row['set_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>                                    
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