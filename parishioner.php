<?php 
require_once 'classes/functions_parishioner.php';
require_once 'classes/database.php';

$submission_status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $membership_date = $_POST["membership_date"];

    // Call the createRecord function to insert the new parishioner record
    createRecord($first_name, $last_name, $date_of_birth, $address, $phone_number, $email, $membership_date);
    
    $submission_status = "success";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Parishioner Form</title>
</head>
<body>

<?php 
if ($submission_status === "success") {
    echo "<script>alert('Record created successfully');</script>";
}
?>



<section class="dashboard">
    <div class="top">
        <!-- Any content for the top section -->
    </div>
    <header>Parishioner Form</header>
    <section class="container">
        <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="column">
                <div class="input-box">
                    <label>First Name</label>
                    <input type="text" placeholder="Enter First Name" name="first_name" required />
                </div>

                <div class="input-box">
                    <label>Last Name</label>
                    <input type="text" placeholder="Enter Last Name" name="last_name" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" required />
                </div>

                <div class="input-box">
                    <label>Address</label>
                    <input type="text" placeholder="Enter Address" name="address" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="text" placeholder="Enter Phone Number" name="phone_number" required />
                </div>

                <div class="input-box">
                    <label>Email</label>
                    <input type="email" placeholder="Enter Email" name="email" required />
                </div>
            </div>

            <div class="input-box">
                <label>Membership Date</label>
                <input type="date" name="membership_date" required />
            </div>

            <button type="submit" name="Submit">Submit</button>
        </form>
    </section>
</section>
</body>
</html>
