<?php
session_start();
include 'dataconnect.php';
$_SESSION['yrsel']=="";
if($_SESSION['user_type']=="OFFICE"){
  $varname="OFFICE";
}
else{
  $varname="PRINCIPAL";
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style-dashboard.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  	<link rel="stylesheet" href="css/font-awesome.min.css"/>

  		<script src="js/jquery-3.2.1.min.js"></script>

  		<script src="js/main.js"></script>

    <title><?php echo $varname;?> </title>
    <script>

$(document).ready(function(){


  $('#printdiv').click(function(){
    data=$("#homecontent").html();
    $("#divcontent").val(data)
    $("#printform").attr('action','tutor/file.php');
    $("#printform").submit();
  });
load_data();
function load_data(query=''){
  $.ajax({
    url:"search.php",
    method:"POST",
    data:{yrsel:query,},
    success:function(html){
      $("#homecontent").html(html);
    }
  });
}
$("#yrsel").change(function(){
  var query=$(this).val();
  load_data(query);

});
  $("#searchbx").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#datatable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
function changeContent(el){
  var content=document.getElementById("homecontent");
  document.getElementById("notifybar").style.display="none";
  document.getElementById("yrsel").style.display="none";

  if(el=="class"){
    content.innerHTML=(` <?php $opt="cl"; include 'search.php'; ?>`);  }
else if(el=="tutor")
content.innerHTML=(`<?php $opt="tut"; include 'search.php'; ?>`);
else if(el=="students"){
  document.getElementById("notifybar").style.display="block";
  document.getElementById("yrsel").style.display="block";
  document.getElementById("lfbarcontent").innerHTML=(" <?php include "col_filter.php"; ?>");

content.innerHTML=(`<?php  $opt="std"; include 'search.php'; ?>`);
}
else if(el=="readmn")
content.innerHTML=(`<?php include 'readmn.php'; ?>`);
}




    </script>
  </head>
  <body class="w3-light-grey">
  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-left">STUDENT DATA MANAGEMENT</span>
    <a href=signout.php class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-out fa-fw"></i>Signout </a>
  </div>
  <nav class="w3-sidebar w3-light-blue" id="notifybar" style="margin-left:90%; width: auto; display:none;" ><br>
  <button class="w3-bar-item w3-button w3-padding" name="notifyclose" onclick=closebar();><i class="fa fa-remove fa-fw"></i>  Close Menu</button>
  <script type="text/javascript">
  function closebar(){ document.getElementById("notifybar").style.display="none"; }
  </script>
  <div style:'width:100px; height:70%; overflow-y:auto;' id=lfbarcontent>
  </div>
  </nav>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-container" style="margin-top:43px;">

    <!-- Header -->
    <header class="w3-container w3-center" style="padding-top:22px">
      <h3><b><?php echo $varname; ?></b></h3>
    </header>
<div class="container">
   <div class="w3-bar w3-border w3-round-xxlarge w3-black" >
     <button id="students" class="w3-bar-item w3-button" onclick="changeContent(this.id)">Students</button>
     <button id="class" class="w3-bar-item w3-button" onclick="changeContent(this.id)">Programs</button>
     <button id="tutor" class="w3-bar-item w3-button" onclick="changeContent(this.id)">Faculties</button>
     <button id="readmn" class="w3-bar-item w3-button" onclick="changeContent(this.id)">Re-Admission</button>

     <select class="w3-bar-item w3-select w3-small w3-right w3-margin-right" id=yrsel name="academic" hidden>
       <option value="">Enter Academic Year</option>
       <?php
            $sel=$conn->query("SELECT * FROM acdyr");
            while($row=$sel->fetch_assoc()){
              $yr=$row[yr_start]+3;
              echo "<option id=yrfilter value=".$row[acid].">".$row[yr_start]."-".$yr."</option>";
            }
        ?>
     </select>

   <center><input type="search" class="w3-input w3-border w3-round-xxlarge" style="padding-bottom:10px " id="searchbx" placeholder="Search in display..."></center>
   <form class="" id=printform target="_blank" method="post">
   <div  id=exprt class=" w3-dropdown-hover">

   <button class="w3-button w3-bar-item w3-margin-center w3-center">Export File</button>
     <div class= "w3-dropdown-content">
       <input type="submit" id="printdiv" class="w3-button" name="file_type" value="WORD">
       <input type="submit" id="printdiv" class="w3-button" name="file_type" value="PDF">
       <input type="submit" id="printdiv" class="w3-button" name="file_type" value="EXCEL">
     </div>
   </div>
   </div>
      <input type="text" id=divcontent name="content" value="" hidden>
     <div id="homecontent">

     </div>
   </form>
</div>
  </body>
</html>
