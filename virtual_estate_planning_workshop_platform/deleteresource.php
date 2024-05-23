<?php
if (isset($_GET["resource_id"]) && is_numeric($_GET["resource_id"])) {
    $resource_id = $_GET["resource_id"];
    include "databaseconnection.php";
    $sql = "DELETE FROM estateplanningresource WHERE resource_id = ?";
    $stmt = $connection->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("i", $resource_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        $stmt->close(); 
        header("Location: viewresource.php");
        exit;
    } else {
        // Error deleting record
        echo "Error deleting record: " . $connection->error;
    }

    // Close database connection
    $connection->close();
} else {
    // Handle invalid or missing resource_id
    echo "Invalid Resource ID";
}
?>
