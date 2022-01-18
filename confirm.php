<?php 
include 'config.php';
$s_id = $_GET["s_id"];
$t_id = $_GET["t_id"];

$sql = "UPDATE tutor_request SET confirm = 2, paid_amount=500 where student_id=$s_id AND teacher_id=$t_id";
if($con->query($sql)==TRUE){     
        header("Location:deshboard.php");
     }else{
     	echo $con->error;
     }

?>