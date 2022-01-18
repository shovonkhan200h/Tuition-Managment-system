<?php

$host_name ='localhost';
$name = 'root';
$pass ='';
$db ='tuition';

$con =mysqli_connect($host_name,$name,$pass) or die ('Database!');
mysqli_select_db($con,$db);

?>