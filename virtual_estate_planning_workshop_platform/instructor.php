<?php
include 'menu.php';
include 'databaseconnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $workshop_id=$_POST['workshop_id'];
    $session_id=$_POST['session_id'];
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $qualification=$_POST['qualification'];
    $areaspecialized=$_POST['areaspecialized'];
    $sql="INSERT INTO instructor(workshop_id,session_id,name,contact,qualification,areaspecialized) VALUES('$workshop_id','$session_id','$name','$contact','$qualification','$areaspecialized')";
    $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header('location:menuadmin.php');
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
    		height: 620px;
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
                <h2>INSTRUCTOR FORM</h2><br>
                <label class="label">Workshop Id</label><br>
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
                <label class="label">Instructor Name:</label><br>
                <input type="text" name="name" required class="input"><br>
                <label class="label">Contacts:</label><br>
                <input type="text" name="contact" required class="input"><br>
                <label class="label">Qualification:</label><br>
                <input type="text" name="qualification" required class="input"><br>
                <label class="label">Area Specialized:</label><br>
                <textarea class="input" name="areaspecialized"></textarea>
                <br><br>
                <input type="submit" name="submit" value="ADD" class="butn " style="
                width: 150px;">
                <input type="reset" name="cancel" value="Cancel" class="btn " style="width: 150px;">
            </form>
        </div>
    </center>
</body>
</html>
