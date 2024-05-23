<?php
if (isset($_GET["enrollment_id"]) && is_numeric($_GET["enrollment_id"])) {
    $enrollment_id = $_GET["enrollment_id"];
    include "databaseconnection.php";
    $sql = "DELETE FROM enrollment WHERE enrollment_id = ?";
    $stmt = $connection->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("i", $enrollment_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        $stmt->close(); 
        header("Location: viewernollment.php");
        exit;
    } else {
        // Error deleting record
        echo "Error deleting record: " . $connection->error;
    }

    // Close database connection
    $connection->close();
} else {
    // Handle invalid or missing enrollment_id
    echo "Invalid enrollment ID";
}
?>
