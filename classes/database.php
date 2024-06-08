<?php
// Function to connect to the database
function connectDB() {
    $host = 'localhost';
    $dbname = 'db_parish';
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Set PDO to throw exceptions on error
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

?>