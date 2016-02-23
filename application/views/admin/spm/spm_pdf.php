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
  font-size: 24px;
  font-weight: bold;
}
    </style>
    </head>
    <body>
    <div style="padding:0px 0px;">      
        <p align="center"><span class="style13"><u>SURAT PENGANTAR MUTASI</u></span><br>
  <?php echo $spm['spm_number'] ?>/SPM-SAT/CLS2/<?php $this->load->helper('tanggal'); 
  $namaBulan=konversiBulan(pretty_date($spm['spm_date'],'m',false)); echo $namaBulan; ?>/<?php echo pretty_date( $spm['spm_date'],'Y',false) ?></td></p><br>
        
        <p align="left">Kepada Yth,<br>
        People Development<br>
        <?php echo $spm['spm_branch'] ?> <br>
        Di tempat.</p><br>

        <p align="left">Yang bertanda tangan dibawah ini :</p>
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
        <p>Menerangkan bahwa pembawa surat ini :</p>
        <table width="560" border="0">
          <tr>
            <td width="68" scope="col">Nama</td>
            <td width="14" scope="col">:</td>
            <td width="464" scope="col"><span class="cap"><?php echo $spm['spm_employe_name'] ?></span></td>
          </tr>
          <tr>      
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $spm['spm_employe_nik'] ?></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $spm['spm_employe_position'] ?></td>
          </tr>
        </table>
    <br>
    <p align="justify">Telah dimutasikan dari Branch Cileungsi 2 ke <?php echo $spm['spm_branch'] ?>, terhitung mulai tanggal
       <?php echo pretty_date( $spm['spm_date'],'d F Y',false) ?> jabatan <?php echo $spm['spm_employe_position'] ?>.</p><br>
    <p align="justify">Demikian surat pengantar ini dibuat untuk dipergunakan sebagaimana mestinya. Atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
       <br>
        
        <table border="0">
                <tbody>
                    <tr>
                        <td>Cileungsi, <?php echo pretty_date(date('Y-m-d'), 'd F Y',FALSE) ?></td>
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
                  </tbody></table><br>
  
    
    </body>
</html>