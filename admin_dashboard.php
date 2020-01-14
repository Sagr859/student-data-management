<?php
session_start();
$uid=$_SESSION['uid'];
 include 'dataconnect.php'; ?>
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
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/main.js"></script>

    <title>ADMIN</title>
    <script>
    $(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");
    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");
    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
      } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
      }
    }
    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }

    function changeContent(el){
      var content=document.getElementById("homecontent");
      if(el=="class"){
        content.innerHTML=(" <?php $opt="cl"; include 'search.php'; ?>");  }
    else if(el=="tutor")
    content.innerHTML=("<?php $opt="tut"; include 'search.php'; ?>");
    else if(el=="students")
    content.innerHTML=("<?php  $opt="std"; include 'search.php'; ?>");
    else if(el=="department")
    content.innerHTML=("<?php $opt="dept"; include 'search.php'; ?>");

    else if(el=="semester")
    content.innerHTML=("<?php  $opt="sem"; include 'search.php'; ?>");
    else if(el=="notify"){
      document.getElementById("notifybar").style.display="block";
      document.getElementById("lfbarcontent").innerHTML=(" <?php include "message.php"; ?>")
    }

  }


    </script>


  </head>
  <body class="w3-light-grey">
  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right">STUDENT DATA MANAGEMENT SYSTEM </span>
    <a href=signout.php class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-out fa-fw"></i>Signout </a>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
      <div class="w3-col s4">
        <img src="img/logo.jpg" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="w3-col s8 w3-bar">
        <span>Welcome, <strong>Me</strong></span><br>
        <a href="admin-message" class="w3-bar-item w3-button" data-toggle="popover" title="Messages"><i class="fa fa-envelope" ></i></a>
        <a href="" class="w3-bar-item w3-button" data-toggle="popover" title="Database"><i class="fa fa-database"></i></a>
        <a href="admin-settings" class="w3-bar-item w3-button" data-toggle="popover" title="Settings"><i class="fa fa-cog"></i></a>
      </div>
    </div>
    <hr>
    <div class="w3-container">
      <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Me</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  New</a>
      <button class="w3-bar-item w3-button w3-padding" id="notify" onclick="changeContent(this.id)"><i class="fa fa-bell fa-fw"></i>  Notifications</button>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
    </div>
  </nav>
  <nav class="w3-sidebar w3-light-blue " id="notifybar" style="margin-left:90%; width:400px; display:none;" ><br>
    <button class="w3-bar-item w3-button w3-padding" name="notifyclose" onclick=closebar();><i class="fa fa-remove fa-fw"></i>  Close Menu</button>
    <script type="text/javascript">
      function closebar(){ document.getElementById("notifybar").style.display="none"; }
    </script>
    <div class="w3-container w3-row" id=lfbarcontent>
    </div>
  </nav>
  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
      <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
    </header>
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-quarter">
        <div class="w3-container w3-red w3-padding-16">
          <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
          <div class="w3-right">
            <?php $res=$conn->query("SELECT * FROM tutor");
            $var=$res->num_rows;
            ?>
            <h3><?php echo $var; ?> </h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Tutors</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16">
          <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
          <div class="w3-right">
            <?php
            $res1=$conn->query("SELECT * FROM student");
            $var1=$res1->num_rows;
             ?>
            <h3><?php echo $var1; ?> </h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Students</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-teal w3-padding-16">
          <div class="w3-left"><i class="fa fa-bell w3-xxxlarge"></i></div>
          <div class="w3-right">
            <?php
            $res2=$conn->query("SELECT * FROM message");
            $var2=$res2->num_rows;
            if($var2=="") $var2=0; ?>
            <h3><?php echo $var2; ?> </h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Notifications</h4>
        </div>
      </div>

    </div>
     <div class="w3-bar w3-border w3-round-xxlarge w3-black" >
       <button id="students" class="w3-bar-item w3-button" onclick="changeContent(this.id);">Students</button>

         <button id="department" class="w3-bar-item w3-button" onclick="changeContent(this.id);">Department</button>
         <button id="class" class="w3-bar-item w3-button" onclick="changeContent(this.id);">Programs</button>
         <button id="tutor" class="w3-bar-item w3-button" onclick="changeContent(this.id);">Faculties</button>
         <button id="semester" class="w3-bar-item w3-button" onclick="changeContent(this.id);">Semester</button>
    </div>
    <div id="homecontent">
    </div>

</body>
</html>
