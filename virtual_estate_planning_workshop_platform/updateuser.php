<?php 
// Include the file containing database connection
include "databaseconnection.php";

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if user_id is not set in GET parameters
    if (!isset($_GET["user_id"])) {
        header("location:viewuser.php");
        exit;
    }
    $user_id = $_GET["user_id"];

    // Select the specific enrollment record from the database
    $sql = "SELECT * FROM user WHERE user_id = $user_id";
    $result = $connection->query($sql);

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fullname = $row['fullname'];
        $dob = $row['dob'];
        $contact = $row['contact'];
        $username = $row['username'];
        $email = $row['email'];
        $role = $row['role'];
    } else {
        header("location:viewuser.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST parameters
    $user_id = $_POST['user_id'];
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Check for empty fields
    if (empty($user_id) || empty($fullname) || empty($dob) || empty($contact) || empty($username) || empty($email) || empty($role)) {
        echo "All fields are required!";
    } else {
        // Update the data record in the database
        $sql = "UPDATE user SET fullname='$fullname', dob='$dob', contact='$contact', username ='$username',email= '$email' , role='$role' WHERE user_id = '$user_id'";

        // Execute the SQL query
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewuser.php");
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
        <h3 style="color: green;">HERE YOU MAY UPDATE OR CORRECT USERS</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <br>
                <label>user Id</label><br>
                <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br>
                <label>Full Name</label><br>
                <input type="text" name="fullname"  class="input" value="<?php echo $fullname; ?>"><br>
                <label>dob</label><br>
                <input type="text" name="dob" value="<?php echo $dob; ?>"
                 class="input"><br>
                <label>contact</label><br>
                <input type="text" name="contact" value="<?php echo $contact; ?>" class="input"><br>
                <label>username</label><br>
                <input type="text" name="username" value="<?php echo $username; ?>" class="input"><br>
                 <label>Email</label><br>
                <input type="text" name="email" value="<?php echo $email; ?>" class="input"><br><br>
                 <label>Role</label><br>
                <input type="text" name="email" value="<?php echo $role; ?>" class="input"><br><br>
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

















