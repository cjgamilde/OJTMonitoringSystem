<?php
    session_start();
    $student_id = $_SESSION["username"];
    include('../include/connection.php');
    include('../include/session.php');
date_default_timezone_set('Asia/Manila');


 $query = 'SELECT * FROM `studentinfo`
LEFT JOIN status ON studentinfo.status = status.id 
WHERE studentinfo.studentid = ? ';
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $num_of_rows = $result->num_rows;
    $row = $result->fetch_assoc();
    if($num_of_rows > 0){
       if($row['id'] == 1){
        echo '<span class="badge rounded-pill text-bg-secondary">'.$row['status'].'</span>';

       }

        if($row['id'] == 2){
        echo '<span class="badge rounded-pill text-bg-danger">'.$row['status'].'</span>';

       }

        if($row['id'] == 3){
        echo '<span class="badge rounded-pill text-bg-danger">'.$row['status'].'</span>';

       }

       if($row['id'] == 4){
        echo '<span class="badge rounded-pill text-bg-success">'.$row['status'].'</span>';

       }

        if($row['id'] == 5){
        echo '<span class="badge rounded-pill text-bg-info">'.$row['status'].'</span>';

       }

        if($row['id'] == 6){
        echo '<span class="badge rounded-pill text-bg-success">'.$row['status'].'</span>';

       }
       
       
    }
    else{
     echo '<span class="badge rounded-pill text-bg-secondary">'.$row['status'].'</span>';
    }
   
?>