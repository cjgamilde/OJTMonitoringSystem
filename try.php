

 <?php

// $curl = curl_init('https://us1.locationiq.com/v1/reverse?key=pk.d8d3ca397b99f97ab437ee33354cda16&lat=14.6083424&lon=121.0094596&format=json');

// curl_setopt_array($curl, array(
//   CURLOPT_RETURNTRANSFER    =>  true,
//   CURLOPT_FOLLOWLOCATION    =>  true,
//   CURLOPT_MAXREDIRS         =>  10,
//   CURLOPT_TIMEOUT           =>  30,
//   CURLOPT_CUSTOMREQUEST     =>  'GET',
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }



function reverseGeocode($latitude, $longitude, $apiKey) {
    // LocationIQ Reverse Geocoding API endpoint
    $apiEndpoint = 'https://us1.locationiq.com/v1/reverse.php';

    // Prepare parameters
    $params = [
        'key' => $apiKey,
        'lat' => $latitude,
        'lon' => $longitude,
        'format' => 'json',
    ];

    // Build the query string
    $queryString = http_build_query($params);

    // Final URL
    $url = $apiEndpoint . '?' . $queryString;

    // Make a request to the API
    $response = file_get_contents($url);

    // Decode JSON response
    $data = json_decode($response, true);

    // Check if the request was successful
    if (!empty($data['display_name'])) {
        // Extract the formatted address
        $formattedAddress = $data['display_name'];

        return $formattedAddress;
    } else {
        // Handle errors
        return 'Error in reverse geocoding';
    }
}

// Example usage
$latitude = 14.6083424; // Replace with your latitude
$longitude = 121.009459; // Replace with your longitude
$apiKey = 'pk.d8d3ca397b99f97ab437ee33354cda16'; // Replace with your LocationIQ API key

$result = reverseGeocode($latitude, $longitude, $apiKey);

echo 'Reverse Geocoding Result: ' . $result;
?>



