<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Surat Tanda Lulus
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/set') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/set/edit/' . $set['set_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a>                     
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Nama Branch</td>
                            <td>:</td>
                            <td><?php echo $set['set_branch'] ?></td>
                        </tr>
                        <tr>         
                            <td>Alamat Kantor</td>
                            <td>:</td>
                            <td><?php echo $set['set_address'] ?></td>
                        </tr>
                        <tr>         
                            <td>Kota</td>
                            <td>:</td>
                            <td><?php echo $set['set_city'] ?></td>
                        </tr>
                        <tr>         
                            <td>Pic Surat Panggilan</td>
                            <td>:</td>
                            <td><?php echo $set['set_pic'] ?></td>
                        </tr>    
                        <tr>
                            <td>NIK PDM/GSM</td>
                            <td>:</td>
                            <td><?php echo $set['set_employe_nik'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama PDM/GSM</td>
                            <td>:</td>
                            <td><?php echo $set['set_employe_name'] ?></td>
                        </tr>            
                        <tr>
                            <td>Jabatan PDM/GSM</td>
                            <td>:</td>
                            <td><?php echo $set['set_employe_position'] ?></td>
                        </tr>
                        <tr>
                            <td>Branch Inisial</td>
                            <td>:</td>
                            <td><?php echo $set['set_initial'] ?></td>
                        </tr>                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>