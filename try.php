<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time In/Out Tracker</title>
</head>
<body>
    <h2>Time In/Out Tracker</h2>

    <?php
    // Process the form data when the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $timeIn = $_POST["time_in"];
        $timeOut = $_POST["time_out"];

        // Process the time data as needed (e.g., save to a database)

        echo "Time In: $timeIn<br>";
        echo "Time Out: $timeOut";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="time_in">Time In:</label>
        <input type="text" id="time_in" name="time_in" placeholder="Enter time in" required>

        <br>

        <label for="time_out">Time Out:</label>
        <input type="text" id="time_out" name="time_out" placeholder="Enter time out" required>

        <br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
 -->


 <?php
 function getaddress($lat,$lng)
  {
     $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
       echo $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }
  }
getaddress(14.6083424,121.0094596);




?>