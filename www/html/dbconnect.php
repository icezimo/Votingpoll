<?php

 // this will avoid mysql_connect() deprecation error.
 //error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.
 
 /*define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', 'blueberry');
 define('DBNAME', 'poll_db');
 
 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysqli_select_db($conn,DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysqli_connect_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysqli_error());
 }*/
 
$conn = mysqli_connect("mysql","root","secret","poll_db");

if (mysqli_connect_errno()) {
  echo "Connection failed : " . mysqli_connect_error();
 }
 ?>