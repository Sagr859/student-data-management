<?php session_start(); $id=$_SESSION['tid'];
echo "<table border=3><tr><th>To Admin..<th><tr><tr><th>Title</th></tr><tr><td><form method=POST><input type=text name=mtitle placeholder= 'Enter title'></td></tr><tr><th>Content</th></tr><tr><td>";
echo "<input type=text-area name=mcontent placeholder='Enter content'></td></tr></table><input type=submit name=msend value='SEND'></form>";

include 'dataconnect.php';
if(isset($_POST['msend'])){
$sql= "INSERT INTO message (`receiver_id`,`sender_id`,`title`,`content`) VALUES (101,'$id','$_POST[mtitle]','$_POST[mcontent]')";
$conn->query($sql);
echo "<script>alert('MESSAGE SENT...'); </script>";
}

 ?>
