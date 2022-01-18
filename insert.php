<?php
session_start();
$error="";
$emailerr="";
$conterr="";
$name2 = $email = $nid = $University = $School = $Collage = $University = $teching = $teching_sub = $t_c = $salary = $f_name = $l_name = $Subject = $picture = $Contact ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
$name2 = $_POST["name2"];
$pass = $_POST["pass1"];
$email = $_POST["email"];
$nid = $_POST["nid"];
$School = $_POST["School"];
$Collage = $_POST["Collage"];
$University = $_POST["University"];
$Subject = $_POST["Subject"];
$Blood = $_POST["blood"];
$Gender = $_POST["gender"];
$Background = $_POST["background"];
$Contact = $_POST["Contact"];
$Version = $_POST["version"];
$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$Birthday = $_POST["Birthday"];
$t_e=$_POST["teching"];
$t_t_s=$_POST["t_t_s"];
$t_t_e=$_POST["t_t_e"];
$t_s=$_POST["teching_sub"];  
$t_c=$_POST["t_c"];  //teaching class
$m_s=$_POST["m_s"];  //max subject
$m_h=$_POST["m_h"];  //max hour
$d_p_w=$_POST["d_p_w"];  //day per week
$salary=$_POST["salary"];

// iamge upload code BLOB type

$name = $_FILES['picture']['name'];
$type = $_FILES['picture']['type'];
$data = addslashes(file_get_contents($_FILES['picture']['tmp_name']));


if (!empty($f_name)||!empty($l_name)||!empty($name2) || !empty($pass) || !empty($email) || !empty($nid) || !empty($School) || !empty($Collage) || !empty($University) || !empty($Subject) || !empty($Blood) || !empty($Gender) || !empty($Background) || !empty($Contact) || !empty($Version) || !empty($Birthday) ||  !empty($data) ||    !empty($t_t_s)||  !empty($t_t_e)||  !empty($t_s)||  !empty($t_c)||  !empty($m_s)||  !empty($m_h)||  !empty($d_p_w)||  !empty($salary)){
 
    $host_name ="localhost";
    $name = "root";
    $pass2 ="";
    $db ="tuition";
    //create connection
    $con = new mysqli($host_name, $name, $pass2, $db);
    $sql = "select * from teacher where email ='".$email."' OR Contact='".$Contact."'";
    $result = $con->query($sql);
    if(strlen($Contact)!=11){
            $conterr="Contact Length must be 11";
            return false;

        }

        if ($result->num_rows > 0) {
        $row=mysqli_fetch_assoc($result);
        if($row['email']== $email){
            $emailerr="Email already exits";
            return false;
        }
        if($row['Contact']== $Contact){
            $conterr="Contact already exits";
            return false;
        }
    }
     else {
	   $sql = "INSERT INTO `teacher`( `f_name`,`l_name`, `name`, `email`, `password`, `nid`, `School`, `Collage`, `University`, `Subject`, `Blood_group`, `Gender`, `Background`, `Contact`, `Version`,`Birthday`,`p_type`, `Picture`, `t_e`, `t_t_s`, `t_t_e`, `t_s`, `t_c`, `m_s`, `m_h`, `d_p_w`, `Salary`) values ('".$f_name."','".$l_name."','".$name2."','".$email."','".$pass."','".$nid."','".$School."','".$Collage."','".$University."','".$Subject."','".$Blood."','".$Gender."','".$Background."','".$Contact."','".$Version."','".$Birthday."','".$type."','".$data."','".$t_e."','".$t_t_s."','".$t_t_e."','".$t_s."','".$t_c."','".$m_s."','".$m_h."','".$d_p_w."','".$salary."')";
     if(mysqli_query($con,$sql)==true){       
        header("Location: login.php");
     }else{
     	echo $con->error;
     }
	}
    
} else {
 echo "All field are required";
 die();
}
}
?>
