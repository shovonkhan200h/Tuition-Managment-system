<?php
include "config.php";
include "insert2.php";

if(isset($_SESSION["user"])){
    
    header("Location:index.php");
}

?>
<!DOCTYPE>
<html>

<head>
    <link rel="stylesheet" href="css/allcss.css">
    <title>TUITION MEDIA SOURCE </title>
</head>

<body>
    <div id="regs">
        <h2 class="h" align="center">Tuition Media Source </h2>
        <div class="formdesign">
            <h1 align="center"> Student Registration From</h1>
            <table>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <tr>
                        <td>
                            <label>First Name <sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" pattern="[a-zA-Z]*" title="Only character accepted"  name="f_name" id="From1" placeholder="First name" value="<?php echo $f_name; ?>" required>
                        </td>
                        <td>
                            <label>Last Name <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="l_name" placeholder="Last name"  pattern="[a-zA-Z]*" title="Only character accepted" value="<?php echo $l_name; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Username <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="name2" value="<?php echo $name2; ?>" id="From1" placeholder="Username" maxlength="7" required>
                        </td>
                        <td>
                            <label>E-mail <sup>*</sup></label>    
                        </td>
                        <td style="padding:0;">
                            <input type="email" name="email" onblur="sValid()" onfocus="sValid()" class="form-control" name="s_email" id="semail" value="<?php echo $email; ?>" placeholder="Email address" required>
                            <span class="error"><?php echo $emailerr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="password" name="pass1" id="spassword" placeholder="Password" required>
                        </td>
                        <td>
                            <label>Confirm password<sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="password" name="pass2" id="confirm-password" onblur="passValid()" onfocus="passValid()" placeholder="Confirm password" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>NID Or Student ID<sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="nid" id="nid" onblur="number()" onfocus="number()" maxlength="15" pattern=".{10,}" required title="10 characters minimum" placeholder="Nid" value="<?php echo $nid; ?>">
                        </td>
                        <td>
                            <label>Contact <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="number" name="Contact"  minlength="11"  pattern="[0-9] {11}" title="Only Number accepted & must be 11 digit" id="From12 " placeholder="Mobile Number" value="<?php echo $Contact; ?>" required>
                            <span><?php echo $conterr; ?></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Gender <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <select name="gender" id="" required>
                                <option value="" disabled <?php if($Gender==""){echo "selected";} ?>>Chose your option</option>
                                <option value="male" <?php if($Gender=="male"){echo "selected";} ?>>Male</option>
                                <option value="female" <?php if($Gender=="female"){echo "selected";} ?>>Female</option>
                            </select>
                        </td>
                        <td>
                            <label>Blood Group <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <select name="blood" id="">
                                <option value="" disabled <?php if($Blood==""){echo "selected";} ?>>Chose your option</option>
                                <option value="a+" <?php if($Blood=="a+"){echo "selected";} ?>>A +</option>
                                <option value="a-" <?php if($Blood=="a-"){echo "selected";} ?>>A -</option>
                                <option value="ab+" <?php if($Blood=="ab+"){echo "selected";} ?>>AB +</option>
                                <option value="ab-" <?php if($Blood=="ab-"){echo "selected";} ?>>AB -</option>
                                <option value="b+" <?php if($Blood=="b+"){echo "selected";} ?>>B +</option>
                                <option value="b-" <?php if($Blood=="b-"){echo "selected";} ?>>B -</option>
                                <option value="o+" <?php if($Blood=="o+"){echo "selected";} ?>>O +</option>
                                <option value="o-" <?php if($Blood=="o-"){echo "selected";} ?>>O -</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>School <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="School" pattern="[a-zA-Z\s]+" title="Only character accepted" id="From5" placeholder="School name" value="<?php echo $School; ?>" required >
                        </td>
                        <td>
                            <label>Collage</label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" pattern="[a-zA-Z\s]+" title="Only character accepted" name="Collage" id="From6" placeholder="Collage name" value="<?php echo $Collage; ?>" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>University </label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="University" pattern="[a-zA-Z\s]+" title="Only character accepted" id="From7" placeholder="University Name" value="<?php echo $University; ?> " >
                        </td>
                        <td>
                            <label>Subject<sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="Subject" id="From8" placeholder="CSE/BBA/Civil" pattern="[a-zA-Z\s]+" title="Only character accepted" value="<?php echo $Subject; ?>" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Background <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <select name="background" id="" required>
                                <option value="" disabled selected>Chose your option</option>
                                <option value="science">Science</option>
                                <option value="commerc">Commerc</option>
                                <option value="arts">Arts</option>
                                <option value="alim">Alim</option>
                            </select>
                        </td>
                        <td>
                            <label>Version <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <select name="version" id="" required>
                                <option value="" disabled selected>Chose your option</option>
                                <option value="bangla">Bangla</option>
                                <option value="english">English</option>
                                <option value="arabic">Arabic</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Birthday <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="date" name="Birthday" value="01-01-1991" id="From15" min="1996-01-01" max="2013-12-31" required>
                        </td>
                        <td>
                            <label>Picture <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="file" name="picture" id="From16" required style="color:white; margin-top:15px" required>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" name="reg" id="button" value="Sign up">
                        </td>
                    </tr>
                </form>
                <tr>

                    <td>
                        <a class="backbtn" href="index.php" style="color:yellow; text-decoration:none; padding:8px 15px;border-radius:5px; border:2px solid gold;"> Go back</a>
                    </td>
                     <td>
                        <a class="teacherbtn" href="registration%20from%20teacher.php" style="color:yellow; border-radius:5px; text-decoration:none; padding:8px 15px; border:2px solid blue;"> Apply as teacher</a>
                    </td>
                    <td class="signin" colspan="2" style="color:white; text-align:right">Already an account <a href="login.php" style="color:yellow">sign in</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footerdown">
        <h6>&copy copyright <?php echo date("Y"); ?>, <a href="index.php">Tution Media</a></h6>
    </div>
    <script>
        /*********email validation ***********/

        function sValid() {
            var email = document.getElementById("semail").value;
            if ((email.charAt(email.length - 4) != '.') || (email.charAt(email.length - 3) != 'c') || (email.charAt(email.length - 2) != 'o') || (email.charAt(email.length - 1) != 'm')) {
                document.getElementById("semail").style.background = "red";
            } else {
                document.getElementById("semail").style.background = "";
            }

        }

        function passValid() {
            var pass = document.getElementById("spassword").value;
            var c_pass = document.getElementById("confirm-password").value;
            if (pass != c_pass) {
                document.getElementById("confirm-password").style.background = "red";
            } else {
                document.getElementById("confirm-password").style.background = "";
            }
        }

        function number() {
            var x;
            x = document.getElementById("nid").value;
            if (isNaN(x)) {
                document.getElementById("nid").style.background = "red";
            } else {
                document.getElementById("nid").style.background = "";
            }
        }

    </script>
</body>

</html>
