<?php 
include 'header.php';
session_start();
?>
<div class="teacher-login">
    <div class="login">
        <div class="login-left"></div>
        <div class="login-right">
            <h2>Recovery password</h2>
            <form action="" method="post">
            <div id="form-fst">
           <input type="email" name="email" placeholder="Enter your email"> 
            <select name="login_sel">
                <option value="teacher">Teacher</option>
                <option value="student">student</option>
            </select>
            <button type="submit" name="f_btn" class="butn">search</button>
            </div>
            <div id="main-content-f">
            <input type="password" id="n_pass" class="con_pass" name="pass"  placeholder="Enter new password"> 
            <input type="password" id="n_c_pass" class="con_pass" name="c_pass"  placeholder="Enter confirm password"> 
            <button id="r_btn" class="btn btn-success r_btn" type="submit" name="reset">Reset</button>
            
            <p style="font-size:20; color:red; padding:10px; margin-left:25px;" id="error"></p>
             <?php   
                    if(isset($_POST['f_btn'])){
                    forgetpass();
                }
                if(isset($_POST['reset'])){
                    resetpass();
                }?>
            </div>
            </form>
            <a href="login.php" class="btn btn-warning" style="margin:10px;" id="back_btn">Back</a>
        </div>
    </div>
</div>

<?php

    function forgetpass(){
    $host_name ="localhost";
    $name = "root";
    $pass2 ="";
    $db ="tuition";
    //create connection
    $conn = new mysqli($host_name, $name, $pass2, $db);
    $email= $_POST['email'];
    $option = $_POST['login_sel'];
    $sql= "select id from $option where email='$email'";
    $results = $conn->query($sql);
        if($results->num_rows==1){            
            $row = $results->fetch_assoc();
            $_SESSION['c_id']=$row['id'];
            $_SESSION['op']=$option;
            echo '<script> document.getElementById("form-fst").style.display="none";document.getElementById("n_pass").style.display="block";document.getElementById("n_c_pass").style.display="block";document.getElementById("r_btn").style.display="block";
            </script>';
        }else{
            echo '<script>document.getElementById("error").innerHTML = " email doesnot matched!";document.getElementById("error").style.color="yellow";</script>';
        }
        
}

function resetpass(){
        $host_name ="localhost";
    $name = "root";
    $pass2 ="";
    $db ="tuition";
    //create connection
    $conn = new mysqli($host_name, $name, $pass2, $db);

    //include "config.php";
                $n_pass= $_POST['pass'];
                $n_c_pass= $_POST['c_pass'];
                $op=$_SESSION['op'];
                $u_id=$_SESSION['c_id'];
                if(!empty($n_pass)||!empty($n_c_pass)){                    
                    if($n_pass == $n_c_pass){
                        $sql = "UPDATE $op SET password = '$n_pass' where id=$u_id";
                        if($conn->query($sql)==TRUE){
                        echo '<script>document.getElementById("error").innerHTML = "Password successfully changed!";
                        document.getElementById("error").style.color="green";</script>';
                        }
                    }
                    else{
                        echo '<script> document.getElementById("form-fst").style.display="none";document.getElementById("n_pass").style.display="block";document.getElementById("n_c_pass").style.display="block";document.getElementById("r_btn").style.display="block";document.getElementById("error").innerHTML = " password dont matches!";
            </script>';
                    }
                }else{
                    echo '<script> document.getElementById("form-fst").style.display="none";document.getElementById("n_pass").style.display="block";document.getElementById("n_c_pass").style.display="block";document.getElementById("r_btn").style.display="block";document.getElementById("error").innerHTML = " password mustbe entered!";</script>';
                }
            }
    
    include 'footer.php' ?>