<?php
session_start();
session_unset();
if(session_destroy())
header("location: http://127.0.0.1/stdmgm/index.php");

?>
