<?php 
// Include the file containing database connection
include "databaseconnection.php";

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if feedback_id is not set in GET parameters
    if (!isset($_GET["feedback_id"])) {
        header("location:viewfeedback.php");
        exit;
    }
    $feedback_id = $_GET["feedback_id"];

    // Select the specific enrollment record from the database
    $sql = "SELECT * FROM feedback WHERE feedback_id = $feedback_id";
    $result = $connection->query($sql);

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $workshop_id = $row['workshop_id'];
        $attendee_id = $row['attendee_id'];
        $comments = $row['comments'];
        $submission_date = $row['submission_date'];
    } else {
        header("location:viewfeedback.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST parameters
    $feedback_id = $_POST['feedback_id'];
    $workshop_id = $_POST['workshop_id'];
    $attendee_id = $_POST['attendee_id'];
    $comments = $_POST['comments'];
    $submission_date = $_POST['submission_date'];
    // Check for empty fields
    if (empty($feedback_id) || empty($workshop_id) || empty($attendee_id) || empty($comments) || empty($submission_date)) {
        echo "All fields are required!";
    } else {
        // Update the enrollment record in the database
        $sql = "UPDATE feedback SET workshop_id='$workshop_id', attendee_id='$attendee_id', comments='$comments', submission_date='$submission_date' WHERE feedback_id = '$feedback_id'";

        // Execute the SQL query
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewfeedback.php");
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
        <h3 style="color: green;">HERE YOU MAY UPDATE OR CORRECT FEEDBACK</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <br>
                <label>Feedback Id</label><br>
                <input type="text" name="feedback_id" readonly class="input" value="<?php echo $feedback_id; ?>"><br>
                <label>Workshop Id</label><br>
                <input type="text" name="workshop_id" readonly class="input" value="<?php echo $workshop_id; ?>"><br>
                <label>Attendee Id</label><br>
                <input type="text" name="attendee_id" readonly class="input" value="<?php echo $attendee_id; ?>"><br> 
                <label>Comments</label><br>
                <input type="text" name="comments" value="<?php echo $comments; ?>" class="input"><br>
                <label>Submission Date</label><br>
                <input type="text" name="submission_date" value="<?php echo $submission_date; ?>"
                 class="input"><br><br>
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

















