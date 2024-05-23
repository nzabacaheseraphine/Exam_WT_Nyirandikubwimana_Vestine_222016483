<?php
if (isset($_GET["payment_id"])) {
   $payment_id=$_GET["payment_id"];
   //call file that contain database connection
include "databaseconnection.php";
$sql="DELETE FROM payment WHERE payment_id=$payment_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewpayment.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>