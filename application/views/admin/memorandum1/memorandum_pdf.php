<html>
    <head>
    <style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
</style>
    </head>
    <body>
    <div style="padding:0px 0px;">

            <div align="center">
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <h3><strong><u> SURAT PANGGILAN</u></strong></h3>              
          <?php echo $memorandum['memorandum_number'] ?>/SAT-HRA/CLS2/<?php $this->load->helper('tanggal'); $namaBulan=konversiBulan(pretty_date(date('Y-m-d'), 'm',false)); echo $namaBulan; ?>/<?php echo pretty_date(date('Y-m-d'), 'Y',false)?>              </p>
            </div>
			<br>
            <p align="justify"> Yang bertanda tangan dibawah ini,</p>

            <table border="0">
                <tbody>
                    <tr>
                        <td width="121">Nama</td>
                        <td width="10">:</td>
                        <td width="526">TATI NURHAYATI</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>People Development Manager</td>
                    </tr>
                    <tr>
                        <td>Perusahaan</td>
                        <td>:</td>
                        <td>PT. Sumber Alfaria Trijaya, Tbk</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Kawasan Industri Menara Permai Kav.18 Jl. Raya Narogong KM. 23,8 Cileungsi </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Bogor Kode Pos 16820 </td>
                    </tr>
                </tbody>
            </table>
            
            <p align="justify"> Menerangkan bahwa,</p>
             <table border="0">
                <tbody>
                    <tr>
                        <td width="120">Nama</td>
                        <td width="11">:</td>
                        <td width="524"> <span class="upper"><?php echo $memorandum['employe_name'] ?></span></td>
                    </tr>
                </tbody>
             </table>
            <br>
            <p align="justify">Bahwa yang bersangkutan telah melaksanakan kegiatan magang kerja di PT. Sumber Alfaria Trijaya, Tbk magang kerja tersebut telah dilaksanakan selama 3 bulan, yaitu mulai tanggal <?php echo pretty_date( $memorandum['memorandum_input_date'],'d F Y',false) ?> s/d tanggal <?php echo pretty_date( $memorandum['memorandum_last_update'],'d F Y',false) ?>.</p>
            
            <p align="justify">Selama bekerja, yang bersangkutan telah menunjukan presetasi dan dedikasi yang baik, Manajemen mengucapkan terima kasih atas partisipasinya selama magang di perusahaan.</p>
            
            <p align="justify">Demikian Surat Keterangan Magang ini dibuat dengan sebenarnya, untuk dapat dipergunakan seperlunya.</p>
            
            <br><br>            
            <table border="0">
                <tbody>
                    <tr>
                        <td>Cileungsi, <?php echo pretty_date(date('Y-m-d'), 'd F Y',false)?> </td>
                        <td></td>                        
                    </tr>
                    <tr>
                        <td>PT. Sumber Alfaria Trijaya, Tbk</td>
                        <td></td>                        
                    </tr>
              </tbody></table>             
           
                <br>
                <br>
                <br>
                <br>
                <br>
                <table border="0">
                <tbody>
                    <tr>
                        <td><u><strong>TATI NURHAYATI</strong></u></td>
                        <td></td>                        
                    </tr>
                    <tr>
                        <td><em><strong>People Development Manager</strong></em></td>
                        <td></td>                        
                    </tr>
                  </tbody></table>
    </div>
    </body>
</html>