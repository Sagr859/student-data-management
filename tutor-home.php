<?php
session_start();
include 'dataconnect.php';
$rs = $conn->query("SELECT * FROM tutor WHERE tutid = '{$_SESSION['tid']}'");
$rws= $rs->fetch_assoc();
$_SESSION['tname'] = $rws['tutname'];
$_SESSION['deptid']= $rws['deptid'];
$_SESSION['usertype']= $rws['user_type'];
$rs2 = $conn->query("SELECT * FROM hod WHERE (tut1id='$_SESSION[tid]' OR tut2id='$_SESSION[tid]') AND acdid=(SELECT acid FROM acdyr ORDER BY acid DESC LIMIT 1)");
$rws2 = $rs2->fetch_assoc();
$_SESSION['semid'] = $rws2['semid'];
$_SESSION['prgmid'] = $rws2['prgmid'];
$rs1 = $conn->query("SELECT * FROM dept WHERE deptid = '$_SESSION[deptid]'");
$rws1= $rs1->fetch_assoc();
$_SESSION['deptname'] = $rws1['deptname'];
 include 'tutor_dashboard.php';
 ?>
 <script type="text/javascript">

   $(document).ready(function(){
     $('#printdiv').click(function(){
       data=$("#homecontent").html();
       $("#divcontent").val(data)
       $("#printform").attr('action','tutor/file.php');
       $("#printform").submit();
     });
   });
 </script>
 <div class="w3-bar w3-black" >


  <button id="search" onclick="changeContent(this.id);" class="w3-bar-item input-group-btn w3-button" type="search"><i class="fa fa-search"></i></button>
<div class='w3-dropdown-hover' id="barcontent" style="display:none;">
  <button class=' w3-button' name=marks >Insert Marks</button>
  <div class= 'w3-dropdown-content'>
    <button id='insmarksint' name="intern" class='w3-button' onclick='changeContent(this.id);'>Internal Marks</button>
    <button id='insmarksext' name="extern" class='w3-button' onclick='changeContent(this.id);'>External Marks</button>
  </div>
</div>
    <button id=hod-manage style="display:none;" class='w3-bar-item input-group-btn w3-button' name=tuthod onclick='addtutor();'>Add Tutors</button>
    <button id=sub-manage style="display:none;" class='w3-bar-item input-group-btn w3-button' name=sub onclick='addsub();'>Add Tutors</button>
    <button id=std-manage style="display:none;" class='w3-bar-item input-group-btn w3-button' name=delstd onclick='delstd();'>Delete Student</button>

<form class="" id=printform target="_blank" method="post">
<div  id=exprt class=" w3-dropdown-hover">

<button class="w3-button">Export File</button>
  <div class= "w3-dropdown-content">
    <input type="submit" id="printdiv" class="w3-button" name="file_type" value="WORD">
    <input type="submit" id="printdiv" class="w3-button" name="file_type" value="PDF">
    <input type="submit" id="printdiv" class="w3-button" name="file_type" value="EXCEL">
  </div>
</div>
</div>
  <input type="text" id="searchbx" class="w3-input w3-border w3-large" placeholder="SEARCH..." style="display:none;">
   <input type="text" id=divcontent name="content" value="" hidden>
   <div id="delmodal" class="modal">
     <div class="modal-content"><div class="modal-header"><span id=closemodal class="close">&times;</span><h6> Deleting a Student</h6></div><div id=modalbd class="modal-body">
     </div>
     </div>
   </div>
  <div id="homecontent">

  </div>
</form>
<?php ?>


</body>
</html>
