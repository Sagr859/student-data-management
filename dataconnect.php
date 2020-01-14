<?php
$host="localhost";
$user="root";
$password="12sagar89";
$db="projectsg19";

$conn=new mysqli($host,$user,$password,$db);
if($conn->connect_error){
  echo "Failed ".$conn->connect_error;

}
 ?>
