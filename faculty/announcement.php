<?php
session_start();
date_default_timezone_set('Asia/Manila');
$student_id = $_SESSION["username"];
include "../include/connection.php";
include "../include/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../src/css/admin/announcement.css">
    <title>FACULTY</title>
</head>
<body>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-white sticky-top shadow">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-white align-items-center sticky-top">
                <a href="index.php" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                   <img src="../src/images/ntclogo.PNG" class="img-fluid" alt="...">
                </a>
                <h3> Faculty Portal</h3>
                            <br>
                    <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto justify-content-between w-100 px-3" style = "align-items:start; text-align:left;">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard" name="dashboard">
                            <i class="bi bi-house-fill fs-3"></i> DashBoard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="student_list.php" class="nav-link " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Student List" name="studentlist">
                            <i class="bi bi-person-lines-fill fs-3"></i> Student List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="announcement.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement" name="announcement">
                            <i class="bi bi-megaphone-fill fs-3"></i> Announcement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="settings.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement" name="settings">
                            <i class="bi bi-gear-fill fs-3"></i> Settings
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
            <!-- content -->
          <div class="container-xxl">
            <h1>Announcement</h1>
            <hr> 
              <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" role="button"> Create Announcement</a>
           


          </div>
        </div>



         <!-- modal -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Announcement</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
    <form action= "" method = "POST">
     <div class="mb-3">
        <label for="message-text" class="col-form-label">Content:</label>
         <textarea class="form-control" placeholder="Enter your contents Here" id="message-text" name="content" required></textarea>
         </div>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 <input type="submit" class="btn btn-primary" name="submit" value="Announce!">
         </form>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])){

    $content = $_POST['content'];
$date_created = date('Y-m-d H:i:s');
$date_updated = date('Y-m-d H:i:s');

$stmt = $conn->prepare("INSERT INTO `announcement`(`description`, `date_time_created`, `date_time_updated`) 
                        VALUES (?,?,?)");

if($stmt){
$stmt->bind_param("sss",$content,$date_created,$date_updated);
$stmt->execute();
 echo "<script>alert('Sucessfully announce');</script>";

}




}



?> 