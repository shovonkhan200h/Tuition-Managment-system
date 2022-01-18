<?php
session_start();
    $id = $_GET['id'];
    $t_id = $_GET['t_id'];
    $_SESSION["s_id_t"]= $id;
    $_SESSION["t_id_t"]= $t_id;
if(!isset($_SESSION['user'])){
if(!isset($id)){
    header('location:login.php');
    }
}
 include "header.php";
?>

<div class="payment">

    <div class="pleft">
        Payment Methord:<br> <br>

        01. Go to your bKash Mobile Menu by dialing *247#<br>
        02. Choose “Payment”<br>
        03. Enter the Merchant Number: '01681997570'<br>
        04. Enter the amount : pay amount 500 for booking tuition<br>
        05. Enter a reference: teacher id<br>
        06. Enter the Counter Number: 1<br>
        07. Now paste the transtion code:<br><br>
        08. If tuition cancel we will return your money within 7 days
        <p>Enter transtion number:</p>
        <form action="approve.php" method="post">
        <input name="tran_id" type="text" required>
         <button style="color:white;" type="submit" name="sub-btn" class="btn btn-success"> Submit</button>
         </form>
    </div>
</div>


<?php include "footer.php" ?>
