<?php 
// Include the file containing database connection
include "databaseconnection.php";

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if material_id is not set in GET parameters
    if (!isset($_GET["material_id"])) {
        header("location:viewmaterial.php");
        exit;
    }
    $material_id = $_GET["material_id"];

    // Select the specific enrollment record from the database
    $sql = "SELECT * FROM material WHERE material_id = $material_id";
    $result = $connection->query($sql);

    // Check if record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $material_name = $row['material_name'];
        $description = $row['description'];
        $upload_date = $row['upload_date'];
    } else {
        header("location:viewmaterial.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST parameters
    $material_id = $_POST['material_id'];
    $user_id = $_POST['user_id'];
    $material_name = $_POST['material_name'];
    $description = $_POST['description'];
    $upload_date = $_POST['upload_date'];

    // Check for empty fields
    if (empty($material_id) || empty($user_id) || empty($material_name) || empty($description) || empty($upload_date)) {
        echo "All fields are required!";
    } else {
        // Update the data record in the database
        $sql = "UPDATE material SET user_id='$user_id', material_name='$material_name', description='$description', upload_date='$upload_date' WHERE material_id = '$material_id'";

        // Execute the SQL query
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewmaterial.php");
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
            height: 400px;
        }
    </style>
</head>
<body>
    <center>
        <h2>VIRTUAL ESTATE PLANNING WORKSHOP PLATFORM</h2>
        <h3 style="color: green;">HERE YOU MAY UPDATE OR CORRECT MATERIALS</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <br>
                <label>material Id</label><br>
                <input type="text" name="material_id" readonly class="input" value="<?php echo $material_id; ?>"><br>
                <label>User Id</label><br>
                <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br>
                <label>Material Name</label><br>
                <input type="text" name="material_name"  class="input" value="<?php echo $material_name; ?>"><br> 
                <label>Description</label><br>
                <input type="text" name="description" value="<?php echo $description; ?>" class="input"><br>
                <label>upload_date</label><br>
                <input type="text" name="upload_date" value="<?php echo $upload_date; ?>"
                 class="input"><br>
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

















