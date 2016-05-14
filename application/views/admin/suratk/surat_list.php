<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Surat Keterangan
            <a href="<?php echo site_url('admin/suratk/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>

        <form action="<?php echo site_url('admin/suratk/multiple'); ?>" method="post">
            <button data-toggle="tooltip" data-placement="top" title="Cetak surat yang di ceklis" class="btn btn-sm btn-success" style="border-radius:10px 0px 10px 0px" name="action" value="printPdf" onclick="$('form').attr('target', '_blank');"><span class="glyphicon glyphicon-print"></span>&nbsp;Print Surat</button>
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
                            <th class="controls" align="center">TGL SURAT</th>
                            <th class="controls" align="center">DESKRIPSI</th>                        
                            <th class="controls" align="center">AKSI</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($surat)) {
                        foreach ($surat as $row) {
                            ?>
                            <tbody class="table-a">
                             <tr>
                                 <td><input type="checkbox" class="checkbox" name="msg[]" value="<?php echo $row['sk_id']; ?>"></td>                           
                                 <td ><?php echo $row['sk_number']; ?></td>
                                 <td ><?php echo $row['sk_employe_nik']; ?></td>
                                 <td ><?php echo $row['sk_employe_name']; ?></td>
                                 <td ><?php echo pretty_date($row['sk_date'], 'd F Y', false); ?></td>
                                 <td ><?php echo $row['sk_description']; ?></td>                                
                                 <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/suratk/detail/' . $row['sk_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/suratk/edit/' . $row['sk_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Print Surat" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/suratk/printPdf/' . $row['sk_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>
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