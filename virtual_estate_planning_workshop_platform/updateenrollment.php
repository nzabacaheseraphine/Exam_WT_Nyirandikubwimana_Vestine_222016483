<?php 
// Include the file containing database connection
include "databaseconnection.php";

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if enrollment_id is not set in GET parameters
    if (!isset($_GET["enrollment_id"])) {
        header("location:viewernollment.php");
        exit;
    }
    $enrollment_id = $_GET["enrollment_id"];

    // Select the specific enrollment record from the database
    $sql = "SELECT * FROM enrollment WHERE enrollment_id = $enrollment_id";
    $result = $connection->query($sql);

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $session_id = $row['session_id'];
        $status = $row['status'];
        $enrollment_date = $row['enrollment_date'];
    } else {
        header("location:viewernollment.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST parameters
    $enrollment_id = $_POST['enrollment_id'];
    $user_id = $_POST['user_id'];
    $session_id = $_POST['session_id'];
    $status = $_POST['status'];
    $enrollment_date = $_POST['enrollment_date'];

    // Check for empty fields
    if (empty($enrollment_id) || empty($user_id) || empty($session_id) || empty($status) || empty($enrollment_date)) {
        echo "All fields are required!";
    } else {
        // Update the enrollment record in the database
        $sql = "UPDATE enrollment SET user_id='$user_id', session_id='$session_id', status='$status', enrollment_date='$enrollment_date' WHERE enrollment_id = '$enrollment_id'";

        // Execute the SQL query
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewernollment.php");
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
            font-size: 20px;
            font-weight: bold;
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
            height: 400px;
        }
    </style>
</head>
<body>
    <center>
        <h2>VIRTUAL ESTATE PLANNING WORKSHOP PLATFORM</h2>
        <h3 style="color: green;">HERE YOU MAY UPDATE OR CORRECT ENROLLMENT</h3>
        <br><br>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <br>
                <label>Enrollment ID</label><br>
                <input type="text" name="enrollment_id" readonly class="input" value="<?php echo $enrollment_id; ?>"><br>
                <label>User ID</label><br>
                <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br>
                <label>Session ID</label><br>
                <input type="text" name="session_id" readonly class="input" value="<?php echo $session_id; ?>"><br> 
                <label>Status</label><br>
                <input type="text" name="status" value="<?php echo $status; ?>" class="input"><br>
                <label>Enrollment Date</label><br>
                <input type="text" name="enrollment_date" value="<?php echo $enrollment_date; ?>" class="input"><br><br>
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

















