<?php session_start();
include 'dataconnect.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Re-Admission</title>
  </head>
  <body>
    <div class="container">
      <form class="form-control"  method="post">
        <table class="table table-responsive">
          <tr>
            <th>Re-Admission No:</th><td><input type="text" name="readmn" value=""> </td>
          </tr>
          <tr>
            <th>Previous Admission No:</th><td><input type="text" name="oldadmn" value=""> </td>
          </tr>
          <tr>
            <th>Previous Academic Year:</th><td><select class="form-control selcls" name="pracd">
              <?php
              $select0=$conn->query("SELECT * FROM acdyr");
              while($acd=$select0->fetch_assoc()){
                $yr=$acd[yr_start]+3;
                echo "<option value=".$acd[acid].">".$acd[yr_start]."-".$yr."</option>";
              }
               ?>
            </select> </td>
          </tr>
          <tr>
            <th>Date of stopping course:</th><td><input type="date" name="dostp" value=""> </td>
            <th>Date of Re-Starting course:</th><td><input type="date" name="dostr" value=""> </td>
          </tr>
          <tr>
            <th><input type="submit" name="insert" value="SUBMIT"> </th>
          </tr>
        </table>
      </form>
      <?php
      echo "<table border=3><tr><td>Name</td><td>Program</td><td>Discontnued Date</td><td>Restarted Date</td><td> Prev-Academic yr</td></tr><tbody id=datatable>";
      $sel1="SELECT * FROM readmission,student,program WHERE old_admnid=admno AND student.prgmid=program.prgmid; ";
      $result=$conn->query($sel1);
      while($rows1=$result->fetch_assoc()){
      echo "<tr><td>".$rows1['name']."</td><td>".$rows1['prgmname']."</td><td>".$rows1['stop_date']."</td><td>".$rows1['restart_date']."</td><td>".$rows1['old_acdid']."</td></tr>";
      }

      echo "</tbody></table>";
      ?>
    </div>
  </body>
  <?php
  if(isset($_POST['insert'])){
    $readmn=$_POST['readmn'];
    $oldadmn=$_POST['oldadmn'];
    $acd=$_POST['pracd'];
    $dostp=$_POST['dostp'];
    $dostr=$_POST['dostr'];

    $conn->query("INSERT INTO `readmission`(`old_acdid`, `old_admnid`, `stop_date`, `restart_date`) VALUES ('$acd','$oldadmn','$dostp','$dostr') ");
  }
   ?>
</html>
