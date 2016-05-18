<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Cost Center
            <a href="<?php echo site_url('admin/cost/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3><br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-a">
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
                <tbody class="table-a">
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