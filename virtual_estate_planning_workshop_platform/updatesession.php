<?php 
// Include the file containing database connection
include "databaseconnection.php";

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if session_id is not set in GET parameters
    if (!isset($_GET["session_id"])) {
        header("location:viewsession.php");
        exit;
    }
    $session_id = $_GET["session_id"];

    // Select the specific enrollment record from the database
    $sql = "SELECT * FROM session WHERE session_id = $session_id";
    $result = $connection->query($sql);

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $workshop_id = $row['workshop_id'];
        $topic = $row['topic'];
        $description = $row['description'];
        $duration = $row['duration'];
        $uploaded_time = $row['uploaded_time'];
    } else {
        header("location:viewsession.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST parameters
    $session_id = $_POST['session_id'];
    $workshop_id = $_POST['workshop_id'];
    $topic = $_POST['topic'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $uploaded_time = $_POST['uploaded_time'];

    // Check for empty fields
    if (empty($session_id) || empty($workshop_id) || empty($topic) || empty($description) || empty($duration) || empty($uploaded_time)) {
        echo "All fields are required!";
    } else {
        // Update the data record in the database
        $sql = "UPDATE session SET workshop_id='$workshop_id', topic='$topic', description='$description', duration ='$duration',uploaded_time= '$uploaded_time' WHERE session_id = '$session_id'";

        // Execute the SQL query
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewsession.php");
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
        <h3 style="color: green;">HERE YOU MAY UPDATE OR CORRECT sessionS</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <br>
                <label>session Id</label><br>
                <input type="text" name="session_id" readonly class="input" value="<?php echo $session_id; ?>"><br>
                <label>Workshop Id</label><br>
                <input type="text" name="workshop_id" readonly class="input" value="<?php echo $workshop_id; ?>"><br>
                <label>topic</label><br>
                <input type="text" name="topic" value="<?php echo $topic; ?>"
                 class="input"><br>
                <label>description</label><br>
                <input type="text" name="description" value="<?php echo $description; ?>" class="input"><br>
                <label>Duration</label><br>
                <input type="text" name="duration" value="<?php echo $duration; ?>" class="input"><br>
                 <label>Uploaded Date</label><br>
                <input type="text" name="uploaded_time" value="<?php echo $uploaded_time; ?>" class="input"><br><br>
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

















