<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Surat Keterangan Disnaker
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/disn') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/disn/edit/' . $disn['disn_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                    <a href="<?php echo site_url('admin/disn/printPdf/' . $disn['disn_id']) ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span>&nbsp; Cetak</a>
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>No. disn</td>
                            <td>:</td>
                            <td><?php echo $disn['disn_number'] ?></td>
                        </tr>
                        <tr>         
                            <td>NIK</td>
                            <td>:</td>
                            <td><?php echo $disn['disn_nik'] ?></td>
                        </tr>  <tr>         
                            <td>Karyawan</td>
                            <td>:</td>
                            <td><?php echo $disn['disn_name'] ?></td>
                        </tr>  
                        <tr>         
                            <td>Jabatan</td>
                            <td>:</td>
                            <td><?php echo $disn['disn_position'] ?></td>
                        </tr>  
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td>:</td>
                            <td><?php echo pretty_date($disn['disn_entry_date'], 'd M Y',false) ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Keluar</td>
                            <td>:</td>
                            <td><?php echo pretty_date($disn['disn_end_date'], 'd M Y',false) ?></td>
                        </tr>                  
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>