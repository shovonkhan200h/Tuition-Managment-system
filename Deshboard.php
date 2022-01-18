<?php
include 'config.php';
session_start();
$id= $_SESSION["id"];
$page="deshboard";

        $sql_db = "SELECT tutor_request.joining_date,tutor_request.days,tutor_request.time,student.name FROM tutor_request INNER JOIN student ON tutor_request.student_id = student.id and tutor_request.confirm=2 and tutor_request.teacher_id=$id;";
	    $result_db = $con->query($sql_db);

        $sql_sdb = "SELECT tutor_request.joining_date,tutor_request.joining_date,tutor_request.confirm, teacher.name FROM tutor_request INNER JOIN teacher ON tutor_request.teacher_id = teacher.id and tutor_request.confirm between 0 AND 1 and tutor_request.student_id=$id;";
	    $result_sdb = $con->query($sql_sdb);

//// Alert notice design
$msg="";
$notice_de='<div id="notice" class="alert alert-success">
    <marquee direction="scroll">';
$notice_de2='</marquee>
</div>';
if($_SESSION["user"]=="teacher"){
$sql= "select * from tutor_request where confirm =2 AND teacher_id = $id AND status=0";}
else{
    $sql= "select * from tutor_request where confirm =2 AND status=0";
}
        $result=$con->query($sql);
        if($result->num_rows>0){
            $i=0;
            while($row=$result->fetch_assoc()){                    
                $date = new DateTime($row['joining_date']);
                $date->modify('1 month');
                $c=$date->format('Y-m-d');
                $now=date('Y-m-d');
                $amount= $row['paid_amount'];
                if($now>=$c && $amount <= 500){
                    $i++;
                }
            }
            if($i>0){
                        if($_SESSION["user"]=="teacher"){
                            $msg="Warning!!! You have due amount.Paid your amount withing 10 days. otherwise your account will banned. ";
                        }else{
                            $msg="Good news (^_^). Due amount are available. Contact with them & collect money ";
                        }
                            echo $notice_de.$msg.$notice_de2;
                    }
        }
	       
