<?php
$serverName="localhost";
$dbusername="root";
$dbpassword="";
$dbname="iadfinal";
$x= mysqli_connect($serverName,$dbusername,$dbpassword)/* or die('the website is down for maintainance')*/;
mysqli_select_db($x,$dbname) or die(mysql_error());
?>