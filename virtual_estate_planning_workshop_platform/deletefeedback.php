<?php
if (isset($_GET["feedback_id"]) && is_numeric($_GET["feedback_id"])) {
    $feedback_id = $_GET["feedback_id"];
    include "databaseconnection.php";
    $sql = "DELETE FROM feedback WHERE feedback_id = ?";
    $stmt = $connection->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("i", $feedback_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        $stmt->close(); 
        header("Location: viewfeedback.php");
        exit;
    } else {
        // Error deleting record
        echo "Error deleting record: " . $connection->error;
    }

    // Close database connection
    $connection->close();
} else {
    // Handle invalid or missing feedback_id
    echo "Invalid feedback ID";
}
?>
