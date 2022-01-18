<?php
session_start();
        include('admin-header.php');
        include 'config.php';
        $_SESSION["req_id"] = $_GET['id'];
        $id = $_GET['id'];
        $s_id = $_SESSION["id"];
        if(isset($_SESSION["user"])){ 
        $sql="select * from teacher where id = '$id'";
        $result = $con->query($sql);
        if($result->num_rows==1){
        $row = $result->fetch_assoc();
        }           
            
            $sql_rep= "select count(*) from tutor_request where teacher_id=$id AND student_id =$s_id";
                $not_rep = mysqli_query($con,$sql_rep);
                $not_qrep = mysqli_fetch_row($not_rep);
                $rep_count= $not_qrep[0];
?>
<div class="procontent">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card hovercard" id="card">
                    <div class="cardheader">
                    </div>
                    <div class="avatar">
                        <?php echo '<img src="data:'.$row['p_type'].';base64,'.base64_encode( $row['Picture'] ).'">';?>
                    </div>
                    
                        <form action="request.php" method="post">
                        <div class="info">
                        <div class="title">
                            <a target="_blank" href=""><?php echo $row['name']; ?></a>
                        </div>
                        <div class="desc"><?php echo $row['Subject']; ?></div>
                        <div class="desc"><?php echo $row['University']; ?></div>
                        <div class="desc"><?php echo $row['Background']; ?></div>
                        <div class="desc">
                        <?php if($rep_count==0){
                    echo '<br><div id="hire_details" style="color:white"> Subject: <input type="text" style="margin:5px 0px;margin-left:27px;color:black" name="subject_r" placeholder="Bangla, english,math" required><br>
                    Time: <input type="text" style="margin:5px 0px;margin-left:40px;color:black" placeholder="7am - 9am" name="time_r" required><br>
                    
                    Days: 
                    <input style="margin-left:30px;" type="checkbox" value="sat" name="days[]"> Sat
                    <input style="margin-left:10px;" type="checkbox" value="sun" name="days[]"> Sun
                    <input style="margin-left:10px;" type="checkbox" value="mon" name="days[]"> Mon
                    <input style="margin-left:25px;" type="checkbox" value="tue" name="days[]"> Tue
                    <input style="margin-left:10px;" type="checkbox" value="wed" name="days[]"> Wed
                    <input style="margin-left:10px;" type="checkbox" value="thus" name="days[]"> Thus
                    <input style="margin-left:10px;" type="checkbox" value="fri" name="days[]"> Fri<br>
                        
                        Joining date : <input type="date" required min="'.date("Y-m-d").'" max="2020-01-01" id="joining_date" style="color:black;"  name="joining_date"> </div>';}?>
                        </div>
                        
                    </div>

                           <?php
                                if($rep_count==0){
                                    echo '<button style="width:200px; margin-bottom:10px;" name="req" type="submit" id="confirm" class="btn btn-primary btn-twitter btn-sm" )>Request for tution</button>';
                                }else{
                                   echo '<button style="width:200px;margin-bottom:10px;" id="confirm" class="btn btn-primary btn-twitter btn-sm" disabled )>Request send</button>';
                                }
                            ?>
                        </form>
                        <button id="hire" class="btn btn-success" onclick="contshow()" style="display:block;width:100%">Hire me </button>
                </div>
            </div>
            <div class="col-lg-8 col-sm-6">
                <div class="prodetails">
                    <div class="opacitydim">
                        <div class="headline">
                           <div class="leftdet">
                            <h4>Information Details</h4>
                            </div>
                           <div class="rightdet">
                            Contact:  01785667343
                            </div>
                        </div>
                        <div class="info-wrap">
                            
                            <div class="infodata">
                                <span class="ileft">NID:</span><span class="iright"><?php echo $row['nid']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">School:</span><span class="iright"><?php echo $row['School']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Collage:</span><span class="iright"><?php echo $row['Collage']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">University:</span><span class="iright"><?php echo $row['University']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Gender:</span><span class="iright"><?php echo $row['Gender']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Blood Group:</span><span class="iright"><?php echo $row['Blood_group']; ?></span>
                            </div>
                            
                            <div class="infodata">
                                <span class="ileft">Version:</span><span class="iright"><?php echo $row['Version']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Date of Birth:</span><span class="iright"><?php echo $row['Birthday']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Teaching Experience:</span><span class="iright"><?php echo $row['t_e']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Teaching time:</span><span class="iright"><?php echo $row['t_t_s'].' To '.$row['t_t_e']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Teaching Subject:</span><span class="iright"><?php echo $row['t_s']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Teaching Class:</span><span class="iright"><?php echo $row['t_c']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Maximum Subject:</span><span class="iright"><?php echo $row['m_s']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Maximum hours:</span><span class="iright"><?php echo $row['m_h']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Day per week:</span><span class="iright"><?php echo $row['d_p_w']; ?></span>
                            </div>
                            <div class="infodata">
                                <span class="ileft">Salary:</span><span class="iright"><?php echo $row['Salary']; ?></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('admin-footer.html');   
        }else{
            header('location:login.php');
        }

?>
