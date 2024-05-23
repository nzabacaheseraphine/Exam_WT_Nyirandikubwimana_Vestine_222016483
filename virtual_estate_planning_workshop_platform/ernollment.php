<?php
include 'menu.php';
include 'databaseconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id=$_POST['user_id'];
    $session_id=$_POST['session_id'];
    $status=$_POST['status'];
    $enrollment_date=$_POST['enrollment_date'];
    $sql="INSERT INTO enrollment(user_id,session_id,status,enrollment_date) VALUES('$user_id','$session_id','$status','$enrollment_date')";
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
    		background-image: url('./images/any.jpg');
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
    		margin-top: 40px;
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
                <h2>ENROLLMENT FORM</h2><br>
                <label class="label">User Name</label><br>
<select name="user_id" id="user_id" class="input"> 
<?php
$query = "SELECT user_id,fullname FROM user";
$result = $connection->query($query);

if ($result && $result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$user_id = $row['user_id'];
$fullname=$row['fullname'];
echo "<option value=\"$user_id\">$user_id $fullname</option>";
}
}
?>
</select><br>
<label class="label">Session Name</label><br>
<select name="session_id" id="session_id" class="input"> 
<?php
$query = "SELECT session_id,topic FROM session";
$result = $connection->query($query);

if ($result && $result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$session_id = $row['session_id'];
$topic=$row['topic'];
echo "<option value=\"$session_id\">$session_id $topic</option>";
}
}
?>
</select><br>
                <label class="label">Status:</label><br>
                <input type="text" name="status" required class="input"><br>
                <label class="label">Enrollment Date:</label><br>
                <input type="date" name="enrollment_date" class="input"><br><br>
                <input type="submit" name="submit" value="Submit" class="butn " style="
                width: 150px;">
                <input type="reset" name="cancel" value="Cancel" class="btn " style="width: 150px;">
            </form>
        </div>
    </center>
</body>
</html>
