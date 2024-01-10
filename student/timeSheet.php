<?php 
session_start();
date_default_timezone_set('Asia/Manila');
include "../include/connection.php"
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studTimesheetStyle.css">
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
        <hr></hr><a href="attendance.php">
        <button class="attendance-button">My Attendance</button></a>
        <button class="timeSheet-button" href="timeSheet.php">Time Sheet</button>
        <div class="timesheet-container">
                <h2>Timesheets</h2>
                <hr></hr>
             <p>This is sample for sheets.</p>
        </div>

    
    </div>
</body>
</html>