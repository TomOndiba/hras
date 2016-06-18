<!DOCTYPE html>
<html>
<head>
  <title><?php echo $par['par_employe_name'] ?></title> 
  <link rel="icon" href="<?php echo media_url('ico/a.png'); ?>" type="image/x-icon">
  <style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
 </style>
 <style type="text/css">
  @page {
    margin-top: 0.4cm;
    margin-bottom: 0.1em;
    margin-left: 0.5cm;
    margin-right: 0.3cm;
  }
  body {
    font-family: sans-serif;
  }
  table {
    border-collapse: collapse;
  }

  fieldset {
    border: 2px solid;
    border-width:thin;
  }
</style>
</head>
<body>
  <fieldset>
    <table width="100%">
      <tr>
        <td style="font-size: 10px"><strong>PT SUMBER ALFARIA TRIJAYA Tbk</strong></td>
      </tr>
      <tr>
        <td style="font-size: 12px"><strong>Program Approval Request (PAR) - JASA</strong></td>
      </tr>
      <tr>
        <td style="font-size: 1px">&nbsp;</td>
      </tr>
    </table>  
    <table width="100%">
      <tbody>
        <tr>
          <td width="16%" style="font-size: 10px">No. PAR</td>
          <td width="29%" style="border-style: solid; border-width:thin; font-size: 10px"><strong><?php echo $par['par_number'] ?>/SAT-HRD/<?php echo $setting_initial['setting_value'] ?>/<?php $this->load->helper('tanggal'); $namaBulan=konversiBulan(pretty_date($par['par_input_date'],'m',false)); echo $namaBulan; ?>/<?php echo pretty_date( $par['par_input_date'],'Y',false) ?></strong></td>
          <td width="10%" style="font-size: 10px">&nbsp;Cost Center</td>
          <td width="45%" style="border-style: solid; border-width:thin;font-size: 10px"><strong><?php echo $par['cost_code'] ?></strong></td>
        </tr>
        <tr>
          <td style="font-size: 10px">Kode Unit Usaha</td>
          <td style="border-style: solid; border-width:thin;font-size: 10px"><strong><?php echo $setting_unit['setting_value'] ?> - DC&nbsp;<span class="upper"><?php echo $setting_branch['setting_value'] ?></span></strong></td>
          <td style="font-size: 8px" colspan="2"><i>&nbsp;No. PAR, Kode Unit Usaha dan Cost Center diisi oleh Dep Pengguna / Pemohon<i></td>
        </tr>
      </tbody>
    </table>
  </fieldset>
  <p style="font-size: 1px">&nbsp;</p>
  <fieldset>
    <table>
      <tr>
        <td style="font-size: 10px"><i>Di isi Oleh Pemohon</i></td>
      </tr>
    </table>
    <hr style="border-style: solid; border-width:thin;">
    <table width="100%">
      <tbody>
        <tr>
          <td style="font-size: 10px">Nama</td>
          <td style="font-size: 10px">:</td>
          <td style="border-style: solid; border-width:thin;font-size: 10px"><?php echo $setting_employe_name['setting_value'] ?></td>
        </tr>
        <tr>
          <td style="font-size: 10px">Ref. Project / Program</td>
          <td style="font-size: 10px">:</td>
          <td style="font-size: 7px">&nbsp;</td>
        </tr>
        <tr>
          <td style="font-size: 10px">Departemen / Cabang</td>
          <td style="font-size: 10px">:</td>
          <td style="border-style: solid; border-width:thin;font-size: 10px">Human Capital / <span class="cap"> <?php echo $setting_branch['setting_value'] ?></span></td>
        </tr>
        <tr>
          <td style="font-size: 5px">&nbsp;</td>
          <td style="font-size: 5px">&nbsp;</td>
          <td style="font-size: 5px">&nbsp;</td>
        </tr>

        <tr>
          <td style="font-size: 10px">Maksud PAR</td>
          <td style="font-size: 10px">:</td>
          <td valign="top" style="border-style: solid; border-width:thin;font-size: 12px">Biaya Sumbangan Nikah Karyawan a.n : <?php echo $par['par_employe_name'] ?> (<?php echo $par['par_employe_nik'] ?>) <?php echo ($par['par_employe_unit'] == $setting_unit['setting_value']) ? '-'.' '. $par['par_employe_position'].' '.'/'.' '.$par['par_employe_departement'] : 'di toko'.' '. $par['par_employe_unit'].' '.'-'.$par['par_employe_bussiness'] ?>. Transfer ke no rek : <?php echo $par['par_employe_account'] ?></td>
        </tr>
        <tr>
          <td style="font-size: 10px">Total Dana</td>
          <td style="font-size: 10px">:</td>
          <td style="font-size: 12px"><strong>Rp. <u><?php echo number_format($par['par_paid'], 0, ',', '.');?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></strong>
            <span style="font-size: 9px">,00 INC PPN 10 %</span></td>
          </tr>
          <tr>
            <td style="font-size: 5px">&nbsp;</td>
            <td style="font-size: 5px">&nbsp;</td>
            <td style="font-size: 5px">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <table width="100%">
        <tbody>
          <tr>
            <td width="16%">&nbsp;</td>
            <td style="font-size: 10px" width="12%">Terbilang</td>
            <td style="border-style: solid; border-width:thin;font-size: 10px" width="69%" rowspan="2" height="2" valign="top"><span class="cap"><strong><?php $this->load->helper('tanggal'); echo to_word($par['par_paid'])?> Rupiah</strong></span></td>
          </tr>
          <tr>
            <td style="font-size: 4px">&nbsp;</td>
            <td style="font-size: 4px">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size: 7px">&nbsp;</td>
            <td style="font-size: 7px">&nbsp;</td>
            <td style="font-size: 7px">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <table width="100%">
        <tbody>
          <tr>
            <td width="16%" style="font-size: 10px">Cara Realisasi Dana</td>
            <td width="5%" style="font-size: 10px">:</td>
            <td width="3%" style="border-style: solid; border-width:thin; font-size: 10px; text-align: center;">A</td>
            <td width="9%" style="font-size: 10px">&nbsp;&nbsp; Tunai</td>
            <td width="3%" style="border-style: solid;border-width:thin; font-size: 10px; text-align: center;">B</td>
            <td width="21%" style="font-size: 10px">&nbsp;&nbsp; Bertahap, beri keterangan :</td>
            <td width="41%" style="border-style: solid;border-width:thin; font-size: 2px" rowspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size: 4px">&nbsp;>&nbsp;</td>
            <td style="font-size: 4px">&nbsp;>&nbsp;</td>
            <td colspan="4" style="font-size: 8px"><i>Beri tanda &quot;X&quot; (silang) di kotak pilihan</i></td>
          </tr>
        </tbody>
      </table>
      <table width="100%">
        <tbody>
          <tr>
            <td width="91" style="font-size: 10px">Cara Pembayaran</td>
            <td width="27" style="font-size: 10px">:</td>
            <td width="13" style="border-style: solid;border-width:thin; font-size: 10px; text-align: center;">A</td>
            <td width="45" style="font-size: 10px">&nbsp;Giro</span></td>
            <td width="13" style="border-style: solid;border-width:thin; font-size: 10px; text-align: center;">B</td>
            <td width="60" style="font-size: 10px">&nbsp;Cheque</span></td>
            <td width="13" style="border-style: solid;border-width:thin; font-size: 10px; text-align: center;">C</td>
            <td width="600" style="font-size: 10px">&nbsp;Transfer&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 8px"><i>Beri tanda &quot;X&quot; (silang) di kotak pilihan</i></span></td>
          </tr>
        </tbody>
      </table>
      <table width="100%">
        <tbody>
          <tr>
            <td style="font-size: 5px">&nbsp;</td>
            <td style="font-size: 5px">&nbsp;</td>
            <td style="font-size: 5px">&nbsp;</td>
          </tr>
          <tr>
            <td width="16%" style="font-size: 10px">Tanggal Realisasi Dana</td>
            <td width="5%" style="font-size: 10px">:</td>
            <td width="31%" style="border-style: solid;border-width:thin;font-size: 5px">&nbsp;</td>
            <td width="47%" style="font-size: 5px">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <p style="font-size: 1px">&nbsp;</p>
      <hr style="border-style: solid;border-width:thin;">
      <table width="100%">
        <tr>
          <td style="font-size: 1px">&nbsp;</td>
        </table>
        <table width="100%">
          <tbody>
            <tr>
              <td width="22%"><span style="font-size: 9px"><strong>Pemohon</strong></span></td>
              <td width="20%"><span style="font-size: 9px"><strong>Atasan Pemohon</strong></span></td>
              <td width="4%" style="font-size: 5px">&nbsp;</td>
              <td width="21%"><span style="font-size: 9px"><strong>Menyetujui</strong></span></td>
              <td width="13%"style="font-size: 5px">&nbsp;</td>
              <td width="2%" style="font-size: 5px">&nbsp;</td>
              <td width="18%" style="font-size: 5px"><span style="font-size: 9px"><strong>Verifikasi Dept TAF</strong></span></td>
            </tr>
            <tr>
              <td valign="top" style="border-style: solid;border-width:thin;font-size: 8px">&nbsp;Mgr/BM/GM/Direktur<br>
                &nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                <span class="upper" style="font-size: 11px"><strong>&nbsp;<?php echo $setting_initial_pdm['setting_value'] ?></strong></span>&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl&nbsp;&nbsp;
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p></td>
                  <td valign="top" style="border-style: solid;border-width:thin;font-size: 8px">BM/GM/Direktur/sesuai proxy <br>
                    &nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                    <span style="font-size: 11px"><strong>&nbsp;</strong></span>&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl&nbsp;&nbsp;
                    <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                      <td valign="top" style="font-size: 5px">&nbsp;</td>
                      <td valign="top" style="border-style: solid;border-width:thin;font-size: 8px">BM/GM/Direktur <br>
                        &nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                        <span class="upper" style="font-size: 11px"><strong>&nbsp;<?php echo $setting_initial_bm['setting_value'] ?></strong></span>&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl&nbsp;&nbsp;
                        <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                        <td valign="top" style="border-style: solid;border-width:thin;font-size: 8px">Pejabat lain sesuai Proxy<br>
                          &nbsp;<br>&nbsp;<br>&nbsp;<br>
                          <span style="font-size: 11px"><strong>&nbsp;&nbsp;</strong></span>
                          <td valign="top" style="font-size: 5px">&nbsp;</td>
                          <td valign="top" style="border-style: solid;border-width:thin;font-size: 8px">HO / Branch Fin Spv <br>
                            &nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                            <span style="font-size: 10px">&nbsp;PAR LUNAS</span>&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl&nbsp;&nbsp;
                            <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                          </tr>
                        </tbody>
                      </table>
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td width="23%" style="font-size: 5px">&nbsp;</td>
                            <td width="18%" style="font-size: 5px"><span style="font-size: 7px">Lembar ke-1 (asli) untuk Dept TAF</span></td>
                            <td width="5%" style="font-size: 5px">&nbsp;</td>
                            <td width="27%" style="font-size: 5px"><span style="font-size: 7px">PERHATIAN : Wajib melampirkan dokumen</span></td>
                            <td width="7%" style="font-size: 5px">&nbsp;</td>
                            <td width="2%" style="font-size: 5px">&nbsp;</td>
                            <td width="18%" style="font-size: 5px"><span style="font-size: 7px">PAR Lunas tidak dapat digunakan </span></td>
                          </tr>
                          <tr>
                            <td style="font-size: 5px">&nbsp;</td>
                            <td style="font-size: 5px"><span style="font-size: 7px">Lembar ke-2  untuk Dept Pemohon</span></td>
                            <td style="font-size: 5px">&nbsp;</td>
                            <td style="font-size: 5px"><span style="font-size: 7px">yang diperlukan / semestinya</span></td>
                            <td style="font-size: 5px">&nbsp;</td>
                            <td style="font-size: 5px">&nbsp;</td>
                            <td style="font-size: 5px"><span style="font-size: 7px">kembali untuk pembayaran</span></td>
                          </tr>
                        </tbody>
                      </table>
                      <table width="100%">
                        <tr>
                          <td style="font-size: 7px">NRA : SAT/FRM/GA/019_Rev:002_231109</td>
                        </tr>
                      </table>  
                    </fieldset>
                    <br><br>
                    <fieldset>
                      <table width="100%">
                        <tr>
                          <td style="font-size: 10px"><strong>PT SUMBER ALFARIA TRIJAYA Tbk</strong></td>
                        </tr>
                      </table><br>
                      <table width="100%">
                        <tr>
                          <td align="center" style="font-size: 12px"><strong>BUKTI PENGELUARAN UANG</strong></td>
                        </tr>
                      </table><br>
                      <table width="100%">
                        <tr>
                          <td style="font-size: 11px">Untuk keperluan</td>
                          <td>&nbsp;</td>
                          <td style="border-bottom-style: solid;border-width:thin; font-size: 11px" >Biaya Sumbangan Nikah Karyawan a.n : <?php echo $par['par_employe_name'] ?> (<?php echo $par['par_employe_nik'] ?>) <?php echo ($par['par_employe_unit'] == $setting_unit['setting_value']) ? '-'.' '. $par['par_employe_position'].' '.'/'.' '.$par['par_employe_departement'] : 'di toko'.' '. $par['par_employe_unit'].' '.'-'.$par['par_employe_bussiness'] ?>.</td>
                        </tr>
                        <tr>
                          <td style="font-size: 11px">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td style="border-bottom-style: solid;border-width:thin; font-size: 11px">&nbsp;</td>
                        </tr>
                        <tr>
                          <td style="font-size: 11px">Jumlah</td>
                          <td>&nbsp;</td>
                          <td style="border-bottom-style: solid;border-width:thin; font-size: 11px">Rp. <strong><?php echo number_format($par['par_paid'], 0, ',', '.');?></strong>,-</td>
                        </tr>
                        <tr>
                          <td style="font-size: 11px">Terbilang</td>
                          <td>&nbsp;</td>
                          <td style="border-bottom-style: solid;border-width:thin; font-size: 11px"><span class="cap"><?php $this->load->helper('tanggal'); echo to_word($par['par_paid'])?> Rupiah</span></td>
                        </tr>
                      </table>
                      <table width="100%">
                        <tr>
                          <td>&nbsp;</td>
                          <td width="320">&nbsp;</td>
                          <td style="font-size: 11px">&nbsp;</td>
                          <td style="border-bottom-style: solid;border-width:thin; font-size: 11px">Cileungsi, <span class="cap"><?php echo pretty_date($par['par_input_date'],'d F Y',False)?></span></td>
                        </tr>
                      </table><br>
                      <table width="100%">
                        <tr align="center">
                          <td>&nbsp;</td>
                          <td width="9">&nbsp;</td>
                          <td style="font-size: 11px">Dibuat oleh,</td>
                          <td>&nbsp;</td>
                          <td style="font-size: 11px">Mengetahui,</td>
                          <td>&nbsp;</td>
                          <td style="font-size: 11px">Menyetujui,</td>
                        </tr>
                      </table><br><br><br>
                      <table width="100%">
                        <tr align="center">
                          <td>&nbsp;</td>
                          
                          <td width="100" style="border-bottom-style: solid;border-width:thin; font-size: 11px">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td style="border-bottom-style: solid;border-width:thin; font-size: 11px"><span class="upper"><strong><?php echo $setting_initial_pdm['setting_value'] ?></strong></span></td>
                          <td>&nbsp;</td>
                          <td style="border-bottom-style: solid;border-width:thin; font-size: 11px"><span class="upper"><strong><?php echo $setting_initial_bm['setting_value'] ?></strong></span></td>
                        </tr>
                      </table><br>
                      <table width="100%">
                        <tr>
                          <td style="font-size: 9px">No. NRA : SAT/FRM/FA/004</td>
                          </tr>
                          </table>
                    </fieldset>

                  </body>
                  </html>