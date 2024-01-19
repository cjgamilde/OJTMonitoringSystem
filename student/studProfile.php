<?php 
ob_start();
session_start();
$student_id = $_SESSION["username"];
date_default_timezone_set('Asia/Manila');
include "../include/connection.php";
include "../include/session.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=1024">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../src/css/student/studProfileStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>

<div class="container-fluid">
    <div class="row" >
        <div class="col-sm-auto bg-white sticky-top shadow">
            <div class=" d-flex flex-sm-column flex-row flex-nowrap bg-white align-items-center sticky-top">
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

                    <li class="nav-item">
                        <a href="settings.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement" >
                           <i class="bi bi-gear-fill fs-5"></i> Settings
                        </a>
                    </li>
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
            <h1>PROFILE</h1>
            <hr> 
            <a class="btn btn-primary" role="button" href="index.php" >DashBoard</a>
            <a class="btn btn-secondary" role="button" >Profile</a>
            <form action="" method="post" enctype="multipart/form-data" name="form">
            <div class="profile-container ">

                    
                        <?php

                                                $query = "SELECT * FROM `studentinfo` WHERE studentid = '$student_id'";
                                                $run = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($run) > 0) {
                                                    foreach ($run as $row) {
                                                ?>

                    

                        <div class="container text-center">
                            <div class="row justify content-start">
                                <div class="col-3"> 
                                    <img src="./image/<?php echo$row['image'] ?> " class="img-fluid rounded-circle rounded" style="width: 10rem; height:10rem;" alt="...">           
                                </div>
                                <div class="col-5">   
                                    <div class="labels"> 
                                                <label type="text" name="name" id="inputtext6" ><?php echo $row['lastName']?>, <?php echo $row['firstName']?> <?php echo $row['middleName']?></label><br>
                                                <label type="text" name="studentId" id="inputtext6" ><?php echo $row['studentid']?></label> <br>
                                                <label type="text" name="yearProg" id="inputtext6" ><?php echo $row['yearProg']?></label>       
                                    </div>                 
                                </div>
                                <div class="col-4">   
                                    <div class="labels2">
                                        <br>
                                        <i class="bi bi-envelope-at-fill"> </i> <label type="text" name="email" id="inputtext6" ><?php echo $row['email']?></label> <br>
                                        <i class="bi bi-telephone-fill"> </i>   <label type="text" name="contact_no" id="inputtext6" ><?php echo $row['contactNum']?></label>       

                                    </div>  
                                                
                                </div>
                                                        
                            </div>
                        </div>
             
                </div>
        
                    <div class="pt-5">
                <div class="analytics-container  mb-5 " >
                        <h2>Personal Info</h2>
                        <hr>
                    
                    <div class="row g-3 align-items-center">
                        

           
                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">Last Name:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="last_name" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['lastName'] ?>" disabled>
                            </div>

                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">Email:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="email" name="email" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['email'] ?>" disabled >
                            </div>
                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">First Name:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="first_name" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['firstName'] ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">College:</label>
                            </div>
                            <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example" id="select" name="college" disabled>
                                                    <?php if ($row['college'] == 'SOAST') : ?>
                                                        <option value="SOAST">SOAST</option>
                                                        <option value="SOB">SOB</option>
                                                        <option value="SOTE">SOTE</option>
                                                    <?php elseif($row['college'] == 'SOB') : ?>
                                                        <option value="SOB">SOB</option>
                                                        <option value="SOAST">SOAST</option>
                                                        <option value="SOTE">SOTE</option>
                                                    <?php else : ?>
                                                        <option value="SOTE">SOTE</option>
                                                        <option value="SOAST">SOAST</option>
                                                        <option value="SOB">SOB</option>
                                                    <?php endif; ?>
                                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">Middle Name:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="middle_name" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['middleName'] ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">Year-Course:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="year_course" id="inputtext6" placeholder="4th Year-BSIT" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['yearProg'] ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">Student No:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value="<?php echo $student_id ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">BirthDate:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="birth_date" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['birthDate'] ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">Contact No:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="contact_no" id="inputtext6" class="form-control" aria-describedby="textHelpInline"value = "<?php echo $row['contactNum'] ?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="inputtext6" class="col-form-label">Gender:</label>
                            </div>
                            <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example" id="select" name="gender" disabled>
                                                    <?php if ($row['gender'] == 'Male') : ?>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    <?php else : ?>
                                                        <option value="Female">Female</option>
                                                        <option value="Male">Male</option>
                                                    <?php endif; ?>
                                                </select>
                            </div>
                        </div>
                    </div>
                    </form>

                    <?php
                                            }
                                        }
        ?>
                
         </div>
        
           

        

          <div class="analytics-container  mb-5 " >
                        <h2> Practicum info</h2>
                        <div class="form-check form-switch">
                        </div>
                        <hr>
                 <?php
                                $query = 'SELECT `company`, `compAddress`, `department`, `supervisorName`, `position`, `email`, `contactNum`, `ojtCoordinator`, `practicumHrsreq`, `hiredDate`, `startDate` FROM `practicuminfo` 
                                        WHERE studentid = ?';
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param('s', $student_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $data = $result->fetch_all(MYSQLI_ASSOC);
                                foreach ($data as $rows) {
                              

                                ?>
                <form action = "" method="post">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="<?php echo $rows['company']?>" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Company address</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="<?php echo $rows['compAddress'] ?>" >
                        </div>
                    </div>

                      <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="<?php echo $rows['department'] ?>">
                        </div>
                    </div>

                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Supervisor Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="<?php echo $rows['supervisorName'] ?>" >
                        </div>
                    </div>

                    
                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3"value="<?php echo $rows['position'] ?>" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="<?php echo $rows['email'] ?>">
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Number</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputEmail3" value="<?php echo $rows['contactNum'] ?>">
                        </div>
                    </div>

                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">OJT Coordinator</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputEmail3" value="<?php echo $rows['ojtCoordinator'] ?>">
                        </div>
                    </div>

                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hours Required</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputEmail3" value="<?php echo $rows['practicumHrsreq'] ?>" >
                        </div>
                    </div>

                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hired Date</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputEmail3" value="<?php echo $rows['hiredDate'] ?>">
                        </div>
                    </div>

                      <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputEmail3" value="<?php echo $rows['startDate'] ?>">
                        </div>
                    </div>
                   
                </form>

   <?php
                                }
   ?>

          </div>

    </div>

 
    
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
