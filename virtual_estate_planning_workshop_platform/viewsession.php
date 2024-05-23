<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Virtual Estate Planning Workshop Platform</title>
    <!-- here we use bootstrap inorder to make good apperance of this table-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!--  call the function that help in Font icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
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
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold; color: green;">VIRTUAL ESTATE PLANNING WORKSHOP PLATFORM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS IS REPORT ABOUT SESSION IN OUR SYSTEM</h4>
              <p style="font-weight: bold; font-size:20px;">To Go on Admin page required to login as admin<a href="login.html" class="btn btn-primary" style="margin-top: 0px;">Admin Page</a></p>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home </a>
        <table class="table table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th>Session Id</th>
                    <th>Workshop Id</th>
                    <th>Topic</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Upload Time</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "databaseconnection.php";
                $sql = "SELECT * FROM session";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['session_id']}</td>
                        <td>{$row['workshop_id']}</td> 
                        <td>{$row['topic']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['duration']}</td>
                        <td>{$row['uploaded_time']}</td>
                         <td>
                            <a href='updatesession.php?session_id={$row['session_id']}'  class='btn btn-info'><i class='fas fa-edit'></i></a>
                            </td>
                            <td>
                            <a href='deletesession.php?session_id={$row['session_id']}' class='btn btn-danger'><i class='fas fa-trash'></i></a>
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
