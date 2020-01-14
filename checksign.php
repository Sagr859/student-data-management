<?php
include 'dataconnect.php';
if(isset($_POST["username"]))
{
  $name=$_POST['username'];

  $res = $conn->query("SELECT * FROM tutor WHERE uname='$name'");
  if($res->num_rows > 0)
  {
    echo "ALREADY EXISTS";
  }
  else
  {
    echo " ";
  }
}
 ?>
