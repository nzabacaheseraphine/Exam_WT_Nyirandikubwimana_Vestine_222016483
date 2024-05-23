<?php
if (isset($_GET["workshop_id"]) && is_numeric($_GET["workshop_id"])) {
    $workshop_id = $_GET["workshop_id"];
    include "databaseconnection.php";
    $sql = "DELETE FROM workshop WHERE workshop_id = ?";
    $stmt = $connection->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("i", $workshop_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        $stmt->close(); 
        header("Location: viewworkshop.php");
        exit;
    } else {
        // Error deleting record
        echo "Error deleting record: " . $connection->error;
    }

    // Close database connection
    $connection->close();
} else {
    // Handle invalid or missing workshop
    echo "Invalid workshop ID";
}
?>
