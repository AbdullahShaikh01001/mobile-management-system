<?php

if(isset($_SESSION['message'])){
  $message = $_SESSION['message'];
  $type = $_SESSION['type'];
  echo "
  <script>
      Swal.fire({
          title: '". ($type == 'success' ? "Success!" : "Error!") ."',
          text: '$message',
          icon: '$type',
          confirmButtonText: 'Ok'
      });
  </script>
  ";
  // Clear the message after showing it
  unset($_SESSION['message']);
  unset($_SESSION['type']);
}

?>