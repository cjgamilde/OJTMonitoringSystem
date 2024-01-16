<?php
session_start();
date_default_timezone_set('Asia/Manila');
$username= $_SESSION["username"];
include "../include/connection.php";
include "../include/session.php";

if(isset($_GET['view'])){
     $student_id = $_GET['view'];

      if (empty($_GET['view'])) {   
        echo "
              <script type = 'text/javascript'>
              window.location = 'student_list.php';
              </script>";
        exit();
    }

    $verify_name = "SELECT studentid FROM `studentinfo` WHERE studentid = '$student_id'";
    $query_name = mysqli_query($conn, $verify_name) or die(mysqli_error($conn));
    if (mysqli_num_rows($query_name) == 0) {
        echo "
              <script type = 'text/javascript'>
              window.location = 'student_list.php';
              </script>";
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <link rel="stylesheet" href="../src/css/studSettingsStyle.css">
     <title>Admin Page</title>
</head>
<body>
    

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-white sticky-top shadow">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-white align-items-center sticky-top">
                <a href="index.php" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                   <img src="../src/images/ntclogo.PNG" class="img-fluid" alt="...">
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-left justify-content-between w-100 px-3 align-items-left" style = " align-items:start; text-align: left;">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                           <i class="bi bi-house-fill fs-3"></i> DashBoard
                        </a>
                    </li>
                    <li>
                        <a href="student_list.php" class="nav-link py-3 px-2 active" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Student List">
                         <i class="bi bi-person-lines-fill fs-3"></i> Student List
                        </a>
                    </li>
                    <li>
                        <a href="announcement.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-megaphone-fill fs-3"></i> Announcement
                        </a>
                    </li>
                      <li>
                        <a href="register.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-person-fill-add fs-3"></i>Register
                        </a>
                    </li>
                    <li>
                        <a href="../include/logout.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-box-arrow-left fs-3" style = "padding-right:10px;"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
            <!-- content -->
          <div class="container-xxl">
            <h1>View Student</h1>
            <hr> 
            <form action="" method="post" enctype="multipart/form-data">
            <div class="profile-container ">
                  <?php

                                        $query = "SELECT * FROM `studentinfo` WHERE studentid = '$student_id'";
                                        $run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($run) > 0) {
                                            foreach ($run as $row) {
                                        ?>



                                        <div class="container text-center">
                                        <div class="row align-items-start">
                                           
                                            <div class="col-8">
                                            One of three columns
                                            </div>
                                            <div class="col">
                                            One of three columns
                                            </div>

                                            
                                        </div>
                                        </div>

                                        <div class="container text-center">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                One of three columns
                                                </div>
                                                <div class="col">
                                                One of three columns
                                                </div>
                                                
                                            </div>
                                            </div>

                                <div class="grid text-left" style="--bs-columns: 18; --bs-gap: .5rem;">
                                        <div style="grid-column: span 6;"> 
                                            <img src="../student/image/<?php echo$row['image'] ?> " class="img-fluid rounded-circle rounded shadow" style="width: 15rem; height:15rem;" alt="...">
                                        </div>
                                </div>


                        
                                                

                          


                    

 
            </div>




                        
                           <!-- <span class = "fw-bolder fs-5 "> <?php echo $row['email'] ?> </span>  
                          
                             <p class = "fw-bolder fs-5 lh-1" >  <?php echo $row['firstName']. " " . $row['middleName'] ." ". $row['lastName']  ?> </p>
                           <span class = "fw-bolder fs-5 "> <?php echo $row['email'] ?> </span>  
                         -->
                        
                    
            


             
      
                    <div class="pt-5">
                <div class="analytics-container  mb-5 " >
                        <h2>Personal Info</h2>
                        <div class="form-check form-switch">
                        </div>
                        <hr>
                    
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Last Name:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="last_name" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['lastName'] ?>" readonly>
                            </div>

                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Email:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="email" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['email'] ?>" readonly >
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">First Name:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="first_name" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['firstName'] ?>" readonly>
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">College:</label>
                            </div>
                            <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example" id="select" name="college" readonly>
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
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Middle Name:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="middle_name" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['middleName'] ?>" readonly>
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Year-Course:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="year_course" id="inputtext6" placeholder="4th Year-BSIT" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['yearProg'] ?>" readonly>
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Student No:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value="<?php echo $student_id ?>" readonly>
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">BirthDate:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="date" name="birth_date" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['birthDate'] ?>" readonly>
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Contact No:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="contact_no" id="inputtext6" class="form-control" aria-describedby="textHelpInline"value = "<?php echo $row['contactNum'] ?>" readonly >
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Gender:</label>
                            </div>
                            <div class="col-md-5">
                            <select class="form-select" aria-label="Default select example" id="select" name="gender" readonly>
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
                
                <form>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Company address</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                      <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Supervisor Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    
                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Contact Number</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">OJT Coordinator</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hours Required</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                     <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hired Date</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                      <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                   
                    
 <div class="text-center "> <input type="submit" class="btn btn-primary" name="submit" value="Submit" id="update"  >
                </form>

                            
                    

                
              
        

    </div>
    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>