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
    margin-top: 7.6em;
    margin-bottom: 0.1em;
    margin-left: 4.0em;
    margin-right: 6.0em;
  } .style12 {font-size: 14px}
  .style13 {
   font-size: 18px;
   font-weight: bold;
 }
 body {
  font-size: 15px;
}
</style>
</head>
<body>
<?php foreach ($disn as $row): ?>
  <div style="padding:0px 0px;">      
    <p align="center"><span class="style13"><u>SURAT KETERANGAN BEKERJA</u></span><br>
     <span class="style12"><?php echo $row['disn_number'] ?>/SDM-SAT<?php echo $setting_initial['setting_value'] ?>-Ref/<?php echo pretty_date( $row['disn_end_date'],'m',false) ?>-<?php echo pretty_date( $row['disn_end_date'],'y',false) ?></td></p><br>
      <p align="left">Kepada Yth :<br>
    Dinas Ketenagakerjaan<br>
    Di<br>
    Tempat</p><br>
      <p align="left">Yang bertanda tangan dibawah ini :</p>
      <table width="100%" border="0">
        <tr>
          <td width="36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td width="117">Nama</td>
          <td width="10">:</td>
          <td width="911"><span class="upper"><?php echo $setting_employe_name['setting_value'] ?></span></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>Jabatan</td>
          <td>:</td>
          <td><span class="cap"><?php echo $setting_employe_position['setting_value'] ?></span></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>Perusahaan</td>
          <td>:</td>
          <td>PT. Sumber Alfaria Trijaya, Tbk</td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>Alamat</td>
          <td>:</td>
          <td><span class="cap"><?php echo $setting_address['setting_value'] ?></span></td>
        </tr>
      </table>
      <p>&nbsp;<br>
        Dengan ini menerangkan bahwa :</p>
        <table width="100%" border="0">
          <tr>
          <td width="36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>Nama</td>
            <td width="10">:</td>
            <td><span class="upper"><?php echo $row['disn_name'] ?></span></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $row['disn_nik']  ?></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td width="117">Jabatan terakhir</td>
            <td>:</td>
            <td width="913"><span class="cap"><?php echo $row['disn_position']  ?></span></td>
          </tr>
        </table>
        <p>&nbsp;<br>
          Telah bekerja di PT. Sumber Alfaria Trijaya Tbk di <span class="cap"><?php echo $setting_branch['setting_value'] ?></span>,
          sejak tanggal <?php echo pretty_date($row['disn_entry_date'],'d F Y',false)?> sampai dengan tanggal <?php echo pretty_date($row['disn_end_date'],'d F Y',false)?>.</p>
          <p>Demikian Surat Keterangan ini dibuat dengan sebenarnya, untuk dapat dipergunakan seperlunya.</p>
          <br><br>
          <table>
            <tr>
              <td><strong><i><span class="cap"><?php echo $setting_city['setting_value'] ?></span>, 27 Juli 2016</i></strong></td>
            </tr>
            <tr>
              <td><strong><i>PT. Sumber Alfaria Trijaya Tbk</i></strong></td>
            </tr>
          </table>
          <br><br><br><br>
          <table>
            <tr>
              <td><strong><i><u><span class="upper"><?php echo $setting_employe_name['setting_value'] ?></span></i></u></strong></td>
            </tr>
            <tr>
              <td><strong><i><span class="cap"><?php echo $setting_employe_position['setting_value'] ?></span></i></strong></td>
            </tr>
          </table> <br><br><br><br><br><br><br><br>
        <?php endforeach; ?>
        </body>
        </html>