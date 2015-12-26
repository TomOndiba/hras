<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Karyawan
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/employe') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/employe/edit/' . $employe['employe_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?php echo $employe['employe_nik'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Karyawan</td>
                            <td>:</td>
                            <td><?php echo $employe['employe_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td><?php echo $employe['employe_position'] ?></td>
                        </tr>                        
                        <tr>                            
                            <td>Divisi</td>
                            <td>:</td>
                            <td><?php echo $employe['employe_divisi'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo $employe['employe_address'] ?></td>
                        </tr>  
                        <tr>         
                            <td>No. Telepon</td>
                            <td>:</td>
                            <td><?php echo $employe['employe_phone'] ?></td>
                        </tr>                                                              
                        <tr>
                            <td>Tanggal Bekerja</td>
                            <td>:</td>
                            <td><?php echo pretty_date($employe['employe_date_register'], 'd F Y', False) ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $employe['employe_is_active'] == 1? 'Aktif' : 'Non-Aktif'; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Input</td>
                            <td>:</td>
                            <td><?php echo pretty_date($employe['employe_input_date']) ?></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>:</td>
                            <td><?php echo $employe['user_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>