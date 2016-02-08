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
                    <li><a href="<?php echo site_url('admin/memorandum2') ?>">Daftar Surat Panggilan 2</a>
                    <li><a href="<?php echo site_url('admin/memorandum3') ?>">Daftar Surat Panggilan 3</a>
                    <li><a href="<?php echo site_url('admin/memorandum') ?>">Daftar Surat Selesai</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-print"></i> Surat Keterangan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/suratk') ?>">Surat Keterangan</a>
                    <li><a href="<?php echo site_url('admin/contract') ?>">Surat Habis Kontrak</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-graduation-cap"></i> Surat Tanda Lulus <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/stl') ?>">Daftar Surat Tanda Lulus</a>                    
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-bank"></i> Surat BANK <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/bank') ?>">Master BANK</a> 
                    <li><a href="<?php echo site_url('admin/spb') ?>">Daftar Surat Pengantar</a>                   
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-user"></i> Karyawan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/employe') ?>">Daftar Karyawan</a>
                    <li><a href="<?php echo site_url('admin/employe/add') ?>">Tambah Karyawan</a>
                    <li><a href="<?php echo site_url('admin/employe/upload') ?>">Upload Karyawan</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-newspaper-o"></i> Posting Info <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/posts') ?>">Daftar Postingan</a>
                    <li><a href="<?php echo site_url('admin/posts/add') ?>">Tambah Postingan</a>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-users"></i> User Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/user') ?>">Daftar User</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->