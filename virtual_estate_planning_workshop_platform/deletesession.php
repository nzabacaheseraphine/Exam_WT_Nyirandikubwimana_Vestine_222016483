<?php
if (isset($_GET["session_id"]) && is_numeric($_GET["session_id"])) {
    $session_id = $_GET["session_id"];
    include "databaseconnection.php";
    $sql = "DELETE FROM session WHERE session_id = ?";
    $stmt = $connection->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("i", $session_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        $stmt->close(); 
        header("Location: viewsession.php");
        exit;
    } else {
        // Error deleting record
        echo "Error deleting record: " . $connection->error;
    }

    // Close database connection
    $connection->close();
} else {
    // Handle invalid or missing session
    echo "Invalid session ID";
}
?>
