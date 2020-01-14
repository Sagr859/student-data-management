<?php session_start();
include "dataconnect.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/font-awesome.min.css"/>

    <link rel="stylesheet" href="../style.css"/>
      <script src="../js/jquery-3.2.1.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/main.js"></script>
    <?php include 'dataconnect.php'; ?>
    <title>STUDENT DATA ENTRY-3</title>
  </head>
  <style>
  body{ background-color: steelblue;
   background-repeat: no-repeat;
  background-size: cover;
  background-position: top center;}

  </style>
  <body>
    <div class="container">
    <h1>Enter Details</h1>
    <form class="form-control" action="" method="post">
      <h3>Enter Bank Details</h3>
      <table class="table table-responsive">
        <tr><th>Name of Bank </th><td><input type="text" name="nameofbank" value=""> </td> </tr>
        <tr><th>Branch </th><td><input type="text" name="branchbank" value=""> </td> </tr>
        <tr><th>Branch code </th><td><input type="text" name="branchcode" value=""> </td> </tr>
        <tr><th>MICR </th><td><input type="text" name="micr" value=""> </td> </tr>
        <tr><th>IFSC </th><td><input type="text" name="ifsc" value=""> </td> </tr>
        <tr><th>Account </th><td><input type="text" name="account" value=""> </td> </tr>
      </table>
    <h3>Enter Transfer Certificate Details</h3>
      <table class="table table-responsive">
        <tr><th>TC.No.</th><td><input type="text" name="tcno" value=""> </td> </tr>
        <tr><th>Date</th><td><input type="text" name="tcdate" value=""> </td> </tr>
        <tr><th>Name of Institution </th><td><input type="text" name="tcinst" value=""> </td> </tr>
        <tr><th>Period of Study</th><td><input type="text" name="pofstudy" value=""> </td> </tr>
        <tr><th><input type="submit" name="submit" value="Next"></th> </tr>

      </table>
    </form>
  </div>
  </body>
  <?php
  if(isset($_POST['submit'])){
    $regno =$_SESSION['std_regno'];
  $nbank  =$_POST['nameofbank'];
  $branch =$_POST['branchbank'];
  $brcode =$_POST['branchcode'];
  $micr   =$_POST['micr'];
  $ifsc   =$_POST['ifsc'];
  $account=$_POST['account'];
  $val1=$conn->query("INSERT INTO `bank`(`regno`, `name`, `branch`, `branchcode`, `MICR`, `IFSC`,`accno`) VALUES('$regno','$nbank','$branch','$brcode','$micr','$ifsc','$account')");

  $tcno   =$_POST['tcno'];
  $date   =$_POST['tcdate'];
  $ninst  =$_POST['tcinst'];
  $period =$_POST['pofstudy'];
  $val2=$conn->query("INSERT INTO `transfer`(`regno`, `transferno`, `dateoftransfer`, `nameofinst`, `periodofstudy`) VALUES ('$regno','$tcno','$date','$ninst','$period')");

  $resslid=$conn->query("SELECT * FROM sslc WHERE regno='$_SESSION[std_regno]'");
  $resqlid=$conn->query("SELECT * FROM qualexam WHERE regno='$_SESSION[std_regno]'");
  $rwssl=$resslid->fetch_assoc();
  $rwsql=$resqlid->fetch_assoc();
  $val3=$conn->query("UPDATE `student` SET sslcid='$rwssl[sslcid]', qid='$rwsql[qid]' WHERE regno='$_SESSION[std_regno]'");

  if(($val1)&&($val2)){
    echo "<script>window.location=(\"complete.php\");</script>";
  }
  else {  echo "<script>alert('ERROR');</script>";  }
  }
   ?>
</html>
