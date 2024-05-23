<?php
// Call the file that contains database connection
include "databaseconnection.php";

// Initialize variables
$attendee_id = $workshop_id = $name = $email = $gender = $location = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["attendee_id"])) {
        header("location: viewattendee.php");
        exit;
    }
    $attendee_id = $_GET["attendee_id"];

    // Read the row of the selected attendee from the database
    $sql = "SELECT * FROM attendee WHERE attendee_id = $attendee_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $workshop_id = $row['workshop_id'];
        $name = $row["name"];
        $email = $row["email"];
        $gender = $row['gender'];
        $location = $row["location"]; // Initialize location variable
 
    } else {
        header("location: viewattendee.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendee_id = $_POST["attendee_id"];
    $workshop_id = $_POST['workshop_id'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST['gender'];
    $location = $_POST["location"];

    // Check if any required field is empty
    if (empty($attendee_id) || empty($workshop_id) || empty($name) || empty($email) || empty($gender) || empty($location)) {
        echo "All fields are required!";
    } else {
        // Update the attendee record in the database
        $sql = "UPDATE attendee SET workshop_id='$workshop_id', name='$name', email='$email', gender='$gender', location='$location' WHERE attendee_id='$attendee_id'";
        
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: viewattendee.php");
            exit;
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            height: 500px;
        }
    </style>
</head>
<body>
<center>
    <h2>VIRTUAL ESTATE PLANNING WORKSHOP PLATFORM</h2>
    <h3 style="color: green;">HERE YOU MAY UPDATE OR CORRECT PAYMENT</h3>
    <!-- Section that contains form for updating attendee information -->
    <br>
    <section class="forms">
        <form method="POST" onsubmit="return confirmUpdate();">
            <br>
            <label>Payment Id</label><br>
            <input type="text" name="attendee_id" readonly class="input" value="<?php echo $attendee_id; ?>"><br>
            <label>Workshop Id</label><br>
            <input type="text" name="workshop_id" readonly class="input" value="<?php echo $workshop_id; ?>"><br>
            <label>Name</label><br>
            <input type="text" name="name" class="input" value="<?php echo $name; ?>"><br>
            <label>Email</label><br>
            <input type="text" name="email" value="<?php echo $email; ?>" class="input"><br>
            <label>Gender</label><br>
            <input type="text" name="gender" value="<?php echo $gender; ?>" class="input"><br>
            <label>Location</label><br>
            <input type="text" name="location" value="<?php echo $location; ?>" class="input"><br><br>
            <input type="submit" name="submit" value="Update" class="sb">
        </form>
    </section>
</center>
<footer>
    <!-- Footer section -->
    <p style="color: white; text-align: center; margin-top: 40px; background-color: black; height: 40px;"><marquee>&copy; Copy_2024 &reg; Designed By Nyirandikubwimana_Vestine_222016483_GrpB_BIT</marquee></p>
</footer>
</body>
</html>
