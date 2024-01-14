<?php 
session_start();
date_default_timezone_set('Asia/Manila');
$student_id = $_SESSION["username"];
include "../include/connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registerStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>
    <!-- <form method="post" action="">

    <label name="welcome" > WELCOME! </label>
    <label name="regAs" for="type">Register as:</label>
    <select name="user_types" id="usertype">
    <optgroup label="Login type">
      <option value="1">Student</option>
      <option value="2">Admin</option>
      <option value="3">Faculty</option>
      <option value="4">Coordinator</option>
  </select>
  <br>
    <label name="username"> Username </label>
    <input type="text" name="username" required>
    <br>
    <label name="password"> Password </label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="SUBMIT" name="submit">
    </form> -->

    
</body>
</html>



<?php
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $usertype = $_POST["user_types"];
        

$last_name =null;
$first_name =null;
$middle_name =null;
$contact_number =null;
$email =null;
$college =null;
$year_course =null;
$birth_date =null;
$gender =null; 
$date_created = null;

        $result = $conn ->prepare("SELECT count(*) FROM users WHERE username=?");
        if($result){
            $result->bind_param("s", $username);
            $result->execute(); 
            $result->bind_result($validation);
            $result->fetch();
            $result->close();
            if ($validation > 0){
                echo "<script>alert('Username is already exist');</script>";
            }
            else{
                $insert = $conn ->prepare("INSERT INTO `users`(`username`, `password`, `usertype`) VALUES (?,?,?)");
                if ($insert){
                    $insert->bind_param("ssi", $username, $hashedpassword,$usertype);
                    $insert->execute();
                    echo "<script>alert('Registered');</script>";
                  //  echo "<script>window.location.href='login.php'</script>";
                    $insert->close();
                }
            }
        }

        if($usertype == 1){
           $insert_student = $conn->prepare("INSERT INTO `studentinfo`( `studentid`,`lastName`, `firstName`, `middleName`, `contactNum`, `email`, `college`, `yearProg`, `birthDate`, `gender`, `dateTimeCreated`) 
           VALUES (?,?,?,?,?,?,?,?,?,?,?)");
           if($insert_student){
            $insert_student->bind_param("isssissssss",$username,$last_name,$first_name,$middle_name,$contact_number,$email,$college,$year_course,$birth_date,$gender,$date_created);
            $insert_student->execute();
           }
        }
    }
    
    
?>