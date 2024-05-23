<?php
if (isset($_GET["attendee_id"]) && is_numeric($_GET["attendee_id"])) {
    $attendee_id = $_GET["attendee_id"];
    include "databaseconnection.php";
    $sql = "DELETE FROM attendee WHERE attendee_id = ?";
    $stmt = $connection->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("i", $attendee_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        $stmt->close(); 
        header("Location: viewattendee.php");
        exit;
    } else {
        // Error deleting record
        echo "Error deleting record: " . $connection->error;
    }

    // Close database connection
    $connection->close();
} else {
    // Handle invalid or missing attendee_id
    echo "Invalid attendee ID";
}
?>
