<?php
include 'lg.php';
if($se_u=isset($_SESSION["user"])){
    if($se_u!="none")
    header("Location:index.php");
}

    include 'config.php';
    include 'header.php';
$message="";
    if(isset($_GET['message'])){
        $message= $_GET['message'];
    }
?>
   <div class="teacher-login">
      <div class="login">
       <div class="login-left"></div>
       <div class="login-right">
       <div class="l-head"> <h3>Tution media Login System</h3></div>
        <form action="lg.php" method="post">
            <center>
                <img src="image/logo.png" height="120px" width="150px"></center>
                <level class="l_error"><?php echo $message; ?></level>
            <br>
            <label>Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <br><br>
            <label>password </label>
            <input type="password" name="pass" id="password" placeholder="Enter  tour password ">
            <br><br>
            <div class="login_system">
            <p>Select user</p><select name="user-option">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
            </div>
            <input type="submit" name="login" class="login_btn" value="Login">
            <br><br><br><br><a href="forget_password.php">Forget password</a>
            <br><br>
           <span> Need an account?</span> <a href="registration%20from%20teacher.php" style="padding:10px;">Create</a>
        </form>
        
        <a href="index.php" style="float:right;margin-top:-20px; margin-right:20px; color:white;">Go back Homepage</a>
    </div>
    </div>
    </div>
<?php include 'footer.php'; ?>