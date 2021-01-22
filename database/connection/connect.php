<?php
//adding host and databse name 
$dsn = "mysql:host=localhost;dbname=guestbook";
//username of database 
$user = "root";
//password of database 
$pass = "";
//make standard  of utf8 
$options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
//connecting to database 
try {
  //conection name is $con 
  $con = new PDO($dsn, $user, $pass, $options);
  //set error mode and exceptions  of PDO 
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
//catching error and exceptions of PDO 
catch (PDOException $e) {
  //display  exception
  echo $e->getMessage();
}