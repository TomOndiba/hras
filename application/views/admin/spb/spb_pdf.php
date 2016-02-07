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
      <td width="59">Nomor</td>
      <td width="10">:</td>
      <td width="291"><?php echo $spb['spb_number'] ?>/SATHRD-CLS2/<?php $this->load->helper('tanggal'); 
        $namaBulan=konversiBulan(pretty_date($spb['spb_date'],'m',false)); echo $namaBulan; ?>/<?php echo pretty_date( $spb['spb_date'],'Y',false) ?></td><td width="17"></p><td width="10"></td>
        <td width="129" scope="col"><div align="left">Cileungsi, <?php echo pretty_date( $spb['spb_date'],'d F Y',false) ?></div></td>
      </tr>      
      <tr>
        <td>Hal</td>
        <td>:</td>
        <td><strong><u>Dispensasi Pembukaan Rekening Baru  <u></strong></td>
      </tr>
    </table>
    <br>
    <p align="left">Kepada Yth,<br>
    Kepala Kantor Cabang BCA <strong><?php echo $spb['bank_name'] ?></strong> <br>
      Di Tempat. </p><br>
      <p>Dengan Hormat,</p><br>
      <p>Yang bertanda tangan dibawah ini : </p>
      <table width="558" border="0">
        <tr>
          <td width="67" scope="col">Nama</td>
          <td width="13" scope="col">:</td>
          <td width="464" scope="col">Tati Nurhayati</td>
        </tr>
        <tr>
          <td>NIK</td>
          <td>:</td>
          <td>03050129</td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>:</td>
          <td>People Development Manager</td>
        </tr>
      </table>      
      <table width="553" border="0">
        <tr>
          <td width="31"><div align="left"><strong>No.</strong></div></td>
          <td width="216"><div align="left"><strong>Nama</strong></div></td>
          <td width="292"><div align="left"><strong>Nomor KTP </strong></div></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name1'] == NULL) ? '' : '1.' ?></td>
          <td><?php echo $spb['spb_name1'] ?></td>
          <td><?php echo $spb['spb_nik1'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name2'] == NULL) ? '' : '2.' ?></td>
          <td><?php echo $spb['spb_name2'] ?></td>
          <td><?php echo $spb['spb_nik2'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name3'] == NULL) ? '' : '3.' ?></td>
          <td><?php echo $spb['spb_name3'] ?></td>
          <td><?php echo $spb['spb_nik3'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name4'] == NULL) ? '' : '4.' ?></td>
          <td><?php echo $spb['spb_name4'] ?></td>
          <td><?php echo $spb['spb_nik4'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name5'] == NULL) ? '' : '5.' ?></td>
          <td><?php echo $spb['spb_name5'] ?></td>
          <td><?php echo $spb['spb_nik5'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name6'] == NULL) ? '' : '6.' ?></td>
          <td><?php echo $spb['spb_name6'] ?></td>
          <td><?php echo $spb['spb_nik6'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name7'] == NULL) ? '' : '7.' ?></td>
          <td><?php echo $spb['spb_name7'] ?></td>
          <td><?php echo $spb['spb_nik7'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name8'] == NULL) ? '' : '8.' ?></td>
          <td><?php echo $spb['spb_name8'] ?></td>
          <td><?php echo $spb['spb_nik8'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name9'] == NULL) ? '' : '9.' ?></td>
          <td><?php echo $spb['spb_name9'] ?></td>
          <td><?php echo $spb['spb_nik9'] ?></td>
        </tr>
        <tr>
          <td><?php echo ($spb['spb_name10'] == NULL) ? '' : '10.' ?></td>
          <td><?php echo $spb['spb_name10'] ?></td>
          <td><?php echo $spb['spb_nik10'] ?></td>
        </tr>
      </table>
      <p align="justify">Demikian surat ini kami sampaikan, atas perhatiannya kami mengucapkan terima kasih. </p>
      <br><br><br>

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