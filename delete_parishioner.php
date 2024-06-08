<?php
include 'classes/functions_parishioner.php';
include 'classes/database.php';

// Check if action is set and equal to deleteParishioner
if (isset($_POST['action']) && $_POST['action'] == 'deleteParishioner') {
    // Check if ID is set
    if (isset($_POST['id'])) {
        $userId = $_POST['id'];
        
        // Call deleteRecord function to delete user
        deleteRecord($userId);
        
        // Return success message
        echo "Parishioner deleted successfully";
    } else {
        // Return error message if ID is not set
        echo "Parishioner ID not provided";
    }
}
?>
