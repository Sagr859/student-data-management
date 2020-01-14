<?php session_start(); ?>
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
    <title>STUDENT DATA ENTRY-2</title>
  </head>
  <style>
  body{ background-color: steelblue;
   background-repeat: no-repeat;
  background-size: cover;
  background-position: top center;}

  </style>
  <body>
    <div class="container">
    <h1>Enter Education Details</h1>
    <form class="form-control" action="" method="post">
    <h3>Enter SSLC Details</h3>
      <table class="table table-responsive">
        <tr><th>Name of Exam </th><td><input type="text" name="slexam" value=""> </td> </tr>
        <tr><th>Name of School</th><td><input type="text" name="slschool" value=""> </td> </tr>
        <tr><th>Exam registration number </th><td><input type="text" name="slrno" value=""> </td> </tr>
        <tr><th>Month </th><td><input type="text" name="slmonth" value=""> </td> </tr>
        <tr><th>Year </th><td><input type="text" name="slyr" value=""> </td> </tr>
        <tr><th>Stream </th><td><input type="text" name="sslccourse" value=""> </td>
        <tr><th>Enter marks aquired for </th></tr>
        <tr><th><input type="text" name="sl1" placeholder="subject name"></th><td><input type="text" name="slm1" placeholder="Marks"> </td> </tr>
        <tr><th><input type="text" name="sl2" placeholder="subject name"></th><td><input type="text" name="slm2" placeholder="Marks"> </td> </tr>
        <tr><th><input type="text" name="sl3" placeholder="subject name"></th><td><input type="text" name="slm3" placeholder="Marks"> </td> </tr>
        <tr><th><input type="text" name="sl4" placeholder="subject name"></th><td><input type="text" name="slm4" placeholder="Marks"> </td> </tr>
        <tr><th><input type="text" name="sl5" placeholder="subject name"></th><td><input type="text" name="slm5" placeholder="Marks"> </td> </tr>
        <tr><th>Total</th><td><input type="number" name="sltot" value=""></td> </tr>
        <tr><th>Maxmarks</th><td><input type="number" name="slmax" value=""> </td> </tr>
        <tr><th>Percent</th><td><input type="number" name="slperc" value="">% </td> </tr>
      </table>
      <h3>Enter Qualification Exam Details</h3>

        <table class="table table-responsive">
          <tr><th>Name of Exam </th><td><input type="text" name="qualexam" value=""> </td> </tr>
          <tr><th>Name of Board</th><td><input type="text" name="qualboard" value=""> </td> </tr>
          <tr><th>Name of Institute</th><td><input type="text" name="qualinst" value=""></td></tr>
          <tr><th>Exam registration number </th><td><input type="text" name="qualrno" value=""> </td> </tr>
          <tr><th>Month </th><td><input type="text" name="qualmonth" value=""> </td> </tr>
          <tr><th>Year </th><td><input type="text" name="qualyr" value=""> </td> </tr>
          <tr><th>Stream </th><td><input type="text" name="qcourse" value=""> </td>
          <tr><th>Enter marks aquired for </th></tr>
          <tr><th><input type="text" name="q1" placeholder="subject name"></th><td><input type="text" name="qm1" placeholder="Marks"> </td> </tr>
          <tr><th><input type="text" name="q2" placeholder="subject name"></th><td><input type="text" name="qm2" placeholder="Marks"> </td> </tr>
          <tr><th><input type="text" name="q3" placeholder="subject name"></th><td><input type="text" name="qm3" placeholder="Marks"> </td> </tr>
          <tr><th><input type="text" name="q4" placeholder="subject name"></th><td><input type="text" name="qm4" placeholder="Marks"> </td> </tr>
          <tr><th><input type="text" name="q5" placeholder="subject name"></th><td><input type="text" name="qm5" placeholder="Marks"> </td> </tr>
          <tr><th>Total</th><td><input type="number" name="qualtot" value=""></td> </tr>
          <tr><th>Maxmarks</th><td><input type="number" name="qualmax" value=""> </td> </tr>
          <tr><th>Percent</th><td><input type="number" name="qualperc" value="">&nbsp;% </td> </tr>
          <tr><th>No. of chances availed ('free' for 1st attempt else enter number)</th><td><input type="text" name="attempt" placeholder="free" value=""> </td>
          <tr><th>Holder of NCC/NSS at +2/equivalent level </th><td><input type="checkbox" name="nccnss" value=1></td></tr>
          <tr><th>Entitled to Bonus Marks for Ex-service man </th><td><input type="checkbox" name="exservice" value=1> </td> </tr>
          <tr><th><input type="submit" name="qsubmit" value="Next"></th> </tr>
        </table>

    </form>
  </div>
  </body>
  <?php

  if(isset($_POST['qsubmit'])){
    $regno =$_SESSION['std_regno'];
  $slexam   =$_POST['slexam'];
  $slschool =$_POST['slschool'];
  $slrno    =$_POST['slrno'];
  $slmonth  =$_POST['slmonth'];
  $slyr     =$_POST['slyr'];
  $slstream =$_POST['sslccourse'];
  $sl1      =$_POST['sl1'];
  $sl2      =$_POST['sl2'];
  $sl3      =$_POST['sl3'];
  $sl4      =$_POST['sl4'];
  $sl5      =$_POST['sl5'];
  $slm1     =$_POST['slm1'];
  $slm2     =$_POST['slm2'];
  $slm3     =$_POST['slm3'];
  $slm4     =$_POST['slm4'];
  $slm5     =$_POST['slm5'];
  $sltot    =$_POST['sltot'];
  $slm      =$_POST['slmark'];
  $slper    =$_POST['slperc'];

$sqlssl="INSERT INTO `sslc`(`regno`, `nameofexam`, `nameofschool`, `examregno`, `month`, `year`,`course`, `slsub1`, `slsub2`, `slsub3`, `slsub4`, `slsub5`,`slsubmark1`, `slsubmark2`, `slsubmark3`,`slsubmark4`,`slsubmark5`, `total`,`maxmarks`,`percent`)VALUES ('$regno','$slexa','$slschool','$slrno','$slmonth','$slyr','$slstream','$sl1','$sl2','$sl3','$sl4','$sl5','$slm1','$slm2','$slm3','$slm4','$slm5','$sltot','$slm','$slper')";
  $qexam    =$_POST['qualexam'];
  $qboard   =$_POST['qualboard'];
  $qinst    =$_POST['qualinst'];
  $qrno     =$_POST['qualrno'];
  $qmonth   =$_POST['qualmonth'];
  $qyr      =$_POST['qualyr'];
  $qstream  =$_POST['qcourse'];
  $q1       =$_POST['q1'];
  $q2       =$_POST['q2'];
  $q3       =$_POST['q3'];
  $q4       =$_POST['q4'];
  $q5       =$_POST['q5'];
  $qm1      =$_POST['qm1'];
  $qm2      =$_POST['qm2'];
  $qm3      =$_POST['qm3'];
  $qm4      =$_POST['qm4'];
  $qm5      =$_POST['qm5'];
  $qtot     =$_POST['qualtot'];
  $qm       =$_POST['qualmax'];
  $qper     =$_POST['qualperc'];
  if(($_POST['attempt']=="free")OR($_POST['attempt']==""))    $qchance="0";
  else     $qchance=$_POST['attempt'];

  if(isset($_POST['nccnss']))    $nccnss=$_POST['nccnss'];
  else  $nccnss=0;

  if(isset($_POST['exservice']))    $exservice=$_POST['exservice'];
  else  $exservice=0;
$sqlqual="INSERT INTO `qualexam`(`regno`, `nameofexam`, `nameofboard`, `nameofinst`, `examregno`, `month`, `year`, `course`, `qsub1`, `qsub2`, `qsub3`, `qsub4`, `qsub5`,`qsubmark1`, `qsubmark2`, `qsubmark3`, `qsubmark4`, `qsubmark5`, `total`, `maxmarks`, `percent`, `attempt`, `nccnss`, `exservice`) VALUES('$regno','$qexam','$qboard','$qinst','$qrno','$qmonth','$qyr','$qstream','$q1','$q2','$q3','$q4','$q5','$qm1','$qm2','$qm3','$qm4','$qm5','$qtot','$qm','$qper','$qchance','$nccnss','$exservice')";
$val1=$conn->query($sqlssl);
$val2=$conn->query($sqlqual);

if(($val1)&&($val2)){
  echo "<script>window.location=(\"studsign3.php\");</script>";
}
else{
  echo "<script>alert('ERROR');</script>";
}
}

   ?>
</html>
