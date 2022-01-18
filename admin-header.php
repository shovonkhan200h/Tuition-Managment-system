<?php
include 'config.php';
       $id = $_SESSION["id"];
       $user=$_SESSION["user"];
       $sql = "select * from $user where id=$id";
       $result = $con->query($sql);
       if($result->num_rows>0){
       $row = $result->fetch_assoc();
	}   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title style="text-transform:capitalize;"><?php echo $user; ?> Panel</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jqurey%203.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="a-main">
        <div class="a-left">
            <div class="info">
                <div class="picture">
                    <?php echo '<img src="data:'.$row['p_type'].';base64,'.base64_encode( $row['Picture'] ).'">';?>
                </div>
                <div class="details">
                    <h3><?php echo $row['name']; ?> </h3>
                    <h5 style="text-transform: capitalize"><?php echo $user; ?></h5>
                </div>
            </div>
            <div class="list">
                <ul>
                    <li class="<?php if($page=='deshboard'){echo 'active';}?>"><a href="Deshboard.php">Deshboard</a></li>
                    <li id="apporoval" class="<?php if($page=='apporoval'){echo 'active';}?>" style="position: relative;"><a href="Approval.php">Approval</a>
                        <span class="badge">3</span> </li>
                    <li id="profile" class="<?php if($page=='profile'){echo 'active';}?>"><a href="Profile.php">Profile</a></li>
                    <li id="notification" class="<?php if($page=='notification'){echo 'active';}?>"><a href="notification.php">Notification </a><span class="n_num"><?php echo $_SESSION["notification"]; ?></span></li>
                    <li class=""><a href="index.php">Homepage</a></li>
                    <li class="<?php if($page=='logout'){echo 'active';}?>"><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="a-right">