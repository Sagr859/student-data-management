<?php
include 'dataconnect.php';
if(isset($_POST['content'])){
if($_POST['file_type']=="PDF"){

  require('../html_table2/html_table.php');
  $htmlTable= $_POST['content'];
  $pdf=new PDF_HTML_Table();
  $pdf->AddPage();
  $pdf->SetFont('Arial','',10);
  $pdf->WriteHTML("____________________________________<b><u>M.E.S College Marampally</u></b>_____________________________________<br>$htmlTable<br>EOL.");
  $pdf->Output();
}
elseif($_POST['file_type']=="EXCEL"){
  header("Content-Type:application/vnd.ms-excel");
  header("Content-Disposition: attachment;filename=".rand().".xls");
  header("Pragma:no-cache");
  header("Expires:0");
}
elseif($_POST['file_type']=="WORD")
{
  header("Content-type:application/vnd.ms-word");
  header("Content-Disposition: attachment;filename=".rand().".doc");
  header("Pragma:no-cache");
  header("Expires:0");
}
echo $_POST['content'];
}
 ?>
