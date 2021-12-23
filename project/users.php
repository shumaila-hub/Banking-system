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
      <div class="top">
       <h2 class="text-center">All Customers</h2>
      </div>
<!-- Users page -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $sql = "SELECT * FROM `pdata`";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
      while ($row=mysqli_fetch_assoc($result)) {
      ?>
           <tr>
          <th scope="row"><?php echo $row["id"]; ?></th>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td>Rs. <?php echo $row["amount"]; ?></td>
        </tr>
   
  <?php
 }}
 else{
    
     echo '     <tr>
    
     <td class="text-center" colspan="4"><h2>No Users<h2/></td>

   </tr>';
 }
  ?>
  </tbody>
</table>

  </div>
</main>
<!--Main layout-->



<!-- FOOTER -->

<?php
include "partials/footer.php";
?>

