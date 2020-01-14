<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/font-awesome.min.css"/>

    <link rel="stylesheet" href="../style.css"/>
    <title>STUDENT DATA ALTERED</title>
  </head>
  <?php
  session_start();
  $regno = $_GET['getrg'];
  include 'dataconnect.php';
  $resslid=$conn->query("SELECT * FROM sslc WHERE regno='$regno'");
  $resqlid=$conn->query("SELECT * FROM qualexam WHERE regno='$regno'");
  $rwssl=$resslid->fetch_assoc();
  $rwsql=$resqlid->fetch_assoc();

  $resbank=$conn->query("SELECT * FROM bank WHERE regno='$regno'");
  $restransfer=$conn->query("SELECT * FROM transfer WHERE regno='$regno'");
  $rwsbank=$resbank->fetch_assoc();
  $rwstransfer=$restransfer->fetch_assoc();
  $val4=$conn->query("UPDATE `student` SET sslcid='$rwssl[sslcid]', qid='$rwsql[qid]', bankid='$rwssl[bankid]', tcid='$rwsql[tcid]' WHERE regno='$regno'");
   ?>
  <style>
  body{ background-color: steelblue;
   background-repeat: no-repeat;
  background-size: cover;
  background-position: top center;}
  .button{
    border:none;
    color:blue;
    width:250px;
    padding: 15px 32px;
    text-align: center;
    font-size:16px;
    text-decoration: none;
    border-radius: 8px;
    border: 2px solid #008CBA;
  }
  .button:hover{ background-color: red; color: white;}
  </style>
  <body>
    <div class="container">
      <form class="form-control">
      <h1>STUDENT DATA IS ALTERED</h1>
      <div class="container">
        <p><br><br>
        <a class="button" href="../index.php" >FINISH</a>
      </p>
      </div>
      </form>
    </div>

  </body>
</html>
