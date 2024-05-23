<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/menustyle.css">
    <title>Virtual Estate Planning Workshop Platform</title>
    <style>
    	
.search-container {
    display: flex;
    align-items: center;
}

.search-input {
    padding: 8px;
    font-size: 14px;
    border: none;
    border-radius: 4px 0 0 4px;
}

.search-button {
    padding: 8px;
    background-color: green;
    font-size: 14px;
    border: none;
    border-radius: 0 4px 4px 0;
    cursor: pointer;
}

.search-button:hover {
    background-color: #ccc;
}
    </style>
</head>
<body>
    <header>
        <div class="menu_bar">
            <p class="logo">
                <img src="./images/log.jpg" style="border-radius: 12px;" alt="Website Logo" width="40" height="40" class="d-inline-block align-top">
                Virtual Estate <br>Planning<span>Workshop Platform.</span>
            </p>
            <ul>
                <li><a href="home.php">User Interface</a></li>
                <li><a href="#">Add</a>
                    <div class="dropdown_menu">
                        <ul>
                            <li><a href="instructor.php">Instructor</a></li>
                            <li><a href="attendee.php">Attendee</a></li>
                            <li><a href="workshop.php">Workshop</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">View Report</a>
                    <div class="dropdown_menu">
                        <ul>
                            <li><a href="viewattendee.php">Attendee</a></li>
                            <li><a href="viewernollment.php">Enrollment</a></li>
                            <li><a href="viewfeedback.php">Feedback</a></li>
                            <li><a href="viewinstructor.php">Instructor</a></li>
                            <li><a href="viewmaterial.php">Material</a></li>
                            <li><a href="viewpayment.php">Payment</a></li>
                            <li><a href="viewresource.php">Resource</a></li>
                            <li><a href="viewsession.php">Session</a></li>
                            <li><a href="viewworkshop.php">Workshop</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Setting</a>
                    <div class="dropdown_menu">
                        <ul>
                            <li><a href="account.php">New Account</a></li>
                            <li><a href="viewuser.php">All User</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="search-container">
                <input type="text" placeholder="Search..." class="search-input">
                <button class="search-button">Search</button>
            </div>
        </div>
    </header>
    <br><br>
    <main>
        <h1 style="color: black;">WELCOME TO ADMIN PAGE</h1>
        <img src="./images/any.jpg" width="50%">
    </main>
    <footer>
        <p style="color: white; text-align: center; margin-top: 50px; background-color: black; height: 40px; font-family: century; font-size: 24px;">
            <marquee>&copy; Copy_2024 &reg; Designed By Nyirandikubwimana_Vestine_222016483_GrpB_BIT</marquee>
        </p>
    </footer>
</body>
</html>
