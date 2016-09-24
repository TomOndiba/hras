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
    margin-top: 3cm;
    margin-bottom: 0.1em;
    margin-left: 1.5cm;
    margin-right: 1.5cm;
  } .style13 {font-size: 14px}
</style>
</head>
<body>
  <table width="535" border="0">
    <tr>
      <td width="57">Nomor</td>
      <td width="10">:</td>
      <td width="280"><?php echo $spb['spb_number'] ?>/SATHRD-<span class="upper"><?php echo $setting_initial['setting_value'] ?></span>/<?php $this->load->helper('tanggal'); 
        $namaBulan=konversiBulan(pretty_date($spb['spb_date'],'m',false)); echo $namaBulan; ?>/<?php echo pretty_date( $spb['spb_date'],'Y',false) ?></td><td width="10"></p><td width="5"></td>
        <td width="200" scope="col"><div align="left"><span class="cap"><?php echo $setting_city['setting_value'] ?></span>, <?php echo pretty_date( $spb['spb_date'],'d F Y',false) ?></div></td>
      </tr>      
      <tr>
        <td>Hal</td>
        <td>:</td>
        <td><strong>Permohonan Dispensasi</strong></td>
      </tr>
    </table>
    <br>
    <p align="left">Kepada Yth,<br>
    Kepala Kantor Cabang <strong><?php echo $spb['bank_name'] ?></strong> <br>
      Di Tempat. </p>
      <p>Yang bertanda tangan dibawah ini, saya : </p>       
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
      <p align="justify">Dengan ini mengajukan permohonan dispensasi pembukaan rekening BCA untuk karyawan-karyawan 
      kami PT. Sumber Alfaria Trijaya, Tbk dengan saldo minimum awal sebesar Rp. 100.000 (seratus ribu rupiah) / orang, dalam daftar sebagai berikut :</p>  
      <table width="553" border="0">
        <tr>
          <td width="31"><div align="left"><strong>No.</strong></div></td>
          <td width="216"><div align="left"><strong>Nama</strong></div></td>
          <td width="292"><div align="left"><strong>Nomor KTP </strong></div></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name1'] == NULL) ? '' : '1.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name1'] ?></span></td> 
          <td><?php echo $spb['spb_nik1'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name2'] == NULL) ? '' : '2.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name2'] ?></span></td>
          <td><?php echo $spb['spb_nik2'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name3'] == NULL) ? '' : '3.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name3'] ?></span></td>
          <td><?php echo $spb['spb_nik3'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name4'] == NULL) ? '' : '4.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name4'] ?></span></td>
          <td><?php echo $spb['spb_nik4'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name5'] == NULL) ? '' : '5.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name5'] ?></span></td>
          <td><?php echo $spb['spb_nik5'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name6'] == NULL) ? '' : '6.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name6'] ?></span></td>
          <td><?php echo $spb['spb_nik6'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name7'] == NULL) ? '' : '7.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name7'] ?></span></td>
          <td><?php echo $spb['spb_nik7'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name8'] == NULL) ? '' : '8.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name8'] ?></span></td>
          <td><?php echo $spb['spb_nik8'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name9'] == NULL) ? '' : '9.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name9'] ?></span></td>
          <td><?php echo $spb['spb_nik9'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name10'] == NULL) ? '' : '10.' ?></td>
          <td><span class="upper"><?php echo $spb['spb_name10'] ?></span></td>
          <td><?php echo $spb['spb_nik10'] ?></td>
        </tr>
      </table><br>
      <p align="justify">Demikian yang kami sampaikan, atas perhatiannya dan kerjasamanya kami ucapkan terima kasih. </p>
      <br>

      <table border="0">
        <tbody>
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
              <td><u><strong>( TATI NURHAYATI )</strong></u></td>
              <td></td>                        
            </tr>
            <tr>
              <td><em><strong>People Development Manager</strong></em></td>
              <td></td>                        
            </tr>
          </tbody></table>
        </body>
        </html>