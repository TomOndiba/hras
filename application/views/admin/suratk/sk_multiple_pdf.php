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
				margin-bottom: 1.7cm;
				margin-left: 5.0em;
				margin-right: 5.0em;
				} .style12 {font-size: 10px}
    .style13 {
	font-size: 24px;
	font-weight: bold;
}
    </style>
    </head>
    <body>
    <?php foreach ($sk as $row): ?>
    <div style="padding:0px 0px;">      
        <p align="center"><span class="style13"><u>SURAT KETERANGAN</u></span><br>
	<?php echo $row['sk_number'] ?>/S-Ket/CLS2/<?php $this->load->helper('tanggal'); 
  $namaBulan=konversiBulan(pretty_date($row['sk_date'],'m',false)); echo $namaBulan; ?>/<?php echo pretty_date( $row['sk_date'],'Y',false) ?></td></p><br>
        <p align="left">Saya yang bertanda tangan dibawah ini :</p>
        <table width="558" border="0">
          <tr>
            <td width="67" scope="col">Nama</td>
            <td width="13" scope="col">:</td>
            <td width="464" scope="col">Tati Nurhayati </td>
          </tr>
          <tr>
            <td>NIK</td>
            <td>:</td>
            <td>03050129</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>People Development Manager </td>
          </tr>
        </table><br>
        <p>Menerangkan bahwa atas nama karyawan berikut ini :</p>
        <table width="560" border="0">
          <tr>
            <td width="68" scope="col">Nama</td>
            <td width="14" scope="col">:</td>
            <td width="464" scope="col"><span class="cap"><?php echo $row['sk_employe_name'] ?></span></td>
          </tr>
          <tr>		  
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $row['sk_employe_nik'] ?></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $row['sk_employe_position'] ?></td>
          </tr>
        </table>
		<br>
		<p align="justify">Adalah benar sebagai karyawan PT. Sumber Alfaria Trijaya Tbk. Branch Cileungsi II yang aktif bekerja
			sejak tanggal <?php echo pretty_date( $row['sk_employe_date_register'],'d F Y',false) ?> sampai dengan sekarang dengan status sebagai karyawan tetap.</p><br>
		<p align="justify">Demikian surat keterangan ini dibuat dengan sebenarnya dan dipergunakan sebagai <?php echo $row['sk_description'] ?>.</p>
       <br>
        
        <table border="0">
                <tbody>
                    <tr>
                        <td>Cileungsi, <?php echo pretty_date( $row['sk_date'],'d F Y',false) ?></td>
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
                        <td><u><strong>( TATI NURHAYATI )</strong></u></td>
                        <td></td>                        
                    </tr>
                    <tr>
                        <td><em><strong>People Development Manager</strong></em></td>
                        <td></td>                        
                    </tr>
                  </tbody></table>
    
	<p>Tembusan : <br>
	1. Personalia)<br>
	2. Karyawan Ybs<br><br><br><br>
	<?php endforeach; ?>
    </body>
</html>