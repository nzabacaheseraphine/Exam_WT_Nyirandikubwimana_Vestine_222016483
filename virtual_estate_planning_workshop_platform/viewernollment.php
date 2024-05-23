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
        <h4 class="text-center text-primary mb-4">THIS IS  REPORT ABOUT ENROLLMENT</h4>

               <p style="font-weight: bold; font-size:20px;">To Go on Admin page required to login as admin<a href="login.html" class="btn btn-primary" style="margin-top: 0px;">Admin Page</a></p>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home </a>

        <table class="table table-bordered mt-4">
            <thead class="bg-warning">
                <tr>
                    <th>enrollment Id</th>
                    <th>User Id</th>
                    <th>Session Id</th>
                    <th>Status</th>
                    <th>enrollment Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "databaseconnection.php";
                $sql = "SELECT * FROM enrollment";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['enrollment_id']}</td>
                        <td>{$row['user_id']}</td> 
                        <td>{$row['session_id']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['enrollment_date']}</td>
                        <td>
                         <a href='updateenrollment.php?enrollment_id={$row['enrollment_id']}'  class='btn btn-info'><i class='fas fa-edit'></i></a>

                            <a href='deleteenrollment.php?enrollment_id={$row['enrollment_id']}' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                        </td>

                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional, for certain components that require JavaScript) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
