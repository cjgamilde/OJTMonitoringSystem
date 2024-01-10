<?php 
session_start();
date_default_timezone_set('Asia/Manila');
include "../include/connection.php"
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studAttendanceStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
       <img class="ntclogo" src="../src/ntclogo.png"></img>
       <h3>Student Portal</h3>
        <a name="dashboard" href="index.php">Dashboard</a>
        <a name="files" href="files.php">Files</a>
        <a name="attendance" href="attendance.php">Attendance</a>
        <a href="#Attendance">Progress</a>
        <a href="#Attendance">Activity</a>
        <!-- Add more links as needed -->
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>DASHBOARD</h2>
        <hr></hr>
        <button class="attendance-button">My Attendance</button>
        <a href="timesheet.php">
        <button class="timeSheet-button" href="timeSheet.php">Time Sheet</button></a>
        <div class="analytics-container">
                <h2>Attendance Analysis</h2>
                <hr></hr>
             <p>This is sample for attendance analytics.</p>
        </div>
        <div class="clockIn-container">
                <h2>clockin</h2>
             <p>this is sample for widget like clock in aayusin pa kasi sa right dapat to</p>
        </div>
    
    </div>
</body>
</html>