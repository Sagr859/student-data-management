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

    <?php include 'dataconnect.php';
          $admno=$_GET['admno'];
    ?>
    <title>EDIT STUDENT DATA</title>
  </head>

  <style>
  body{ background-color: steelblue;
   background-repeat: no-repeat;
  background-size: cover;
  background-position: top center;}
  select{ width:100px;}
  </style>
  <?php $sql=$conn->query("SELECT * FROM student WHERE admno=$admno ");
        $stdrw=$sql->fetch_assoc();
        $sql1=$conn->query("SELECT * FROM sslc WHERE sslcid=$stdrw[sslcid]");
              $slrw=$sql1->fetch_assoc();
  ?>
  <body>
    <div class="container">
    <form class="form-control" action="" method="post">
      <h2>Enter Details</h2>
    <table class="table table-responsive">
      <tr><th>Academic Year</th><td><select class="form-control selcls" name="acdyr">
        <?php
        $select0=$conn->query("SELECT * FROM acdyr");
        while($acd=$select0->fetch_assoc()){
          $yr=$acd[yr_start]+3;
          echo "<option value=".$acd[acid].">".$acd[yr_start]."-".$yr."</option>";
        }
         ?>
      </select> </td> </tr>
      <tr>
        <th>Register Number</th><td><input type="text" name="regno" value=<?php echo $stdrw['regno']; ?>> </td></tr><tr>
        <th>Admission Number</th><td><input type="text" id=admn_no name="admno" value=<?php echo $stdrw['admno'];?> disabled>
        <span id="admn_error" class="w3-tag w3-blue">only admin has access to this field</span></td>
        <th>Roll Number</th><td><input type="text" name="rno" value=<?php echo $stdrw['rno']; ?>> </td>
      </tr><tr>
        <th>Select Program</th><td><select class="form-control selcls" name="prgm">
          <?php
          $select=$conn->query("SELECT * FROM program");
          while($prgmnames=$select->fetch_assoc()){
            echo "<option value=".$prgmnames['prgmid'].">".$prgmnames[prgmname]."</option>";
          }
           ?>


        </select> </td> </tr><tr>
        <th>Date of Admission</th><td><input type="date" name="doa" value=<?php echo $stdrw['doa']; ?>> </td></tr>
      <tr>
        <th>Name</th><td><input type="text" name="n1" value=<?php echo $stdrw['name']; ?>> </td></tr><tr>
        <th>Gender</th>
         <td><input type="radio" name="gender" value="M">&nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;
              <input type="radio" name="gender" value="F">&nbsp;&nbsp;Female &nbsp;&nbsp;&nbsp;
              <input type="radio" name="gender" value="T">&nbsp;&nbsp;Other&nbsp;&nbsp;&nbsp; </td></tr><tr>
        <th>Date Of Birth</th><td><input type="date" name="dob" value=<?php echo $stdrw['dob']; ?>> </td>
        <th>Age</th><td><input type="number" name="age" value=<?php echo $stdrw['age']; ?>> </td></tr><tr>
        <th>Marital Status</th><td><input type="checkbox" name="ms" value="">&nbsp;YES/NO </td></tr><tr>
        <th>Category</th><td><select class="form-control selcls" name="cat">
          <?php
          $select1=$conn->query("SELECT * FROM category");
          while($catnames=$select1->fetch_assoc()){
            echo "<option value=".$catnames['category_id'].">".$catnames[category_name]."</option>";
          }
           ?>
        </select> </td>
        <th>Religion</th><td><select class="form-control selcls" name="religion">
          <?php
          $select2=$conn->query("SELECT * FROM religion");
          while($religionnames=$select2->fetch_assoc()){
            echo "<option value=".$religionnames[religion_id].">".$religionnames[rel_name]."</option>";
          }
           ?>
        </select> </td></tr><tr>
        <th>Community</th><td><select class="form-control selcls" name="community">
          <?php
          $select3=$conn->query("SELECT DISTINCT community FROM studrel");
          while($com_names=$select3->fetch_assoc()){
            echo "<option value=".$com_names[community].">".$com_names[community]."</option>";
          }
           ?>
        </select> </td></tr><tr>
      <th>Caste</th><td><select class="form-control selcls" name="caste">
        <?php
        $select4=$conn->query("SELECT * FROM studrel");
        while($caste_names=$select4->fetch_assoc()){
          echo "<option value=".$caste_name[relid].">".$caste_names[caste]."</option>";
        }
         ?>
      </select> </td> </tr><tr>
        <th>Aadhar Number</th><td><input type="text" name="aadhar" value=<?php echo $stdrw['aadhar']; ?>> </td></tr><tr>
        <th>Email id</th><td><input type="text" name="email" value=<?php echo $stdrw['email']; ?>> </td></tr><tr>

        <th>Name of Father</th><td><input type="text" name="namefather" value=<?php echo $stdrw['father']; ?>> </td>
            <th>Occupation</th><td><input type="text" name="occfather" value=<?php echo $stdrw['occfather']; ?>> </td></tr><tr>
            <th>Contact</th><td><input type="text" name="phfather" value=<?php echo $stdrw['phfather']; ?>> </td>
      </tr><tr>
        <th>Name of Mother</th><td><input type="text" name="namemother" value=<?php echo $stdrw['mother']; ?>> </td>
            <th>Occupation</th><td><input type="text" name="occmother" value=<?php echo $stdrw['occmother']; ?>> </td></tr><tr>
            <th>Contact</th><td><input type="text" name="phmother" value=<?php echo $stdrw['phmother']; ?>> </td>
      </tr><tr>
        <th>Name of Guardian</th><td><input type="text" name="nameguardian" value=<?php echo $stdrw['guardian']; ?>> </td>

            <th>Contact</th><td><input type="text" name="phguardian" value=<?php echo $stdrw['phguard']; ?>> </td>
      </tr><tr>
        <th>Phone Number</th><td><input type="text" name="phone" value=<?php echo $stdrw['ph']; ?>></td></tr><tr>
        <th>Annual Income</th><td><input type="text" name="anninc" value=<?php echo $stdrw['annual_income']; ?>> </td></tr><tr>
    </table>
    <h3>Address</h3>
    <table class="table table-responsive">
        <th>House No/Name</th><td><input type="text" name="hname" value=<?php echo $stdrw['houseno']; ?>> </td>
        <th>Street No</th><td><input type="text" name="street" value=<?php echo $stdrw['street']; ?>> </td></tr><tr>
        <th>City</th><td><input type="text" name="city" value=<?php echo $stdrw['city']; ?>> </td>
        <th>Post Office</th><td><input type="text" name="postoffice" value=<?php echo $stdrw['postoffice']; ?>> </td></tr><tr>
        <th>Village</th><td><input type="text" name="village" value=<?php echo $stdrw['village']; ?>> </td>
        <th>Panchayath</th><td><input type="text" name="panchayath" value=<?php echo $stdrw['panchayath']; ?>> </td></tr><tr>
        <th>Thaluk</th><td><input type="text" name="thaluk" value=<?php echo $stdrw['thaluk']; ?>> </td>
        <th>District</th><td><input type="text" name="district" value=<?php echo $stdrw['dist']; ?>> </td></tr><tr>
        <th>State</th><td><input type="text" name="state" value=<?php echo $stdrw['state']; ?>> </td>
        <th>Nationality</th><td><input type="text" name="nationality" value=<?php echo $stdrw['nation']; ?>> </td></tr><tr>

        <th>Pincode</th><td><input type="text" name="pincode" value=<?php echo $stdrw['pin']; ?>> </td></tr><tr>
        <th>Mother Tongue</th><td><input type="text" name="mothertongue" value=<?php echo $stdrw['mother_tongue']; ?>> </td></tr><tr>
        <th>Place of Birth</th><td><input type="text" name="placeofbirth" value=<?php echo $stdrw['placeofbirth']; ?>> </td>

      </tr>

    </table>

    <h3>Enter SSLC Details</h3>
      <table class="table table-responsive">
        <tr><th>Name of Exam </th><td><input type="text" name="slexam" value=<?php echo $slrw['nameofexam']; ?>> </td> </tr>
        <tr><th>Name of School</th><td><input type="text" name="slschool" value=<?php echo $slrw['nameofschool']; ?>> </td> </tr>
        <tr><th>Exam registration number </th><td><input type="text" name="slrno" value=<?php echo $slrw['examregno']; ?>> </td> </tr>
        <tr><th>Month </th><td><input type="text" name="slmonth" value=<?php echo $slrw['month']; ?>> </td> </tr>
        <tr><th>Year </th><td><input type="text" name="slyr" value=<?php echo $slrw['year']; ?>> </td> </tr>
        <tr><th>Stream </th><td><input type="text" name="sslccourse" value=<?php echo $slrw['course']; ?>> </td>
        <tr><th>Enter marks aquired for </th></tr>
        <tr><th><input type="text" name="sl1" value=<?php echo $slrw['slsub1']; ?>></th><td><input type="text" name="slm1" value=<?php echo $slrw['slsubmark1']; ?>> </td> </tr>
        <tr><th><input type="text" name="sl2" value=<?php echo $slrw['slsub2']; ?>></th><td><input type="text" name="slm2" value=<?php echo $slrw['slsubmark2']; ?>> </td> </tr>
        <tr><th><input type="text" name="sl3" value=<?php echo $slrw['slsub3']; ?>></th><td><input type="text" name="slm3" value=<?php echo $slrw['slsubmark3']; ?>> </td> </tr>
        <tr><th><input type="text" name="sl4" value=<?php echo $slrw['slsub4']; ?>></th><td><input type="text" name="slm4" value=<?php echo $slrw['slsubmark4']; ?>> </td> </tr>
        <tr><th><input type="text" name="sl5" value=<?php echo $slrw['slsub5']; ?>></th><td><input type="text" name="slm5" value=<?php echo $slrw['slsubmark5']; ?>> </td> </tr>
        <tr><th>Total</th><td><input type="number" name="sltot" value=<?php echo $slrw['total']; ?>></td> </tr>
        <tr><th>Maxmarks</th><td><input type="number" name="slmax" value=<?php echo $slrw['maxmarks']; ?>> </td> </tr>
        <tr><th>Percent</th><td><input type="number" name="slperc" value=<?php echo $slrw['percent']; ?>>% </td> </tr>
      </table>
      <?php $sql2=$conn->query("SELECT * FROM qualexam WHERE qid=$stdrw[qid]");
            $qlrw=$sql2->fetch_assoc();
      ?>
      <h3>Enter Qualification Exam Details</h3>

        <table class="table table-responsive">
          <tr><th>Name of Exam </th><td><input type="text" name="qualexam" value=<?php echo $qlrw['nameofexam']; ?>> </td> </tr>
          <tr><th>Name of Board</th><td><input type="text" name="qualboard" value=<?php echo $qlrw['nameofboard']; ?>> </td> </tr>
          <tr><th>Name of Institute</th><td><input type="text" name="qualinst" value=<?php echo $qlrw['nameofinst']; ?>></td></tr>
          <tr><th>Exam registration number </th><td><input type="text" name="qualrno" value=<?php echo $qlrw['examregno']; ?>> </td> </tr>
          <tr><th>Month </th><td><input type="text" name="qualmonth" value=<?php echo $qlrw['month']; ?>> </td> </tr>
          <tr><th>Year </th><td><input type="text" name="qualyr" value=<?php echo $qlrw['year']; ?>> </td> </tr>
          <tr><th>Stream </th><td><input type="text" name="qcourse" value=<?php echo $qlrw['course']; ?>> </td>
          <tr><th>Enter marks aquired for </th></tr>
          <tr><th><input type="text" name="q1" value=<?php echo $qlrw['qsub1']; ?>></th><td><input type="text" name="qm1" value=<?php echo $qlrw['qsubmark1']; ?>> </td> </tr>
          <tr><th><input type="text" name="q2" value=<?php echo $qlrw['qsub2']; ?>></th><td><input type="text" name="qm2" value=<?php echo $qlrw['qsubmark2']; ?>> </td> </tr>
          <tr><th><input type="text" name="q3" value=<?php echo $qlrw['qsub3']; ?>></th><td><input type="text" name="qm3" value=<?php echo $qlrw['qsubmark3']; ?>> </td> </tr>
          <tr><th><input type="text" name="q4" value=<?php echo $qlrw['qsub4']; ?>></th><td><input type="text" name="qm4" value=<?php echo $qlrw['qsubmark4']; ?>> </td> </tr>
          <tr><th><input type="text" name="q5" value=<?php echo $qlrw['qsub5']; ?>></th><td><input type="text" name="qm5" value=<?php echo $qlrw['qsubmark5']; ?>> </td> </tr>
          <tr><th>Total</th><td><input type="number" name="qualtot" value=<?php echo $qlrw['total']; ?>></td> </tr>
          <tr><th>Maxmarks</th><td><input type="number" name="qualmax" value=<?php echo $qlrw['maxmarks']; ?>> </td> </tr>
          <tr><th>Percent</th><td><input type="number" name="qualperc" value=<?php echo $qlrw['percent']; ?>>&nbsp;% </td> </tr>
          <tr><th>No. of chances availed ('free' for 1st attempt else enter number)</th><td><input type="text" name="attempt" placeholder="free" value=<?php echo $qlrw['attempt']; ?>> </td>
          <tr><th>Holder of NCC/NSS at +2/equivalent level </th><td><input type="checkbox" name="nccnss" value=1></td></tr>
          <tr><th>Entitled to Bonus Marks for Ex-service man </th><td><input type="checkbox" name="exservice" value=1> </td> </tr>

        </table>
        <?php $sql3=$conn->query("SELECT * FROM bank WHERE bankid=$stdrw[bankid]");
              $bankrw=$sql3->fetch_assoc();
        ?>
          <h3>Enter Bank Details</h3>
          <table class="table table-responsive">
            <tr><th>Name of Bank </th><td><input type="text" name="nameofbank" value=<?php echo $bankrw['name']; ?>> </td> </tr>
            <tr><th>Branch </th><td><input type="text" name="branchbank" value=<?php echo $bankrw['branch']; ?>> </td> </tr>
            <tr><th>Branch code </th><td><input type="text" name="branchcode" value=<?php echo $bankrw['branchcode']; ?>> </td> </tr>
            <tr><th>MICR </th><td><input type="text" name="micr" value=<?php echo $bankrw['MICR']; ?>> </td> </tr>
            <tr><th>IFSC </th><td><input type="text" name="ifsc" value=<?php echo $bankrw['IFSC']; ?>> </td> </tr>
            <tr><th>Account </th><td><input type="text" name="account" value=<?php echo $bankrw['accno']; ?>> </td> </tr>
          </table>
          <?php $sql4=$conn->query("SELECT * FROM transfer WHERE tcid=$stdrw[tcid]");
                $transrw=$sql4->fetch_assoc();
          ?>
        <h3>Enter Transfer Certificate Details</h3>
          <table class="table table-responsive">
            <tr><th>TC.No.</th><td><input type="text" name="tcno" value=<?php echo $transrw['transferno']; ?>> </td> </tr>
            <tr><th>Date</th><td><input type="text" name="tcdate" value=<?php echo $transrw['dateoftransfer']; ?>> </td> </tr>
            <tr><th>Name of Institution </th><td><input type="text" name="tcinst" value=<?php echo $transrw['nameofinst']; ?>> </td> </tr>
            <tr><th>Period of Study</th><td><input type="text" name="pofstudy" value=<?php echo $transrw['periodofstudy']; ?>> </td> </tr>


          </table>
        </form>
        <tr>
          <th><input type="submit" name="submit" value="Next"> </th>
        </tr>
    </form>
  </div>
  </body>
  <?php

  if(isset($_POST['submit'])){
  $acd    =$_POST['acdyr'];
  $regno  =$_POST['regno'];
  $admno  =$_POST['admno'];
  $rollno =$_POST['rno'];
  $prgmid =$_POST['prgm'];
  $doa    =$_POST['doa'];
  $name   =$_POST['n1'];
  $gender =$_POST['gender'];
  $dob    =$_POST['dob'];
  $age    =$_POST['age'];
  $ms     =$_POST['ms'];
  $cat    =$_POST['category_id'];
  $comm   =$_POST['community'];
  $relid  =$_POST['caste'];
  $aadhar =$_POST['aadhar'];
  $email  =$_POST['email'];
  $nfather=$_POST['namefather'];
  $nmother=$_POST['namemother'];
  $nguardian  =$_POST['nameguardian'];
  $phfather   =$_POST['phfather'];
  $phmother   =$_POST['phmother'];
  $phguardian =$_POST['phguardian'];
  $phone  =$_POST['phone'];
  $ocfather   =$_POST['occfather'];
  $ocmother   =$_POST['occmother'];
  $annual =$_POST['anninc'];
  $house  =$_POST['hname'];
  $street =$_POST['street'];
  $city   =$_POST['city'];
  $poffice=$_POST['postoffice'];
  $village=$_POST['village'];
  $panch  =$_POST['panchayath'];
  $thaluk =$_POST['thaluk'];
  $dist   =$_POST['district'];
  $state  =$_POST['state'];
  $nation =$_POST['nationality'];
  $pin    =$_POST['pincode'];
  $mtongue=$_POST['mothertongue'];
  $plbirth=$_POST['placeofbirth'];

  $val=$conn->query("INSERT INTO `student`(`acdid`, `regno`, `admno`, `rollno`, `name`,
 `gender`, `dob`, `age`, `marital_status`, `aadharno`, `emailid`, `dateofadmn`, `father`,
 `mother`, `guardian`, `occfather`, `occmother`, `annual_income`,`mother_tongue`, `houseno`,
 `street`, `city`, `postoffice`, `village`, `panchayath`, `thaluk`, `dist`, `state`,
 `nationality`, `community`, `pin`, `placeofbirth`, `phfather`, `phmother`, `phguard`,
 `ph`, `relid`,`prgmid`,`categoryadmn`) VALUES ('$acd','$regno','$admno','$rollno','$name','$gender','$dob',
'$age','$ms','$aadhar','$email','$doa','$nfather','$nmother','$nguardian','$ocfather','$ocmother','$annual',
'$mtongue','$house','$street','$city','$poffice','$village','$panch','$thaluk','$dist','$state','$nation',
'$comm','$pin','$plbirth','$phfather','$phmother','$phguardian','$phone','$relid','$prgmid',
'$cat') ");
echo $val;
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


if(($val2)&&($val1)){
  echo "<script>window.location=(\"complete_edit.php?getr=".$regno."\");</script>";
}
else {  echo "<script>alert('ERROR');</script>";  }
}
?>
</html>
