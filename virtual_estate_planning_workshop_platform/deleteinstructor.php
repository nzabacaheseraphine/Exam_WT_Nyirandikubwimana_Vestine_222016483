<?php
if (isset($_GET["instructor_id"]) && is_numeric($_GET["instructor_id"])) {
    $instructor_id = $_GET["instructor_id"];
    include "databaseconnection.php";
    $sql = "DELETE FROM instructor WHERE instructor_id = ?";
    $stmt = $connection->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("i", $instructor_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        $stmt->close(); 
        header("Location: viewinstructor.php");
        exit;
    } else {
        // Error deleting record
        echo "Error deleting record: " . $connection->error;
    }

    // Close database connection
    $connection->close();
} else {
    // Handle invalid or missing instructor
    echo "Invalid instructor ID";
}
?>
