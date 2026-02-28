<?php
  include("auth/auth_check.php");
  include("config/db.php");

  $sql_all = "SELECT * FROM mobile_phones";
  $sql_filter_10_20 = "SELECT * FROM mobile_phones WHERE price >= 10000 AND price <= 20000";
  $sql_filter_above_20 = "SELECT * FROM mobile_phones WHERE price > 20000";

  $result_all = $conn->query($sql_all);
  $result_filter_10_20 = $conn->query($sql_filter_10_20);
  $result_filter_above_20 = $conn->query($sql_filter_above_20);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="assets/dashboardLayout.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <!-- sidebar start-->
  <?php
    include("./components/sidebar.html");
  ?>
  <!-- sidebar end -->

  <div class="main">
      <div class="navbar">
          Welcome Back <?php echo $_SESSION['user']; ?> 👋 
      </div>

      <div class="cards">
          <div class="card">
              <h3>Total Mobiles</h3>
              <p><?php echo $result_all->num_rows ?></p>
          </div>

          <div class="card">
              <h3>Mobiles 10k to 20k </h3>
              <p><?php echo $result_filter_10_20->num_rows ?></p>
          </div>

          <div class="card">
              <h3>Mobiles Above 20k</h3>
              <p><?php echo $result_filter_above_20->num_rows ?></p>
          </div>
      </div>
  </div>

  <!-- Alerts on success or error of the form submittion -->
  <?php
    include("./components/alert.php");
  ?>

</body>
</html>