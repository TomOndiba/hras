<html>
<head>
  <style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
 </style>
 <style type="text/css">

 body {
    font-family: sans-serif;
  }
  @page {
    margin-top: 0.7cm;
    margin-bottom: 0.2cm;
    margin-left: 2cm;
    margin-right: 2cm;
  } .style16 {font-size: 24px}
  .style17 {font-size: 12px}
  
  body {
   margin-top: 0px;
   margin-bottom: 0px;
 }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></head>
<body>
  <div style="padding:0px 0px;">
    <div align="right">
      <table width="317" border="0" align="left">
        <tr>
          <th width="266" scope="col"><div align="left" class="style8">&nbsp;</div></th>
        </tr>
        <tr>
          <td><div align="right"><span class="style3 style16"><strong>Fakultas Operation </strong></span></div></td>
        </tr>
      </table>              
      <strong><img src="<?php echo media_url() ?>/images/stl.jpg" alt=""></strong></div>       
    </div>
    <hr size="4">
    <p align="center" class="style18"><strong><span class="style16">Surat Tanda Lulus</span><br>
      NO : <?php echo $stl['stl_number'] ?>/SLDP-OPR/<?php $this->load->helper('tanggal'); $namaBulan=konversiBulan(pretty_date($stl['stl_date'],'m',false)); echo $namaBulan; ?>/<?php echo pretty_date( $stl['stl_date'],'Y',false) ?></strong></p>
      <span class="style18"><br>
      </span>
      <p align="justify" class="style18">Fakultas Operation PT. Sumber Alfaria Trijaya, Tbk. dengan ini menerangkan bahwa peserta terlampir telah mengikuti :
        <table width="558" border="0">
          <tr>
            <td width="154" class="style18" scope="col">Nama Program Studi</td>
            <td width="10" class="style18" scope="col">:</td>
            <td width="386" class="style18" scope="col">Store Leader Development Program 7P</td>
          </tr>
          <tr>
            <td class="style18">Batch</td>
            <td class="style18">:</td>
            <td class="style18"><?php $this->load->helper('tanggal'); $namaBulan=konversiBulan($stl['stl_batch']); echo $namaBulan; ?></td>
          </tr>
          <tr>
            <td class="style18">Periode Studi </td>
            <td class="style18">:</td>
            <td class="style18"><?php echo pretty_date($stl['stl_date'], 'd F Y',false)?></td>
          </tr>
        </table>
        <p class="style18">&nbsp;</p>     
        <p align="justify" class="style18">Dengan nilai peserta disajikan dalam lampiran terpisah. Selanjutnya, peserta tersebut akan ditempatkan sesuai dengan kebutuhan perusahaan.</p>
        <span class="style18"><br>        
        </span>
        <p align="justify" class="style18">Demikianlah surat tanda lulus ini dibuat hanya untuk kepentingan PT. Sumber Alfaria Trijaya,Tbk. </p>
        <span class="style18"><br>
          <br>
          <br>
        </span>
        <table border="0" align="right">
          <tbody>
            <tr>
              <td class="style18"><div align="center">Cileungsi, <?php echo pretty_date(date('Y-m-d'), 'd F Y',FALSE) ?> </div></td>
              <td class="style18"><div align="center"></div></td>                        
            </tr>
            <tr>
              <td height="19" class="style18"><div align="center">Mengesahkan,</div></td>
              <td class="style18"><div align="center"></div></td>                        
            </tr>
          </tbody></table>        

          <table width="166" border="0" align="left">
            <tbody>
              <tr>
                <td width="88" class="style18">&nbsp;</td>
                <td width="10" class="style18"></td>
              </tr>
              <tr>
                <td class="style18"><div align="center">Mengetahui,</div></td>
                <td class="style18"><div align="center"></div></td>
              </tr>
            </tbody>
          </table>
          <p class="style18"><br>
            <br>
          </p>
          <p class="style18"><br>
          </p>
          <p class="style18">&nbsp;</p>
          <table border="0" align="right">
            <tbody>
              <tr>
                <td class="style18"><div align="center"><u>( RINEKSO WIDYANTO)</u></div></td>
                <td class="style18"></td>                        
              </tr>
              <tr>
                <td class="style18"><div align="center"><em>Branch Manager</em></div></td>
                <td class="style18"></td>                        
              </tr>
            </tbody></table>
            <table border="0" align="left">
              <tbody>
                <tr>
                  <td class="style18"><div align="center"><u>( TATI NURHAYATI )</u></div></td>
                  <td class="style18"></td>
                </tr>
                <tr>
                  <td class="style18"><div align="center"><em>People Development Manager</em></div></td>
                  <td class="style18"><div align="center"></div></td>
                </tr>
              </tbody>
            </table>
            <p class="style18"><br>

              <br>
              <br>
            </p>          
            <p class="style18">&nbsp;</p>
            <p class="style18">&nbsp;</p>
            <p class="style18">&nbsp;</p>
            <p class="style18">&nbsp;</p>
            <p class="style18">&nbsp;</p>
            <p class="style18">
              <span class="style17">NRA: SAT/FRM/TR/061_Rev:001_220915</span> <br><br>
              <div style="padding:0px 0px;">
                <div align="right">
                  <table width="317" border="0" align="left">
                    <tr>
                      <th width="266" scope="col"><div align="left" class="style8">&nbsp;</div></th>
                    </tr>
                    <tr>
                      <td><div align="right"><span class="style3 style16"><strong>Fakultas Operation </strong></span></div></td>
                    </tr>
                  </table>              
                  <strong><img src="<?php echo media_url() ?>/images/stl.jpg" alt=""></strong></div>       
                </div>
                <hr size="4">                                
                <p align="center" class="style18"><strong><span class="style16">Transkrip Nilai</span><br>
                  NO : <?php echo $stl['stl_number'] ?>/SLDP-OPR/<?php $this->load->helper('tanggal'); $namaBulan=konversiBulan(pretty_date($stl['stl_date'],'m',false)); echo $namaBulan; ?>/<?php echo pretty_date( $stl['stl_date'],'Y',false) ?>
                </strong></p></strong><span class="style18"><br>
              </span></p>
              <table width="488" style="margin:0 auto;width:80%;border-collapse:collapse">
                <tr>
                  <td width="26" style="border:1px solid; background: #f4f49f"><div align="center"><strong>NO</strong></div></td>
                  <td width="132" style="border:1px solid; background: #f4f49f"><div align="center"><strong>NAMA</strong></div></td>
                  <td width="58" style="border:1px solid; background: #f4f49f"><div align="center"><strong>NIK</strong></div></td>
                  <td width="110" style="border:1px solid; background: #f4f49f"><div align="center"><strong>JABATAN</strong></div></td>
                  <td width="37" style="border:1px solid; background: #f4f49f"><div align="center"><strong>IPK</strong></div></td>
                  <td width="99" style="border:1px solid; background: #f4f49f"><div align="center"><strong>PREDIKAT KELULUSAN </strong></div></td>
                </tr>
                <tr>
                  <td style="border:1px solid"><div align="center">1</div></td>
                  <td style="border:1px solid"><div align="center" class="cap"><?php echo $stl['employe_name'] ?></div></td>
                  <td style="border:1px solid"><div align="center"><?php echo $stl['employe_nik'] ?></div></td>
                  <td style="border:1px solid"><div align="center"><?php echo $stl['employe_position'] ?></div></td>
                  <td style="border:1px solid"><div align="center"><?php echo $stl['stl_ipk'] ?></div></td>
                  <td style="border:1px solid"><div align="center"><?php echo $stl['stl_desc'] ?></div></td>
                </tr>
              </table><br>
              <p class="style18">&nbsp;</p>
              <p class="style18">&nbsp;</p>
              <table border="0" align="right">
                <tbody>
                  <tr>
                    <td class="style18"><div align="center">Cileungsi, <?php echo pretty_date(date('Y-m-d'), 'd F Y',FALSE) ?> </div></td>
                    <td class="style18"><div align="center"></div></td>                        
                  </tr>
                  <tr>
                    <td height="19" class="style18"><div align="center">Mengesahkan,</div></td>
                    <td class="style18"><div align="center"></div></td>                        
                  </tr>
                </tbody></table>        

                <table width="166" border="0" align="left">
                  <tbody>
                    <tr>
                      <td width="88" class="style18">&nbsp;</td>
                      <td width="10" class="style18"></td>
                    </tr>
                    <tr>
                      <td class="style18"><div align="center">Membuat,</div></td>
                      <td class="style18"><div align="center"></div></td>
                    </tr>
                  </tbody>
                </table>
                <p class="style18"><br>
                  <br>
                </p>
                <p class="style18"><br>
                </p>
                <p class="style18">&nbsp;</p>
                <table border="0" align="right">
                  <tbody>
                    <tr>
                      <td class="style18"><div align="center"><u>( TATI NURHAYATI )</u></div></td>
                      <td class="style18"></td>                        
                    </tr>
                    <tr>
                      <td class="style18"><div align="center"><em>People Development Manager</em></div></td>
                      <td class="style18"></td>                        
                    </tr>
                  </tbody></table>
                  <table border="0" align="left">
                    <tbody>
                      <tr>
                        <td width="141" class="style18"><div align="center"><u>( DWI MAWAN S )</u></div></td>
                        <td width="10" class="style18"></td>
                      </tr>
                      <tr>
                        <td class="style18"><div align="center"><em>Branch Trainer</em></div></td>
                        <td class="style18"><div align="center"></div></td>
                      </tr>
                    </tbody>
                  </table>

                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p><strong>Keterangan Nilai :</strong> </p>
                  <table width="500" style="margin:0 auto;width:80%;border-collapse:collapse">
                    <tr>
                      <td colspan="2" style="border:1px solid; background: #f4f49f"><div align="center"><strong>RANGE NILAI</strong></div> </td>
                      <td width="90" style="border:1px solid; background: #f4f49f"><div align="center"><strong>INDEKS PRESTASI</strong></div> </td>
                      <td width="112" style="border:1px solid; background: #f4f49f"><div align="center"><strong>KETERANGAN</strong></div></td>
                      <td width="180"style="border:1px solid; background: #f4f49f"><div align="center"><strong>PREDIKAT</strong></div></td>
                    </tr>
                    <tr>
                      <td style="border:1px solid" width="20"><div align="center">A</div></td>
                      <td style="border:1px solid" width="76"><div align="center">86 &gt; </div></td>
                      <td style="border:1px solid"><div align="center">3.44&gt;</div></td>
                      <td style="border:1px solid"><div align="center">LULUS</div></td>
                      <td style="border:1px solid"><div align="center">CUM LAUDE </div></td>
                    </tr>
                    <tr>
                      <td style="border:1px solid"><div align="center">B</div></td>
                      <td style="border:1px solid"><div align="center">76 - &lt;86 </div></td>
                      <td style="border:1px solid"><div align="center">3.04 - &lt;3.44</div></td>
                      <td style="border:1px solid"><div align="center">LULUS</div></td>
                      <td style="border:1px solid"><div align="center">SANGAT MEMUASKAN </div></td>
                    </tr>
                    <tr>
                      <td style="border:1px solid"><div align="center">C</div></td>
                      <td style="border:1px solid"><div align="center">66 - &lt;76</div></td>
                      <td style="border:1px solid"><div align="center">2.64 - &lt;3.04</div></td>
                      <td style="border:1px solid"><div align="center">LULUS</div></td>
                      <td style="border:1px solid"><div align="center">MEMUASKAN</div></td>
                    </tr>
                    <tr>
                      <td style="border:1px solid"><div align="center">D</div></td>
                      <td style="border:1px solid"><div align="center">55 - &lt;66</div></td>
                      <td style="border:1px solid"><div align="center">2.2 - &lt;2.64</div></td>
                      <td style="border:1px solid"><div align="center">TIDAK LULUS </div></td>
                      <td style="border:1px solid"><div align="center">KURANG MEMUASKAN </div></td>
                    </tr>
                    <tr>
                      <td style="border:1px solid"><div align="center">E</div></td>
                      <td style="border:1px solid"><div align="center">0 - &lt;55</div></td>
                      <td style="border:1px solid"><div align="center">0 - &lt;2.2</div></td>
                      <td style="border:1px solid"><div align="center">TIDAK LULUS </div></td>
                      <td style="border:1px solid"><div align="center">TIDAK MEMUASKAN </div></td>
                    </tr>
                  </table>
                  <p><br>
                    <br>
                    <br>
                    <br>
                  </p>
                  <p>&nbsp;</p>
                  <p class="style18">
                    <span class="style17">NRA: SAT/FRM/TR/061_Rev:001_220915</span></p>
                    <p>&nbsp;</p>
                  </body>
                  </html>