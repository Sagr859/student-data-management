<?php //session_regenerate_id(true);
session_start();
include 'dataconnect.php';
echo "<table id=tabledata border=3><tr><td>Subject</td><td>Academic Year</td><td>Name</td><td>RegNo</td><td>Program</td></tr>";
echo "<tbody id=datatable>";
$tid=$_SESSION['tid'];
$sql1=$conn->query("SELECT * FROM subjects WHERE tutid='{$_SESSION['tid']}'");
if($sql1->num_row < 0)
  echo "<tr><td>NO RECORD</td></tr>";
while($row=$sql1->fetch_assoc()){
   $acdyr=substr($row['semid'],2);
    $sql=$conn->query("SELECT acdyr.yr_start,student.name,student.regno,program.prgmname FROM student,acdyr,program WHERE acdyr.acid='$acdyr' AND student.acdid=acdyr.acid AND student.prgmid = '$row[prgmid]' AND student.prgmid = program.prgmid");
  while($row2=$sql->fetch_assoc()){
  echo "<tr id=tbdatarw ><td id=tbsbn>".$row[subname]."</td><td>".$row2[yr_start]."</td><td>".$row2[name]."</td><td id=tbreg>".$row2[regno]."</td><td>".$row2[prgmname]."</td></tr>";
}
}

echo "</tbody></table>";
 ?>
