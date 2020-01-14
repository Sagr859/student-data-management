<?php                             //tutor-class-subject-tutor
include 'dataconnect.php';
session_start();
$sem=$_SESSION['semid'];
$prgmid=$_SESSION['prgmid'];
echo "<table  border=3><tr><td>Semester</td><td>Subject</td><td>Tutor</td></tr>";
$sel=$conn->query("SELECT * FROM subjects,tutor WHERE semid='$sem' AND prgmid='$prgmid' AND subjects.tutid=tutor.tutid");
if($sel->num_row < 0)
  echo "<tr><td>NO RECORDS</td></tr>";
while($row=$sel->fetch_assoc()){
  echo "<tr><td>".$row['semid']."</td><td>".$row['subname']."</td><td>".$row['tutname']."</td></tr>";
}
echo "</table>";
?>
