<?php 
use PhpParser\Node\Expr\Isset_;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--<link rel="stylesheet" href="../src/css/studProfileStyle.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../src/css/studSettingsStyle.css">
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
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link py-3 px-2 " title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
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
                        <a href="settings.php" class="nav-link" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement" name="settings">
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
            <h1>Settings</h1>
            <hr> 
            <a class="btn btn-primary" role="button">Personal Information</a>
            <a class="btn btn-secondary"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" role="button"> Change Password</a>
            <form action="" method="post" enctype="multipart/form-data" name="form">
            <div class="profile-container ">

            
                  <?php

                                        $query = "SELECT * FROM `studentinfo` WHERE studentid = '$student_id'";
                                        $run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($run) > 0) {
                                            foreach ($run as $row) {
                                        ?>

               

                <div class="container text-center">
                    <div class="row align-items-start">
                        <div class="col-4"> 
                            <img src="./image/<?php echo$row['image'] ?> " class="img-fluid rounded-circle rounded" style="width: 15rem; height:15rem;" alt="...">
                             <input type="hidden" name="old_image" value="<?php echo $row['image'] ?>">
                        </div>
                        
                    </div>
                </div>
           



             
        </div>
        
                    <div class="pt-5">
                <div class="analytics-container  mb-5 " >
                        <h2>Personal Info</h2>
                        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" onchange="document.getElementById('update').disabled = !this.checked;" >
            <label class="form-check-label" for="flexSwitchCheckDefault">Click to enable edit </label>
                        </div>
                        <hr>
                    
                    <div class="row g-3 align-items-center">
                        
                   <label for="file">Upload Photo</label>
                    
                          <input type="file" id="file" name="image" accept="image/png, image/jpg, image/jpeg" />
           
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Last Name:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="last_name" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['lastName'] ?>">
                            </div>

                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Email:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="email" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['email'] ?>" >
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">First Name:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="first_name" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['firstName'] ?>">
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">College:</label>
                            </div>
                            <div class="col-md-4">
                            <select class="form-select" aria-label="Default select example" id="select" name="college">
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
                                <input type="text" name="middle_name" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['middleName'] ?>">
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Year-Course:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="year_course" id="inputtext6" placeholder="4th Year-BSIT" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['yearProg'] ?>">
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
                                <input type="date" name="birth_date" id="inputtext6" class="form-control" aria-describedby="textHelpInline" value = "<?php echo $row['birthDate'] ?>">
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Contact No:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="contact_no" id="inputtext6" class="form-control" aria-describedby="textHelpInline"value = "<?php echo $row['contactNum'] ?>" >
                            </div>
                            <div class="col-auto">
                                <label for="inputtext6" class="col-form-label">Gender:</label>
                            </div>
                            <div class="col-md-5">
                            <select class="form-select" aria-label="Default select example" id="select" name="gender">
                                                    <?php if ($row['gender'] == 'Male') : ?>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    <?php else : ?>
                                                        <option value="Female">Female</option>
                                                        <option value="Male">Male</option>
                                                    <?php endif; ?>
                                                </select>
                            </div>
                            <div class="text-center "> <input type="submit" class="btn btn-primary" name="submit" value="Submit" id="update" disabled >
                        </div>
                    </div>
                    </form>

                    <?php
                                            }
                                        }
        ?>
                
         </div>
          </div>

    </div>

    <!-- modal -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Confirm</button>
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
$last_name = $_POST["last_name"];
$first_name = $_POST["first_name"];
$middle_name = $_POST["middle_name"];
$contact_number = $_POST["contact_no"];
$email = $_POST["email"];
$college = $_POST["college"];
$year_course = $_POST["year_course"];
$birth_date = DateTime::createFromFormat('Y-m-d', $_POST['birth_date'])->format('Y-m-d');
$gender = $_POST["gender"]; 

