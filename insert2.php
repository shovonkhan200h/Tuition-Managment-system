<?php
session_start();
$error="";
$emailerr="";
$conterr="";
$name2 = $email = $nid = $University = $School = $Collage = $f_name = $l_name = $Gender = $Subject = $Contact = $Blood ="";
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

// iamge upload code BLOB type

$name = $_FILES['picture']['name'];
$type = $_FILES['picture']['type'];
$data = addslashes(file_get_contents($_FILES['picture']['tmp_name']));


if (!empty($f_name)||!empty($l_name)||!empty($name2) || !empty($pass) || !empty($email) || !empty($nid) || !empty($School) || !empty($Collage) || !empty($University) || !empty($Subject) || !empty($Blood) || !empty($Gender) || !empty($Background) || !empty($Contact) || !empty($Version) || !empty($Birthday) ||  !empty($data)) {
 
    $host_name ="localhost";
    $name = "root";
    $pass2 ="";
    $db ="tuition";
    //create connection
    $con = new mysqli($host_name, $name, $pass2, $db);
    $sql = "select * from student where email ='".$email."' OR Contact='".$Contact."'";
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
	} else {
	   $sql = "INSERT INTO `student`( `f_name`,`l_name`, `name`, `email`, `password`, `nid`, `School`, `Collage`, `University`, `Subject`, `Blood_group`, `Gender`, `Background`, `Contact`, `Version`,`Birthday`,`p_type`, `Picture`) values ('".$f_name."','".$l_name."','".$name2."','".$email."','".$pass."','".$nid."','".$School."','".$Collage."','".$University."','".$Subject."','".$Blood."','".$Gender."','".$Background."','".$Contact."','".$Version."','".$Birthday."','".$type."','".$data."')";
     if($con->query($sql)===TRUE){                 
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
