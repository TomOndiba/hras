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
        margin-top: 1cm;
        margin-bottom: 0.1em;
        margin-left: 5.0em;
        margin-right: 1cm;
    } .style12 {font-size: 10px}
    .style13 {
        font-size: 24px;
        font-weight: bold;
    }
    body {
        font-family: sans-serif;
    }
</style>
<style type="text/css">
    table {
        border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
    }
</style>
</head>
<body>
    <div style="padding:0px 0px;">
        <div align="left">              
          <img width="230" height="60" src="<?php echo media_url() ?>/images/bpjstk.png" alt="">       
      </div>
      <div style="padding:0px 0px;">      
        <p align="center"><span class="style13">PERNYATAAN KOREKSI / HILANG<br>
         KARTU PESERTA BPJS KETENAGAKERJAAN</span></p>
         <p align="left">Saya yang bertanda tangan dibawah ini :</p>

         <table width="100%">
            <tr>
                <td>&nbsp;Nama Tenaga Kerja</td>
                <td><center>:</center></td>
                <td><span class="cap">&nbsp;<?php echo $bpjstk['bpjstk_name'] ?></span></td>
            </tr>
            <tr>
                <td>&nbsp;Nomor Kartu</td>
                <td><center>:</center></td>
                <td>&nbsp;<?php echo $bpjstk['bpjstk_card'] ?></td>
            </tr>
            <tr>
                <td>&nbsp;Nama Perusahaan</td>
                <td><center>:</center></td>
                <td>&nbsp;PT. Sumber Alfaria Trijaya, Tbk</td>
            </tr>
            <tr>
                <td>&nbsp;NPP</td>
                <td><center>:</center></td>
                <td>&nbsp;<?php echo $bpjstk['bpjstk_npp'] ?></td>
            </tr>
            <tr>
                <td>&nbsp;Kepesertaan Awal</td>
                <td><center>:</center></td>
                <td>&nbsp;<?php echo pretty_date($bpjstk['bpjstk_entry_date'],'d F Y',false) ?></td>
            </tr>
            <tr>
                <td>&nbsp;Tgl/Bulan/Tahun Non Aktif</td>
                <td><center>:</center></td>
                <td></td>
            </tr>
        </table>
        <p>&nbsp;<br>
            Dengan ini menyatakan :</p>

            <p>A. Belum Mendapatkan Kartu BPJS Ketenagakerjaan Plastik</p>
            <p>B. Kartu Bpjs Ketenagakerjaan Plastik Hilang</p>
            <p>C. Koreksi Kartu Kepesertaan</p>

            <table width="100%">
                <tr>
                    <td align="center">No</td>
                    <td>&nbsp;Data Tenaga Kerja</td>
                    <td align="center">Tercantum</td>
                    <td align="center">Seharusnya</td>
                </tr>
                <tr>
                    <td align="center">1</td>
                    <td>&nbsp;Nama</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td>&nbsp;Tanggal Lahir</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">3</td>
                    <td>&nbsp;Nama Ibu Kandung</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">4</td>
                    <td>&nbsp;Data Lainnya</td>
                    <td></td>
                    <td></td>
                </tr>        
            </table>
            <p>&nbsp;<br>
                Demikian surat pernyataan ini saya buat dengan sebenarnya dan apabila di kemudian
                hari ternyata tidak benar maka saya bersedia di tuntut sesuai dengan hukum yang berlaku.</p>

                <table width ="100%" border="0">
                    <tr>
                        <td></td>
                        <td width="180">Bogor, <?php echo pretty_date($bpjstk['bpjstk_date'], 'd F Y',false)?></td>
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
                        <td width="180">( <span class="cap"><?php echo $bpjstk['bpjstk_name']?></span> )</td>
                    </tr>
                    <tr>
                        <td>Pimpinan Perusahaan</td>
                        <td width="180">Nama dan Tanda Tangan</td>

                    </table>
                    <p>Catatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: - Pilihan Saudara diberi tanda silang (x)</p>
                    <p>Data pendukung : <br>
                      &nbsp;&nbsp;&nbsp;  1. Fotocopy Form 1A apabila kesalah pada BPJS Ketenagakerjaan<br>
                      &nbsp;&nbsp;&nbsp;   2. Fotocopy KTP untuk kehilangan / koreksi salah serta mengembalikan Kartu Kepesertaan<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Asli apabila terjadi kesalahan nama / tanggal lahir.<br>
                      &nbsp;&nbsp;&nbsp;   3. Surat Keterangan Kepolisian yang masih berlaku bagi tenaga kerja kehilangan Kartu<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kepesertaan BPJS Ketenagakerjaan.</p>

                  </body>
                  </html>