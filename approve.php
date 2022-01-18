<?php
session_start();
include "config.php";
if(isset($_POST['sub-btn'])){
    $id= $_SESSION["s_id_t"];
        $t_id= $_SESSION["t_id_t"];
        $tran= $_POST["tran_id"];

$sql = "UPDATE tutor_request SET confirm = 1,tran_id='$tran' where student_id=$id AND teacher_id=$t_id";
if($con->query($sql)==TRUE){     
        header("Location:notification.php");
     }else{
     	echo $con->error;
     }
}

if(isset($_GET['payment2'])){
    $id=$_GET['payment2'];    
    $tran= $_POST["tran_id_2"];
    $amount=$_GET['amount']+500;
    pay2($id,$tran,$amount);
}
if(isset($_GET['conid'])){
    $id=$_GET['conid'];
    paymentconfirm($id);
}

function pay2($id,$tran,$amount){    
include "config.php";
$t_id= $_POST['tran_id_2'];    
    $sql = "UPDATE tutor_request SET status =1,tran_id_2='$tran',paid_amount='$amount' where id='$id'";
    if($con->query($sql)==TRUE){ 
        header("Location:Deshboard.php");
     }else{
     }
}


function paymentconfirm($id){
    include "config.php";  
    $sql = "UPDATE tutor_request SET status =2 where id='$id'";
    if($con->query($sql)==TRUE){ 
        header("Location:Deshboard.php");
     }else{
     }
}

?>