include('admin-header.php');
if(isset($_SESSION["user"])){
    if($_SESSION["user"]=="teacher" || $_SESSION["user"]=="student"){
    echo '<div class="deshboard">
            <div class="welcome">
                <h3>Welcome to Our Tution Media</h3>
            </div>
            <div class="helpline">
                <h4>Hotline : +01681997570</h4>
            </div>
         </div>';
        if($_SESSION["user"]=="teacher"){
            echo '<div class="r_tution">
                    <h3>Running Student</h3>
                    <div class="r_details"> 
                        <table>
                            <thead>
                        <tr style="border-bottom:1px solid #000">
                            <th style="padding-left:15px;">No </th>
                            <th style="padding-left:15px;">Name </th>
                            <th style="padding-left:15px;">Days </th>
                            <th style="padding-left:15px;">Time </th>
                        </tr>
                    </thead>
                    <tbody>';
        $sql_td= "select * from tutor_request where teacher_id=$id and confirm ='2'";
            $x=1;
        $result=$con->query($sql_td);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){ 
                    $stdntid=$row['student_id'];
                    $s_detls="select * from student where id='$stdntid'";
                    $resultstdnt=$con->query($s_detls);
                    $rowstdnt=$resultstdnt->fetch_assoc();
                    echo'<tr style="border-bottom:1px solid #000">
                            <th style="padding-left:15px;">'.$x.' </th>
                            <th style="padding-left:15px;">'.$rowstdnt['name'].'</th>
                            <th style="padding-left:15px;">'.$row['days'].'</th>
                            <th style="padding-left:15px;">'.$row['time'].'</th>
                        </tr>';
                    $x++;
                }
            }
                    echo '</tbody>
                    </table>
                    </div>
                </div>        
                <div class="p_tution">
                <h3>Pending tution</h3>
                <div class="p_list">';
               echo  '<table>
                    <thead>
                        <tr>
                            <th>No </th>
                            <th style="width:85px;">Name </th>
                            <th>Joining date </th>
                            <th>Status </th>
                        </tr>
                    </thead>
                    <tbody>';
            $i=1;
            $psql_q="SELECT tutor_request.joining_date,tutor_request.confirm, student.name FROM tutor_request INNER JOIN student ON tutor_request.student_id = student.id and tutor_request.confirm between 0 AND 1 and tutor_request.teacher_id=$id";
            $result_pqu=$con->query($psql_q);
             if($result_pqu->num_rows>0){
		          while($rows = $result_pqu->fetch_assoc()){
                    echo '<tr>
                            <td>'.$i.' </td>
                            <td>'.$rows['name'].' </td>
                            <td>'.$rows['joining_date'].'</td>
                            <td>';
                            if($rows['confirm']==1){echo "Request send to admin";}
                            if($rows['confirm']==0){echo "Check notification";}
                        echo '</td>
                        </tr>';
                  }
                 $i++;
             };
            echo '</tbody>
                </table>';
                    
                echo '</div>
                </div>                     
                    <div class="de_content d_tution">
                        <h3>Dues amount </h3>
                                <table>
                        <thead>
                            <tr> 
                                <th>No.</th>
                                <th>Student Profile</th>
                                <th>Joining date</th>
                                <th>Amount </th>
                                <th>Paymet </th>
                            </tr> 
        </thead>';
        $i=0;
        $sql= "select * from tutor_request where confirm =2 AND teacher_id = $id AND status BETWEEN 0 AND 1";
        $result=$con->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                
                    
                $date = new DateTime($row['joining_date']);
                $date->modify('1 month');
                $c=$date->format('Y-m-d');
                $now=date('Y-m-d');
                $amount= $row['paid_amount'];
                
                if($now>=$c){
                    $id_pid= $row['id'];
                    $_SESSION['status']=$row['status'];
                    $sql_pd = "SELECT * from tutor_request where id='$id_pid'";
	                 $res_pd = $con->query($sql_pd);
                     $row_pd = $res_pd->fetch_assoc();
                    
                    // paid amount calculation
                    $teacher_is_no=$row_pd['teacher_id'];
                    $sql_a="SELECT * from teacher where id='$teacher_is_no'";
                    $res_a = $con->query($sql_a);
                    $row_a = $res_a->fetch_assoc();
                    
                    $paid_am= ($row_a['Salary']/2)-500;
                    
                    $i++;
                    echo '<tr> 
                        <td>'.$i.'</td>                
                        <td><a href="student.php?id='.$row_pd['student_id'].'">View profile</a></td>
                        <td>'.$row_pd['joining_date'].' </td>
                        <td>'.$paid_am.' </td>';
                        if($row_pd['status']==0){
                        echo '<td><button class="btn btn-success okbtn"><a href="payment2.php?id='.$row['id'].'&amount='.$paid_am.'" style="color:white;width:250px;">Pay</a></button></td>';}
                        if($row_pd['status']==1){
                        echo '<td> Waiting for confirmation</td>';}
                    echo '</tr>';
                }
            
            }
            echo '</table>';
        }
        if($i==0){
            echo '
                    <tr>
                        <td colspan="5"> <h2> No data found </h2> </td>
                    </tr>';
        }
                   echo '</div>';
        } //// teacher end
        
        
        
        if($_SESSION["user"]=="student"){
            echo '<div class="p_tutions">
                <h3>Pending tution</h3>
                <div class="p_list">';
               echo  '<table>
                    <thead>
                        <tr>
                            <th style="padding:5px;">No </th>
                            <th style="padding:5px;">Name </th>
                            <th style="padding:5px;">Joining date </th>
                            <th style="padding:5px;">Status </th>
                        </tr>
                    </thead>
                    <tbody>';
            $i=1;
             if($result_sdb->num_rows>0){
		          while($rows = $result_sdb->fetch_assoc()){
                    echo '<tr>
                            <td>'.$i.' </td>
                            <td>'.$rows['name'].' </td>
                            <td>'.$rows['joining_date'].'</td>
                            <td>';
                      if($rows['confirm']==0){echo "Pending";}
                      if($rows['confirm']==1){echo "Waiting for admin aprove";}
                      echo '</td>
                        </tr>';
                  }
                 $i++;
             };
            echo '</tbody>
                </table>';
                    
                echo '</div>
                </div>';
            
            // running tution
            
            
            echo '<div class="r_tutions">
                <h3>Running tution</h3>
                <div class="r_list">';
               echo  '<table>
                    <thead>
                        <tr>
                            <th style="padding:5px;width:40px;">No </th>
                            <th style="padding-left:25px;width:100px;">Name </th>
                            <th style="padding-left:25px;width:120px;">Sub </th>
                            <th style="padding-left:25px;width:auto;">Time </th>
                        </tr>
                    </thead>
                    <tbody>';
            $i=1;
            $sqlrunni= "SELECT teacher.name,tutor_request.subject,tutor_request.time FROM tutor_request INNER JOIN teacher ON tutor_request.student_id ='$id' AND teacher.id=tutor_request.teacher_id AND confirm=2";
            $result_r_q=$con->query($sqlrunni);
             if($result_r_q->num_rows>0){
		          while($rows = $result_r_q->fetch_assoc()){
                    echo '<tr>
                            <td style="padding-left:5px;">'.$i.' </td>
                            <td style="padding-left:25px;">'.$rows['name'].' </td>
                            <td style="padding-left:25px;">'.$rows['subject'].'</td>
                            <td style="padding-left:25px;">'.$rows['time'].'</td>
                        </tr>';
                      $i++;
                  }
             }else{
                 echo '<tr style="width:100%;height:120px; font-size:28px;text-align:center;">
                            <td colspan="4"> No Running tution </td>
                        </tr>';
             };
            echo '</tbody>
                </table>';
                    
                echo '</div>
                </div>';
        
        }
    }
    else{
        // student count
        $sql_d_s = "select count(*) from student";
        $result_d_s = mysqli_query($con,$sql_d_s);
        $c_d_a = mysqli_fetch_row($result_d_s);
        $c_d_a_r= $c_d_a[0];
        
        //teacher count
        $sql_d_t = "select count(*) from teacher where aproval=1";
        $result_d_t = mysqli_query($con,$sql_d_t);
        $c_d_a_t = mysqli_fetch_row($result_d_t);
        $c_d_a_t= $c_d_a_t[0]; 
        
        //connected count
        $sql_r_c = "select count(*) from tutor_request where confirm='2'";
        $result_r_c = mysqli_query($con,$sql_r_c);
        $c_d_a_r_c = mysqli_fetch_row($result_r_c);
        $c_d_a_r_c= $c_d_a_r_c[0];
        
        
        echo'<div class="deshboard admin_d">        
    <div class="de_content">
        <h3>Total Teacher</h3>
        <h5>'.$c_d_a_t.'</h5>
    </div>
    
    <div class="de_content">
        <h3>Total Student</h3>
        <h5>'.$c_d_a_r.'</h5>
    </div>
    <div class="de_content">
        <h3>Total connected </h3>
        <h5>'.$c_d_a_r_c.'</h5>
    </div>';

/////////////////////////  Pending tuition block///////////////////////////////////////////


   echo  '<div class="de_content pen_t">
        <h3>Pending tutions </h3><table>
        <thead>
            <tr> 
                <th>No.</th>
                <th>Student Profile</th>
                <th>Teacher Profile</th>
                <th>Transition </th>
                <th>Approve </th>
            </tr> 
        </thead>';
        $i=1;
        $sql_li = "SELECT * from tutor_request where confirm = 1";
	   $result_li = $con->query($sql_li);
	       if($result_li->num_rows>0){
		          while($row_li = $result_li->fetch_assoc()){
        echo '
            <tr> 
                <td>'.$i.'</td>
                <td><a href="student.php?id='.$row_li['student_id'].'">View profile</a></td>
                <td><a href="contactPage.php?id='.$row_li['teacher_id'].'">View profile</a></td>
                <td>'.$row_li['tran_id'].' </td>
                <td><button class="btn btn-danger ignorebtn"><a href="remove.php?ad_cncl_id='.$row_li['id'].'" style="color:white;">ignore</a></button>
                <button class="btn btn-success okbtn"><a href="confirm.php?s_id='.$row_li['student_id'].'&t_id='.$row_li['teacher_id'].'" style="color:white;">ok</a></button></td>
            </tr>';
            $i++;
        }
           }
       echo '    
        </table>
    </div>
    <div class="de_content pen_ts">
        <h3>Dues amount </h3>
        <table>
        <thead>
            <tr> 
                <th>No.</th>
                <th>Teacher Profile</th>
                <th>Student Profile</th>
                <th>Joining date</th>
                <th>Transaction id </th>
                <th>Amount </th>
                <th>Approve </th>
            </tr> 
        </thead>';
        $i=0;
        $sql= "select * from tutor_request where confirm =2 AND status BETWEEN 0 AND 1";
        $result=$con->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    
                $date = new DateTime($row['joining_date']);
                $date->modify('1 month');
                $c=$date->format('Y-m-d');
                $now=date('Y-m-d');
                $amount= $row['paid_amount'];
                if($now>=$c){
                    $id_pid= $row['id'];
                    $sql_pd = "SELECT * from tutor_request where id='$id_pid'";
	                 $res_pd = $con->query($sql_pd);
                     $row_pd = $res_pd->fetch_assoc();
                    // paid amount calculation 2nd in admin
                    $teacher_is_no=$row_pd['teacher_id'];
                    $sql_a="SELECT * from teacher where id='$teacher_is_no'";
                    $res_a = $con->query($sql_a);
                    $row_a = $res_a->fetch_assoc();
                    
                    $paid_am= ($row_a['Salary']/2)-500;
                    
                    $i++;
                    echo '<tr> 
                        <td>'.$i.'</td>
                        <td><a href="contactPage.php?id='.$row_pd['teacher_id'].'">View profile</a></td>                
                        <td><a href="student.php?id='.$row_pd['student_id'].'">View profile</a></td>
                        <td>'.$row_pd['joining_date'].' </td>
                        <td>'.$row_pd['tran_id_2'].' </td>
                        <td>'.$paid_am.' </td>';
                    if($row_pd['status']==1){
                        echo '<td><button class="btn btn-success okbtn"><a href="approve.php?conid='.$id_pid.'" style="color:white;">Paid</a></button></td>';}
                    else{
                        echo '<td>Contact with teacher</td>';
                    }
                    echo '</tr>';
                    
                }else{
                }
            }
        }
        if($i==1){
            echo '
                    <tr>
                        <td colspan="5"> <h2> No data found </h2> </td>
                    </tr>';
        }
        echo '    
        </table>
    </div>  
    <div class="de_content listitem">
        <h3>Tution List </h3>
        <table>
        <thead>
            <tr style="background:none;"> 
                <th style="min-width:30px;padding-left:30px">No.</th>
                <th style="min-width:150px;padding-left:10px"">Teacher Profile</th>
                <th style="min-width:150px;">Student Profile</th>
                <th style="min-width:150px;">Joining date</th>
                <th style="min-width:150px;">Subject </th>
                <th style="min-width:150px;">Days </th>
                <th style="min-width:150px;">Time </th>
            </tr> 
        </thead>';
        $i=1;
        $sql= "select * from tutor_request where confirm =2";
        $result=$con->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    echo '<tr> 
                        <td>'.$i.'</td>
                        <td><a href="contactPage.php?id='.$row['teacher_id'].'">View profile</a></td>                
                        <td><a href="student.php?id='.$row['student_id'].'">View profile</a></td>
                        <td>'.$row['joining_date'].' </td>
                        <td>'.$row['subject'].' </td>
                        <td>'.$row['days'].' </td>
                        <td>'.$row['time'].' </td>
                        </tr>';
                $i++;
            }
        }
        if($i==0){
            echo '
                    <tr>
                        <td colspan="5"> <h2> No data found </h2> </td>
                    </tr>';
        }
        echo '    
        </table>
    </div>

    </div>';
    }
}else{
    header("Location:login.php");
}
include('admin-footer.html');
?>
