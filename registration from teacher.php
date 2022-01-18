<?php
include "config.php";
include "insert.php";


if(isset($_SESSION["user"])){
    
    header("Location:index.php");
}
?>




<!DOCTYPE>
<html>

<head>
    <link rel="stylesheet" href="css/allcss.css">
    <title>TUITION MEDIA SOURCE</title>
</head>

<body>
    <div id="reg">
        <h2 class="h" align="center">Tuition Media Source </h2>
        <div class="formdesign">
            <h1 align="center"> Teacher Application From</h1>
            <table>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <tr>
                        <td>
                            <label>First Name <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" pattern="[a-zA-Z]*" title="Only character accepted" name="f_name" id="From1" placeholder="First name" value="<?php echo $f_name; ?>" required>
                        </td>
                        <td>
                            <label>Last Name <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="l_name" placeholder="Last name" pattern="[a-zA-Z]*" title="Only character accepted" value="<?php echo $l_name; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Username <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="name2" id="From1" placeholder="Username" maxlength="7" value="<?php echo $name2; ?>" required>
                        </td>
                        <td>
                            <label>E-mail <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="email" name="email" onblur="sValid()" onfocus="sValid()" class="form-control" name="s_email" id="semail" placeholder="Email address" value="<?php echo $email; ?>" required>
                            <span class="error"><?php echo $emailerr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password<sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <input type="password" name="pass1" id="spassword" placeholder="Password" required>
                        </td>
                        <td>
                            <label>Confirm password<sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="password" name="pass1" id="confirm-password" onblur="passValid()" onfocus="passValid()" placeholder="Confirm password" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>NID OR Student ID<sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="nid" id="nid" onblur="number()" onfocus="number()" maxlength="15" pattern=".{10,}" required title="10 characters minimum" placeholder="Nid" value="<?php echo $nid; ?> " required>
                        </td>
                        <td>
                            <label>Contact<sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <input type="number" name="Contact" pattern="[0-9]{11}" title="Only Number accepted & must be 11 digit" id="From12" placeholder="Mobile Number" value="<?php echo $Contact; ?>" required>
                            <span><?php echo $conterr; ?></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Gender<sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <select name="gender" id="" required>
                                <option value="" disabled selected>Chose your option</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </td>
                        <td>
                            <label>Blood Group </label>
                        </td>
                        <td style="padding:0;">
                            <select name="blood" id="">
                                <option value="" disabled selected>Chose your option</option>
                                <option value="a+">A +</option>
                                <option value="a-">A -</option>
                                <option value="ab+">AB +</option>
                                <option value="ab-">AB -</option>
                                <option value="b+">B +</option>
                                <option value="b-">B -</option>
                                <option value="o+">O +</option>
                                <option value="o-">O -</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>School <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="School" pattern="[a-zA-Z\s]+" title="Only character accepted" id="From5" placeholder="School name" value="<?php echo $School; ?>" required>
                        </td>
                        <td>
                            <label>Collage<sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" pattern="[a-zA-Z\s]+" title="Only character accepted" name="Collage" id="From6" placeholder="Collage name" value="<?php echo $Collage; ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Univervarsity<sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="University" pattern="[a-zA-Z\s]+" title="Only character accepted" id="From7" placeholder="University Name" value="<?php echo $University; ?>">
                        </td>
                        <td>
                            <label>Subject<sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="Subject" id="From8" placeholder="CSE/BBA/CIVIL/Etc" pattern="[a-zA-Z\s]+" title="Only character accepted" value="<?php echo $Subject; ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Background<sup>*</sup> </label>
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
                            <label>Version<sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <select name="version" id="">
                                <option value="" disabled selected>Chose your option</option>
                                <option value="bangla">Bangla</option>
                                <option value="english">English</option>
                                <option value="arabic">Arabic</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Birthday<sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <input type="date" min="1991-01-01" max="2000-12-31" name="Birthday" id="From15" required>
                        </td>
                        <td>
                            <label>Picture <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="file" name="picture" id="From16" required style="color:white; margin-top:15px" value="<?php echo $picture; ?>" required>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td style="color: white; font-size:24px; font-weight:900;">Experience</td>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr></tr>

                    <tr>
                        <td>
                            <label>Teaching Experience <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <textarea name="teching" id="" cols="30" rows="5" placeholder="Write your experience" style="padding:5px;" value="<?php echo $teching; ?>" required></textarea>
                        </td>
                        <td>
                            <label>Teaching time <sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <select name="t_t_s" id="time" required>
                                <option value="" disabled selected>Starting time</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                            </select>
                            To
                            <select name="t_t_e" id="time" required>
                                <option value="" disabled selected>Ending time</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                            </select>
                        </td>
                    </tr>
                    <tr></tr>

                    <tr>
                        <td style="color: white; font-size:24px; font-weight:900;">Teaching information</td>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>
                            <label>Teaching Subject <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <textarea name="teching_sub" id="" cols="30" rows="5" placeholder="Interested subject" style="padding:5px;" value="<?php $teching_sub; ?>" required></textarea>
                        </td>
                        <td>
                            <label>Teaching Class <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="t_c" id="From8" placeholder="play to honrs" value="<?php $t_c; ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Maximum Subject <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <select name="m_s" id="time" required>
                                <option value="" disabled selected>Chose subject</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="all">ALL</option>
                            </select>
                        </td>
                        <td>
                            <label>Maximum hours <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <select name="m_h" id="time" required>
                                <option value="" disabled selected>Chose hours</option>
                                <option value="1">1</option>
                                <option value="1.5">1.5</option>
                                <option value="2">2</option>
                                <option value="2.5">2.5</option>
                                <option value="3">3</option>
                                <option value="3.5">3.5</option>
                            </select>
                        </td>
                    </tr>

                    
                    
                    <tr>
                        <td>
                            <label>Day per week<sup>*</sup> </label>
                        </td>
                        <td style="padding:0;">
                            <select name="d_p_w" id="time" required>
                                <option value="" disabled selected>Day per week</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </td>
                        <td>
                            <label>Salary <sup>*</sup></label>
                        </td>
                        <td style="padding:0;">
                            <input type="text" name="salary" id="From8" placeholder="5000 ৳" value="<?php $salary; ?>" required>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td colspan="3" style="color:white;"><input type="checkbox" name="tnc" value="accept" required> i agree to pay one time 50% media fee each tution</td>
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
                        <a class="teacherbtn" href="registration%20from%20student.php" style="color:yellow; border-radius:5px; text-decoration:none; padding:8px 15px; border:2px solid blue;">Student registration</a>
                    </td>
                    <td class="signin" colspan="2" style="color:white; text-align:right">Already an account <a href="login.php" style="color:yellow">sign in</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footerdown">
        <h6>&copy copyright <?php echo date("Y"); ?>, <a href="index.php">Tution Media Source</a></h6>
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
