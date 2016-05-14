<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar BPJS Ketenagakerjaan
            <a href="<?php echo site_url('admin/bpjstk/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>        
                 
            <!-- Indicates a successful or positive action -->


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-a">
                        <tr>
                            <th><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th>
                            <th class="controls" align="center">NAMA</th>
                            <th class="controls" align="center">NOMOR KARTU</th>
                            <th class="controls" align="center">KETERANGAN</th>  
                            <th class="controls" align="center">TANGGAL</th>                                                
                            <th class="controls" align="center">AKSI</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($bpjstk)) {
                        foreach ($bpjstk as $row) {
                            ?>
                            <tbody class="table-a"> 
                               <tr>
                               <td><input type="checkbox" class="checkbox" name="msg[]" value="<?php echo $row['bpjstk_id']; ?>"></td>                           
                                    <td ><?php echo $row['bpjstk_name']; ?></td>
                                    <td ><?php echo $row['bpjstk_card']; ?></td>
                                    <td ><?php echo $row['bpjstk_desc']; ?></td>
                                    <td ><?php echo pretty_date($row['bpjstk_date'], 'd F Y',false); ?></td>                                                                  
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/bpjstk/detail/' . $row['bpjstk_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/bpjstk/edit/' . $row['bpjstk_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Print Surat" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/bpjstk/printPdf/' . $row['bpjstk_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>    
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