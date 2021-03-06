<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="col-md-12 main">
            <h3>
                Detail Pengguna
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/dashboard') ?>" class="btn btn-info btn-sm"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/profile/edit/') ?>" class="btn btn-success btn-sm"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                </span>
            </h3><br>
        </div>
            <div class="col-md-2">
            <?php if (!empty($user['user_image'])) { ?>
            <img src="<?php echo upload_url('users/'.$user['user_image']) ?>" class="img-responsive ava-detail">
            <?php } else { ?>
                <img src="<?php echo base_url('media/images/user.png') ?>" class="img-responsive ava-detail">
            <?php } ?>
        </div>
        <div class="col-md-10">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?php echo $user['user_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?php echo $user['user_full_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $user['user_email'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Daftar</td>
                        <td>:</td>
                        <td><?php echo pretty_date($user['user_input_date'], 'l, d m Y', FALSE) ?></td>
                    </tr>
                    <tr>
                        <td>Status User</td>
                        <td>:</td>
                        <td><?php echo $user['role_name']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
