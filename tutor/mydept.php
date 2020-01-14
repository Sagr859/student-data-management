<?php
session_start();
include 'dataconnect.php';
echo "<table border=3><tr><td>Name</td><td>Program</td><td>Semester</td><td>Academic yr</td></tr><tbody id=datatable>";
$sel1="SELECT DISTINCT * FROM hod,tutor,program  WHERE acdid=(SELECT acid FROM acdyr ORDER BY acid DESC LIMIT 1) AND (tut1id=tutor.tutid OR tut2id=tutor.tutid) AND hod.prgmid=program.prgmid AND hod.prgmid='$_SESSION[prgmid]'";
$result=$conn->query($sel1);
while($rows1=$result->fetch_assoc()){
  $sem=substr($rows1['semid'],0,2);
echo "<tr><td>".$rows1['tutname']."</td><td>".$rows1['prgmname']."</td><td>".$sem."</td><td>".$rows1['acdid']."</td></tr>";
}

echo "</tbody></table>";


?>
