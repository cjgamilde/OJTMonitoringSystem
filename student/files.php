<?php 
session_start();
$student_id = $_SESSION["username"];
date_default_timezone_set('Asia/Manila');
include "../include/connection.php";
include "../include/session.php";

// change status

        $submission = date('Y-m-d');
        $updated_status = 6;

       

        $late_query = $conn->prepare("SELECT `submissionDeadline`,`status` FROM `files` WHERE studentid = ?");

          $late_query->bind_param("i",$student_id);
            $late_query->execute();
            $late_query->bind_result($deadline,$status);
            $late_query->store_result();
            $late_query->fetch();

            

            if($deadline == $submission){

                $stat_pending = 1;
                $stat_retruned = 4;
                $stat_assigned = 5;

                if($status == 1){
                    $update_status = $conn->prepare("UPDATE `files` SET `status`=? WHERE studentid = ? AND status=? AND status =? AND status=? ");
                $update_status->bind_param("sisss",$updated_status,$student_id,$stat_pending, $stat_retruned,$stat_assigned);
                $update_status->execute();
                
                }

                if($status == 4){
                    $update_status = $conn->prepare("UPDATE `files` SET `status`=? WHERE studentid = ? AND status=? AND status =? AND status=? ");
                $update_status->bind_param("sisss",$updated_status,$student_id,$stat_pending, $stat_retruned,$stat_assigned);
                $update_status->execute();
                
                }

                   if($status == 5){
                    $update_status = $conn->prepare("UPDATE `files` SET `status`=? WHERE studentid = ? AND status=? AND status =? AND status=? ");
                $update_status->bind_param("sisss",$updated_status,$student_id,$stat_pending, $stat_retruned,$stat_assigned);
                $update_status->execute();
                
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
                           <i class="bi bi-house-fill fs-5"></i> DashBoard
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
                    <div class="row pt-3 px-2 w-80">
                            <div class="card ">
                                <div class="card-header">
                                    <h4 class="card-title"> Requirements List </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                         <table class="table table-hover">
                                    <thead>
                                         <th>No</th>
                                        <th>File Name</th>
                                        <th>Date submission</th>
                                        <th>Status</th>
                                        <th></th>
                                         <th>Action</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                    </div>
                                </div>

                            </div>
                        </div>

              
        </div>

   

        <script type="text/javascript">
    $(document).ready(function() {


      var dataTable = $('table').DataTable({
        "ajax": "get_files.php", // URL to server-side script that returns JSON data
        
        "columns": [
             {
            "data": "total" 
          },
           {
            "data": "reqList" 
          },

          {
            "data": "status",
            render: function(data, type, row) {
              if (row.status == 1) {
                return '<span class="badge rounded-pill text-bg-primary">Pending</span>';
              }
              if (row.status == 2) {
                return '<span class="badge text-bg-secondary">Submitted</span>';

              }
              if (row.status == 3) {
                return '<span class="badge text-bg-success">Approved</span>';
              }
               if (row.status == 4) {
                return '<span class="badge text-bg-danger">Returned</span>';
              }
              if (row.status == 5) {
                return '<span class="badge text-bg-info">Assigned</span>';
              }
               if (row.status == 6) {
                 return '<span class="badge text-bg-danger">Late</span>';
              }
            }
          },

         {
            "data": "submissionDeadline",
                "render": function (data, type, row) {
                    // Assuming 'joining_date' is in 'YYYY-MM-DD' format
                    var date = new Date(data);
                    return date.toLocaleDateString("en-US", { month: 'long', day: 'numeric', year: 'numeric' });
                }
        },

         {
                            "data": "reqList",
                            "render": function(data, type, full, meta) {
                                // return '<a href="./files/' + data + '" download >Download</a>';
                                return '<a class="btn btn-secondary" href="../admin/files/' + data + '" role="button" download ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">  <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z"/> <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/> </svg> </a>'
                            }


                        },

            {
            "data": "id" ,
            "render": function(data, type, full, meta) {
                return '<a class="btn btn-secondary" href="status.php?id='+data+'" role="button">Submit</a>';
            }
          },
          

        ],

        


        // "rowCallback": function(row, data, index) {
        //   $(row).on('click', function() {
        //     window.location.href = 'view_student.php?view=' + data.studentid;
        //   });
        // },




        lengthMenu: [
          [10, 20, 50, -1],
          [10, 20, 50, 'All'],
        ],
      });

       




      $('.dataTables_filter input').attr('maxLength', 16),
        setInterval(function() {
          dataTable.ajax.reload(null, false); // Reload table data every 5 seconds
        }, 5000);
    });

 </script>

    <!--script-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!--script-->
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>