$date_created = date('Y-m-d H:i:s');
$date_updated = date('Y-m-d H:i:s');

    $new_image = $_FILES['image']['name'];
    $new_image_tmp = $_FILES['image']['tmp_name'];

    $old_image = $_POST['old_image'];

    

 $result = $conn ->prepare("SELECT count(*) FROM studentinfo WHERE studentid =?");
        if($result){
            $result->bind_param("s", $student_id);
            $result->execute(); 
            $result->bind_result($validation);
            $result->fetch();
            $result->close();
            if ($validation > 0){
                // update
                   if ($new_image != '') {
                            $update_filename = $_FILES['image']['name'];
                            $update_filename_tmp = $_FILES['image']['tmp_name'];
                        } else {
                            $update_filename = $old_image;
                        } 
                             
                        
                    if(empty($new_image)){
                        $run_update = $conn->prepare("UPDATE `studentinfo` SET `lastName`=?,`firstName`=?,`middleName`=?,`contactNum`=?,`email`=?,`college`=?,`yearProg`=?,`birthDate`=?,`gender`=?,`dateTimeUpdated`=? WHERE `studentid` = ?");

                          if($run_update){
                            $run_update->bind_param("sssissssssi",$last_name,$first_name,$middle_name,$contact_number,$email,$college,$year_course,$birth_date,$gender,$date_updated,$student_id);
                            $run_update->execute();
                            echo "<script>alert('Sucessfully Updated');</script>";
                              header('Location: settings.php');
                              $run_update->close();
                                        exit;
                            }
                        

                    }
                    else{
                        $run_update_image = $conn->prepare("UPDATE `studentinfo` SET `image`=?, `lastName`=?,`firstName`=?,`middleName`=?,`contactNum`=?,`email`=?,`college`=?,`yearProg`=?,`birthDate`=?,`gender`=?,`dateTimeUpdated`=? WHERE `studentid` = ?");
                        $run_update_image->bind_param("ssssissssssi",$update_filename,$last_name,$first_name,$middle_name,$contact_number,$email,$college,$year_course,$birth_date,$gender,$date_updated,$student_id);
                        
                        if(isset($_FILES['image'])){
                            if($_FILES['image']['size'] > 5242880) { 
                                echo "<script>alert('The file must be 5mb below');</script>";
                                }

                                else{

                                    if(empty($old_image)){
                                         $run_update_image->execute();
                                        echo "<script>alert('Sucessfully Updated');</script>";
                                        header('Location: settings.php');
                                        $run_update_image->close();
                                        exit;


                                    }

                                    if(!empty($old_image)){
                                        unlink("image/" . $old_image);
                                        move_uploaded_file($update_filename_tmp, "image/" .  $update_filename);
                                        $run_update_image->execute();
                                        echo "<script>alert('Sucessfully Updated');</script>";
                                        header('Location: settings.php');
                                        $run_update_image->close();
                                        exit;
                                    }

                                   

                                    
                                    
                                        
                                     
                                
                                    
                                }

                        }
                       
                    }
                
                
            }
            else{
                // insert

                if(isset($_FILES['image'])){
                     if($_FILES['image']['size'] > 5242880) { 
                     echo "<script>alert('The file must be 5mb below');</script>";
                }
                else{
                    
                $insert = $conn->prepare("INSERT INTO `studentinfo`(`studentid`, `image`, `lastName`, `firstName`, `middleName`, `contactNum`, `email`, `college`, `yearProg`, `birthDate`, `gender`, `dateTimeCreated`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                if ($insert){
                    $insert->bind_param("issssissssss",$student_id,$new_image,$last_name,$first_name,$middle_name,$contact_number,$email,$college,$year_course,$birth_date,$gender,$date_created);
                    if($insert->execute())
                    {
                         if (move_uploaded_file($new_image_tmp, "image/" . $new_image)){
                                 echo "<script>alert('Submited');</script>";
                                   header('Location: settings.php');
                                        exit;
                         }
                    }
                   
                 
                    $insert->close();
                }
                }


            }

}
        }
}

ob_end_flush();
?>