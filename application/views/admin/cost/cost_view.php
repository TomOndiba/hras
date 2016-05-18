<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Cost Center
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/cost') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/cost/edit/' . $cost['cost_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                        <td>Kode Cost Center</td>
                            <td>:</td>
                            <td><?php echo $cost['cost_code'] ?></td>
                        </tr> 
                        <tr>
                            <td>Nama Cost Center</td>
                            <td>:</td>
                            <td><?php echo $cost['cost_name'] ?></td>
                        </tr>          
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>