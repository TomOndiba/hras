<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Karyawan
            <a href="<?php echo site_url('admin/employe/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
            <span class="pull-right">
                <a class="btn btn-sm btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-align-justify"></span></a>               
            </span>
        </h3>       
        </h3>
        <div class="collapse" id="collapseExample">
            <?php echo form_open(current_url(), array('method' => 'get')) ?>
            <div class="row">                
                <div class="col-md-3">
                    <input type="text" name="n" placeholder="NIK" class="form-control">
                </div>                
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
                    <th class="controls" align="center">NAMA</th>
                    <th class="controls" align="center">JABATAN</th>
                    <th class="controls" align="center">DEPARTEMEN</th>                    
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
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/employe/detail/' . $row['employe_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
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