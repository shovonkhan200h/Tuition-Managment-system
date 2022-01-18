    <div id="section42" class="container-fluid">
        <div class="footerup">
            <div class="fitem">
                <h2>Rules</h2>
                <p style="font-size: 12px";>

1. Those who r asking for tutors but after finding, do not respond OR, Those who r tutors and the tuition is confirmed but not going there and didn't do any contact with the students or with us , We will wait for the next 2days .. if still anyone do not response We will cancel the offer and we will cancel the tutor ***

2. Pranking, and fraud things are strictly prohibited!

3.We cant guarantee anyone? 

4. The tutor has to send his 50%of his first month (ONLY THE FIRST MONTH) salary within the 10 days of the confirmation through our Bkash no. NOT AFTER THE SALARY! THERE WILL BE NO COMPROMISE !!

5. WE DONT TAKE ANY EXTRA FEES, DONT TAKE ANY MEMBERSHIP FEES OR REGISTER FEES.

6. TO ALL THE TEACHERS AND STUDENTS PLEASE ENSURE YOUR SAFETY FIRST. IF YOU ARE FEELING ANY NEGATIVITY ABOUT THE FAMILY OF THE STUDENT OR ABOUT THE TEACHER PLEASE DON'T GO TO THE HOME OR DONT HIRE THE TUTOR.ALSO, INFORM US. AS YOU KNOW SAFETY COMES FIRST!

Thank You.</p>
            </div>
            <div class="fitem">
                <h2>Explore us</h2>
                <div class="social-container">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://mail.google.com/"><i class="fa fa-google"></i></a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="fitem" style="padding-left:80px;">
                <h2 style="text-align:left">Service</h2>
                <ul>
                    <li><a href="teacher.php">Teacher</a></li>
                    <li><a href="student-l.php">Student</a></li>
                    <li><a href="contactus.php">Contact us</a></li>
                </ul>
            </div>
        </div>
        <div class="footerdown">
            <h6>&copy copyright <?php echo date("Y"); ?>, <a href="index.php">Tution Media Source</a></h6>
        </div>
    </div>
    
    <script type="text/javascript">
        var tea = '<?php echo $_SESSION["user"]; ?>';
        if(tea=="teacher"){
            document.getElementById("section2").style.display="none";            
        }
        var stu = '<?php echo $_SESSION["user"]; ?>';
        if(stu=="student"){
            document.getElementById("section3").style.display="none";            
        }
        
    </script>
</body>

</html>
