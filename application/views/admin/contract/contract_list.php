<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Karyawan Habis Kontrak
            <a href="<?php echo site_url('admin/contract/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
            <a data-toggle="tooltip" data-placement="top" title="Download xls" class="btn btn-sm btn-primary" href="<?php echo site_url('admin/contract/export' . '/?' . http_build_query($q)) ?>" ><span class="glyphicon glyphicon-print"></span></a>
        </h3>
        <span class="pulll-left">
            <a class="btn btn-sm btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="fa fa-search"> Search</span></a>
        </span>
        <div class="collapse" id="collapseExample">
            <?php echo form_open(current_url(), array('method' => 'get')) ?> <br>
            <div class="row">                
                <div class="col-md-2">
                    <input type="text" name="n" placeholder="NIK" value="" class="form-control">
                </div>                            
                <div class="col-md-2">
                    <input type="submit" class="btn btn-success" value="Cari">
                </div>
            </div>
            <?php echo form_close() ?> 
        </div>
         <form action="<?php echo site_url('admin/contract/multiple'); ?>" method="post">
           <button data-toggle="tooltip" data-placement="top" title="Cetak surat yang di ceklis" class="btn btn-sm btn-success" style="border-radius:10px 0px 10px 0px" name="action" value="printPdf" onclick="$('form').attr('target', '_blank');"><span class="glyphicon glyphicon-print"></span>&nbsp;Print Surat</button>
            <button data-toggle="tooltip" data-placement="top" title="Cetak amplop yang di ceklis" class="btn btn-sm btn-info" style="border-radius:10px 0px 10px 0px" name="action" value="printEnvl" onclick="$('form').attr('target', '_blank');"><span class="fa fa-envelope"></span>&nbsp;Print Amplop</button> 
            <button data-toggle="tooltip" data-placement="top" title="Hapus yang di ceklis" class="btn btn-sm btn-danger" style="border-radius:10px 0px 10px 0px" name="action" value="delete" onclick="return confirm('Apakah Anda akan menghapus data yang dipilih?')"><span class="fa fa-times"></span>&nbsp;Hapus</button>   

        <!-- Indicates a successful or positive action --> 

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-a">
                    <tr>
                        <th><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th>
                        <th class="controls" align="center">NO. SURAT</th>
                        <th class="controls" align="center">NIK</th>
                        <th class="controls" align="center">NAMA KARYAWAN</th>
                        <th class="controls" align="center">TGL HABIS KONTRAK</th>
                        <th class="controls" align="center">KONTRAK KE-</th>                        
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($contract)) {
                    foreach ($contract as $row) {
                        ?>
                        <tbody class="table-a">
                            <tr>
                                <td><input type="checkbox" class="checkbox" name="msg[]" value="<?php echo $row['contract_id']; ?>"></td>
                                <td ><?php echo $row['contract_number']; ?></td>
                                <td ><?php echo $row['contract_employe_nik']; ?></td>
                                <td ><?php echo $row['contract_employe_name']; ?></td>
                                <td ><?php echo pretty_date($row['contract_date'], 'd F Y', false); ?></td>
                                <td ><?php echo ($row['contract_ke'] == '1') ? 'Pertama' : 'Kedua' ?></td>                                
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/contract/detail/' . $row['contract_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/contract/edit/' . $row['contract_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Print Surat" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/contract/printPdf/' . $row['contract_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Print Amplop" class="btn btn-info btn-xs" href="<?php echo site_url('admin/contract/printEnvl/' . $row['contract_id']) ?>"target="_blank"><span class="fa fa-envelope"></span></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                } else {
                    ?>
                    <tbody>
                        <tr id="row">
                            <td colspan="6" align="center">Data Kosong</td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>   
            </table>
        </div>
        <div >
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#selectall").change(function() {
            $(".checkbox").prop('checked', $(this).prop("checked"));
        });
    });
</script>