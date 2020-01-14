<?php
include 'dataconnect.php';

$sql=$conn->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='student'");
while($row=$sql->fetch_assoc()){
  echo "<button class='w3-bar-item w3-button w3-padding' id=colopt value=".$row['COLUMN_NAME'].">".$row['COLUMN_NAME']."</button>";
}
 ?>
