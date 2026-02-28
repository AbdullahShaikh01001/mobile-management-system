<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /mobile_repository/index.php");
  exit();
}
?>