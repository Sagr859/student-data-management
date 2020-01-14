<?php                                             //hod-dept-program-semester-tutor(s)
session_start();
include 'dataconnect.php';
$sql=$conn->query("SELECT * FROM tutor WHERE deptid=(SELECT deptid FROM dept WHERE deptname='$_SESSION[deptname]')");
$sql2=$conn->query("SELECT * from acdyr");
echo "<form method=POST><td>";
echo "<select name=acadm>";
while($rw2=$sql2->fetch_assoc()){
  echo "<option value=".$rw2[acid].">".$rw2[yr_start]." batch</option>";
}
echo"</select></td><td><select name=tutor1>";
while($rw=$sql->fetch_assoc()){
  echo "<option value=".$rw[tutid].">".$rw[tutname]."</option>";
}
$sql1=$conn->query("SELECT * FROM tutor  WHERE deptid=(SELECT deptid FROM dept WHERE deptname='$_SESSION[deptname]')");
echo "</select></td><td><select name=tutor2>";
while($rw1=$sql1->fetch_assoc()){
  echo "<option value=".$rw1[tutid].">".$rw1[tutname]."</option>";
}
echo "</select></td><td><select name=prgm>";
$sql3=$conn->query("SELECT * FROM program WHERE deptid=(SELECT deptid FROM dept WHERE deptname='$_SESSION[deptname]')");
while($rw3=$sql3->fetch_assoc()){
  echo "<option value=".$rw3[prgmid].">".$rw3[prgmname]."</option>";
}
echo "</select></td><td><select name=semester>";
$i="0";
while($i<"6"){
  $i=$i+"1";
  echo "<option value=".$i.">SEMESTER ".$i."</option>";
}
echo "</select></td><td><button type=submit name=addtut >ADD</button></td></form>";
$semester="s".$_POST['semester'].$_POST['acadm'];
if(isset($_POST['addtut']))
$conn->query("INSERT INTO hod ( `acdid`, `semid`, `prgmid`, `tut1id`, `tut2id`) VALUES('$_POST[acadm]','$semester','$_POST[prgm]','$_POST[tutor1]','$_POST[tutor2]')");

 ?>
