<?php 
session_start();
date_default_timezone_set('Asia/Manila');
include "../include/connection.php"
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studProfileStyle.css">
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
        <a href="index.php">
        <button class="Dash-button">My Dashboard</button></a>
        <button class="Profile-button" href="studProfile.php">Profile</button>
        <div class="profile-container">
            <input type="file" id="file" />
            <label for="file">Upload Photo</label>
        </div>
        <div class="analytics-container">
                <h2>Personal Info</h2>
             <p>This is a sample of attendance report</p> 

        </div>
       
    
    </div>


</body>
</html>