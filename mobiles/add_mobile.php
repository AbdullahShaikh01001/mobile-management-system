<?php
  include("../auth/auth_check.php");

  // Doing update on add page, starts here.
  $isEdit = isset($_GET['id']);
  if($isEdit){
    include("../config/db.php");

    // checking if the return page is a valid page or not.
    $allowed_pages = ["view_all.php", "filter_10_20.php", "filter_above_20.php"];

    $return = isset($_GET['return']) ? $_GET['return'] : 'view_all.php';

    if (!in_array($return, $allowed_pages)) {
      $return = 'view_all.php';
    }

    $id = intval($_GET['id']);

    $sql = "SELECT * FROM mobile_phones WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); //single data to be updated;
  }
  // Doing update on add page, ends here.


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - <?php echo $isEdit ? "Update Mobile" : "Add Mobile";?></title>
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" href="../assets/dashboardLayout.css">
  <script src="../assets/sweetAlert.js"></script>
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


    <div id="addMobile-box">
      <h2><?php echo $isEdit ? "Update Mobile" : "Add Mobile";?></h3>

      <form action="../backend_pages/insert_and_update.php" method="POST">
        <?php echo $isEdit ?
        '<input type="hidden" name="return" value="' . $return . '">' .
        '<input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">'
        : ''?>
        <div>
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" value="<?php echo $isEdit ? $row['name'] : '';?>" required  autofocus>
        </div>

        <div>
          <label for="brand">Brand:</label>
          <input type="text" name="brand" id="brand" value="<?php echo $isEdit ? $row['brand'] : '';?>" required >
        </div>

        <div>
          <label for="price">Price:</label>
          <input type="number" name="price" id="price" value="<?php echo $isEdit ? $row['price'] : '';?>" required >
        </div>

        <div class="btnSection">
          <button class="confirm" type="submit"><?php echo $isEdit ? "Update" : "Add";?></button>
          <button class="cancel" id="cancel" type="button" <?php echo $isEdit ? "onclick=\"window.location.href='$return'\"" : "" ?>>Cancel</button>
        </div>
      </form>
    </div>    
    
  </div>



  <!-- Alerts on success or error of the form submittion-->
  <?php
    include("../components/alert.php");
  ?>

  <script>
    const form = document.querySelector('form');
    const cancelBtn = document.getElementById("cancel"); 
    const inputs = document.querySelectorAll("input");
    
    // click to reset and disable cancel button;
    cancelBtn.addEventListener("click", ()=>{
      form.reset();
      cancelBtn.disabled = true;
    });

    // check inputs if empty, disable cancel button;
    const checkInputs = ()=>{
      const hasValue = false;
      
      inputs.forEach((input)=>{
        if (input.value.trim() !== "") {
          hasValue = true;
        }
      });
      
      if (hasValue) {
        cancelBtn.disabled = false;
      }else{
        cancelBtn.disabled = true;
      }
    };

    checkInputs();

    // trigger checkInputs() whenever key is pressed;
    inputs.forEach((input)=>{
      input.addEventListener("input", ()=>{
        checkInputs();
      })
    })

    // remove disable attribute when key is pressed;
    inputs.forEach((input)=>{
      input.addEventListener("keydown", ()=>{
        if (input.value) {
          cancelBtn.disabled = false;
        }
      })
    })
  </script>

</body>
</html>