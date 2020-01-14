<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="img/favicon.ico" rel="shortcut icon"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="style.css"/>

      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <?php
      session_start();
       include 'dataconnect.php';     ?>
      <script>
      $(document).ready(function() {
        $("#form_password").keyup(passvalid);
        $("#form_retype_password").keyup(passmatch);
        $("#form_username").change(namevalid);
        $("#name").change(namevalid2);
        $("#site-btn").click(validform);
        $('#form_username').blur(function(){
          var user = $(this).val();
          $.ajax({
              url:"checksign.php",
              method:"POST",
              data:{username:user},
              dataType:"text",
              success:function(html){
                $('#username_error').text(html);
              }
          });
        });
        $(document).on('submit', '#sign_up_form', function(ev){
        ev.preventDefault();				//disables the default action
        if(validform() && passvalid() && passmatch() && namevalid() && namevalid2())
         {
                //  $(this).unbind('submit').submit();	//re-enables the defalut action of submit
                var sign_up_form=$(this);
                var form_data=JSON.stringify(sign_up_form.serializeObject());
                $.ajax({
                 success : function(result) {
                            var id = result.id;
                            alert("submitted");
                             // if response is a success, tell the user it was a successful sign up & empty the input boxes
                             sign_up_form.find('input').val('');
                          },
                          error: function(xhr, resp, text){
                             // on error, tell the user sign up failed
                             var message = JSON.parse(xhr.responseText);
                             alert(message.message);
                          }
                        });

         }
         else {
           alert("failed");
         }

        });

      });//doc ready close
      function validform(){
       var datas = $(".textbox").find("input").serializeArray();
       var x=0;
       $.each(datas,function(i,data){
         if(data.value==""){
           if(data.name=="name")
             $("#username_error").html("This can't field be left blank");

           if(data.name=="pass")
             $("#password_error").html("Please enter a strong password");
           x++;
           }
         });
       if(x==0)
         return true;
       else
         return false;
      }
      $.fn.serializeObject = function(){

          var o = {};
          var a = this.serializeArray();
          $.each(a, function() {
              if (o[this.name] !== undefined) {
                  if (!o[this.name].push) {
                      o[this.name] = [o[this.name]];
                  }
                  o[this.name].push(this.value || '');
              } else {
                  o[this.name] = this.value || '';
              }
          });
          return o;
      }

      function passvalid(){

      var len = document.getElementById("form_password").value;
      document.getElementById("password_error").className = 'error_form';
      if(len.length < 8)
      {	$("#password_error").html("Atleast 8 characters");

      return false;
      }
      else if(len.length == 8)
      {	$("#password_error").html(" You have a WEAK password");

        return true;
      }
      else if((len.length > 8)&&(len.length < 15))
      {
        document.getElementById("password_error").className = 'error_form2';

        $("#password_error").html("You have a STRONG password");
        return true;
      }
      else{
        $("#password_error").html("");
        return false;
      }
    }

      function passmatch(){
      var pass = $("#form_password").val();
      var conpass = $("#form_retype_password").val();

      if(pass != conpass){
        $("#confpass_error").html("Incorrect password");
        return false;
      }
      else{
        $("#confpass_error").html("");
        return true;
      }
      }

      function namevalid(){
      var n=$("#form_username").val();
      if(n == ""){
        $("#username_error").html("Enter Username");
        return false;
      }
      else
      {
        $("#username_error").html("");
        return true;
      }
      }
            function namevalid2(){
            var n=$("#name").val();
            if(n == ""){
              $("#name_error").html("Please enter your name");
              return false;
            }
            else
            {
              $("#name_error").html("");
              return true;
            }
            }

      </script>
      <style>
      body{ background-image: url("img/blueishdark.jpg");
       background-repeat: no-repeat;
      background-size: cover;
      background-position: top center;}
      table, td{ width: 20%;
                  height: 5px;
                padding: 20px; }
      .checkmark{
        height:10px;
        width:10px;
        background-color: #eee;
        border-radius:50%;
      }
      </style>
    <title>Faculty Sign In</title>

    <header class="header-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <div class="site-logo">
              <img src="img/logo.jpg" alt="">
            </div>
            <div class="nav-switch">
              <i class="fa fa-bars"></i>
            </div>
          </div>
          <div class="col-lg-9 col-md-9">
            <nav class="main-menu">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="https://www.mesmarampally.org/Home.aspx">News</a></li>

              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

  </head>
  <body>

  		<div class="container" style= "background-color:rgba(0,0,0,0.85);">
  			<div class="hero-text text-white">
    <h1>Faculty Sign In</h1>
        </div>
        <center>
        <section class="hero-section set-bg"  >
        <div class="row">
  				<div class="col-lg-10 offset-lg-1">
    <form class="intro-newslatter text-white" action="" method="post">
      <table>
        <tr>
          <th>Name</th><td>
          <input class="field" type="text" name="n1" value="" id=name required> </td> <td><span id=name_error></span></td>
        </tr>
        <tr>
          <th>Department</th><td><select class="field" name="dept" id=department>
            <?php

            $result=$conn->query("SELECT deptid,deptname FROM dept");
            while($row=$result->fetch_assoc()){
              echo "<option value=".$row['deptid']." > ".$row['deptname']."</option>";
            }
            ?>
          </select> </td>
        </tr>
        <tr>
          <th>Username</th><td>
          <input class="field" type="text" name="uname" value="" id=form_username required><span id=username_error></span></td>
        </tr>
        <tr>
          <th>Password</th><td>
          <input class="field" type="password" name="pass" value="" id=form_password required><span id=password_error></span></td>
        </tr>
        <tr>
          <th>Confirm Password</th><td>
          <input class="field" type="password" name="confpass" value="" id=form_retype_password required> <span id=confpass_error></span> </td>
        </tr>
        <tr>
          <th>Designation</th><td><input type="radio" class="checkmark" name="usertype" checked value="FACULTY" >&nbsp;Faculty &nbsp;&nbsp;
            <input type="radio" class="checkmark" name="usertype" value="HOD">&nbsp;HOD </td>
        </tr>
          <tr>
          <th><input type="submit" class="site-btn" name="signin" value="Submit" id="site-btn"></th><td><span id=submit_error></span></td>
        </tr>

      </table>

    </form>
  </div>
