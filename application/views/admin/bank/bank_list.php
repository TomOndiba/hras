<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">

        Daftar Bank
        <span class="pull-right add-btn hidden-xs">
            <a href="<?php echo site_url('admin/bank/add'); ?>" role="button"><span class="fa fa-plus"> Tambah</span></a>
        </span>
        <span class="pull-right add-btn hidden-lg hidden-md hidden-sm">
            <a href="<?php echo site_url('admin/bank/add'); ?>" role="button"><span class="fa fa-plus"></span></a>
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-condensed">
            <thead class="thed">
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
            <tbody class="tbodies">
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