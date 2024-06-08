<?php

function createRecord($first_name, $last_name, $date_of_birth, $address, $phone_number, $email, $membership_date) {
    $conn = connectDB();
    if ($conn) {
        try {
            $stmt = $conn->prepare("INSERT INTO tbl_parishioner (first_name, last_name, date_of_birth, address, phone_number, email, membership_date) 
            VALUES (:first_name, :last_name, :date_of_birth, :address, :phone_number, :email, :membership_date)");
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':date_of_birth', $date_of_birth);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':membership_date', $membership_date);
            $stmt->execute();
            
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Function to fetch all records
function readRecords() {
    $conn = connectDB();
    if ($conn) {
        try {
            $stmt = $conn->query("SELECT * FROM tbl_parishioner");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}

// Function to update a record
function updateRecord($id, $first_name, $last_name, $date_of_birth, $address, $phone_number, $email, $membership_date) {
    $conn = connectDB();
    if ($conn) {
        try {
            $stmt = $conn->prepare("UPDATE tbl_parishioner SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, address = :address, phone_number = :phone_number, email = :email, membership_date = :membership_date WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':date_of_birth', $date_of_birth);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':membership_date', $membership_date);
            $stmt->execute();
            return true; // Indicate success
        } catch(PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}

// Function to delete a record
function deleteRecord($id) {
    $conn = connectDB();
    if ($conn) {
        try {
            $stmt = $conn->prepare("DELETE FROM tbl_parishioner WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo "Record deleted successfully";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Function to fetch user details by ID
function getUserById($id) {
    $conn = connectDB();
    if ($conn) {
        try {
            $stmt = $conn->prepare("SELECT * FROM tbl_parishioner WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}

?>
