<?php
session_start();
$student_id = $_SESSION["username"];
date_default_timezone_set('Asia/Manila');
include "../include/connection.php";
include "../include/session.php";

if(isset($_GET['id'])){
     $id = $_GET['id'];

      if (empty($_GET['id'])) {   
        echo "
              <script type = 'text/javascript'>
              window.location = 'files.php';
              </script>";
        exit();
    }

    $verify_name = "SELECT id FROM `files` WHERE id = '$id'";
    $query_name = mysqli_query($conn, $verify_name) or die(mysqli_error($conn));
    if (mysqli_num_rows($query_name) == 0) {
        echo "
              <script type = 'text/javascript'>
              window.location = 'files.php';
              </script>";
        exit();
    }
}

?>


<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=1024">
     <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../src/css/student/studFilesStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
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
                    <li class="nav-item">
                        <a href="files.php" class="nav-link " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Student List" name="files">
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
                           <i class="bi bi-box-arrow-left fs-55" style = "padding-right:10px; "></i>Logout
                        </a>
                    </li>
                </ul>
             </div>
         </div>
        <div class="col-sm p-3 min-vh-100">
            <div class="container-xxl">
                <h1>FILES</h1>
                <hr> 
                <a class="btn btn-primary" role="button">Requirements</a>
            </div>
                    <div>
                    
                    <hr>
                    <div class="px-2" style="width:1000px;">
                    <form method="post" action="" enctype="multipart/form-data">
                        <h1 class="text-center">Submit your file</h1>

                        <br>
                       <label for="formFileLg" class="form-label">Choose your file</label>
                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="subfile" required>
                        <br>
                        <input class="btn"type="submit" value="SUBMIT" name="submit">
                    </form>
                    </div>
                </div>

        </div>

    </div>
</div>

   

       

    <!--script-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!--script-->
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $status = 2;
    $file_name = $_FILES['subfile']['name'];
   $file_tmp = $_FILES['subfile']['tmp_name'];

    $query = $conn->prepare("UPDATE `files` SET `subform`=?,`status`=? WHERE id =?");
    $query->bind_param("ssi",$file_name,$status,$id);   
    $query->execute();
    
    if(move_uploaded_file( $file_tmp, "files/" . $file_name)){
        echo "<script>alert('Succesfully submited the file')</script>";
         header('Location: files.php');
         exit();

    }
    else{
            echo "Error uploading file: " . $file_name . "<br>";
    }
}

?>