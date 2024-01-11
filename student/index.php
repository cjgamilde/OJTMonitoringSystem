<?php 
session_start();
$student_id = $_SESSION["username"];
date_default_timezone_set('Asia/Manila');
include "../include/connection.php";
include "../include/session.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/studIndexStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
       <img class="ntclogo" src="../src/images/ntclogo.png"></img>
       <h3>Student Portal</h3>
        <a name="dashboard" href="index.php">Dashboard</a>
        <a name="files" href="files.php">Files</a>
        <a name="attendance" href="attendance.php">Attendance</a>
        <a href="#Attendance">Progress</a>
        <a name="activity" href="activity.php">Activity</a>

        <hr></hr>
        <a name="logout" href="../include/logout.php">Logout</a>
        <!-- Add more links as needed -->
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>DASHBOARD</h2>
        <hr></hr>
        <button class="Dash-button">My Dashboard</button>
        <a href="studProfile.php">
        <button class="Profile-button" href="studProfile.php">Profile</button></a>
        <div class="announcement-container">
                <h2>Important Announcement</h2>
             <p>This is a sample announcement message. Feel free to replace this text with your own announcement. Make sure to check our <a href="#">website</a> for more details.</p>
        </div>
        <div class="analytics-container">
                <h2>Attendance Report</h2>
             <p>This is a sample of attendance report</p>
        </div>
    
    </div>
</body>
</html>