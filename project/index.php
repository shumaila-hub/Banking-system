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
<main style="margin-top: 58px" class="mb-4">
  <div class="container pt-4">
<!-- Home page -->
<div class="bg-image">
  <img
    src="imgs/bank.jpg"
    class="img-fluid w-100"
id="timg"
    alt="Sample"
  />
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <h1 class="text-white mb-0">Welcome To Our Bank</h1>
    </div>
  </div>
</div>

  </div>
</main>
<!--Main layout-->

<!-- FOOTER -->

<?php
include "partials/footer.php";
?>

