<?php
    session_start();
    date_default_timezone_set('Asia/Manila');
    include "./include/connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css">
    <title>OJT MONITORING SYSTEM</title>
</head>
<body>
    <form method="post" action="">

    <label name="welcome" > WELCOME! </label>
    <label name="logAs" for="type">Login as:</label>
    <select name="user_types" id="usertype">
    <optgroup label="Login type">
      <option value="1">Student</option>
      <option value="2">Admin</option>
      <option value="3">Faculty</option>
      <option value="4">Coordinator</option>
  </select>
  <br>
    <label name="username"> Username </label>
    <input type="text" name="username">
    <br>
    <label name="password"> Password </label>
    <input type="password" name="password">
    <br>
    <input type="submit" value="SUBMIT" name="submit">
    <a name="frgtpass" href="">Forgot Password?</a>
    </form>

    
</body>
</html>

<?php
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $usertype = $_POST["user_types"];
        $student = 1;
        $admin = 2;
        $faculty = 3; 
        $coordinator = 4;

        if ($usertype == 1 ){
          $sel_student = $conn ->prepare("SELECT `username`, `password`, `usertype` FROM `users` WHERE username = ? AND usertype = ? ");

          if($sel_student){
            $sel_student->bind_param("si", $username,$student);
            $sel_student->execute();
            $sel_student->bind_result($username,$hashedpassword,$db_usertype);
            $sel_student->store_result();
            $sel_student->fetch();

            if(password_verify($password,$hashedpassword))
            {
                $_SESSION["username"] = $username;


                //student page
             echo "<script>window.location.href='student/index.php'</script>";


            }
            else{

              echo "<script>alert('Invalid Credential');</script>";

            }

          }

          else{
            echo "<script>alert('Invalid User');</script>";

          }

        }

      


        // $insert = $conn ->prepare("SELECT `username`, `password`, `usertype` FROM `users` WHERE username = ? AND usertype =?");
        // if ($insert){
        //     $insert->bind_param("s", $username);
        //     $insert->execute();
        //     $insert->bind_result($username, $hashedpassword, $db_usertype);
        //     $insert->store_result();
        //     $insert->fetch();
        //     $insert->close();
            // echo "<script>alert('Registered');</script>";
          //  echo "<script>window.location.href='login.php'</script>";
        }
    // }

?>