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
    margin-top: 7.2em;
    margin-bottom: 0.1em;
    margin-left: 5.0em;
    margin-right: 5.0em;
  } .style13 {font-size: 14px}
</style>
</head>
<body>
<?php foreach ($contract as $row): ?>
  <table width="458" border="0">
    <tr>
      <td width="70">Nomor</td>
      <td width="10">:</td>
      <td width="370"><?php echo $row['contract_number'] ?>/SATHRD-<span class="upper"><?php echo $setting_initial['setting_value'] ?>/<?php $this->load->helper('tanggal'); 
        $namaBulan=konversiBulan(pretty_date($row['contract_date'],'m',false)); echo $namaBulan; ?>/<?php echo pretty_date( $row['contract_date'],'Y',false) ?></td></p></td>
      </tr>
      <tr>
        <td>Lamp</td>
        <td>:</td>
        <td>-</td>
      </tr>
      <tr>
        <td>Hal</td>
        <td>:</td>
        <td><strong><u>Pemberitahuan Berakhirnya Masa Kontrak <?php $this->load->helper('tanggal');  
          $namaBulan=konversiBulan($row['contract_ke']); echo $namaBulan; ?> <u></strong></td>
        </tr>
      </table>
      <br>
      <p align="left">Kepada Yth, </p>
      <table width="558" border="0">
        <tr>
          <td width="67" scope="col">Nama</td>
          <td width="13" scope="col">:</td>
          <td width="464" scope="col"><span class="cap"><?php echo $row['contract_employe_name'] ?></span></td>
        </tr>
        <tr>
          <td>NIK</td>
          <td>:</td>
          <td><?php echo $row['contract_employe_nik'] ?></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>:</td>
          <td><?php echo $row['contract_employe_position'] ?></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>Dengan Hormat, </p>
      <br>
      <p align="justify">Sesuai dengan ketentuan Perjanjian Kerja Waktu Tertentu (PKWT), dengan ini kami beritahukan bahwa hubungan kerja antara saudara/i akan berakhir pada hari
        <strong><?php echo pretty_date( $row['contract_date'],'l, d F Y',false) ?>.</strong></p>
        <p align="justify">Kami mengucapkan banyak terima kasih atas hasil kerja dan kerja sama yang telah Saudara/i berikan kepada perusahaan. <br>
        </p><br>
        <p align="justify">Demikian surat ini kami sampaikan, atas perhatiannya kami mengucapkan terima kasih. </p>
        <br><br><br>

        <table border="0">
          <tbody>
            <tr>
              <td>Cileungsi, <?php echo pretty_date(date('Y-m-d'), 'd F Y',FALSE) ?> </td>
              <td></td>                        
            </tr>
            <tr>
              <td><strong>PT. Sumber Alfaria Trijaya, Tbk</strong></td>
              <td></td>                        
            </tr>
          </tbody></table>        

          <br>
          <br>
          <br><br>
          <table border="0">
            <tbody>
              <tr>
                <td><u><strong>( <span class="upper"><?php echo $setting_employe_name['setting_value'] ?> )</strong></u></td>
                <td></td>                        
              </tr>
              <tr>
                <td><em><strong><span class="cap"><?php echo $setting_employe_position['setting_value'] ?></strong></em></td>
                <td></td>                        
              </tr>
            </tbody></table><br>

            <br><br><br><br>  
            <p><span class="style13">NRA : SAT/FRM/PI/145_Rev 001_150210</span> <br><br><br><br>
            <?php endforeach; ?>
            </body>
            </html>