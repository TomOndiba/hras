<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin') ?>">Dashboard</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-envelope"></i> Surat Panggilan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/memorandum1') ?>">Daftar Surat Panggilan 1</a>
                    <li><a href="<?php echo site_url('admin/memorandum2') ?>">Daftar Suart Panggilan 2</a>
                    <li><a href="<?php echo site_url('admin/memorandum3') ?>">Daftar Suart Panggilan 3</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-envelope"></i> Surat Keterangan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/suratk') ?>">Daftar Surat</a>
                    <li><a href="<?php echo site_url('admin/suratk/add') ?>">Tambah Surat</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-envelope"></i> Surat BANK <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/bank') ?>">Master BANK</a>                    
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-user"></i> Karyawan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/employe') ?>">Daftar Karyawan</a>
                    <li><a href="<?php echo site_url('admin/employe/add') ?>">Tambah Karyawan</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-newspaper-o"></i> Posting <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/posts') ?>">Daftar Postingan</a>
                    <li><a href="<?php echo site_url('admin/posts/add') ?>">Tambah Postingan</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-users"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/user') ?>">Daftar Pengguna</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->