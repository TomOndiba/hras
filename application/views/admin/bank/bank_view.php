<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail BANK
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/bank') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/bank/edit/' . $bank['bank_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Nama BANK</td>
                            <td>:</td>
                            <td><?php echo $bank['bank_name'] ?></td>
                        </tr>          
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>