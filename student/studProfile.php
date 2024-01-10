<?php 
session_start();
date_default_timezone_set('Asia/Manila');
$student_id = $_SESSION["username"];
include "../include/connection.php"
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootsrap link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <link rel="stylesheet" href="../src/css/studProfileStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
       <img class="ntclogo" src="../src/images/ntclogo.png"></img>
       <h3>Student Portal</h3>
       
        <a  name="dashboard" href="index.php"> <i class="bi bi-house-fill">Dashboard</i></a>
        <a name="files" href="files.php">Files</a>
        <a name="attendance" href="attendance.php">Attendance</a>
        <a href="#Attendance">Progress</a>
        <a href="#Attendance">Activity</a>

        <!-- Add more links as needed -->
    </div>

    <!-- Main Content -->
    <div class="content container-xxl">
        <h2>DASHBOARD</h2>
        <hr></hr>
        <a href="index.php">
        <button class="Dash-button">My Dashboard</button></a>
        <button class="Profile-button" href="studProfile.php">Profile</button>
         <form >
        <div class="profile-container">
            <input type="file" id="file" />
            <label for="file">Upload Photo</label>
        </div>
        <div class="analytics-container mb-5">
                <h2>Personal Info</h2>
                <hr>
               
            <div class="row g-3 align-items-center">
               
                    <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">Last Name:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>

                     <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">Email:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>
                     <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">First Name:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>
                    <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">College:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>
                    <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">Middle Name:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>
                    <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">Year-Course:</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>
                    <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">Student No:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>
                    <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">BirthDate:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>
                    <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">Contact No:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>
                    <div class="col-auto">
                        <label for="inputtext6" class="col-form-label">Gender:</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline">
                    </div>
            </div>
            </form>
        </div>

         <div class="analytics-container">
                <h2>Practicum Info:</h2>
                <hr>
                <form>
            <div class="row g-3 align-items-center">
                <div class="form-control">
                    
                </div>
               
            </div>
            </form>
    </div>
       
    
    </div>
<!-- bootsrap link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>