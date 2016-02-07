<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3>
            Daftar Surat Pengantar Bank
            <a href="<?php echo site_url('admin/spb/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
            <button type="button" class="btn btn-info pull-right btn-sm" data-toggle="modal" data-target="#myForm"><span class="fa fa-plus"></span></button>
        </h3>

        <!-- Indicates a successful or positive action -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="controls" align="center">NO. SURAT</th>                        
                        <th class="controls" align="center">TANGGAL KIRIM</th>
                        <th class="controls" align="center">NAMA BANK</th>                        
                        <th class="controls" align="center">AKSI</th>
                    </tr>
                </thead>
                <?php
                if (!empty($spb)) {
                    foreach ($spb as $row) {
                        ?>
                        <tbody>
                            <tr>
                                <td ><?php echo $row['spb_number']; ?></td>                                
                                <td ><?php echo pretty_date($row['spb_date'], 'd F Y', false); ?></td>
                                <td ><?php echo $row['bank_name']; ?></td>                                
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/spb/detail/' . $row['spb_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/spb/edit/' . $row['spb_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Print Surat" class="btn btn-danger btn-xs" href="<?php echo site_url('admin/spb/printPdf/' . $row['spb_id']) ?>"target="_blank"><span class="glyphicon glyphicon-print"></span></a>
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

<!-- Modal -->
<div class="modal fade" id="myForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Surat Pengantar</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12" id="form">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_open('admin/spb/add') ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="pull-left"><input class="form-control datepicker" required type="text" placeholder="Tanggal" name="spb_date" value="<?php echo date('Y-m-d') ?>"></span></div>
                                        <label >Pilih Bank</label>
                                        <tr>
                                            <td><select name="bank_id[]" class="form-control" required>
                                                <option value="">-- Pilih Bank --</option>
                                                <?php foreach ($bank as $row): ?>
                                                    <option value="<?php echo $row['bank_id'] ?>" >
                                                        <?php echo $row['bank_name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th class="head">Nama</th>
                                                        <th class="head">Keluar</th>
                                                        <th></th>
                                                    </b></tr>
                                                </thead>
                                                <tbody id="p_scents">

                                                    <td><input class="form-control" type="text" name="saving_debet[]"></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="#" id="addScnt"><span class="fa fa-plus"></span> Tambah </a>
                                        <br>
                                        <br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4 pull-right" >
                                                            <input type="submit" class="col-md-12 btn btn-primary" value="Simpan">
                                                        </div>
                                                        <div class="col-md-2" >
                                                            <button class="col-md-12 btn btn-info" data-dismiss="modal"><i class="ion-arrow-left-a"></i> Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                var scntDiv = $('#p_scents');
                var scntAdd = $('#form');
                var i = $('#p_scents tr').size() + 1;

                $("#addScnt").click(function() {
                    $('<tr><td><select name="member_id[]" class="form-control" required><option value="">-- Pilih Nama --</option><?php foreach ($member as $row): ?><option value="<?php echo $row['member_id'] ?>" ><?php echo $row['member_full_name'] ?></option><?php endforeach; ?></select></td><td><input class="form-control" type="text" name="saving_debet[]"></td><td><a href="#" class="remScnt"><span class="mdi mdi-minus-circle"></span></a></td></tr>').appendTo(scntDiv);
                    i++;
                    return false;
                });

                $(document).on("click", ".remScnt", function() {
                    if (i > 2) {
                        $(this).parents('tr').remove();
                        i--;
                    }
                    return false;
                });
            });
</script>