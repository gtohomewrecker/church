<?php
include 'classes/functions_parishioner.php'; // Include the file where your database functions are defined
include 'classes/database.php';

// Fetch records from the database
$records = readRecords();

// Check if records are found
if ($records) {
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Address</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Email</th>";
    echo "<th>Membership Date</th>";
    echo "<th>Actions</th>"; // Add a new header column for actions
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($records as $record) {
        echo "<tr>";
        echo "<td>".$record['id']."</td>";
        echo "<td>".$record['first_name']."</td>";
        echo "<td>".$record['last_name']."</td>";
        echo "<td>".$record['date_of_birth']."</td>";
        echo "<td>".$record['address']."</td>";
        echo "<td>".$record['phone_number']."</td>";
        echo "<td>".$record['email']."</td>";
        echo "<td>".$record['membership_date']."</td>";
        // Add update and delete buttons
        echo "<td>";
        echo "<button class='action-btn view-btn' onclick='showParishionerDetails(" . json_encode($record) . ")'>View</button> ";
        echo "<button class='action-btn edit-btn' onclick=\"location.href='update_form_parishioner.php?id=" . $record['id'] . "'\">Edit</button> ";
        echo "<form action='delete_parishioner.php' method='post' style='display: inline;'>";
        echo "<input type='hidden' name='action' value='deleteParishioner'>";
        echo "<input type='hidden' name='id' value='".$record['id']."'>";
        echo "<button type='submit' class='action-btn delete-btn'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "No records found.";
}
?>
