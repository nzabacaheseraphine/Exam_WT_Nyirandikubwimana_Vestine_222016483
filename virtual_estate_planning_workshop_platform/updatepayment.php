<?php 
//call the file that contain database connection
include"databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!isset($_GET["payment_id"])) {
   header("location:viewpayment.php");
   exit;
  }
  $payment_id = $_GET["payment_id"];

    // Read the row of the selected product from the database
    $sql = "SELECT * FROM payment WHERE payment_id=$payment_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id=$row['user_id'];
        $amountpaid = $row["amountpaid"];
        $paymentmethods = $row["paymentmethods"];
        $payment_date=$row['payment_date'];
    } else {
        header("location:viewpayment.php");
        exit;
    }
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_id = $_POST["payment_id"];
    $user_id= $_POST['user_id'];
    $amountpaid = $_POST["amountpaid"];
    $paymentmethods = $_POST["paymentmethods"];
    $payment_date =$_POST['payment_date'];
    if (empty($payment_id) || empty($user_id) || empty($amountpaid) || empty($paymentmethods)) {
        echo "All feild are required!";
    }else {
        $sql = "UPDATE payment SET user_id='$user_id', amountpaid='$amountpaid', paymentmethods='$paymentmethods', payment_date='$payment_date' WHERE payment_id='$payment_id'";
    }
    if ($connection->query($sql) === TRUE) {
        echo " information updated successfully";
        header("location:viewpayment.php");
    }else {
        echo "Error updating record: " . $connection->error;
    
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		h2{
			font-family:Castellar;
			color: darkblue;
		}
		label{
			font-family: times new roman;
			font-weight: bold;
			font-size: 20px;
		}
		.sb{
			font-family:Georgia;
			padding: 10px;
			border-color: blue;
			background-color: skyblue;
			width: 200px;
			margin-top: 5px;
			border-radius: 12px;
			font-weight: bold;
			color: blue;

		}

		.input{
			width: 350px;
			height: 35px;
			border-radius: 12px;
			border-color: green;
		}
     form{
            background-color: papayawhip;
            width: 500px;
            border-radius: 12px;
            height: 450px;
        }

	</style>
</head>
<body>
<center>
	
	<h2>VIRTUAL ESTATE PLANNING WORKSHOP PLATFORM </h2>
	<h3 style="color:green;">HERE YOU MAY UPDATE OR CORRECT PAYMENT</h3>
	<!-- section that contain form that help to update supply information-->
	<section class="forms">
		<form method="POST" onsubmit="return confirmUpdate();">
			<br>
	<label>Payment Id</label><br>
    <input type="text" name="payment_id" readonly class="input" value="<?php echo $payment_id; ?>"><br>
    <label>User Id</label><br>
    <input type="text" name="user_id" readonly class="input" value="<?php echo $user_id; ?>"><br>
    <label>amountpaid</label><br>
    <input type="text" name="amountpaid" class="input" value="<?php echo $amountpaid; ?>"><br> 
    <label>paymentmethods </label><br>
    <input type="text" name="paymentmethods" value="<?php echo $paymentmethods; ?>" class="input"><br>
    <label>payment_date </label><br>
    <input type="text" name="payment_date" value="<?php echo $payment_date; ?>" class="input"><br><br>
    <input type="submit" name="submit" value="Update" class="sb">
</form>

</section>
</center>
		<footer>
			<!-- Footer section -->
			<p style="color:white; text-align: center; margin-top:40px; background-color:black; height: 40px;"><marquee>&copy Copy_2024 &reg Designed By Nyirandikubwimana_Vestine_222016483_GrpB_BIT</marquee> </p>
		</footer>
</body>
</html>
















