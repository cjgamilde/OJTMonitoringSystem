<?php 
session_start();
date_default_timezone_set('Asia/Manila');
include "../include/connection.php"
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/studActivityStyle.css">
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
        <!-- Add more links as needed -->
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Activity</h2>
        <hr></hr>
        <button class="activities-button">My Activities</button>
        <div class="actReport-container">
                <h2>Activity Report</h2>
                <form action="/search" method="get">
                 <input type="text" name="query" placeholder="Search...">
                </form>
                <hr></hr>
                
            </div>
    
    </div>
</body>
</html>