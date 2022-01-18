<?php
session_start();
include 'config.php';
if(isset($_SESSION["user"])){
    if($_SESSION["user"]=="none"){
    $user="none";
    }else{
    $id = $_SESSION["id"];
    $user=$_SESSION["user"];
    
$sql = "select * from $user where id=$id";
$result = $con->query($sql);
if($result->num_rows>0){
        $row = $result->fetch_assoc();
	}
}
$_SESSION["start"] ="user";
}else{
    
$_SESSION["start"]="start";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tuition Media Source </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/jqurey%203.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            position: relative;
        }

        #slider {
            padding-top: 50px;
            height: 80vh;
        }

        #section2 {
            padding-top: 0px;
            height: auto;
            color: #fff;
        }

        #section3 {
            background-color: darkslategrey;
            height: auto;
            color: #fff;
            background-color: #372f4ff2;
        }

        #services {
            padding: 50px 0px;
            height: auto;
            color: #fff;
            background-color: #fff;
            color: #000;
            text-align: center;
        }

        #services p {
            color: gray;
            margin-bottom: 40px;
        }

        #section42 {
            min-height: 350px;
            color: #fff;
            background-color: #0e1127;
            overflow: hidden;
            padding: 0;
        }

        .footerup {
            min-height: 300px;
            display: grid;
            grid-template-columns: 1fr 1.5fr 1fr;
            grid-column-gap: 1fr;
        }

        .fitem {
            padding: 10px 30px 10px 20px;
            position: relative;
        }

        .fitem:after {
            position: absolute;
            content: "";
            height: 70%;
            width: 2px;
            background: white;
            right: 0;
            top: 20%;
            opacity: 0.2;
        }

        .fitem h2 {
            margin: 50px auto;
            color: darkcyan;
            text-align: center;
        }

        .footerdown {
            min-height: 50px;
            background: #4E4663;
            text-align: center;
            padding-top: 10px;
        }

        .footerdown h6 {
            font-size: 16px;
        }

        .footerdown a,
        .footerup a {
            color: darkorange;
        }

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: auto;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        li a {
            width: 70px;
            float: left;
        }

        .small-img {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            float: left;
            margin-top: 15px;
        }

        .down-icon {
            margin-top: 15px;
            margin-left: 5px;
            color: azure;
            float: left;
        }

        .down-icon:hover {
            cursor: pointer;
        }

        .btn-success {
            width: 250px;
        }

        .padding {
            padding: 10px 0px;
        }

        .row {
            background: #00bcd4;
        }

        .row div:nth-child(odd) {
            background: #44125dbd;
        }

        .row div:nth-child(even) {
            background: #3c763df2;
        }

        .item {
            height: 100%;
        }

        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 100%;
            margin: auto;
        }

        .carousel-inner>.item>img {
            height: 70vh;
        }

        .carousel-inner {
            position: relative;
        }

        .fa-chevron-right {
            position: absolute;
            top: 50%;
        }

        .fa-chevron-left {
            position: absolute;
            top: 50%;
        }

        .col-md-4 img {
            height: 200px;
            width: 200px;
        }

        .disablelink {
            color: white;
            pointer-events: none;
            cursor: no-drop;
        }

        /*  Social media icon */


        $timing : 265ms;
        $iconColor : #00B5F5;
        $accent : #002A8F;
        $bluefade : #0043E0;
        $gradient : #00B5F5;

        @mixin transformScale($size: 1) {
            transform: scale($size);
            -ms-transform: scale($size);
            -webkit-transform: scale($size);
        }

        body {
            background-color: rgba($iconColor, 0.05);
        }

        .social-container {
            width: 400px;
            margin: 10vh auto;
            padding-left: 50px;
            font-size: 18px;
            text-align: center;
        }

        .social-icons {
            padding: 0;
            list-style: none;
            margin: 1em;

            li {
                display: inline-block;
                margin: 0.15em;
                position: relative;
                font-size: 1.2em;

            }

            i {
                color: #fff;
                position: absolute;
                top: 21px;
                left: 21px;
                transition: all $timing ease-out;
            }

            a {
                display: inline-block;

                &:before {
                    @include transformScale();
                    content: " ";
                    width: 60px;
                    height: 60px;
                    border-radius: 100%;
                    display: block;
                    background: linear-gradient(45deg, $iconColor, $accent);
                    transition: all $timing ease-out;
                }

                &:hover:before {
                    transform: scale(0);
                    transition: all $timing ease-in;
                }

                &:hover i {
                    @include transformScale(2.2);
                    color: $iconColor;
                    background: -webkit-linear-gradient(45deg, $iconColor, $accent);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    transition: all $timing ease-in;
                }
            }

        }


        /*   background blur ****/

        .blurbackground {
            position: absolute;
            height: 100%;
            width: 100%;
            filter: blur(8px);
        }

        .maincontent {
            height: auto;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-column-gap: 1fr;
        }

        .mainright {
            display: grid;
            grid-template-columns: 1fr;
            padding-left: 20px;
        }

        .conwrap {
            height: 100%;
            width: 100%;
            text-align: left;
            display: grid;
            grid-template-columns: 71px auto;
        }

        .iconm {
            font-size: 25px;
            border: 1px solid #ccc;
            height: 50px;
            margin-top: 22px;
            margin-right: 21px;
            transform: rotate(47deg);
        }

        .iconm i {
            transform: rotate(-47deg);
            padding-top: 15px;
            padding-left: 5px;
        }

        .iconm:hover {
            background: orange;
            border: 1px solid #000;
            cursor: progress;
        }

        .icon:hover i {
            transform: rotate(360deg);
            transition: 0.5s;
        }

        .detailsm {
            margin-left: 15px;
        }

        .contentsec {
            min-height: 80vh;
            background: #000;
        }

        .t-list {
            height: auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 60px;
            padding: 60px;
        }

        .t-list div:nth-child(odd) {
            background: #c90035;
            padding: 20px;
            border-radius: 20px;
            color: darksalmon;
        }

        .t-list div:nth-child(even) {
            background: #0093D1;
            padding: 20px;
            border-radius: 5px;
        }

        .t-list img {
            height: 200px;
            width: 200px;
            margin-left: 15%;
            border-radius: 50%;
            border: 5px solid #ffc400;
        }

        .contentsec .headline {
            height: 50px;
            width: 100%;
            background: #0A4958;
            font-size: 22px;
            font-weight: 900;
            padding: 80px;
            color: white;
            text-align: center;
        }

        #bell {
        }

        .bell span {
            position: absolute;
            top: 10px;
            left: 22px;
            bottom: 0;
            height: 20px;
            width: 10px;
            color: aliceblue;
            /* background: black; */
            font-size: 18px;
            font-weight: 900;
        }

        .payment {
            min-height: 70vh;
            background: #000;
            padding-top: 100px;
            display: grid;
            grid-template-columns: 1fr;
        }

        .payment .pleft {
            padding-left: 200px;
            padding-top: 10px;
            color: aliceblue;
            font-size: 20px;
            background: #E8430F;
        }

        .payment .pleft input {
            width: 350px;
            border-radius: 20px;
            outline: none;
            padding-left: 20px;
            color: black;
        }

        .teacher-login {
            min-height: 40vh;
            width: 100%;
            position: relative;
            background: rgba(144, 34, 73, 1);
            padding: 100px 0px;
            box-sizing: border-box;
        }

        .login {
            height: 70vh;
            width: 60vw;
            margin-left: 20%;
            background: #1d3649;
        }

        .login-left {
            width: 50%;
            height: 100%;
            float: left;
            background: url(image/loginbg.jpeg);
            background-position: center;
            background-size: cover;
        }

        .login-right {
            height: 100%;
            width: 50%;
            float: left;
            padding: 0;
            color: white;
        }

        .login-right a,
        .login-right span {
            padding-left: 20px;
        }

        .l-head {
            height: 12%;
            width: 100%;
            background: darkorange;
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
        }

        .l-head h3 {
            margin: 0;
            padding: 0;
            color: darkslategray;
            font-weight: 900;
            font-family: monospace;
        }

        .login-right img {
            padding-bottom: 5px;
        }

        .login-right form label {
            margin-bottom: 5px;
            font-weight: 700;
            padding-left: 35px;
            font-size: 20px;
            color: azure;
            padding-right: 10px;
            width: 150px;
        }

        .login-right form input {
            width: 200px;
            padding-left: 8px;
            color: black;
        }

        .login-right form input[type=submit] {
            width: 150px;
            height: 30px;
            border-radius: 20px;
            background-color: darkorange;
            font-size: 18px;
            color: azure;
        }

        .l_error {
                color: #caff00;
                margin-left: 30%;
                font-size: 18px;
            }

            .login h2 {
                padding: 10px 50px;
                background: darkorange;
                margin: 0px 0px 20px 0px;

            }

            #new1 {
                display: none;
            }

            .login input {
                color: black;
                padding-left: 15px;
                margin-left: 35px;
            }

            .login select {
                color: black;
                height: 25px;
            }

            .butn {
                width: 60px;
                background-color: darkorange;
            }

            .con_pass {
                margin: 10px;
            }

            .r_btn {
                margin-left: 100px;
                margin-top: 10px;
                width: 150px;
            }

            #r_btn,
            #n_pass,
            #n_c_pass {
                display: none;
            }
        .login_system{
            width: 100%;
            height: auto;
        }
        .login_system p{
            width: 50%;
            float: left;
            padding-left: 35px;
        }
       .login_system select{
           width: 40%;
           float: left;
            margin-left: 20px;
           border-radius: 4px;
           padding-left: 5px;
           outline: none;
        }
        .login_btn{
            float: right;
            margin-right: 30px;
            margin-top: 10px;
            outline: none;
        }

    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Tution Media Source</a>
            </div>
            <div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav" style="float:right;padding-right:50px;">

                        <?php if($_SESSION["start"]=="start" || $_SESSION["user"]=="none"){
                       echo '</li><li><a href="login.php">Login</a></li>
                        <li class="dropdown" style="margin:auto 40px auto 10px;"><a class=" disablelink" href=" style="width:auto;">Join</a>
                           <div class="down-icon dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-sort-desc"></i></div>
                            <ul class="dropdown-menu">
                                <li><a href="registration%20from%20student.php" style="width:100%; font-size:16px; font-weight:bold;">As a Student</a></li>
                                <li><a href="registration%20from%20teacher.php" style="width:100%; font-size:16px; font-weight:bold;">Apply as a Teacher</a></li>
                            </ul>

                        </li>';
                       }else{
                        $sql_tr= "select count(*) from tutor_request where teacher_id='$id' AND confirm ='0'";
                        $not_s = mysqli_query($con,$sql_tr);
                        $not_q = mysqli_fetch_row($not_s);
                        $r_count= $not_q[0];
                        $_SESSION["notification"]=$r_count;
                        if($_SESSION["user"]=="teacher"){echo '<li class="bell" id="bell"><a href="notification.php"><i class="fa fa-bell" aria-hidden="true"></i><span>'.$r_count.'</span></a></li>';} echo '<li class="dropdown"><a href="" style="max-width:15ch;
    width: 90px; text-align:right;white-space: nowrap; margin-right:15px;overflow:hidden;">'?><?php echo $row['name']. '</a>
                            <div class="small-img"><img src="data:'.$row['p_type'].';base64,'.base64_encode( $row['Picture'] ).'" height="100%" width="100%" alt=""></div>
                            <div class="down-icon dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-chevron-down"></i></div>
                            <ul class="dropdown-menu">
                                <li><a href="deshboard.php" style="width:100%; font-size:14px; font-weight:bold;">Deshboard</a></li>
                                <li><a href="logout.php" style="width:100%; font-size:14px; font-weight:bold;">Logout</a></li>
                            </ul>
                        </li>';
                       }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
