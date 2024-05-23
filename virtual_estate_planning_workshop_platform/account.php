<?php
// Include the file that contains database connection
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data using $_POST superglobal
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword']; 
    $role = $_POST['role'];
    // Hash the password using PASSWORD_DEFAULT
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Prepare and execute the SQL query to insert user data
    $sql = "INSERT INTO user (fullname, dob, contact, username, email, password, role) 
            VALUES ('$fullname', '$dob', '$contact', '$username', '$email', '$hashed_password', '$role')";

    $result = $connection->query($sql);

    // Check if the query executed successfully
    if (!$result) {
        // Display an error message if query fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    } elseif ($password == $confirmpassword) {
        // If passwords match, display success message and redirect to login page
        echo "Data Inserted Successfully";
        header("Location: login.html");
        exit(); // Exit to prevent further execution after redirection
    } else {
        // If passwords do not match, display a message
        echo "Verify your password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>virtual estate planning workshop platform</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script>
    function confirmInsert() {
      return confirm('do you want to record?'); 
    }
</script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
  <div class="container">
    <div class="form-box">
      <form action="" method="POST"  name="Formfill" onsubmit="return validation" onsubmit=" return confirmInsert()">
        <h2 class="re" style="color: blue; font-family: century;">CREATE ACCOUNT</h2>
        <p id="result"></p>
        <div class="input-box">
          <label>Full Name</label>
          <i class='bx bxs-user'></i>
          <input type="text" name="fullname" placeholder="Enter your Full Name" >
        </div>
        <div class="input-box">
         <label for="year">Select Year of Birth:</label>
        <select name="dob" id="dob" style="  width: 100%; height: 45px;" >
            <?php
            // Get the current year
            $currentYear = date('Y');

            // Loop through years from 1990 to the current year
            for ($year = 1960; $year <= $currentYear; $year++) {
                echo "<option value=\"$year\">$year</option>";
            }
            ?>
        </select>
        </div>
          <div class="input-box">
          <label>Contact</label>
          <i class='bx bxs-phone-call'></i>
          <input type="contact" name="contact" placeholder=" Enter Your Contact " >
        </div>
        <div class="input-box">
          <label>Username</label>
          <i class='bx bxs-user'></i>
          <input type="text" name="username" placeholder="Enter Your Username" >
        </div> 
       <div class="input-box">
          <label>Email</label>
          <i class='bx bxs-envelope'></i>
          <input type="email" name="email" placeholder="Enter Your Email " >
        </div>
        <div class="input-box">
          <label>Password</label>
          <i class='bx bxs-lock-alt'></i>
          <input type="password" name="password" placeholder="Enter your password" >
        </div>
        <div class="input-box">
          <label>Confirm Password</label>
          <i class='bx bxs-lock-alt'></i>
          <input type="password" name="confirmpassword" placeholder=" Re-type Password" >
        </div>
        <div class="input-box">
          <label>Role</label>
          <i class='bx bxs-info-circle'></i>
          <input type="text" name="role" placeholder=" Enter your Type" >
        </div>
        <div class="button">
          <input type="submit" value="Register" onclick="validation()" class="btn">
        </div>
        <div class="group">
          <span><a href="#">Forget-password</a></span>
          <span><a href="login.html">Login</a></span>
        </div> 
      </form>
    </div>
  </div>
  <script src="index.js"></script>
</body>
</html>