<?php 
// Include the file containing database connection
include "databaseconnection.php";

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if workshop_id is not set in GET parameters
    if (!isset($_GET["workshop_id"])) {
        header("location:viewworkshop.php");
        exit;
    }
    $workshop_id = $_GET["workshop_id"];

    // Select the specific enrollment record from the database
    $sql = "SELECT * FROM workshop WHERE workshop_id = $workshop_id";
    $result = $connection->query($sql);

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $name = $row['name'];
        $description = $row['description'];
        $date_time = $row['date_time'];
    } else {
        header("location:viewworkshop.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST parameters
    $workshop_id = $_POST['workshop_id'];
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $date_time = $_POST['date_time'];

    // Check for empty fields
    if (empty($workshop_id) || empty($workshop_id) || empty($user_id) || empty($name) || empty($description) || empty($date_time)) {
        echo "All fields are required!";
    } else {
        // Update the data record in the database
        $sql = "UPDATE workshop SET user_id='$user_id', name='$name', description='$description', date_time ='$date_time' WHERE workshop_id = '$workshop_id'";

        // Execute the SQL query
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewworkshop.php");
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
        <h3 style="color: green;">HERE YOU MAY UPDATE OR CORRECT WORKSHOP</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <br>
                <label>workshop Id</label><br>
                <input type="text" name="workshop_id" readonly class="input" value="<?php echo $workshop_id; ?>"><br>
                <label>User Id</label><br>
                <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br> 
                <label>workshop Name</label><br>
                <input type="text" name="name" value="<?php echo $name; ?>" class="input"><br>
                <label>description</label><br>
                <input type="text" name="description" value="<?php echo $description; ?>" class="input"><br>
                <label>Date and Time</label><br>
                <input type="text" name="date_time" value="<?php echo $date_time; ?>" class="input"><br><br>
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

















