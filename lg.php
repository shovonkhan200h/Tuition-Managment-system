<?php 
session_start();
    if(isset($_POST['login'])){
        $user=$_POST['user-option'];
        if($user=="teacher"){
        TeacherLogin();
        }else{
            StudentLogin(); 
        }
    }

/* ****************************** Teacher login function *********************************/



    function TeacherLogin(){
        include 'config.php';
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $sql = "SELECT * from teacher where email='$email' AND password='$password'";
        $result = mysqli_query($con,$sql);
        $resultchk = mysqli_num_rows($result);
        if($resultchk==1){           
            $teacher= mysqli_fetch_assoc($result);
            if($teacher['aproval']==1){
                    $_SESSION["user"]="teacher";
		            $_SESSION["id"]=$teacher["id"];
		            header('Location: index.php');
            }else{
                header('location:login.php?message=Your account is not verified');
                session_destroy();
            }
        }else{
            header('location:login.php?message=invalid username or password');
            session_destroy();
        }
    
    }



/* ****************************** Student login function *********************************/

   function StudentLogin(){
        include 'config.php';
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $sql = "SELECT * from student where email='$email' AND password='$password'";
        $result = mysqli_query($con,$sql);
        $resultchk = mysqli_num_rows($result);
        if($resultchk==1){               
            $student= mysqli_fetch_assoc($result);
            $_SESSION["id"]=$student["id"];
            $_SESSION["user"]="student";
            header('Location: index.php');
        }else{
            header('location:login.php?message=invalid username or password');
            session_destroy();
        }
    
    }



?>
