<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scrollable Container Example</title>
  <style>
    /* Styling for the container */
    .scrollable-container {
      height: 200px; /* Set a fixed height for the container */
      overflow: auto; /* Enable vertical scroll when content exceeds the height */
      border: 1px solid #ccc;
      padding: 10px;
    }

    /* Optional: Add some content to the container */
    .content {
      height: 400px; /* Make the content taller than the container to trigger scrolling */
    }
  </style>
</head>
<body>

<!-- Scrollable container with content -->
<div class="scrollable-container">
  <div class="content">
    <!-- Your content goes here -->
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
  </div>
</div>

</body>
</html>