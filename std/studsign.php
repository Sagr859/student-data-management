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
    <title>STUDENT DATA ENTRY</title>
  </head>
  <script type="text/javascript">
    $(document).ready(function(){

      $('#admn_no').blur(function(){
        var admn = $(this).val();
        $.ajax({
            url:"check.php",
            method:"POST",
            data:{admn_no:admn},
            dataType:"text",
            success:function(html){
              $('#admn_error').text(html);
              if(html == "ALREADY EXISTS"){
                if(!confirm("Data of this Admission Number is already provided.\n Do You Want to OverWrite the previous Data?"))
                  window.location=("../index.php");
              }
            }
        });
      });
    });
  </script>
  <style>
  body{ background-color: steelblue;
   background-repeat: no-repeat;
  background-size: cover;
  background-position: top center;}
  select{ width:100px;}
  </style>
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
        <th>Register Number</th><td><input type="text" name="regno" value=""> </td></tr><tr>
        <th>Admission Number</th><td><input type="text" id=admn_no name="admno" value="">
        <span id="admn_error" class="w3-tag w3-blue"></span></td>
        <th>Roll Number</th><td><input type="text" name="rno" value=""> </td>
      </tr><tr>
        <th>Select Program</th><td><select class="form-control selcls" name="prgm">
          <?php
          $select=$conn->query("SELECT * FROM program");
          while($prgmnames=$select->fetch_assoc()){
            echo "<option value=".$prgmnames['prgmid'].">".$prgmnames[prgmname]."</option>";
          }
           ?>


        </select> </td> </tr><tr>
        <th>Date of Admission</th><td><input type="date" name="doa" value=""> </td></tr>
      <tr>
        <th>Name</th><td><input type="text" name="n1" value=""> </td></tr><tr>
        <th>Gender</th>
         <td><input type="radio" name="gender" value="M">&nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;
              <input type="radio" name="gender" value="F">&nbsp;&nbsp;Female &nbsp;&nbsp;&nbsp;
              <input type="radio" name="gender" value="T">&nbsp;&nbsp;Other&nbsp;&nbsp;&nbsp; </td></tr><tr>
        <th>Date Of Birth</th><td><input type="date" name="dob" value=""> </td>
        <th>Age</th><td><input type="number" name="age" value=""> </td></tr><tr>
        <th>Marital Status</th><td><input type="checkbox" name="ms" value="1">&nbsp;YES/NO </td></tr><tr>
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
          echo "<option value=".$caste_names[relid].">".$caste_names[caste]."</option>";
        }
         ?>
      </select> </td> </tr><tr>
        <th>Aadhar Number</th><td><input type="text" name="aadhar" value=""> </td></tr><tr>
        <th>Email id</th><td><input type="text" name="email" value=""> </td></tr><tr>

        <th>Name of Father</th><td><input type="text" name="namefather" value=""> </td>
            <th>Occupation</th><td><input type="text" name="occfather" value=""> </td></tr><tr>
            <th>Contact</th><td><input type="text" name="phfather" value=""> </td>
      </tr><tr>
        <th>Name of Mother</th><td><input type="text" name="namemother" value=""> </td>
            <th>Occupation</th><td><input type="text" name="occmother" value=""> </td></tr><tr>
            <th>Contact</th><td><input type="text" name="phmother" value=""> </td>
      </tr><tr>
        <th>Name of Guardian</th><td><input type="text" name="nameguardian" value=""> </td>

            <th>Contact</th><td><input type="text" name="phguardian" value=""> </td>
      </tr><tr>
        <th>Phone Number</th><td><input type="text" name="phone" value=""></td></tr><tr>
        <th>Annual Income</th><td><input type="text" name="anninc" value=""> </td></tr><tr>
    </table>
    <h3>Address</h3>
    <table class="table table-responsive">
        <th>House No/Name</th><td><input type="text" name="hname" value=""> </td>
        <th>Street No</th><td><input type="text" name="street" value=""> </td></tr><tr>
        <th>City</th><td><input type="text" name="city" value=""> </td>
        <th>Post Office</th><td><input type="text" name="postoffice" value=""> </td></tr><tr>
        <th>Village</th><td><input type="text" name="village" value=""> </td>
        <th>Panchayath</th><td><input type="text" name="panchayath" value=""> </td></tr><tr>
        <th>Thaluk</th><td><input type="text" name="thaluk" value=""> </td>
        <th>District</th><td><input type="text" name="district" value=""> </td></tr><tr>
        <th>State</th><td><input type="text" name="state" value=""> </td>
        <th>Nationality</th><td><input type="text" name="nationality" value=""> </td></tr><tr>

        <th>Pincode</th><td><input type="text" name="pincode" value=""> </td></tr><tr>
        <th>Mother Tongue</th><td><input type="text" name="mothertongue" value=""> </td></tr><tr>
        <th>Place of Birth</th><td><input type="text" name="placeofbirth" value=""> </td>

      </tr>
      <tr>
        <th><input type="submit" name="submit" value="Next"> </th>
      </tr>
    </table>
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
  if(isset($_POST['ms'])) $ms = $_POST['ms'];
    else $ms = "0";
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
  $_SESSION['std_regno']= $regno;

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
var_dump($val);
if($val)
echo "<script>window.location = (\"studsign2.php\");</script>";

}
?>
</html>
