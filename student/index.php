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
    <meta name="viewport" content="width=1024">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../src/css/student/studIndexStyle.css">
   
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>

   
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-white sticky-top shadow">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-white align-items-center sticky-top">
                <a href="index.php" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                   <img src="../src/images/ntclogo.PNG" class="img-fluid" alt="...">
                </a>
                        <h3>Student Portal</h3>
                        <br>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto justify-content-between w-100 px-3" style = "align-items:start; text-align:left;">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard" name="dashboard">
                           <i class="bi bi-house-fill fs-5"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="files.php" class="nav-link " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Student List">
                         <i class="bi bi-folder-fill fs-5"></i> Files
                        </a>
                    </li>
                    <li>
                        <a href="attendance.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-clock-fill fs-5"></i> Attendance
                        </a>
                    </li>
                    <li>
                        <a href="activity.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-list-ul fs-5"></i> Activity
                        </a>
                    </li>

                    <li>
                        <a href="settings.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-gear-fill fs-5"></i> Settings
                        </a>
                    </li>
                        <br>
                    <li>
                        <hr>
                        <a href="../include/logout.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-box-arrow-left fs-5" style = "padding-right:10px; "></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

 <div class="col-sm p-3 min-vh-100">
         <div class="container-xxl">
            <h1>DASHBOARD</h1>
            <hr> 
            <a class="btn btn-primary" role="button">Dashboard</a>
            <a class="btn btn-secondary" href="studProfile.php" role="button">Profile</a>

            <div class="row pt-2 g-2 text-center">
                <div class="col-2" style="width: 490px;">
                    <div class="card">
                        <div class="card-body">
                        <i class="bi bi-lightbulb fs-4"></i> <span style="font-size:1.5rem;">Announcement</span>
                        <hr> 
                            <div class="container" id="announcement"></div>
                        </div>
                    </div>
                </div>
                 <div class="col-2" style="width: 490px;">
                    <div class="card">
                        <div class="card-body">
                        <i class="bi bi-lightbulb fs-4"></i> <span style="font-size:1.5rem;">Student Status</span>
                        <hr> 
                                <h4>HTE STATUS:</h4>
                                <div class="container" id="status">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-3 w-80 mb-3 ">
                        <div class="card">
                            <div class="row g-03">
                                <h5 class="card-title pt-3 px-4">Attendance Report</h5>
                                    <div class="col-md-7">
                                        <canvas id="myDoughnutChart" ></canvas>
                                    </div>
                                <div class="col-md-5">
                                    <div class="card-body" >
                                        <i class="bi bi-dot align-middle" style = "color:black; font-size:2rem;"></i> <span>Total Hours:</span>  <span>9</span>
                                        <br>
                                        <i class="bi bi-dot align-middle" style = "color:black; font-size:2rem;"></i> <span>Total Hours to Complete:</span> <span>480 HRS</span>
                                    </div>
                                </div>     
                            </div>
                        </div>
                    


            
            
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


 <script>
        // Get the canvas context
        var ctx = document.getElementById('myDoughnutChart').getContext('2d');

        // Initial data for the chart
        var initialData = {
            labels: ['# Total of hours',' # Total of hours to complete'],
            datasets: [{
                data: [],
                backgroundColor: ["#FF6384", "#36A2EB",],
            }]
        };

        // Create the initial doughnut chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: initialData,
        });

        // Function to update the chart data
        function updateChartData() {
            // Fetch data from the PHP script using AJAX
            $.ajax({
                url: 'real_attendance.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Update the chart data
                    myDoughnutChart.data.datasets[0].data = [data.total,data.diff] ;
                    // Update the chart
                    myDoughnutChart.update();
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        // Update the chart data every 5 seconds (adjust as needed)
        setInterval(updateChartData, 1000);
    </script>

<script>
            $(document).ready(function() {
                function getData() {
                    $.ajax({
                        type: 'POST',
                        url: 'real_announcement.php',
                        success: function(data) {
                            $('#announcement').html(data);
                        }
                    });
                }
                getData();
                setInterval(function() {
                    getData();
                }, 1000); // it will refresh your data every 1 sec

            });
        </script>


<script>
            $(document).ready(function() {
                function getData() {
                    $.ajax({
                        type: 'POST',
                        url: 'real_status.php',
                        success: function(data) {
                            $('#status').html(data);
                        }
                    });
                }
                getData();
                setInterval(function() {
                    getData();
                }, 1000); // it will refresh your data every 1 sec

            });
        </script>

</body>
</html>