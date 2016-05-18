<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="<?php echo site_url('admin') ?>"><i class="fa fa-home"></i> Home</a>
                
            </li>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_ADMIN){ ?>
            <li><a><i class="fa fa-envelope"></i> Surat Panggilan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/memorandum1') ?>">Daftar Surat Panggilan 1</a>
                    <li><a href="<?php echo site_url('admin/memorandum2') ?>">Daftar Surat Panggilan 2</a>
                    <li><a href="<?php echo site_url('admin/memorandum3') ?>">Daftar Surat Panggilan 3</a>
                    <li><a href="<?php echo site_url('admin/memorandum') ?>">Daftar Surat Selesai</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_ADMIN){ ?>
            <li><a><i class="fa fa-print"></i> Surat Keterangan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/suratk') ?>">Surat Keterangan</a>
                    <li><a href="<?php echo site_url('admin/contract') ?>">Surat Habis Kontrak</a>                    
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_ADMIN){ ?>
            <li><a><i class="fa fa-medkit"></i> BPJS Kesehatan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/bpjs') ?>">List BPJS Kesehatan</a> 
                    <li><a href="<?php echo site_url('admin/cetak') ?>">Daftar Cetak Kartu</a>  
                    <li><a href="<?php echo site_url('admin/bpjs/import') ?>">Upload Entitas BPJS</a>                  
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_ADMIN){ ?>
            <li><a><i class="fa fa-paper-plane"></i> BPJS Ketenagakerjaan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/bpjstk') ?>">Surat Pernyataan BPJS</a>                     
                    <li><a href="<?php echo site_url('admin/disn') ?>">Surat Keterangan Disnaker</a>                 
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_ADMIN){ ?>
            <li><a><i class="fa fa-money"></i> PAR <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/cost') ?>">Master Cost Center</a>                     
                    <li><a href="<?php echo site_url('admin/par') ?>">PAR Nikah</a>                 
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_TRAINNER){ ?>
            <li><a><i class="fa fa-graduation-cap"></i> Surat Tanda Lulus <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/stl') ?>">Daftar Surat Tanda Lulus</a>                    
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_ADMIN){ ?>
            <li><a><i class="fa fa-suitcase"></i> Surat Pengantar Mutasi <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/spm') ?>">Daftar Surat Mutasi</a>                    
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_ADMIN){ ?>
            <li><a><i class="fa fa-list-alt"></i> Surat Kuasa <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/procuration') ?>">Daftar Surat Kuasa</a>                    
                    </li>
                </ul>
            </li>
            <?php } ?>
            <li><a><i class="fa fa-bank"></i> Surat BANK <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/bank') ?>">Master BANK</a> 
                    <li><a href="<?php echo site_url('admin/spb') ?>">Daftar Surat Pengantar</a>                   
                    </li>
                </ul>
            </li>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_ADMIN){ ?>
            <li><a><i class="fa fa-user"></i> Karyawan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/employe') ?>">List Karyawan</a>                   
                    <li><a href="<?php echo site_url('admin/employe/import') ?>">Upload Karyawan</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN){ ?>
            <li><a><i class="fa fa-newspaper-o"></i> Posting Info <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/posts') ?>">Daftar Postingan</a>
                    <li><a href="<?php echo site_url('admin/posts/add') ?>">Tambah Postingan</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN OR $this->session->userdata('user_role') == ROLE_ADMIN){ ?>
            <li><a><i class="fa fa-gear"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/setting') ?>">Pengaturan</a>                    
                    </li>
                </ul>
            </li>
            <?php } ?>

            <?php if($this->session->userdata('user_role') == ROLE_SUPER_ADMIN){ ?>
            <li><a><i class="fa fa-users"></i> User Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/user') ?>">Daftar User</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->