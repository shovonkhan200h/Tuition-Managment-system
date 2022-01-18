<?php
session_start();
include 'config.php';
if(isset($_POST["req"])){ 
    $s_id = $_SESSION["id"];
    $t_id = $_SESSION["req_id"];
    $subject= $_POST["subject_r"];
    $time= $_POST["time_r"];
    $days= implode(",", $_POST['days']);
    $j_date= $_POST["joining_date"];

    $current_date = date("Y-m-d H:i:s");  //h i s date formet
    $sql_rep= "select count(*) from tutor_request where teacher_id=$t_id AND student_id =$s_id";
        $not_rep = mysqli_query($con,$sql_rep);
        $not_qrep = mysqli_fetch_row($not_rep);
        $rep_count= $not_qrep[0];
    if($rep_count==0){
        $sql = "INSERT INTO `tutor_request` (`student_id`, `teacher_id`, `date`,`subject`, `time`, `days`,`joining_date`) VALUES ('".$s_id."', '".$t_id."', '".$current_date."','".$subject."','".$time."','".$days."','".$j_date."')";
             $con -> query($sql) == TRUE;
    header('location:teacher.php');
            }else{
        header('location:contactPage.php?id='.$t_id);
    }
}

?>
