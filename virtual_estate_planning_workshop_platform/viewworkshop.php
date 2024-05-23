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
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS IS REPORT ABOUT INSTRUCTOR IN OUR SYSTEM</h4>
        <a href="workshop.php" class="btn btn-primary" style="margin-top: 0px;">New Workshop</a>
        <a href="menuadmin.php" class="btn btn-secondary" style="margin-left: 1000px;">Go Back </a>
        <table class="table table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th>Workshop Id</th>
                    <th>User Id</th>
                    <th>Workshop Name</th>
                    <th>Description</th>
                    <th>Date Time</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "databaseconnection.php";
                $sql = "SELECT * FROM workshop";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['workshop_id']}</td> 
                        <td>{$row['user_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['date_time']}</td>
                            <td>
                            <a href='updateworkshop.php?workshop_id={$row['workshop_id']}'  class='btn btn-info'><i class='fas fa-edit'></i></a>
                            </td>
                            <td>
                            <a href='deleteworkshop.php?workshop_id={$row['workshop_id']}' class='btn btn-danger'><i class='fas fa-trash'></i></a>
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
