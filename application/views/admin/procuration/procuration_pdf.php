<html>
    <head>
    <style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
    </style>
  <style type="text/css">
    @page {
        $dompdf->set_paper('A4');
        margin-top: 7.2em;
        margin-bottom: 0.1em;
        margin-left: 5.0em;
        margin-right: 5.0em;
        } .style12 {font-size: 10px}
    .style13 {
  font-size: 20px;
  font-weight: bold;
}
    </style>
    </head>
    <body>
    <div style="padding:0px 0px;">      
        <p align="center"><span class="style13"><u>SURAT KUASA</u></span><br>
  <?php echo $procuration['procuration_number'] ?>/S-K/<span class="upper"><?php echo $setting_initial['setting_value'] ?></span>/<?php $this->load->helper('tanggal'); 
  $namaBulan=konversiBulan(pretty_date($procuration['procuration_date'],'m',false)); echo $namaBulan; ?>/<?php echo pretty_date( $procuration['procuration_date'],'Y',false) ?></td></p><br>
      
        <p align="left">Saya yang bertanda tangan dibawah ini :</p>
        <table width="558" border="0">
          <tr>
            <td width="67" scope="col">Nama</td>
            <td width="13" scope="col">:</td>
            <td width="464" scope="col"><span class="cap"><?php echo $setting_employe_name['setting_value'] ?></span></td>
          </tr>
          <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $setting_employe_nik['setting_value'] ?></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><span class="cap"><?php echo $setting_employe_position['setting_value'] ?></span></td>
          </tr>
        </table><br>
        <p>Dengan ini memberikan kuasa kepada :</p>
        <table width="560" border="0">
          <tr>
            <td width="68" scope="col">Nama</td>
            <td width="14" scope="col">:</td>
            <td width="464" scope="col"><span class="cap"><?php echo $procuration['procuration_employe_name'] ?></span></td>
          </tr>
          <tr>      
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $procuration['procuration_employe_nik'] ?></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $procuration['procuration_employe_position'] ?></td>
          </tr>
        </table>
    <br>
    <p align="justify">Untuk melakukan proses pelaporan kepada pihak kepolisian atas <?php echo $procuration['procuration_desc'] ?>.</p><br>
       
    <p align="justify">Demikian surat kuasa ini saya buat dengan sebenar-benarnya atas perhatian dan kerjasamanya saya ucapkan terima kasih.</p>
       <br>
        
        <table width ="100%" border="0">
                    <tr>
                        <td>Bogor, <?php echo pretty_date($procuration['procuration_date'], 'd F Y',false)?></td>
                        <td width="180">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Mengetahui,</td>
                        <td>Yang Bersangkutan</td>
                    </tr>
                </table>
                <br><br><br><br>
                <table width="100%" border="0">
                    <tr>
                        <td>( <span class="cap"><?php echo $setting_employe_name['setting_value'] ?></span> )</td>
                        <td width="180">( <span class="cap"><?php echo $procuration['procuration_employe_name'] ?></span> )</td>
                    </tr>
                    <tr>
                        <td><span class="cap"><?php echo $setting_employe_position['setting_value'] ?></span></td>
                        <td width="180">&nbsp;</td>

                    </table>
            <p class="style18"><br>
  
    
    </body>
</html>