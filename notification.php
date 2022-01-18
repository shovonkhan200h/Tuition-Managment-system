<?php
session_start();
$page = "notification";
include('admin-header.php');
?>

<div class="container">
 <div class="content">
  <h2>Nitofication List</h2>
     <br><br>
     
     <div class="scroll">
  <table class="table table-striped">
    <thead class="thead">
      <tr>
        <th>No.</th>
        <th>Subject</th>
        <th>time</th>
        <th>Days</th>
        <th>Joining date</th>
        <th>Profile</th>
        <th>Approval</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
        include 'config.php';
        $i=1;
        $myid=$_SESSION["id"];
     $sqlt = "SELECT * from tutor_request where teacher_id = '$myid' AND confirm ='0'";
	       $resultt = $con->query($sqlt);
	       if($resultt->num_rows>0){
		          while($rowt = $resultt->fetch_assoc()){
                      echo '
      <tr>
        <td>'.$i.'</td>
        <td>'.$rowt['subject'].'</td>
        <td>'.$rowt['time'].'</td>
        <td>'.$rowt['days'].'</td>
        <td>'.$rowt['joining_date'].'</td>
        <td style="padding:1px 0px 0px 0px;">
        <form methord="get">
        <button class="btn btn-success">
    <a href="student.php?id='.$rowt['student_id'].'">View profile</a></button></td>
        <td style="padding:1px 0px 0px 0px;"><a href="remove.php?st_cncl_id='.$rowt['id'].'"><i class="glyphicon glyphicon-remove"></i></a><a href="payment.php?id='.$rowt['student_id'].'&t_id='.$myid.'"><i class="glyphicon glyphicon-ok" style="background:green"></i></a></form></td>
      </tr>';
                  $i++;}
           }
        else{
            echo '<tr>
                <td colspan="7"><h2> No Data found </h2></td>    
            </tr>';
        }
        ?>
    </tbody>
  </table>
      </div>
  </div>
</div>


<?php
include('admin-footer.html');
if(isset($_POST["approve"])){
    header('location:index.php');
}
?>
