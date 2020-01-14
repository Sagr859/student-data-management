<?php session_start();
$tutid=$_SESSION['tid'];
include 'dataconnect.php';

echo "<form method=POST><input type=text name=admno placeholder='Admision No' value=''><br><textarea style='height:20%'; name=status placeholder='Reason in Breif(20 charaters)'></textarea><br>";
echo "<select name=acd><option>Enter Current Academic Year</option>";
$select0=$conn->query("SELECT * FROM acdyr");
while($acd=$select0->fetch_assoc()){
  $yr=$acd[yr_start]+3;
  echo "<option value=".$acd[acid].">".$acd[yr_start]."-".$yr."</option>";
}
echo "</select><input type=text name=tutor value='".$tutid."' hidden><input type=submit name=remstud value='PROCEED'></form>";
$admno=$_POST['admno'];
$status=$_POST['status'];
$tutid=$_POST['tutor'];
$acd=$_POST['acd'];
$conn->query("INSERT INTO rem_std (`admno`,`tutid`,`acid`,`status`) VALUES ('$admno','$tutid','$acd','$status')");
  ?>
