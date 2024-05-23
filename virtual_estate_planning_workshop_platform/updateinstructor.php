<?php 
// Include the file containing database connection
include "databaseconnection.php";

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if instructor_id is not set in GET parameters
    if (!isset($_GET["instructor_id"])) {
        header("location:viewinstructor.php");
        exit;
    }
    $instructor_id = $_GET["instructor_id"];

    // Select the specific enrollment record from the database
    $sql = "SELECT * FROM instructor WHERE instructor_id = $instructor_id";
    $result = $connection->query($sql);

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $workshop_id = $row['workshop_id'];
        $session_id = $row['session_id'];
        $name = $row['name'];
        $contact = $row['contact'];
        $qualification = $row['qualification'];
        $areaspecialized = $row['areaspecialized'];
    } else {
        header("location:viewinstructor.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST parameters
    $instructor_id = $_POST['instructor_id'];
    $workshop_id = $_POST['workshop_id'];
    $session_id = $_POST['session_id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $qualification = $_POST['qualification'];
    $areaspecialized = $_POST['areaspecialized'];

    // Check for empty fields
    if (empty($instructor_id) || empty($workshop_id) || empty($session_id) || empty($name) || empty($contact) || empty($qualification) || empty($areaspecialized)) {
        echo "All fields are required!";
    } else {
        // Update the data record in the database
        $sql = "UPDATE instructor SET workshop_id='$workshop_id', session_id='$session_id', name='$name', contact='$contact', qualification='$qualification', areaspecialized ='$areaspecialized' WHERE instructor_id = '$instructor_id'";

        // Execute the SQL query
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewinstructor.php");
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
    <title></title>
    <script>Virtual Estate Planning Workshop Platform
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
            height: 550px;
        }
    </style>
</head>
<body>
    <center>
        <h2>VIRTUAL ESTATE PLANNING WORKSHOP PLATFORM</h2>
        <h3 style="color: green;">HERE YOU MAY UPDATE OR CORRECT INSTRUCTORS</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <br>
                <label>Instructor Id</label><br>
                <input type="text" name="instructor_id" readonly class="input" value="<?php echo $instructor_id; ?>"><br>
                <label>Workshop Id</label><br>
                <input type="text" name="workshop_id" readonly class="input" value="<?php echo $workshop_id; ?>"><br>
                <label>Session Id</label><br>
                <input type="text" name="session_id" readonly class="input" value="<?php echo $session_id; ?>"><br> 
                <label>Instructor Name</label><br>
                <input type="text" name="name" value="<?php echo $name; ?>" class="input"><br>
                <label>Contact</label><br>
                <input type="text" name="contact" value="<?php echo $contact; ?>"
                 class="input"><br>
                <label>Qualification</label><br>
                <input type="text" name="qualification" value="<?php echo $qualification; ?>" class="input"><br>
                <label>Area Specialized</label><br>
                <input type="text" name="areaspecialized" value="<?php echo $areaspecialized; ?>" class="input"><br><br>
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

















