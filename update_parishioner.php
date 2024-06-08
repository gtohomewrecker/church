<?php
include 'functions/functions_product.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $Pname = $_POST['Pname'];
    $descript = $_POST['descript'];
    $quantity = $_POST['quantity'];
    $suppID = $_POST['suppID'];
    $category = $_POST['category'];
    $weight = $_POST['weight'];
    $cost = $_POST['cost'];
    $sell_price = $_POST['sell_price'];
    $date = $_POST['date'];

  // Call the updateRecord function to update the user
  $result = updateRecord($id, $Pname, $descript, $quantity, $suppID, $category, $weight, $cost, $sell_price, $date);

  // Display success message or error
  if ($result === true) {
    echo "<script>window.location.href='view_product.php?showAlertAndRedirect=true';</script>";
  } else {
    echo "<script>alert('Error: " . $result . "');</script>";
  }
}

// Check if redirect parameter is set (optional for cleaner separation)
if (isset($_GET['showAlertAndRedirect'])) {
  echo "<script>showAlertAndRedirect();</script>";
}
?>
