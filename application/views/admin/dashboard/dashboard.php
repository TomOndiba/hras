<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="post-inherit">

        <!-- Indicates a successful or positive action -->

        <div class="strong">
            <h1>Human Resources Administration System</h1>
            <h4><p>PT. Sumber Alfaria Trijaya, Tbk - Branch <span class="cap"><?php echo $setting_branch['setting_value'] ?></span></p><h4>
                <p>Web Based Application </p>
                <br>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                              <!-- small box -->
                              <div class="small-box bg-purple">
                                <div class="inner">
                                  <h3><?php echo $memorandum3 ?></h3>
                                  <p>Reminder Kualifikasi Panggilan</p>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-envelope"></i>
                              </div>
                              <a href="<?php echo site_url('admin/memorandum3')?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div><!-- ./col -->
                      <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-blue">
                            <div class="inner">
                              <h3><?php echo $memorandum1 ?></h3>
                              <p>Reminder Selesai Panggilan</p>
                          </div>
                          <div class="icon">
                              <i class="fa fa-check"></i>
                          </div>
                          <a href="<?php echo site_url('admin/memorandum') ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                  </div><!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3><?php echo $bpjs ?></h3>
                          <p>BPJS Kesehatan</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-medkit"></i>
                      </div>
                      <a href="<?php echo site_url('admin/bpjs') ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div><!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?php echo $employe ?></h3>
                      <p>Karyawan Aktif</p>
                  </div> 
                  <div class="icon">
                      <i class="fa fa-users"></i>
                  </div>
                  <a href="<?php echo site_url('admin/employe') ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div><!-- ./col -->
      </div><!-- /.row -->
      <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box label-danger">
                    <div class="inner">
                      <h3><?php echo $sk ?></h3>
                      <p>Surat Keluar</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-print"></i>
                  </div>
                  <a href="<?php echo site_url('admin/suratk') ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>&nbsp;</h3>
                  <p>File</p>
              </div>
              <div class="icon">
                  <i class="fa fa-file"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-fuchsia">
            <div class="inner">
              <h3>&nbsp;</h3>
              <p>Jadwal Posting</p>
          </div>
          <div class="icon">
              <i class="fa fa-calendar"></i>
          </div>
          <a href="#" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
      </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-maroon">
        <div class="inner">
          <h3>&nbsp;</h3>
          <p>Pengaturan</p>
      </div> 
      <div class="icon">
          <i class="fa fa-gear"></i>
      </div>
      <a href="<?php echo site_url('admin/setting') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div><!-- ./col -->
</div><!-- /.row -->
</div>
</div>

<br><br><br>
<br>
<strong><?php echo $this->session->userdata('user_full_name'); ?> (<?php echo $this->session->userdata('user_name'); ?>) </strong>
<br>
<?php echo pretty_date(date('Y-m-d'), 'l, d F Y',FALSE) ?> 
</div>
</div>
</div>
<style type="text/css">
 .upper { text-transform: uppercase; }
 .lower { text-transform: lowercase; }
 .cap   { text-transform: capitalize; }
 .small { font-variant:   small-caps; }
</style>