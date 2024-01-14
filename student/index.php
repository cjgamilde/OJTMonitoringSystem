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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../src/css/studIndexStyle.css">
   
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
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard" name="dashboard">
                           <i class="bi bi-house-fill fs-5"></i> DashBoard
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
            <a class="btn" href="#" role="button">Dashboard</a>
            <a class="btn btn-secondary" href="#" role="button">Profile</a>

            <div class="pt-5 w-75 mb-3">
                <div class="card">
                    <div class="card-body">
                    <i class="bi bi-lightbulb fs-4"></i> <span style="font-size:1.5rem;">Announcement</span> 
                        <div class="container" id="announcement"></div>
                    </div>
                </div>
            </div>

            <div class="pt-5 w-75 mb-3 ">
                <div class="card">
                <div class="row g-03">
                    <h5 class="card-title pt-3 px-4">Attendance Report</h5>
                        <div class="col-md-7">
                            <canvas id="myChart"></canvas>
                        </div>
                    <div class="col-md-3">
                        <div class="card-body" >
                    
                            <i class="bi bi-dot align-middle" style = "color:blue; font-size:2.5rem;"></i> <span>Working</span>  <span>9</span>
                            <i class="bi bi-dot align-middle" style = "color:blue; font-size:2.5rem;"></i> <span>Required</span> <span>10</span>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <p class="border border-primary rounded-pill">2.0 Tardy</p>
                            <p class="border border-danger rounded-pill">1 Absent</p>

                        </div>
                       
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
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Working','Required'],
      datasets: [{
        label: '# of Data', 
        data: [91,400],
        borderWidth: 1
      }]
    },
    options: {
        aspectRatio: 3.5,
     
    }
  });
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

</body>
</html>