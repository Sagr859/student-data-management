<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style-dashboard.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"/>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>

    <title><?php
     echo $_SESSION['tname']; ?></title>
     <style media="screen">
     .modal{ display: none;
              position: fixed;
            z-index: 1; left: 30%; top: 20%;
            width: 40%; height: 30%;
            overflow:auto;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.5);}
     .modal-header{
       padding: 2px 16px;
       background-color: black;
       color: white;
     }

     .modal-body{  padding: 2px 16px;}
     .modal-content{
       position: relative;
       background-color: white;
       margin: auto;
       padding: 0;
       border: 1px solid #888;
       width:80%;

     }
     .close{  color: #aaa; float: right; font-size: 20px; font-weight: bold;}
     .close:hover,.close:focus{ color:red; text-decoration: none; cursor: pointer;}
     </style>
    <script>

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
    $(document).ready(function(){

    $("#searchbx").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#datatable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });


    });
    function cplink(){
      document.getElementById("exprt").style.display="none";
      var cptext=document.getElementById("linktext");
      cptext.select();
      document.execCommand("copy");
      alert("Link copied to clipboard");
    }
    function messagesShw(){
      document.getElementById("notifybar").style.display="block";
      var nq= `<?php $sql=$conn->query("SELECT * FROM message WHERE sender_id='$_SESSION[tid]'"); if($sql->num_rows) echo "<h3>NO<br> MESSAGES <br>SENT</h3>"; else { echo "<table>"; while($rw=$sql->fetch_assoc()){ echo "<tr><th>".$rw['title']."</th></tr><tr><td>".$rw['content']."</td></tr>";  } echo "</table>"; } ?>`;
      document.getElementById("lfbarcontent").innerHTML=(nq);
    }
    function addtutor(){
      document.getElementById("hod-manage").style.display="block";
      document.getElementById("homecontent").innerHTML+=(" <?php include 'tutor/addtutor.php'; ?>");
    }
    function addsub(){
      document.getElementById("sub-manage").style.display="block";
      document.getElementById("homecontent").innerHTML+=(" <?php include 'tutor/addsub.php'; ?>");
    }
    function delstd(){

      document.getElementById("std-manage").style.display="none";
      document.getElementById("delmodal").style.display="block";
      document.getElementById("closemodal").onclick = function(){ document.getElementById("delmodal").style.display="none"; }
      document.getElementById("modalbd").innerHTML+=("<?php include 'tutor/delstud.php'; ?>" );

    }
      function changeContent(el){
        var content=document.getElementById("homecontent");
        var barcontent=document.getElementById("barcontent");
        var tutmng=document.getElementById("hod-manage");
        var submng=document.getElementById("sub-manage");
        document.getElementById("exprt").style.display="block";
        document.getElementById("searchbx").style.display="none";
        document.getElementById("std-manage").style.display="none";
        submng.style.display="none";
        tutmng.style.display="none";
        barcontent.style.display="none";


    if(el=="createlink"){
    content.innerHTML=("<input type='text' id=linktext value='http://localhost/stdmgm/std/studsign.php'>&nbsp;&nbsp;<button onclick=cplink(); >Copy this link</button>");

    }
    else if(el=="mydept"){
      tutmng.style.display="block";

    content.innerHTML=("<?php include 'tutor/mydept.php'; ?>"); }
    else if(el=="myclass"){
    barcontent.style.display="block";
    document.getElementById("std-manage").style.display="block";
    content.innerHTML=("<?php include 'tutor/myclass.php'; ?>");  }
    else if(el=="tutors"){
      submng.style.display="block";
    content.innerHTML=("<?php include 'tutor/tutorprint.php'; ?>"); }
    else if(el=="students"){
    barcontent.style.display="block";
    content.innerHTML=("<?php include 'tutor/students.php'; ?>");
    }
      else if(el=="signout"){
                if(confirm('Do you Want to Quit?')){
                      window.location.replace('http://127.0.0.1/stdmgm/signout.php'); }
      }
      else if((el=="insmarksint")||(el=="insmarksext")){
         var tbl=[];
         var hds=[];
         if(el=="insmarksint")
         var nm="Internal";
         else
         var nm="External";

         var tbdata="<table><tr><td>Name</td><td>Program</td><td>RegNo</td><td>Mark</td></tr><tbody id=datatable>";
         $('#tabledata th').each(function(index,item){
           hds[index]=$(item).html();
         });
         $('#tabledata tr').has('td').each(function(){
           var arrayItem = {};
           $('td',$(this)).each(function(index,item){
             arrayItem[hds[index]]=$(item).html();
           });
           tbl.push(arrayItem);
         });
         for(var i=0;i<tbl.length;++i){
           var rg=tbl[i].RegNo;
            var sb=tbl[i].Subject;
            $("#addint"+i).click(function(){  alert('GOT!!!');});
        $.ajax({
              url:"tutor/intext.php",
              method:"POST",
              dataType:'text',
              data:{regno: rg, subname: sb, mark: nm, cnt: i},
              success:function(html){

                tbdata=tbdata.concat(html);
                content.innerHTML=(tbdata);
              },
              error: function(){ console.log(html);}

        });
      }
          content.innerHTML+=("</tbody></table>");

      }
      else if(el=="search"){
        document.getElementById("searchbx").style.display="block";
      }
      else if(el=="compose"){
        document.getElementById("lfbarcontent").innerHTML+=( `<?php include "tutor/messenger.php"; ?>`);
      }
    }


    </script>

  </head>
  <body class="w3-light-grey">
  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right"><?php echo $_SESSION['deptname']; ?> </span>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
      <div class="w3-col s4">
        <img src="img/logo.jpg" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="w3-col s8 w3-bar">
        <span>Welcome, <strong><?php echo $_SESSION['tname']; ?> </strong></span><br>
        <button onclick=messagesShw(); class="w3-bar-item w3-button" id=notify data-toggle="popover" title="Messages"><i class="fa fa-envelope" ></i></button>

        <a href="admin-settings" class="w3-bar-item w3-button" data-toggle="popover" title="Settings"><i class="fa fa-cog"></i></a>
      </div>
    </div>
    <hr>

    <div class="w3-bar-block">
      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
      <a href="tutor-home.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  My Dashboard</a>
      <button id="createlink" onclick="changeContent(this.id)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-link fa-fw"></i>  Create Link</button>
      <?php if($_SESSION['usertype']=="HOD")
       echo"<button id='mydept' onclick='changeContent(this.id);' class='w3-bar-item w3-button w3-padding'><i class='fa fa-group fa-fw'></i>  My Department</button>";
      ?>
      <button id="myclass" onclick="changeContent(this.id)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-group fa-fw"></i>  My Class</button>
      <button id="tutors" onclick="changeContent(this.id)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book"></i>  Tutors</button>
      <button id="students" onclick="changeContent(this.id)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> My Students</button>
      <button id="signout" onclick="changeContent(this.id)" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i>  Sign Out</button><br><br>
    </div>
  </nav>
  <nav class="w3-sidebar w3-light-blue " id="notifybar" style="margin-left:90%; width:400px; display:none;" ><br>
    <button class="w3-bar-item w3-button w3-padding" name="notifyclose" onclick=closebar();><i class="fa fa-remove fa-fw"></i>  Close Menu</button><br>
    <button class="w3-bar-item w3-button w3-padding" id="compose" onclick=changeContent(this.id);><i class="fa fa-add fa-faw"></i> Compose</button>
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
