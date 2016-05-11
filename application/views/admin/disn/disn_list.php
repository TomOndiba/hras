<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Surat Keterangan Disnaker
            <a href="<?php echo site_url('admin/disn/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>

        <form action="<?php echo site_url('admin/disn/multiple'); ?>" method="post">
            <select name="action">
                <option value="null">Pilih Action</option>
                <option value="delete">Delete</option>
                <option value="printPdf">Print</option>
            </select>
            <input type="submit" name="submit" value="Action" onclick="$('form').attr('target', '_blank');">          
            <!-- Indicates a successful or positive action -->


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-a">
                        <tr>
                            <th><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th>
                            <th class="controls" align="center">NO. SURAT</th>
                            <th class="controls" align="center">NIK</th>
                            <th class="controls" align="center">NAMA KARYAWAN</th>
                            <th class="controls" align="center">JABATAN</th>                                                 
                            <th class="controls" align="center">AKSI</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($disn)) {
                        foreach ($disn as $row) {
                            ?>
                            <tbody class="table-a">
                               <tr>
                               <td><input type="checkbox" class="checkbox" name="msg[]" value="<?php echo $row['disn_id']; ?>"></td>                           
                                    <td ><?php echo $row['disn_number']; ?></td>
                                    <td ><?php echo $row['disn_nik']; ?></td>
                                    <td ><?php echo $row['disn_name']; ?></td>                                    
                                    <td ><?php echo $row['disn_position']; ?></td>                                
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/disn/detail/' . $row['disn_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/disn/edit/' . $row['disn_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Print Surat" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/disn/printPdf/' . $row['disn_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>
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