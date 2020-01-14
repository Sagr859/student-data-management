<?php session_start();
include 'dataconnect.php';
$cnt=$_POST['count'];
$marktype=$_POST['mrktype'];

$r="regno".$cnt;
$sbn="sbname".$cnt;
$sbm="subm".$cnt;
$addibtn="addint".$cnt;
$chngibtn="chngint".$cnt;
$addebtn="addext".$cnt;
$chngebtn="chngext".$cnt;

$regno=$_POST[$r];
$sbname=$_POST[$sbn];
$subm=$_POST[$sbm];
$subid="";
$submrk="";

$prgm=$_POST['prgm'];

if($marktype=="Internal"){
$sql3=$conn->query("SELECT * FROM internal WHERE semid='$_SESSION[semid]' AND intid='$regno'");

if($sql3->num_rows==0)
  if(isset($_POST[$addibtn]))
  $conn->query("INSERT INTO internal (`intid`,`prgmid`,`semid`,`subid1`,`submark1`) VALUES ('$regno','$prgm','$_SESSION[semid]','$sbname','$subm')");
else if(isset($_POST[$chngibtn])){

  $row=$sql3->fetch_assoc();
  for($i="1";$i<"7";++$i){
    $subid="subid".$i;
    $submrk="submark".$i;
  }
  if($subid==$sbname)
  $conn->query("UPDATE internal SET '$subid'='$sbname', '$submrk'='$subm' WHERE `intid`='$regno' ");
}
}
else if(isset($_POST[$addebtn])){
$sql3=$conn->query("SELECT * FROM external WHERE semid='$_SESSION[semid]' AND extid='$regno'");

if($sql3->num_rows==0)
  $conn->query("INSERT INTO external (`extid`,`prgmid`,`semid`,`subid1`,`submark1`) VALUES ('$regno','$prgm','$_SESSION[semid]','$sbname','$subm')");
else if(isset($_POST[$chngebtn])){
  $row=$sql3->fetch_assoc();
  for($i="1";$i<"7";++$i){
    $subid="subid".$i;
    $submrk="submark".$i;
  }
  if($subid==$sbname)
  $conn->query("UPDATE external SET '$subid'='$sbname', '$submrk'='$subm' WHERE `extid`='$regno' ");
}
}
 ?>
