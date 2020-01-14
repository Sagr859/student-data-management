<?php
session_start();
include 'dataconnect.php';
$uid=$_SESSION['uid'];
$sel="SELECT * FROM message,tutor WHERE receiver_id='$uid' AND tutid=sender_id ORDER BY message_id DESC";
$sql=$conn->query($sel);
echo "<table>";
while($row=$sql->fetch_assoc()){
  echo "<tr><th>".$row['tutname']."</th><td>".$row['title']."</td><td>".$row['content']."</td></tr>";
}
echo "</table>";
 ?>
