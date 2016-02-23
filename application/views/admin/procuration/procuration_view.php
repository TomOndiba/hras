<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Surat Kuasa
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/procuration') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/procuration/edit/' . $procuration['procuration_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                    <a href="<?php echo site_url('admin/procuration/printPdf/' . $procuration['procuration_id']) ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span>&nbsp; Cetak</a>
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
                            <td><?php echo $procuration['procuration_number'] ?></td>
                        </tr>
                        <tr>         
                            <td>NIK</td>
                            <td>:</td>
                            <td><?php echo $procuration['procuration_employe_nik'] ?></td>
                        </tr>  
                        <tr>         
                            <td>Karyawan</td>
                            <td>:</td>
                            <td><?php echo $procuration['procuration_employe_name'] ?></td>
                        </tr>           
                        <tr>
                            <td>Tanggal Input</td>
                            <td>:</td>
                            <td><?php echo pretty_date($procuration['procuration_input_date'],'l, d F Y',false) ?></td>
                        </tr>
                        <tr>
                            <td>User Input</td>
                            <td>:</td>
                            <td><?php echo $procuration['user_full_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>