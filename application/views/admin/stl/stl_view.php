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
                    <a href="<?php echo site_url('admin/stl') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/stl/edit/' . $stl['stl_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                    <a href="<?php echo site_url('admin/stl/printPdf/' . $stl['stl_id']) ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span>&nbsp; Cetak</a>
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>No. Surat</td>
                            <td>:</td>
                            <td><?php echo $stl['stl_number'] ?></td>
                        </tr>
                        <tr>         
                            <td>NIK</td>
                            <td>:</td>
                            <td><?php echo $stl['stl_employe_nik'] ?></td>
                        </tr>
                        <tr>         
                            <td>Karyawan</td>
                            <td>:</td>
                            <td><?php echo $stl['stl_employe_name'] ?></td>
                        </tr>
                        <tr>         
                            <td>Jabatan</td>
                            <td>:</td>
                            <td><?php echo $stl['stl_employe_position'] ?></td>
                        </tr>    
                        <tr>
                            <td>Tanggal Periode</td>
                            <td>:</td>
                            <td><?php echo pretty_date($stl['stl_date'], 'd M Y') ?></td>
                        </tr>
                        <tr>
                            <td>Batch</td>
                            <td>:</td>
                            <td><?php echo $stl['stl_batch'] ?></td>
                        </tr>            
                        <tr>
                            <td>Nilai IPK</td>
                            <td>:</td>
                            <td><?php echo $stl['stl_ipk'] ?></td>
                        </tr>
                        <tr>
                            <td>Predikat</td>
                            <td>:</td>
                            <td><?php echo $stl['stl_desc'] ?></td>
                        </tr>
                        <tr>
                            <td>User Input</td>
                            <td>:</td>
                            <td><?php echo $stl['user_full_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>