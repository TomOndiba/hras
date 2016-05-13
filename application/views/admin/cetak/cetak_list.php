<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Cetak Kartu BPJS Kesehatan             
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
                    <input type="text" name="k" placeholder="KTP" value="" class="form-control">
                </div>               
                <div class="col-md-2">
                    <input type="submit" class="btn btn-success" value="Cari">
                </div>
            </div>
            <?php echo form_close() ?> 
        </div>
        <form action="<?php echo site_url('admin/cetak/multiple'); ?>" method="post">
        <button data-toggle="tooltip" data-placement="top" title="Cetak" class="btn btn-sm btn-primary" name="action" value="printPdf" onclick="$('form').attr('target', '_blank');"><span class="fa fa-print"></span>&nbsp;Print All</button>
            <button data-toggle="tooltip" data-placement="top" title="Hapus Daftar Cetak" class="btn btn-sm btn-warning" name="action" value="uncheck"><span class="fa fa-times"></span>&nbsp;Remove All</button>
            <!-- Indicates a successful or positive action -->


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-a">
                        <tr>
                            <th><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th>
                            <th class="controls" align="center">NIK</th>
                            <th class="controls" align="center">NIK KTP</th>
                            <th class="controls" align="center">NAMA</th>
                            <th class="controls" align="center">HUB KELUARGA</th>
                            <th class="controls" align="center">FASKES</th>                        
                            <th class="controls" align="center">AKSI</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($bpjs)) {
                        foreach ($bpjs as $row) {
                            ?>
                            <tbody class="table-a">
                             <tr>
                                 <td><input type="checkbox" class="checkbox" name="msg[]" value="<?php echo $row['bpjs_id']; ?>"></td>                           
                                 <td ><?php echo $row['bpjs_npp']; ?></td>
                                 <td ><?php echo $row['bpjs_ktp']; ?></td>
                                 <td ><?php echo $row['bpjs_name']; ?></td>
                                 <td ><?php echo $row['bpjs_hub']; ?></td>
                                 <td ><?php echo $row['bpjs_faskes']; ?></td>                                
                                 <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/cetak/detail/' . $row['bpjs_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a> 
                                    <a data-toggle="tooltip" data-placement="top" title="Hapus Cetak" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/cetak/uncetak/' . $row['bpjs_id']); ?>" ><span class="fa fa-times"></span></a>                                       
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                } else {
                    ?>
                    <tbody>
                    </form>
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