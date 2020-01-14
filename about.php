<?php
session_start();
$id=$_GET['id'];
include  'dataconnect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>

  <link rel="stylesheet" href="style.css"/>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <title>VIEW DETAILS</title>
  </head>
  <body>
    <div class="container">
      <h5>ABOUT STUDENT</h5>
      <table class="table table-responsive">
        <?php
          $stdsql=$conn->query("SELECT * FROM student WHERE regno='$id'");
          $datastd=$stdsql->fetch_assoc();
         ?>
         <tr><th><a href="http://127.0.0.1/stdmgm/std/edit_stud.php?admno=<?php echo $datastd['admno'];?>" class="" >EDIT</a></th></tr>
         <tr><th>Academic Year</th><td>
             <?php
             $select0=$conn->query("SELECT * FROM acdyr WHERE acid='$datastd[acdid]'");
             $acd=$select0->fetch_assoc();
               $yr=$acd[yr_start]+3;
               echo $acd[yr_start]."-".$yr;
              ?>
           </td> </tr>
           <tr>
             <th>Register Number</th><td><?php echo $datastd['regno']; ?>> </td></tr><tr>
             <th>Admission Number</th><td><?php echo $datastd['admno'];?></td>
             <th>Roll Number</th><td><?php echo $datastd['rno']; ?></td>
           </tr><tr>
             <th>Program</th><td>
               <?php
               $select=$conn->query("SELECT * FROM program WHERE prgmid='$datastd[prgmid]'");
               $prgmnames=$select->fetch_assoc();
                 echo $prgmnames[prgmname];

                ?>
              </td> </tr><tr>
             <th>Date of Admission</th><td><?php echo $datastd['doa']; ?> </td></tr>
           <tr>
             <th>Name</th><td><?php echo $datastd['name']; ?></td></tr><tr>
             <th>Gender</th>
              <td>// </td></tr><tr>
             <th>Date Of Birth</th><td><?php echo $datastd['dob']; ?></td>
             <th>Age</th><td><?php echo $datastd['age']; ?></td></tr><tr>
             <th>Marital Status</th><td>// </td></tr><tr>
             <th>Category</th><td>
               <?php
               $select1=$conn->query("SELECT * FROM category WHERE '$datastd[categoryadmn]'");
               $catnames=$select1->fetch_assoc();
                 echo $catnames[category_name];

                ?>
              </td>
             <th>Religion</th><td>
               <?php
               $select2=$conn->query("SELECT * FROM religion WHERE relid= ");
               $religionnames=$select2->fetch_assoc();
                 echo $religionnames[rel_name];

                ?>
             </td></tr><tr>
             <th>Community</th><td>
               <?php
               $select3=$conn->query("SELECT DISTINCT community FROM studrel");
               $com_names=$select3->fetch_assoc();
                 echo $com_names[community];
                ?>
             </td></tr><tr>
           <th>Caste</th><td>
             <?php
             $select4=$conn->query("SELECT * FROM studrel");
             $caste_names=$select4->fetch_assoc();
               echo $caste_names[caste];
              ?>
          </td> </tr><tr>
             <th>Aadhar Number</th><td><?php echo $datastd['aadhar']; ?> </td></tr><tr>
             <th>Email id</th><td><?php echo $datastd['email']; ?> </td></tr><tr>

             <th>Name of Father</th><td><?php echo $datastd['father']; ?> </td>
                 <th>Occupation</th><td><?php echo $datastd['occfather']; ?> </td></tr><tr>
                 <th>Contact</th><td><?php echo $datastd['phfather']; ?> </td>
           </tr><tr>
             <th>Name of Mother</th><td><?php echo $datastd['mother']; ?> </td>
                 <th>Occupation</th><td><?php echo $datastd['occmother']; ?> </td></tr><tr>
                 <th>Contact</th><td><?php echo $datastd['phmother']; ?> </td>
           </tr><tr>
             <th>Name of Guardian</th><td><?php echo $datastd['guardian']; ?> </td>

                 <th>Contact</th><td><?php echo $datastd['phguard']; ?> </td>
           </tr><tr>
             <th>Phone Number</th><td><?php echo $datastd['ph']; ?></td></tr><tr>
             <th>Annual Income</th><td><?php echo $datastd['annual_income']; ?> </td></tr><tr>
         </table>
         <h3>Address</h3>
         <table class="table table-responsive">
             <th>House No/Name</th><td><?php echo $datastd['houseno']; ?> </td>
             <th>Street No</th><td><?php echo $datastd['street']; ?> </td></tr><tr>
             <th>City</th><td><?php echo $datastd['city']; ?> </td>
             <th>Post Office</th><td><?php echo $datastd['postoffice']; ?> </td></tr><tr>
             <th>Village</th><td><?php echo $datastd['village']; ?> </td>
             <th>Panchayath</th><td><?php echo $datastd['panchayath']; ?> </td></tr><tr>
             <th>Thaluk</th><td><?php echo $datastd['thaluk']; ?> </td>
             <th>District</th><td><?php echo $datastd['dist']; ?></td></tr><tr>
             <th>State</th><td><?php echo $datastd['state']; ?> </td>
             <th>Nationality</th><td><?php echo $datastd['nation']; ?> </td></tr><tr>

             <th>Pincode</th><td><?php echo $datastd['pin']; ?></td></tr><tr>
             <th>Mother Tongue</th><td><?php echo $datastd['mother_tongue']; ?> </td></tr><tr>
             <th>Place of Birth</th><td><?php echo $datastd['placeofbirth']; ?></td>

           </tr>

         </table>

         <h3>Enter SSLC Details</h3>
           <table class="table table-responsive">
             <tr><th>Name of Exam </th><td><?php echo $slrw['nameofexam']; ?> </td> </tr>
             <tr><th>Name of School</th><td><?php echo $slrw['nameofschool']; ?> </td> </tr>
             <tr><th>Exam registration number </th><td><?php echo $slrw['examregno']; ?></td> </tr>
             <tr><th>Month </th><td><?php echo $slrw['month']; ?></td> </tr>
             <tr><th>Year </th><td><?php echo $slrw['year']; ?></td> </tr>
             <tr><th>Stream </th><td><?php echo $slrw['course']; ?> </td>
             <tr><th>Enter marks aquired for </th></tr>
             <tr><th><?php echo $slrw['slsub1']; ?></th><td><?php echo $slrw['slsubmark1']; ?> </td> </tr>
             <tr><th><?php echo $slrw['slsub2']; ?></th><td><?php echo $slrw['slsubmark2']; ?> </td> </tr>
             <tr><th><?php echo $slrw['slsub3']; ?></th><td><?php echo $slrw['slsubmark3']; ?> </td> </tr>
             <tr><th><?php echo $slrw['slsub4']; ?></th><td><?php echo $slrw['slsubmark4']; ?> </td> </tr>
             <tr><th><?php echo $slrw['slsub5']; ?></th><td><?php echo $slrw['slsubmark5']; ?> </td> </tr>
             <tr><th>Total</th><td><?php echo $slrw['total']; ?></td> </tr>
             <tr><th>Maxmarks</th><td><?php echo $slrw['maxmarks']; ?></td> </tr>
             <tr><th>Percent</th><td><?php echo $slrw['percent']; ?>% </td> </tr>
           </table>
           <?php $sql2=$conn->query("SELECT * FROM qualexam WHERE qid=$datastd[qid]");
                 $qlrw=$sql2->fetch_assoc();
           ?>
           <h3>Enter Qualification Exam Details</h3>

             <table class="table table-responsive">
               <tr><th>Name of Exam </th><td><?php echo $qlrw['nameofexam']; ?> </td> </tr>
               <tr><th>Name of Board</th><td><?php echo $qlrw['nameofboard']; ?></td> </tr>
               <tr><th>Name of Institute</th><td><?php echo $qlrw['nameofinst']; ?></td></tr>
               <tr><th>Exam registration number </th><td><?php echo $qlrw['examregno']; ?> </td> </tr>
               <tr><th>Month </th><td><?php echo $qlrw['month']; ?> </td> </tr>
               <tr><th>Year </th><td><?php echo $qlrw['year']; ?> </td </tr>
               <tr><th>Stream </th><td><?php echo $qlrw['course']; ?> </td>
               <tr><th>Enter marks aquired for </th></tr>
               <tr><th><?php echo $qlrw['qsub1']; ?></th><td><?php echo $qlrw['qsubmark1']; ?></td> </tr>
               <tr><th><?php echo $qlrw['qsub2']; ?></th><td><?php echo $qlrw['qsubmark2']; ?></td> </tr>
               <tr><th><?php echo $qlrw['qsub3']; ?></th><td><?php echo $qlrw['qsubmark3']; ?></td> </tr>
               <tr><th><?php echo $qlrw['qsub4']; ?></th><td><?php echo $qlrw['qsubmark4']; ?></td> </tr>
               <tr><th><?php echo $qlrw['qsub5']; ?></th><td><?php echo $qlrw['qsubmark5']; ?></td> </tr>
               <tr><th>Total</th><td><?php echo $qlrw['total']; ?></td> </tr>
               <tr><th>Maxmarks</th><td><?php echo $qlrw['maxmarks']; ?> </td> </tr>
               <tr><th>Percent</th><td><?php echo $qlrw['percent']; ?>&nbsp;% </td> </tr>
               <tr><th>No. of chances availed ('free' for 1st attempt else enter number)</th><td><?php echo $qlrw['attempt']; ?> </td>
               <tr><th>Holder of NCC/NSS at +2/equivalent level </th><td></td></tr>
               <tr><th>Entitled to Bonus Marks for Ex-service man </th><td></td> </tr>

             </table>
             <?php $sql3=$conn->query("SELECT * FROM bank WHERE bankid=$datastd[bankid]");
                   $bankrw=$sql3->fetch_assoc();
             ?>
               <h3>Enter Bank Details</h3>
               <table class="table table-responsive">
                 <tr><th>Name of Bank </th><td><?php echo $bankrw['name']; ?></td> </tr>
                 <tr><th>Branch </th><td><?php echo $bankrw['branch']; ?></td> </tr>
                 <tr><th>Branch code </th><td><?php echo $bankrw['branchcode']; ?> </td> </tr>
                 <tr><th>MICR </th><td><?php echo $bankrw['MICR']; ?> </td> </tr>
                 <tr><th>IFSC </th><td><?php echo $bankrw['IFSC']; ?> </td> </tr>
                 <tr><th>Account </th><td><?php echo $bankrw['accno']; ?> </td> </tr>
               </table>
               <?php $sql4=$conn->query("SELECT * FROM transfer WHERE tcid=$datastd[tcid]");
                     $transrw=$sql4->fetch_assoc();
               ?>
             <h3>Enter Transfer Certificate Details</h3>
               <table class="table table-responsive">
                 <tr><th>TC.No.</th><td><?php echo $transrw['transferno']; ?> </td> </tr>
                 <tr><th>Date</th><td><?php echo $transrw['dateoftransfer']; ?> </td> </tr>
                 <tr><th>Name of Institution </th><td><?php echo $transrw['nameofinst']; ?> </td> </tr>
                 <tr><th>Period of Study</th><td><?php echo $transrw['periodofstudy']; ?> </td> </tr>


      </table>
    </div>

  </body>
</html>
