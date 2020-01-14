<?php
include 'dataconnect.php';
if(isset($_POST["admn_no"]))
{
  $adno=$_POST['admn_no'];
  // $sql=;
  $res = $conn->query("SELECT * FROM student WHERE admno='$adno'");
  if($res->num_rows > 0)
  {
    echo "ALREADY EXISTS";
  }
  else
  {
    echo "NOT TAKEN ";
  }
}
 ?>
