<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar BPJS Kesehatan 
            <a href="<?php echo site_url('admin/bpjs/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>        
            <?php echo form_open(current_url(), array('method' => 'get')) ?> <br>
            <div class="row">                
                <div class="col-md-2">
                    <input autofocus type="text" name="n" placeholder="NIK" value="" class="form-control">
                </div>  
                <div class="col-md-2">
                    <input type="text" name="k" placeholder="KTP" value="" class="form-control">
                </div>               
                
                    <input type="submit" class="btn btn-success" value="Cari">
                    <span class="right">  
                    <?php if ($this->session->userdata('user_role') == ROLE_SUPER_ADMIN) { ?>
                <a class ="btn btn-md btn-danger" href ="<?php echo site_url('admin/bpjs/delete'); ?>" onclick="return confirm('Apakah Anda akan menghapus semua data Entitas?')">Hapus Semua Entitas</a></span>
                 <?php } ?>
                </div>
            </div>
            <?php echo form_close() ?> 
        </div>
        <form action="<?php echo site_url('admin/bpjs/multiple'); ?>" method="post">
            <select name="action">
                <option value="null">Pilih Action</option>
                <option value="delete">Delete</option>
                <option value="cetak">List Cetak</option>
                <option value="printPdf">Cetak Kartu</option>
            </select>
            <input type="submit" name="submit" value="Action" onclick="$('form').attr('target', '_blank');">
            <input type="submit" name="submit" value="List">          
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
                                        <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/bpjs/detail/' . $row['bpjs_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/bpjs/edit/' . $row['bpjs_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Print Kartu" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/bpjs/printPdf/' . $row['bpjs_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Daftar Cetak" class="btn btn-primary btn-xs" href="<?php echo site_url('admin/bpjs/cetak/' . $row['bpjs_id']); ?>" ><span class="fa fa-check"></span></a>
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