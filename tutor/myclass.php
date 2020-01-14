<?php
session_start();
include 'dataconnect.php';
$tid=$_SESSION['tid'];
$sel="SELECT * FROM hod WHERE (tut1id= '$tid' OR tut2id= '$tid' ) AND  acdid=(SELECT acid FROM acdyr ORDER BY acid DESC LIMIT 1) ";//provides the class and semester
$res=$conn->query($sel);
$rows=$res->fetch_assoc();

$sel1="SELECT * FROM student WHERE (prgmid='$rows[prgmid]' AND acdid='$rows[acdid]') ";//printts students not in rem_std tables
$res1=$conn->query($sel1);
echo "<table id=tabledata class=table-responsive border=3><tr><td rowspan='2'>RollNo</td><td rowspan='2'>RegNo</td><td rowspan='2'>Name</td><td colspan='6'>Internal Marks</td><td colspan='6'>External Marks</td></tr><tr>";
$sel3=$conn->query("SELECT * FROM subjects WHERE semid= '$rows[semid]' AND prgmid= '$rows[prgmid]' ");
$i="1";
while($rows3=$sel3->fetch_assoc()){
if($i>"6")   $subname="subname".($i-"6");
$subname="subname".$i;
  ++$i;
  echo "<td id=tbsbn>".$subname."</td>";
}
echo "</tr><tbody id=datatable>";

while($row=$res1->fetch_assoc()){
  $selqry=$conn->query("SELECT * FROM rem_std WHERE admno='$row[admno]'");
  if($selqry->num_rows==NULL){
  echo "<tr><td><a href='http://127.0.0.1/stdmgm/about.php?id=".$row[regno]."'>".$row['rollno']."</td><td id=tbreg>".$row['regno']."</td><td>".$row['name']."</a></td>";
  while($rows4=$sel3->fetch_assoc()){
      $sel2=$conn->query("SELECT * FROM internal WHERE semid='$row4[semid]' AND intid='$row[intid]' ");

  while($rw=$sel2->fetch_assoc()){
    for($sub="subid1",$subm="subm1";$sub<="subid6";++$sub,++$subm)
      if($rows4['subid']==$rw[$sub])
        echo "<td>".$subm."</td>";
  }
}
while($rows4=$sel3->fetch_assoc()){
    $sel2=$conn->query("SELECT * FROM external WHERE semid='$row4[semid]' AND extid='$row[extid]' ");

while($rw=$sel2->fetch_assoc()){
  for($sub="subid1",$subm="subm1";$sub<="subid6";++$sub,++$subm)
    if($rows4['subid']==$rw[$sub])
      echo "<td>".$subm."</td>";
}
}
echo "</tr>";
}
}
echo "</tbody></table>";
 ?>
