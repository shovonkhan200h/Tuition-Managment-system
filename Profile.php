<!-- coments -->

<?php 
/******************  coments  ***************************/

session_start();
$page="profile";
include('admin-header.php');
?>
<div class="procontent">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">

                <div class="card hovercard">
                    <div class="cardheader">

                    </div>
                    <div class="avatar">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Picture'] ).'">';?>
                    </div>
                    <div class="info">
                        <div class="title">
                            <a target="_blank" href=""><?php echo $row['name']; ?></a>
                        </div>
                        <div class="desc"><?php echo $row['Subject']; ?></div>
                        <div class="desc"><?php echo $row['University']; ?></div>
                        <div class="desc"><?php echo $row['Background']; ?></div>
                    </div>
                    <div class="bottom">
                        <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-6">
                <div class="prodetails">
                    <div class="opacitydim">
                       <div class="headline"><h4>Information Details</h4></div>
                        <div class="info-wrap">
                            <div class="infodata">
                                <span class="ileft">Email:</span><span class="iright"><?php echo $row['email']; ?></span>
                            </div> 
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
                                <span class="ileft">Contact:</span><span class="iright"><?php echo $row['Contact']; ?></span>
                            </div>  
                            <div class="infodata">
                                <span class="ileft">Version:</span><span class="iright"><?php echo $row['Version']; ?></span>
                            </div>  
                            
                            <div class="infodata">
                                <span class="ileft">Date of Birth:</span><span class="iright"><?php echo $row['Birthday']; ?></span>
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
?>
