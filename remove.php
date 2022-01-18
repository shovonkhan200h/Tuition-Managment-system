<?php 
$t_id="";
    if(isset($_GET['st_cncl_id'])){
        $t_id=$_GET['st_cncl_id'];
        studentcncl($t_id);
    }
if(isset($_GET['ad_cncl_id'])){
        $t_id=$_GET['ad_cncl_id'];
        admincncl($t_id);
    }

if(isset($_GET['aproval_cncl_id'])){
        $t_id=$_GET['aproval_cncl_id'];
        aprovalcncl($t_id);
    }
// Teacher notification cancle code

function studentcncl($id){
include 'config.php';
        $sql="DELETE FROM `tutor_request` WHERE `tutor_request`.`id` = $id";
        if($con->query($sql)==TRUE){     
        header("Location:notification.php");
     }
    }

function admincncl($id){
include 'config.php';
        $sql="DELETE FROM `tutor_request` WHERE `tutor_request`.`id` = $id";
        if($con->query($sql)==TRUE){     
        header("Location:Deshboard.php");
     }
    }
function aprovalcncl($id){
include 'config.php';
        $sql="DELETE FROM `teacher` WHERE `teacher`.`id` = $id";
        if($con->query($sql)==TRUE){     
        header("Location:Approval.php");
     }
    }


?>