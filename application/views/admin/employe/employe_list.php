<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        Daftar Karyawan
        <span class="pull-right add-btn hidden-xs">
            <a href="<?php echo site_url('admin/employe/add'); ?>" role="button"><span class="fa fa-plus"> Tambah</span></a>
        </span>
        <span class="pull-right add-btn hidden-lg hidden-md hidden-sm">
            <a href="<?php echo site_url('admin/employe/add'); ?>" role="button"><span class="fa fa-plus"></span></a>
        </span>
    </div>
        <div class="collapse" id="collapseExample">
            <?php echo form_open(current_url(), array('method' => 'get')) ?>
            <div class="row">                
                <div class="col-md-3">
                    <input type="text" name="n" placeholder="NIK" class="form-control">
                </div>                              
                <input type="submit" class="btn btn-md btn-success" value="Cari">

                <?php if ($this->session->userdata('user_role') == ROLE_SUPER_ADMIN) { ?>
                    <span class="pull-right">  
                        <a class ="btn btn-md btn-danger" href ="<?php echo site_url('admin/employe/delete'); ?>" onclick="return confirm('Apakah Anda akan menghapus semua data karyawan?')">Hapus Semua Karyawan</a>
                    </span>
                <?php } ?>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
    <?php echo validation_errors() ?>
    <br>
    <!-- Indicates a successful or positive action -->

    <div class="table-responsive">
        <table class="table table-condensed">
            <thead class="thed">
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
                    <tbody class="tbodies">
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