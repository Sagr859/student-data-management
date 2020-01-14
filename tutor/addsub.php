<?php
session_start();
$prgm=$_SESSION['prgmid'];
include 'dataconnect.php';
$sql2=$conn->query("SELECT * from acdyr");
echo "<form method=POST><td>";
echo "<select name=acadm>";
while($rw2=$sql2->fetch_assoc()){
  echo "<option value=".$rw2[acid].">".$rw2[yr_start]." batch</option>";
}
echo"</select></td>";
echo "<td><input type=text name=subject placeholder = 'Enter Subject' value=''></td>";

$sql1=$conn->query("SELECT * FROM tutor");
echo "<td><select name=tutor1>";
while($rw1=$sql1->fetch_assoc()){
  echo "<option value=".$rw1[tutid].">".$rw1[tutname]."</option>";
}
echo "</select></td><td><select name=semester>";
$i=0;
while($i<6){
  $i=$i+1;
  echo "<option value=".$i.">SEMESTER ".$i."</option>";
}
echo "</select></td><td><input type=submit name=addsub value='ADD'></td></form>";
$semester="s".$_POST['semester'].$_POST['acadm'];
if(isset($_POST['addsub']))
$conn->query("INSERT INTO subjects ( `tutid`, `semid`, `prgmid`, `subname`) VALUES('$_POST[tutor1]','$semester','$prgm','$_POST[subject]')");
 ?>
