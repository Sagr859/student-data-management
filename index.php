<?php
session_start();
 include 'dataconnect.php';
 include 'header.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>MES MARAMPALLY ALUVA</title>
	<meta charset="UTF-8">


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
						<a href="sign.php" class="site-btn header-btn">Sign In</a>
						<nav class="main-menu">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="#">About us</a></li>
								<li><a href="https://www.mesmarampally.org/Home.aspx">News</a></li>

							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>

</head>
<style>
body{ background-image: url("img/blueishdark.jpg");
 background-repeat: no-repeat;
background-size: cover;
background-position: top center;}
</style>
<body>

	<section class="hero-section set-bg"  >
		<div class="container" style= "background-color:rgba(0,0,0,0.85);">
			<div class="hero-text text-white">
				<h2><b>MES MARAMPALLY ONLINE DATABASE</b></h2>
				<p>This site offers all students and authorised faculties to store and manage their college related data.
					 <br>The user, as faculties,can share their students data with office computer systems.</p>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<form class="intro-newslatter"  id="loginform" method="POST">
						<input type="text" placeholder="Username" name=uname>
						<input type="password" class="last-s" placeholder="Password" name=pass>
						<span id=error_msg class=form_error></span><br>
						<input type="submit" class="site-btn" value=Login name=login>
					</form>
					<p>
						<br></p>
				</div>
			</div>
		</div>
	</section>
<?php

if(isset($_POST['login'])){


					$uname = $_POST['uname'];
					$pass = $_POST['pass'];

					$rs1 = $conn->query("SELECT * FROM admin WHERE uname = '$uname' AND pass = '$pass'");
					$rs2 = $conn->query("SELECT * FROM tutor WHERE uname = '$uname' AND pass = '$pass'");
					$num1 = $rs1->num_rows;
					$num2 = $rs2->num_rows;

					if(($num1 > 0)||($num2 > 0)){

						if($num1 > 0){
                  $rws1 = $rs1->fetch_assoc();
                  $_SESSION['uname'] = $rws1['uname'];
                  $_SESSION['user_type']= $rws1['user_type'];
                  if($_SESSION['user_type']=="ADMIN"){
                    echo "<script type = \"text/javascript\">
									           alert(\"Admin Login Successful.................\");
									           window.location = (\"admin_dashboard.php\");
									         </script>";
                  }
                  else{
                    $rws1 = $rs1->fetch_assoc();
                    $_SESSION['uid'] = $rws1['adminid'];
									   echo "<script type = \"text/javascript\">
									            alert(\"Login Successful.................\");
									            window.location = (\"viewer_dashboard.php\");
									          </script>";
                  }
								}
						else{
							$rws2 = $rs2->fetch_assoc();
							$_SESSION['tid'] = $rws2['tutid'];
							echo "<script type = \"text/javascript\">
							alert(\"Login Successful.................\");
							window.location = (\"tutor-home.php\");
							</script>";
						}
				}
				else{
						echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again................\");
									window.location = (\"index.php\");
									</script>";
					}
}
 ?>
</body>

</html>
