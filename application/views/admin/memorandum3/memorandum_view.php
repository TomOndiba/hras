<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Surat Panggilan Ketiga
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/memorandum3') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/memorandum3/edit/' . $memorandum['memorandum_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
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
                            <td><?php echo $memorandum['memorandum_number'] ?></td>
                        </tr>
                        <tr>         
                            <td>NIK</td>
                            <td>:</td>
                            <td><?php echo $memorandum['employe_nik'] ?></td>
                        </tr>  
                        <tr>         
                            <td>Karyawan</td>
                            <td>:</td>
                            <td><?php echo $memorandum['employe_name'] ?></td>
                        </tr>                   
                        <tr>                            
                            <td>Tanggal Dikirim</td>
                            <td>:</td>
                            <td><?php echo pretty_date($memorandum['memorandum_date_sent'], 'd F Y',false) ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Panggilan</td>
                            <td>:</td>
                            <td><?php echo pretty_date($memorandum['memorandum_call_date'], 'd F Y',false) ?></td>
                        </tr>         
                        <tr>
                            <td>Tanggal Input</td>
                            <td>:</td>
                            <td><?php echo pretty_date($memorandum['memorandum_input_date'],'l, d F Y',false) ?></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>:</td>
                            <td><?php echo $memorandum['user_full_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>