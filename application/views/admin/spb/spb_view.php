<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="post-inherit">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    Detail Surat Pengantar Bank
                </h3>
            </div>
            <div class="col-md-4">
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/spb') ?>" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/spb/edit/' . $spb['spb_id']) ?>" class="btn btn-success"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                    <a href="<?php echo site_url('admin/spb/printPdf/' . $spb['spb_id']) ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span>&nbsp; Cetak</a>
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
                            <td><?php echo $spb['spb_number'] ?></td>
                        </tr>                        
                        <tr>
                            <td>Tanggal Surat</td>
                            <td>:</td>
                            <td><?php echo pretty_date($spb['spb_date'], 'd M Y') ?></td>
                        </tr>
                        <tr>
                            <td>Bank Tujuan</td>
                            <td>:</td>
                            <td><?php echo $spb['bank_name']?></td>
                        </tr>            
                        <tr>
                            <td>Tanggal Input</td>
                            <td>:</td>
                            <td><?php echo pretty_date($spb['spb_input_date'],'l, d F Y',false) ?></td>
                        </tr>
                        <tr>
                            <td>User Input</td>
                            <td>:</td>
                            <td><?php echo $spb['user_full_name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>