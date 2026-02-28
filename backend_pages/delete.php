<?php
include("../auth/auth_check.php");
include("../config/db.php");

if (isset($_GET['id'])) {
  $id = intval(trim($_GET['id'])); //for security

  $sql = "DELETE FROM mobile_phones WHERE id=$id";

  if($conn->query($sql) === TRUE){
    $allowed_pages = ['view_all.php', 'filter_10_20.php', 'filter_above_20.php'];

    $return = isset($_GET['return']) ? $_GET['return'] : 'view.php';

    if(!in_array($return, $allowed_pages)){ //if $return is not in allowed pages.
      $return = 'view_all.php';
    }

    $_SESSION['message'] = "Mobile data has been deleted successfully!";
    $_SESSION['type'] = "success";
    header("Location: ../mobiles/" . $return);
    exit();
  }else{
    $_SESSION['message'] = "Something went wrong!" . $conn->error;
    $_SESSION['type'] = "error";
    header("Location: ../mobiles/" . $return);
    exit();
  }
}

?>