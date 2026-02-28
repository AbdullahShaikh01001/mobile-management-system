<?php
include("../auth/auth_check.php");
include("../config/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $return = $_POST['return'] ?? null; //return page.
  $id = $_POST['id'] ?? null;

  $name = trim($_POST['name']);
  $brand = trim($_POST['brand']);
  $price = trim($_POST['price']);
  

  // if fields are empty.
  if(empty($name) || empty($brand) || empty($price)){
    $_SESSION['message'] = "All fields are required!";
    $_SESSION['type'] = "error";
    header("Location: ../mobiles/add_mobile.php");
    exit();
  }

  // if price is in negative or zero;
  if ($price <= 0) {
    $_SESSION['message'] = "Please set a valid price!";
    $_SESSION['type'] = "error";
    header("Location: ../mobiles/add_mobile.php");
    exit();
  }
  


  
  if($id){
    $sql = "UPDATE mobile_phones SET name='$name', brand='$brand', price='$price' WHERE id='$id'";
  }else{
    $sql = "INSERT INTO mobile_phones (name, brand, price) VALUES ('$name', '$brand', '$price')";
  }

  if($conn->query($sql) === TRUE){
    $action = $id ? 'updated' : 'submitted';

    $_SESSION['message'] = "Mobile data has been $action successfully!";
    $_SESSION['type'] = "success";
    header($return ? "Location: ../mobiles/" . $return : "Location: ../mobiles/add_mobile.php");
    exit();
  }else{
    $_SESSION['message'] = "Error in submitting: " . $conn->error;
    $_SESSION['type'] = "error";
    header($return ? "Location: ../mobiles/" . $return : "Location: ../dashboard.php");
    exit();
  }
}


?>