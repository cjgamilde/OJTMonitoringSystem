<?php 
session_start();
$student_id = $_SESSION["username"];
date_default_timezone_set('Asia/Manila');
include "../include/connection.php";
include "../include/session.php";


/*function $insert_activity($conn,$username){

    $date =null;
    $file =null;
    $hours =null;
    $date_created = date('Y-m-d H:i:s');
    
          $insert_activity = $conn->prepare("INSERT INTO `studentinfo`( `date`, `file`, `hours`, `dateTimeCreated`) 
                        VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                        if($insert_activity){
                            $insert_activity->bind_param("ssis",$date,$file,$hours,$date_created);
                            $insert_activity->execute();
               }
    
    
    
    }*/
?>
<html lang="en">
<head>
<meta name="viewport" content="width=1024">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../src/css/student/studActivityStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>

<!--sidebar-->
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
                           <i class="bi bi-house-fill fs-5"></i> DashBoard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="files.php" class="nav-link " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Student List" name="files">
                         <i class="bi bi-folder-fill fs-5"></i> Files
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="attendance.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement" name="attendance">
                           <i class="bi bi-clock-fill fs-5"></i> Attendance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="activity.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement" name="activity">
                           <i class="bi bi-list-ul fs-5"></i> Activity
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="settings.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-gear-fill fs-5"></i> Settings
                        </a>
                    </li>
                        <br>
                    <li>
                        <hr>
                        <a href="../include/logout.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-box-arrow-left fs-55" style = "padding-right:10px; "></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
            <div class="container-xxl">
                <h1>ACTIVITY</h1>
                <hr> 
                <a class="btn btn-primary" role="button">My Activities</a>
                    <div class="row pt-3">
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title"> Activities </h4>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Send Files
                                </button>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>Date</th>
                                            <th>Details</th>
                                            <th>Hours</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

            </div>
        </div>

   <!--MODAL-->
   <!-- modal -->

   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Insert a file</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                             <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Select Date </label>
                                <input class="form-control" type="date" name="date" id="formFileMultiple" multiple required>
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Please Input Files </label>
                                <input class="form-control" type="file" name="files[]" id="formFileMultiple" accept=".doc,.docx,.pdf,.jpeg,.jpg,.jpg" multiple required>
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Hours </label>
                                <input class="form-control" type="number" name="hours" id="hours" multiple required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Details/Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-secondary" name="save" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--end of modal-->

                <?php
            if(isset($_POST['submit'])){

                $content = $_POST['content'];
            $date_created = date('Y-m-d H:i:s');
            $date_updated = date('Y-m-d H:i:s');

            $stmt = $conn->prepare("INSERT INTO `activity`(`date`, `file`, `hours`,`date_time_created`, `date_time_updated`) 
                                    VALUES (?,?,?,?,?)");

            if($stmt){
            $stmt->bind_param("ssiss",$content,$date_created,$date_updated);
            $stmt->execute();
            echo "<script>alert('Sucessfully created');</script>";

            }




            }



            ?> 

    <!--script-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>