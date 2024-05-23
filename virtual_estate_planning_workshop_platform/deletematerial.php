<?php
if (isset($_GET["material_id"]) && is_numeric($_GET["material_id"])) {
    $material_id = $_GET["material_id"];
    include "databaseconnection.php";
    $sql = "DELETE FROM material WHERE material_id = ?";
    $stmt = $connection->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("i", $material_id);
    if ($stmt->execute()) {
        echo "Record deleted successfully";
        $stmt->close(); 
        header("Location: viewmaterial.php");
        exit;
    } else {
        // Error deleting record
        echo "Error deleting record: " . $connection->error;
    }

    // Close database connection
    $connection->close();
} else {
    // Handle invalid or missing material
    echo "Invalid material ID";
}
?>
