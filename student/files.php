<?php 
session_start();
date_default_timezone_set('Asia/Manila');
include "../include/connection.php"
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studFilesStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
       <img class="ntclogo" src="../src/ntclogo.png"></img>
       <h3>Student Portal</h3>
        <a name="dashboard" href="index.php">Dashboard</a>
        <a name="files" href="files.php">Files</a>
        <a href="#Attendance">Attendance</a>
        <a href="#Attendance">Progress</a>
        <a href="#Attendance">Activity</a>
        <!-- Add more links as needed -->
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>FILES</h2>
        <hr></hr>
        <button class="Req-button">Requirements</button>
        <div class="reqlist-container">
                <h2>Requirements List</h2>
                <form action="/search" method="get">
                 <input type="text" name="query" placeholder="Search...">
                </form>
                <hr></hr>
                <div class="req-list1">
                    <a href="#MOA">Memorandum Of Agreement</a>
                    <h5>Example Date</h5>
                </div>
                <div class="req-list1">
                    <a href="#MOA">Memorandum Of Agreement</a>
                    <h5>Example Date</h5>
                </div>
                <div class="req-list1">
                    <a href="#MOA">Memorandum Of Agreement</a>
                    <h5>Example Date</h5>
                </div>
                <div class="req-list1">
                    <a href="#MOA">Memorandum Of Agreement</a>
                    <h5>Example Date</h5>
                </div>
                <div class="req-list1">
                    <a href="#MOA">Memorandum Of Agreement</a>
                    <h5>Example Date</h5>
                </div>
                     <p>This is a sample announcement message. Feel free to replace this text with your own announcement. Make sure to check our <a href="#">website</a> for more details.</p>
                </div>
    
    </div>
</body>
</html>