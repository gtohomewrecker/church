<?php
        include 'Functions/functions_product.php'; // Include the file where your database functions are defined

        // Check if ID is set in the URL
        if(isset($_GET['id'])) {
            // Fetch user details by ID
            $id = $_GET['id'];
            $user = getUserById($id); // Define this function in your functions.php to fetch user details by ID

            // Check if user exists
            if($user) {
                // Assign user details to variables for pre-filling the form fields
                $id = $user['id'];
                $Pname = $user['Pname'];
                $descript = $user['descript'];
                $quantity = $user['quantity'];
                $suppID = $user['suppID'];
                $category = $user['category'];
                $weight = $user['weight'];
                $cost = $user['cost'];
                $sell_price = $user['sell_price'];
                $date = $user['date'];
                
             
            } else {
                // Redirect or display an error if user doesn't exist
                header("Location: view_product.php");
                exit();
            }
        } else {
            // Redirect or display an error if ID is not set in the URL
            header("Location: view_product.php");
            exit();
        }

       
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> 
    <title>User Update Form</title>
</head>
<body>

<?php include 'navigation/nav.php'; ?>
<section class="dashboard">
    <div class="top">
    </div>
    <section class="container">
    <header>Product Update Form</header>
    <form method="post" class="form" action="update_product.php">
        
    
    <div class="column">
                <div class="input-box">
                    <label>Product Name</label>
                    <input type="text" placeholder="Enter Product Name" name="Pname" value="<?php echo $Pname; ?>" required />
                </div>

                <div class="input-box">
                    <label>Description</label>
                    <input type="text" placeholder="Enter Description " name="descript"value="<?php echo $descript; ?>" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Price</label>
                    <input type="number" placeholder="Enter Price" name="sell_price"value="<?php echo $sell_price; ?>" required />
                </div>

                <div class="input-box">
                    <label>Quantity in stocks</label>
                    <input type="number" placeholder="Enter Quantity" name="quantity"value="<?php echo $quantity; ?>" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Supplier ID</label>
                    <input type="text" placeholder="Enter Supplier ID" name="suppID"value="<?php echo $suppID; ?>" required />
                </div>

                <div class="input-box">
                    <label>Timestamp</label>
                    <input type="date" placeholder="" name="date"value="<?php echo $date; ?>" required />
                </div>
            </div>

                    <div class="input-box category">
                    <label>Category</label>
                    <div class="row">
                    <div class="select-box">
                    <select name="category">
                        <option hidden>Category</option>
                        <option <?php if($category == 'Beverages') echo 'selected'; ?>>Beverages</option>
                        <option <?php if($category == 'Snacks') echo 'selected'; ?>>Snacks</option>
                        <option <?php if($category == 'Household essentials') echo 'selected'; ?>>Household essentials</option>
                        <option <?php if($category == 'Canned goods') echo 'selected'; ?>>Canned goods</option>
                    </select>
                </div>


                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Weight</label>
                    <input type="text" placeholder="Enter Weight" name="weight" value="<?php echo $weight; ?>" required />
                </div>

                <div class="input-box">
                    <label>Cost Price</label>
                    <input type="text" placeholder="Enter Cost Price" name="cost" value="<?php echo $cost; ?>" required />
                </div>
            </div>

            <div class="input-box">
                <label>Selling Price</label>
                <input type="number" placeholder="Enter Selling Price" name="sell_price" value="<?php echo $sell_price; ?>" required />
            </div>
    
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" name="update" onclick="showAlert()">Update</button>
    </form>
    </section>
</body>

<script>
   function showAlertAndRedirect() {
    if (confirm("Record successfully updated. Click OK to go to view.php")) {
      window.location.href = "view.php";
    }
  }
</script>
</html>
