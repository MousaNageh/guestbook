<?php
session_start();
//remove sessions for user 
unset($_SESSION["email"]);
unset($_SESSION["userId"]);
session_unset();
session_destroy();
header("location:index.php");
exit();