<?php
// Database connection
include 'databaseconnection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Prepare and execute SQL query to retrieve user data based on email
    $sql = "SELECT * FROM user WHERE email = '$email' AND role = '$role'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row["password"];

        // Verify password using password_verify() function
        if (password_verify($password, $stored_password)) {
            echo "Login successful! Welcome, " . $row["username"];

            // Redirect user based on user type (e.g., admin or user dashboard)
            if ($role === "admin") {
               header("location:menuadmin.php");
               exit();
            } elseif ($role === "instructor") {
                header("Location: home.php");
            }
            elseif ($role === "attendee") {
                header("location:home.php");
            }
            exit;
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "User not found or invalid user type.";
    }

    $connection->close();
}
?>
