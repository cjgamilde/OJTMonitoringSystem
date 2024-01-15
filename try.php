<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Knob Chart</title>

    <!-- Include Bootstrap CSS (Assuming you are using CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Include jQuery (Assuming you are using CDN) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- Include jQuery Knob (Assuming you are using CDN) -->
    <script src="https://cdn.jsdelivr.net/jquery.knob/1.2.11/jquery.knob.min.js"></script>
</head>
<body>
    <!-- Content goes here -->
    <div class="container mt-5">
    <input class="dial" data-width="200" data-height="200" data-fgColor="#66EE66" value="75">
</div>
<script>
    $(document).ready(function () {
        // Initialize the knob chart
        $('.dial').knob();
    });
</script>


    <!-- Include Bootstrap JS (Assuming you are using CDN) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>