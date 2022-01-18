<?php 
    $idpay = $_GET['id'];
    $amount = $_GET['amount'];

if(!isset($_SESSION['user'])){
        if(!isset($idpay)){
            header('location:login.php');
        }
}
include 'header.php';
?>

<div class="payment">

    <div class="pleft">
        Payment Methord:<br> <br>

        01. Go to your bKash Mobile Menu by dialing *247#<br>
        02. Choose “Payment”<br>
        03. Enter the Merchant Number: '01681997570'<br>
        04. Enter the amount : 50% first month salary<br>
        05. Enter a reference: teacher id<br>
        06. Enter the Counter Number: 1<br>
        07. Now paste the transtion code:<br><br>
        <p>Enter transtion number:</p>
        <form action="approve.php?payment2=<?php echo $idpay; ?>&amount=<?php echo $amount; ?>" method="post">
            <input name="tran_id_2" type="text" required>
            <button style="color:white;" type="submit" name="pay2-btn" class="btn btn-success"> Submit</button>
        </form>
    </div>
</div>


<?php include "footer.php" ?>
