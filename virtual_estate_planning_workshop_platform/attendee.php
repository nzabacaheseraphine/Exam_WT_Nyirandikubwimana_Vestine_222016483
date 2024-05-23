<?php
include 'menu.php';
include 'databaseconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $workshop_id=$_POST['workshop_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $location=$_POST['location'];
    $sql="INSERT INTO attendee(workshop_id,name,email,gender,location) VALUES('$workshop_id','$name','$email','$gender','$location')";
    $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header("location:home.php");
        exit();
    }else{
        echo "Inserted fail";
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Virtual Estate Planning Workshop Platform</title>
    <style>
    	body{
    		background-image: url('./images/shp.jpg');
    		background-repeat: no-repeat;
            background-size: cover;
    	}
    	form{
    		margin-top: 13px;
    		border: 3px solid yellow;
    		width: 550px;
    		height: 550px;
    		border-radius: 20px;
            background-color: white;
    	}
    	.label{
    		font-family: century;
    		font-size: 26px;
    		color: black;
    		font-weight: bold;
    	}
    	h2{
    		font-family: Imprint MT Shadow;
    		font-size:36px;
    		color: darkblue;
    		margin-top: 20px;
    	}
    	.input{
    		width: 300px;
    		height: 40px;
    		border-radius: 9px;
    		border-color: green;
    	}

        b{
            font-family: century;
            font-size: 22px;
            color: black;  
        }
        .butn{
            height: 40px;
            border-radius: 9px;
            background-color: var(--color-primary);
            border: none;
            font-family: century;
            font-weight: bold;
            color: white;
            font-size: 20px;
        }
        .btn{
            height: 40px;
            border-radius: 9px;
            background-color: dimgray;
            border: none;
            font-family: century;
            font-weight: bold;
            color: white;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <center>
        <div class="forms">
            <form method="POST" action="">
                <h2>ATTENDEE FORM</h2><br>
                <label class="label">Workshop Id:</label><br>
<select name="workshop_id" id="workshop_id" class="input"> 
<?php
$query = "SELECT workshop_id,name FROM workshop";
$result = $connection->query($query);

if ($result && $result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$workshop_id = $row['workshop_id'];
$name=$row['name'];
echo "<option value=\"$workshop_id\">$workshop_id $name</option>";
}
}
?>
</select><br>
                <label class="label">Attendee Name:</label><br>
                <input type="text" name="name" required class="input"><br>
                <label class="label">Email:</label><br>
                <input type="email" name="email" required class="input"><br>
                <label class="label">Gender:</label><br><br>
                <input type="radio" name="gender"  value="male" required ><b>Male</b>
                <input type="radio" name="gender"  value="female" required ><b>Female</b><br><br>
                <label class="label">Location:</label><br>
                <input type="text" name="location" required class="input"><br><br>
                <input type="submit" name="attendee" value="Register" class="butn" style="
                width: 150px;">
                <input type="reset" name="cancel" value="Cancel" class="btn" style="width: 150px;">
            </form>
        </div>
    </center>
</body>
</html>
