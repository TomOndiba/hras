<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Bank
            <a href="<?php echo site_url('admin/bank/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3><br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-a">
                    <tr>
                        <th>No.</th>
                        <th>Nama Bank</th>                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $i=1;
                
                foreach ($bank as $row): 
                    ?>
                <tbody class="table-a">
                    <tr>
                        <td ><?php echo $i ?></td>
                        <td ><?php echo $row['bank_name']; ?></td>
                        
                        <td>
                            <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/bank/detail/' . $row['bank_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/bank/edit/' . $row['bank_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                            
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