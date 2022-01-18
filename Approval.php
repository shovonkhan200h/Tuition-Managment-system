<?php
session_start();
$page = "apporoval";
include('admin-header.php');
?>

<div class="container">
 <div class="content">
  <h2>Applied Teacher List</h2>
     <br><br>
     
     <div class="scroll">
  <table class="table table-striped">
    <thead class="thead">
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Status</th>
        <th>Profile</th>
        <th>Approval</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
        include 'config.php';
     $sqlt = "SELECT * from teacher where aproval = 0";
	       $resultt = $con->query($sqlt);
	       if($resultt->num_rows>0){
		          while($rowt = $resultt->fetch_assoc()){
                      echo '
      <tr>
        <td>'.$rowt['name'].'</td>
        <td>'.$rowt['Subject'].'</td>
        <td>'.$rowt['School'].'</td>
        <td>'.$rowt['University'].'</td>
        <td style="padding:1px 0px 0px 0px;"><a href="contactPage.php?id='.$rowt["id"].'"><button class="btn btn-success">View profile</button></a></td>
        <from method="get">
        <td style="padding:1px 0px 0px 0px;"><a href="remove.php?aproval_cncl_id='.$rowt['id'].'"><i class="glyphicon glyphicon-remove"></i></a><a href="teacher_ap.php?id='.$rowt['id'].'"><i style="background:green;" class="glyphicon glyphicon-ok"></i></a></form></td>
      </tr>';}
           }
        ?>
    </tbody>
  </table>
      </div>
  </div>
</div>


<?php
include('admin-footer.html');
?>
