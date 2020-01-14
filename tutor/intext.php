<?php
session_start();
include 'dataconnect.php';
$cnt=$_POST['cnt'];
$regno=$_POST['regno'];
$subname=$_POST['subname'];
$marktype=$_POST['mark'];
$sql=$conn->query("SELECT * FROM student,program WHERE regno= '$regno' AND student.prgmid=program.prgmid ");
$row=$sql->fetch_assoc();
$data="<tr><form method=POST id='frmins".$cnt."' ><td>".$row['name']."</td><td>".$row['prgmname']."</td><td>".$row['regno']."</td>";

$sql2=$conn->query("SELECT * FROM subjects WHERE tutid='$_SESSION[tid]' AND prgmid='$row[prgmid]' AND subname='$subname'");
$row1=$sql2->fetch_assoc();

$data=$data."<input type=text name=mrktype value='".$marktype."' hidden><input type=text name=count value='".$cnt."' hidden><input type=text name='regno".$cnt."' value='".$regno."' hidden><input type=text name='sbname".$cnt."' value='".$row1['subid']."' hidden><input type=text name='prgm".$cnt."' value='".$row['prgmid']."' hidden>";

if($marktype=="Internal"){
  $sql3=$conn->query("SELECT * FROM internal WHERE semid='$_SESSION[semid]' AND intid='$regno'");

if($sql3->num_rows==0)
  $data=$data."<td><input type=number name='subm".$cnt."' placeholder='Enter Internal Mark' value=''></td><td><input type='submit' id='addint".$cnt."' name='addint".$cnt."' value='ADD'></td></form></tr>";
else
  $data=$data."<td><input type=number name='subm".$cnt."' value=".$row['intid']."></td><td><input type='submit' id='chngint".$cnt."' name='chngint".$cnt."' value='CHANGE'></td></form></tr>";
}
else{
  $sql3=$conn->query("SELECT * FROM external WHERE semid='$_SESSION[semid]' AND extid='$regno'");

if($sql3->num_rows==0)
    $data=$data."<td><input type=number name='subm".$cnt."' placeholder='Enter External Mark' value=''></td><td><input type='submit' id='addext".$cnt."' name='addext".$cnt."' value='ADD'></td></form></tr>";
  else
    $data=$data."<td><input type=number name='subm".$cnt."' value=".$row['extid']."></td><td><input type='submit' id='chngext".$cnt."' name='chngext".$cnt."' value='CHANGE'></td></form></tr>";
}

echo $data;


 ?>
