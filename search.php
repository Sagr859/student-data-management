<?php include 'dataconnect.php';
$data="";

if($_POST['yrsel']=="")
{ $data= "<table border=3>";  $yrsel=""; }
else {
  $opt = 'std';
  $data= "<table border=3>";
  $yrsel=" AND acdyr.acid=".$_POST['yrsel'];
}
if($opt == 'std'){
$data=$data."<tr id=thead><td>Admission No</td><td>Register No</td><td>Name</td><td>Program</td>";
$sel2=$conn->query("SELECT * FROM student,program,acdyr,studrel WHERE program.prgmid = student.prgmid AND acdyr.acid = student.acdid AND student.relid=studrel.relid ".$yrsel);
$data=$data. "<tbody id=datatable>";
if($sel2->num_rows > 0)
while($rw=$sel2->fetch_assoc()){
  $data=$data."<tr><td>".$rw['admno']."</td><td>".$rw['regno']."</td><td>".$rw['name']."</td><td>".$rw['prgmname']./*"</td><td>".$rw['community']."</td><td>".$rw['caste'].*/"</td></tr>";
}
else {
  $data=$data. "<tr><td colspan='4'>NO RECORDS</td></tr>";
}
  $data=$data. "</tbody></table>";
}
elseif($opt == 'cl'){
  $data=$data. "<tr id=thead><td>Departments</td><td>Courses</td><td>HOD</td>";
  $sel2=$conn->query("SELECT *  FROM dept,program,tutor WHERE dept.tutid = tutor.tutid AND dept.deptid = program.deptid ");
  $data=$data. "<tbody id=datatable>";
  if($sel2->num_rows > 0)
  while($rw=$sel2->fetch_assoc()){
    $data=$data. "<tr><td>".$rw['deptname']."</td><td>".$rw['prgmname']."</td><td>".$rw['tutname']."</td></tr>";
  }
  else {
    $data=$data. "<tr><td colspan='3'>NO RECORDS</td></tr>";
  }
    $data=$data. "</tabody></table>";

}
elseif($opt == 'tut'){
  $data=$data. "<tr id=thead><td>Tutor</td><td>Courses</td><td>Department</td>";
  $sel2=$conn->query("SELECT * FROM dept,program,tutor WHERE dept.deptid = tutor.deptid AND dept.deptid = program.deptid ");
  $data=$data. "<tbody id=datatable>";
  if($sel2->num_rows > 0)
  while($rw=$sel2->fetch_assoc()){
    $data=$data ."<tr><td>".$rw['tutname']."</td><td>".$rw['prgmname']."</td><td>".$rw['deptname']."</td></tr>";
  }
  else {
    $data=$data. "<tr><td colspan='4'>NO RECORDS</td></tr>";
  }
    $data=$data. "</tbody></table>";
  }

  elseif($opt == 'dept'){
    $data=$data. "<tr id=thead><td>Courses</td><td>Department</td>";
    $sel2=$conn->query("SELECT * FROM dept,program WHERE dept.deptid = program.deptid ");
    $data=$data. "<tbody id=datatable>";
    if($sel2->num_rows > 0)
    while($rw=$sel2->fetch_assoc()){
      $data=$data. "<tr><td>".$rw['prgmname']."</td><td>".$rw['deptname']."</td></tr>";
    }
    else {
      $data=$data. "<tr><td colspan='4'>NO RECORDS</td></tr>";
    }
      $data=$data. "</tbody></table>";
    }
    elseif($opt == 'sem'){
      $data=$data. "<tr id=thead><td>Academic Year</td><td>Semester</td><td>Program</td><td>Tutor</td><td>Tutor</td>";
      $sel2=$conn->query("SELECT * FROM acdyr,semester,program,tutor,hod WHERE hod.acdid = acdyr.acid AND hod.prgmid = program.prgmid AND hod.tut1id=tutor.tutid ");
      $data=$data. "<tbody id=datatable>";
      if($sel2->num_rows > 0)
      while($rw=$sel2->fetch_assoc()){
        $yr=$rw['yr_start']+3;
        $sql2=$conn->query("SELECT tutname FROM tutor WHERE tutor.tutid=".$rw['tut2id']);
        $rw2=$sql2->fetch_assoc();
        $data=$data. "<tr><td>".$rw['yr_start']."-".$yr."</td><td>".$sem."</td><td>".$rw['prgmname']."</td><td>".$rw['tut1id']."</td><td>".$rw2['tut2id']."</td></tr>";
      }
      else{
        $data=$data. "<tr><td colspan='3'>NO RECORDS</td></tr>";
      }
        $data=$data. "</tbody></table>";
  }

echo $data;
?>
