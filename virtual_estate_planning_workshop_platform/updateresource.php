<?php 
// Include the file containing database connection
include "databaseconnection.php";

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if resource_id is not set in GET parameters
    if (!isset($_GET["resource_id"])) {
        header("location:viewresource.php");
        exit;
    }
    $resource_id = $_GET["resource_id"];

    // Select the specific enrollment record from the database
    $sql = "SELECT * FROM estateplanningresource WHERE resource_id = $resource_id";
    $result = $connection->query($sql);

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $resource_name = $row['resource_name'];
        $resource_type = $row['resource_type'];
        $description = $row['description'];
         $uploaded_date = $row['uploaded_date'];
    } else {
        header("location:viewresource.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST parameters
    $resource_id = $_POST['resource_id'];
    $user_id = $_POST['user_id'];
    $resource_name = $_POST['resource_name'];
    $resource_type = $_POST['resource_type'];
    $description = $_POST['description'];
     $uploaded_date = $_POST['uploaded_date'];

    // Check for empty fields
    if (empty($resource_id) || empty($user_id) || empty($resource_name) || empty($resource_type) || empty($description) || empty($uploaded_date)) {
        echo "All fields are required!";
    } else {
        // Update the enrollment record in the database
        $sql = "UPDATE estateplanningresource SET user_id='$user_id', resource_name='$resource_name', resource_type='$resource_type', description='$description', uploaded_date='$uploaded_date' WHERE resource_id = '$resource_id'";

        // Execute the SQL query
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewresource.php");
            exit;
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Estate Planning Workshop Platform</title>
    <script>
        function confirmUpdate() {
            return confirm('Do you want to update this record?');
        }
    </script>
    <style>
        body {
            background-image: url('./images/hme.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Century', sans-serif;
        }
        h2 {
            font-family: Castellar;
            color: darkblue;
        }
        label {
            font-family: times new roman;
            font-weight: bold;
            font-size: 20px;
        }
        .sb {
            font-family: Georgia;
            padding: 10px;
            border-color: blue;
            background-color: skyblue;
            width: 200px;
            margin-top: 5px;
            border-radius: 12px;
            font-weight: bold;
            color: blue;
        }
        .input {
            width: 350px;
            height: 35px;
            border-radius: 12px;
            border-color: green;
        }
    form{
            background-color: papayawhip;
            width: 500px;
            border-radius: 12px;
            height: 500px;
        }
    </style>
</head>
<body>
    <center>
        <h2>VIRTUAL ESTATE PLANNING WORKSHOP PLATFORM</h2>
        <h3 style="color: green;">HERE YOU MAY UPDATE OR CORRECT ESTATE PLANNING RESOURCE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <br>
                <label>Resource Id</label><br>
                <input type="text" name="resource_id" readonly class="input" value="<?php echo $resource_id; ?>"><br>
                <label>User Id</label><br>
                <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br>
                <label>Resource Name</label><br>
                <input type="text" name="resource_name" readonly class="input" value="<?php echo $resource_name; ?>"><br> 
                <label>Resource Type</label><br>
                <input type="text" name="resource_type" value="<?php echo $resource_type; ?>" class="input"><br>
                <label>Description</label><br>
                <input type="text" name="description" value="<?php echo $description; ?>"
                 class="input"><br>
                <label>Uploaded Date</label><br>
                <input type="text" name="uploaded_date" value="<?php echo $uploaded_date; ?>" class="input"><br><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color: white; text-align: center; margin-top: 40px; background-color: black; height: 40px;">
            <marquee>&copy; Copy_2024 &reg; Designed By Nyirandikubwimana_Vestine_222016483_GrpB_BIT</marquee>
        </p>
    </footer>
</body>
</html>

















