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
    <!-- bootsraplink -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="registerStyle.css">
    <title>Admin Page</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-light sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                <a href="index.php" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                   <img src="../src/images/ntclogo.PNG" class="img-thumbnail" alt="...">
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link py-3 px-2 active" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                           <i class="bi bi-house-fill fs-3"></i> DashBoard
                        </a>
                    </li>
                    <li>
                        <a href="student_list.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Student List">
                         <i class="bi bi-person-lines-fill fs-3"></i> Student List
                        </a>
                    </li>
                    <li>
                        <a href="announcement.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Announcement">
                           <i class="bi bi-megaphone-fill fs-3"></i> Announcement
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
            <!-- content -->
          <div class="container-xxl">
            <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-8">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-6 col-md-8 pt-3">
                                        <div class="numbers">
                                            <!-- total -->
                                                
                                            <canvas id="myChart"></canvas>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh"></i>
                                   Students
                                </div>
                            </div>
                        </div>
                    </div>



          </div>
        </div>
    </div>
</div>

<?php
$get_student = $conn->query("SELECT studentid,
    count(studentid) AS total_student,
    sum(case when gender = 'male' then 1 else 0 end) AS total_male,
     sum(case when gender = 'female' then 1 else 0 end) AS total_female
FROM studentinfo");

foreach($get_student as $data){
    $student_data[]=$data['total_student'];
    $male_data[] = $data['total_male'];
    $female_data[] = $data['total_female'];
  
}
?>


<a href = "../include/logout.php">Logout</a>
    <!-- javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- chartjs -->
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Total Of Student','Total of Male','Total of Female'],
      datasets: [{
        label: '# of Data', 
        data: [<?php echo json_encode($student_data) ?> , <?php echo json_encode($male_data) ?>,<?php echo json_encode($female_data) ?> ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

</body>
</html>