<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail BPJS Ketenagakerjaan
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/bpjstk') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/bpjstk/edit/' . $bpjstk['bpjstk_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                    <a href="<?php echo site_url('admin/bpjstk/printPdf/' . $bpjstk['bpjstk_id']) ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span>&nbsp; Cetak</a>
                </span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td><?php echo $bpjstk['bpjstk_name'] ?></td>
                        </tr>
                        <tr>         
                            <td>NOMOR KARTU</td>
                            <td>:</td>
                            <td><?php echo $bpjstk['bpjstk_card'] ?></td>
                        </tr>  
                        <tr>         
                            <td>NPP</td>
                            <td>:</td>
                            <td><?php echo $bpjstk['bpjstk_npp'] ?></td>
                        </tr>  
                        <tr>         
                            <td>KEPESERTAAN AWAL</td>
                            <td>:</td>
                            <td><?php echo $bpjstk['bpjstk_entry_date'] ?></td>
                        </tr> 
                        <tr>         
                            <td>KETERANGAN</td>
                            <td>:</td>
                            <td><?php echo $bpjstk['bpjstk_desc'] ?></td>
                        </tr>                         
                        <tr>         
                            <td>TANGGAL SURAT</td>
                            <td>:</td>
                            <td><?php echo pretty_date($bpjstk['bpjstk_date'],'d F Y',false) ?></td>
                        </tr>  
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>