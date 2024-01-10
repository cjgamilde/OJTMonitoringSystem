<?

  if ($usertype == 4 ){
          $sel_coordinator = $conn ->prepare("SELECT `username`, `password`, `usertype` FROM `users` WHERE username = ? AND usertype = ? ");

          if($sel_coordinator){
            $sel_coordinator->bind_param("si", $username,$coordinator);
            $sel_coordinator->execute();
            $sel_coordinator->bind_result($username,$hashedpassword,$db_usertype);
            $sel_coordinator->store_result();
            $sel_coordinator->fetch();

            if($usertype == $db_usertype){

                if(password_verify($password,$hashedpassword))
             {
                $_SESSION["username"] = $username;


                //coordinator page
             echo "<script>window.location.href='coordinator/index.php'</script>";


              }
              else{

                echo "<script>alert('Invalid Credential');</script>";

              }

              }

            else{
                  echo "<script>alert('Invalid Users');</script>";
              }

          }

        }
?>