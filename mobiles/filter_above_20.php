<?php
  include("../auth/auth_check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Price above 20K</title>
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" href="../assets/dashboardLayout.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <!-- sidebar start-->
  <?php
    include("../components/sidebar.html");
  ?>
  <!-- sidebar end -->

  <div class="main">
    <!-- navbar start-->
    <?php
      include("../components/navbar.php");
    ?>
    <!-- navbar end-->


    <div id="sub-main-area">
      <h2>Mobile Price Greater Than 20K</h3>

      <!-- Showing Table as a component -->
      <?php
        include("../config/db.php");

        $sql = "SELECT * FROM mobile_phones WHERE price > 20000";
        $result = $conn->query($sql);
        $currentPage = "filter_above_20.php";

        include("../components/table.php");
      ?>
    </div>

  </div>

  <?php
    include("../components/alert.php");
  ?>

</body>
</html>