</div>
  </div>
</section>
</center>
<?php
  if(isset($_POST['signin']))
  {

    $name = $_POST['n1'];
    $uname= $_POST['uname'];
    $pass= $_POST['pass'];
    $deptid= $_POST['dept'];
    $usertype= $_POST['usertype'];
    $sql="SELECT * FROM tutor Where uname='$uname'";
    $result=$conn->query($sql);
    if($result->num_rows>0) {
    echo "<script>
          $('#username_error').html(' Username taken');

    </script>";
  }
  //window.location.replace('http://127.0.0.1/stdmgm/sign.php');
  else{
    $sql1="INSERT INTO `tutor` (`tutname`,`deptid`,`pass`,`uname`,`user_type`) VALUES ('$name','$deptid','$pass','$uname','$usertype')";
    $result1=$conn->query($sql1);

    if ($result1 === TRUE ){
      $rsign = $conn->query("SELECT * FROM tutor WHERE uname = '$uname'");
      $rwsign = $rsign->fetch_assoc();
      if($usertype=="HOD"){
        $conn->query("UPDATE tutor SET tutid='$rwsign[tutid]'");
      }
      $_SESSION['tid'] = $rwsign['tutid'];
          echo "<script>
                  alert('Successfully Registered');
                  window.location.replace('http://127.0.0.1/stdmgm/tutor-home.php');
                </script>";
      }
      else {
          echo "  <script>
                alert('Registeration Failed');
                window.location.replace('http://127.0.0.1/stdmgm/sign.php');
                </script>";
    }
}
  }
 ?>
  </body>
</html>
