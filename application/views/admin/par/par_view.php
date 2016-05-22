<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail PAR Nikah
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/par') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/par/edit/' . $par['par_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                    <a href="<?php echo site_url('admin/par/printPdf/' . $par['par_id']) ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span>&nbsp; Cetak</a>
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
                            <td><?php echo $par['par_number'] ?></td>
                        </tr>
                        <tr>         
                            <td>NIK</td>
                            <td>:</td>
                            <td><?php echo $par['par_employe_nik'] ?></td>
                        </tr>
                        <tr>         
                            <td>Nama Karyawan</td>
                            <td>:</td>
                            <td><?php echo $par['par_employe_name'] ?></td>
                        </tr> 
                        <tr>         
                            <td>Departement</td>
                            <td>:</td>
                            <td><?php echo $par['par_employe_departement'] ?></td>
                        </tr> 
                        <tr>         
                            <td>Nominal</td>
                            <td>:</td>
                            <td><?php echo number_format($par['par_paid'], 2, ',', '.');?></td>
                        </tr>              
                        <tr>
                            <td>Tanggal Input</td>
                            <td>:</td>
                            <td><?php echo pretty_date($par['par_input_date'],'l, d F Y',false) ?></td>
                        </tr>
                        <tr>
                            <td>User Input</td>
                            <td>:</td>
                            <td><?php echo $par['user_full_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>