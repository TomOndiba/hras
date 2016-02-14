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
    margin-top: 5cm;
    margin-bottom: 5cm;
    margin-left: 7cm;
    margin-right: 3cm;
  } </style>
</head>
<body>
  
  <p> Kepada Yth :</p>
  <table width="406" border="0">
    <tr>
      <td width="242"><strong><?php echo $memorandum['memorandum_employe_name'] ?></strong></td>
      <td width="154">Surat Panggilan Ke-1 </td>
    </tr>
    <tr>
      <td colspan="2"><?php echo $memorandum['employe_address'] ?></td>
    </tr><br>
</table>
  <table width="406" border="0">
    <tr>
      <td width="66">TLP/HP : </td>
      <td width="330"><?php echo $memorandum['employe_phone'] ?></td>
    </tr>
</table>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
  
</body>
</html>