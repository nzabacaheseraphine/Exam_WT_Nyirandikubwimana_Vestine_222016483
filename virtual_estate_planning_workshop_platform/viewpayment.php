<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Estate Planning Workshop Platform</title>
    <!-- call bootstrap function -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <!--  call the function that help in Font icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Additional custom styles */
        body {
            background-image: url('./images/hw.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Century', sans-serif;
        }
        h2, h4 {
            font-weight: bold;
        }
        .btn-back {
            margin-left: 20px;
        }
        table{
            background-color: papayawhip;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-success">VIRTUAL ESTATE PLANNING WORKSHOP PLATFORM</h2>
        <h4 class="text-center text-primary mb-4">THIS IS A REPORT ABOUT PAYMENTS</h4>

                <p style="font-weight: bold; font-size:20px;">To Go on Admin page required to login as admin<a href="login.html" class="btn btn-primary" style="margin-top: 0px;">Admin Page</a></p>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home </a>
        <table class="table table-bordered mt-4">
            <thead class="bg-warning">
                <tr>
                    <th>Payment Id</th>
                    <th>User Id</th>
                    <th>Amount Paid</th>
                    <th>Payment Method</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "databaseconnection.php";
                $sql = "SELECT * FROM payment";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['payment_id']}</td>
                        <td>{$row['user_id']}</td> 
                        <td>{$row['amountpaid']}</td>
                        <td>{$row['paymentmethods']}</td>
                        <td>{$row['payment_date']}</td>
                        <td>
                            <a href='updatepayment.php?payment_id={$row['payment_id']}'  class='btn btn-info'><i class='fas fa-edit'></i></a>
                            <a href='deletepayment.php?payment_id={$row['payment_id']}' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
