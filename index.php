<?php include "header.php"; ?>
    <!-- Slider --->

    <div id="slider">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <img src="image/study2.jpg" alt="Chania" width="100%" height="60vh">
                </div>

                <div class="item">
                    <img src="image/tuition2.jpg" alt="Chania" width="100%" height="60vh">
                </div>

                <div class="item">
                    <img src="image/tuition3.jpg" alt="Flower" width="100%" height="60vh">
                </div>

                <div class="item">
                    <img src="image/study.jpg" alt="Flower" width="100%" height="60vh">
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="fa fa-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- end slider -->
    <div id="section2" class="container-fluid">
        <div class="row" style="background:url('image/study2.jpg');background-size: cover;background-position: bottom;background-attachment: fixed; position: relative;">
            <div class="blurbackground"></div>
            <div class="col-md-12" style="background:none; text-align:center;">
                <h1 style="text-transform: capitalize; margin:50px auto;">Our Teacher</h1>
            </div>
            <?php
            $sqls = "SELECT * from teacher where aproval=1 order by id desc LIMIT 6";
	       $results = $con->query($sqls);
	       if($results->num_rows>0){
		          while($rows = $results->fetch_assoc()){
                      echo '<div class="col-md-4" style="padding:20px;margin-bottom:15px;">
                <img src="data:'.$rows['p_type'].';base64,'.base64_encode( $rows['Picture'] ).'">
                <h2>'.$rows['name'].'</h2>
                <pre>'.$rows["University"].'</pre>
                <pre>'.$rows["Subject"].'</pre>
                <pre>Salary: '.$rows["Salary"].' ৳</pre>

                <br>
                <form action="" method="GET" >
                    <a style="color:white;" href="contactPage.php?id='.$rows["id"].'" type="submit" name="contact-btn" class="btn btn-success"> Contact</a>
                </form>
            </div>';
			}
		}else{
               echo '<div class="col-md-12" style="text-align:center; height:250px; width:100%; font-size:30px;line-height:250px;">No Data Found</div>
';
           }
            
            ?>
            <div class="col-md-12" style="background:none; padding:30px 0px; text-align:center;">
                <a class="btn btn-info" style="width:220px;height:40px;background:#ff6633;font-size:18px;" href="teacher.php">View more</a>
            </div>
        </div>
    </div>

    <div id="section3" class="container-fluid">
        <div class="row" style="background:none;">
            <div class="col-md-12" style="background:none; text-align:center;">
                <h1 style="text-transform: capitalize; margin:50px auto;">Our Student</h1>
            </div>
            <?php
            $sqlt = "SELECT * from student LIMIT 6";
	       $resultt = $con->query($sqlt);
	       if($resultt->num_rows>0){
		          while($rowt = $resultt->fetch_assoc()){
                      echo '<div class="col-md-4" style="padding:20px;">
                <img src="data:'.$rowt['p_type'].';base64,'.base64_encode( $rowt['Picture'] ).'">
                <h2>'.$rowt['name'].'</h2>
                <pre>'.$rowt["School"].'</pre>
                <pre>'.$rowt["Subject"].'</pre>
                <br>
            </div>';
			}
		}else{
               echo '<div class="col-md-12" style="text-align:center; height:250px; width:100%; font-size:30px;line-height:250px;">No Data Found</div>
';
           }
            
            ?>
            <div class="col-md-12" style="background:none; padding:30px 0px; text-align:center;">
                <a href="student-l.php" class="btn btn-info" style="width:220px;height:40px;background:#ff6633;font-size:18px;">View more</a>
            </div>
        </div>
    </div>
     <div id="services" class="container-fluid">
        <div class="s-content">
            <h2>Why The Tuition Media Source</h2>
            <p>Bangladesh No 1 Tuition Institute Education brand we have many branches across different cities of Bangladesh</p>

            <div class="maincontent">
                <div class="mainleft">
                    <img src="image/mainleft.jpg" alt="">
                </div>
                <div class="mainright">
                    <div class="conwrap">
                        <div class="iconm">
                            <i class="fa fa-reddit" aria-hidden="true"></i>
                        </div>
                        <div class="detailsm">
                            <h3>Request For Tutors or students</h3>
                            <p>Your Need a Expert Tutor for your child just fill in the Form</p>
                        </div>
                    </div>
                    <div class="conwrap">
                        <div class="iconm">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                        <div class="detailsm">
                            <h3>Quick Search For Tutors or students</h3>
                            <p>Tution media will help easily find your favorite Tutors</p>
                        </div>
                    </div>
                    <div class="conwrap">
                        <div class="iconm">
                            <i class="fa fa-ravelry" aria-hidden="true"></i>
                        </div>
                        <div class="detailsm">
                            <h3>Available Tuition Jobs</h3>
                            <p>See all tuition and apply for the particular circular that match your skill</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>