<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        Daftar Cost Center
        <span class="pull-right add-btn hidden-xs">
            <a href="<?php echo site_url('admin/cost/add'); ?>" role="button"><span class="fa fa-plus"> Tambah</span></a>
        </span>
        <span class="pull-right add-btn hidden-lg hidden-md hidden-sm">
            <a href="<?php echo site_url('admin/cost/add'); ?>" role="button"><span class="fa fa-plus"></span></a>
        </span>
    </div>

        <div class="table-responsive">
            <table class="table table-condensed">
                <thead class="thed">
                    <tr>
                        <th>No.</th>
                        <th>Kode Cost Center</th> 
                        <th>Nama Cost Center</th>                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $i=1;
                
                foreach ($cost as $row): 
                    ?>
                <tbody class="tbodies">
                    <tr>
                        <td ><?php echo $i ?></td>
                        <td ><?php echo $row['cost_code']; ?></td>
                        <td ><?php echo $row['cost_name']; ?></td>
                        
                        <td>
                            <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/cost/detail/' . $row['cost_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/cost/edit/' . $row['cost_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                            
                        </td>
                    </tr>
                    
                </tbody> <?php $i++; endforeach; ?>                        
            </table>
        </div>
        <div >
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>