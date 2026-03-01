<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Mobile Repository</title>
  <link rel="stylesheet" href="assets/style.css">
  <script src="./assets/sweetAlert.js"></script>
</head>
<body>

  <div id="login-page">
    <div class="first-box">
      <img src="./images/login_side.jpg" alt="" srcset="">
    </div>
    <div class="second-box">
      <div id="login-box">
        <h2>Login</h2>

        <?php
          // if (isset($_GET['error'])) {
          //   echo "<p style='color:red;'>Invalid username or password</p>";
          // }
        ?>

        <div>
          <form action="auth/login.php" method="post">
            <div>
              <label for="username">Username:</label>
              <input type="text" name="username" id="username" placeholder="admin, Abdullah" required autofocus>
            </div>
            
            <div>
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" placeholder="1234" required>
            </div>
            
            <button type="submit">Login</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  <?php
    include("./components/alert.php");
  ?>
</body>
</html>
