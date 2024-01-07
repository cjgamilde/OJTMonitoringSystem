<?php 
session_start();
date_default_timezone_set('Asia/Manila');
include "../include/connection.php"
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studIndexStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
       <img class="ntclogo" src="../src/ntclogo.png"></img>
       <h3>Student Portal</h3>
        <a name="dashboard" href="index.php">Dashboard</a>
        <a href="files.php">Files</a>
        <a href="#Attendance">Attendance</a>
        <a href="#Attendance">Progress</a>
        <a href="#Attendance">Activity</a>
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