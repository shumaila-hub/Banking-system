<?php
include "partials/connection.php";
?>

<?php
include "partials/links.php";
?>
</head>
<body>

<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <?php
include "partials/nav.php";
?>


<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">
<!-- Transfer page -->
<form action="transfer.php" method="post" style="max-width:50%; margin:auto;">
<h1 class="text-center">Enter Blow Data</h1>
<p class="text-center">To transfer amount to any customer</p>
  <!-- Name input -->
  <div  class="form-outline mb-4">
    <input type="number" name="yid" id="form5Example1" class="form-control" />
    <label class="form-label" for="form5Example1">Your ID</label>
  </div>
   <!-- Name input -->
   <div  class="form-outline mb-4">
    <input type="number" name="rid" id="form5Example1" class="form-control" />
    <label class="form-label" for="form5Example1">Recipient's ID</label>
  </div>
   <!-- Name input -->
   <div  class="form-outline mb-4">
    <input type="number" name="amount" id="form5Example1" class="form-control" />
    <label class="form-label" for="form5Example1">Amount</label>
  </div>
  <!-- Checkbox -->


  <!-- Submit button -->
  <input type="submit" value="Send" name="send" class="btn btn-primary btn-block mb-4">
</form>
<!-- Php to display data -->
<?php
    if (isset($_POST['send'])) {
     $yid = $_POST['yid'];
     $tid = $_POST['rid'];
     $amount = $_POST['amount'];

     if ($yid == $tid) {
      ?>
<div class="alert alert-danger text-center">
  Hey! ID should not be same. <br>
</div>

<?php
exit();
     }else{
    $sql = "SELECT * FROM `pdata` WHERE id=$yid";
    $result= mysqli_query($conn, $sql);

    $sqla = "SELECT * FROM `pdata` WHERE id=$tid";
    $resulta= mysqli_query($conn, $sqla);

    $send = mysqli_fetch_assoc($result);
    $senda = mysqli_fetch_assoc($resulta);
    if ((mysqli_num_rows($result) <= 0) && (mysqli_num_rows($resulta) <= 0)) {
      ?>
    <div class="alert alert-danger text-center">
      Sorry! Your both entered ids do not exists.
    </div>
    
    <?php
    exit();
    }
if (mysqli_num_rows($result) <= 0) {
  ?>
<div class="alert alert-danger text-center">
  Sorry! Your id does not exists.
</div>

<?php
exit();
}

if (mysqli_num_rows($resulta) <= 0) {
  ?>
<div class="alert alert-danger text-center">
  Sorry! Your recipient's id does not exists.
</div>

<?php
exit();
}


// Names of users involves in trasaction
$name = $send['name'];
$namea = $senda['name'];

    $samount = $send['amount'];
    $samounta = $senda['amount'];
//   For maximum amout transaction
if ($amount > $samount) {
  ?>
<div class="alert alert-danger text-center">
  Sorry! Your account balance is  <?=$samount;?>. <br>
  Please make transaction within this limit.
</div>

<?php
exit();
}



//   check amount must be greater then 0
if ($samount <= 0) {
  ?>

<div class="alert alert-danger text-center">
  Sorry! You can't make any transaction. <br>
</div>
<?php
exit();
}
    $total = $samount - $amount;
    $totala = $samounta + $amount;
    // if ($total && $totala) {
        // $mainsql = "INSERT INTO `pdata` (`id`,`amount`) VALUES ('$yid', '$total')";
        $mainsql = "UPDATE `pdata` SET `amount`=$total WHERE id=$yid";
        $resultab= mysqli_query($conn, $mainsql);
     
        $mainsqla = "UPDATE `pdata` SET `amount`=$totala WHERE id=$tid";  
    $resultac= mysqli_query($conn, $mainsqla);

if ($resultab && $resultac) {
  $trsql = "INSERT INTO `transfers`(`sendersname`, `sendersid`, `receivername`, `recevierid`, `amount`) VALUES ('$name', $yid, '$namea', $tid, $amount)";
  $trquery= mysqli_query($conn, $trsql);

?>
<div class="alert alert-success text-center">
  Hey! Your transaction is successfull. <br>
  <details>
    <summary>More info</summary>
    Hey! <?=$name;?>, You have transferred <?=$amount;?> to <?=$namea;?> <br>
    Your remaining amount is <?=$total;?> <br>
      <a href="thistory.php">Check transaction history</a>
  </details>
</div>
<?php
exit();
}else {
    echo'<script>alert("Amount has not been sended successfully!")</script>';
    exit();
}
// }
 }
            
    //  echo $total;
    //  echo '<br>';
    //  echo $totala;   
     }

    //  }
    // }
         

     
       ?>






  </div>
</main>
<!--Main layout-->



<!-- FOOTER -->

<?php
include "partials/footer.php";
?>

