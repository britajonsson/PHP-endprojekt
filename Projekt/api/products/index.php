<?php
// Credentials to database
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'webshop';
//Connect to database
$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// If connection fails, show error message and quit
if (!($connection)) {
    echo mysqli_connect_error();
    exit;
}
// Connected! Yay! 

// Create SQL-query to get data from product table
$query = "SELECT * FROM product";
// Run query to actually get the data
$table = mysqli_query($connection, $query) or die(mysqli_error($connection));

// Create an array...
$array = array();

// ...and store the data, so now it's an (multidimensional) array!
while ($row = $table->fetch_assoc()) {
    $array[] = $row;
}

// TEST PURPOSE ONLY - print array. This CAN NOT be shown when API is in use
/*
echo "<pre>";
print_r($array);
echo "</pre>";
*/

// Add URL before filename in picture field

$pictureUrl = "http://localhost/Projekt/images/"; // When running locally
// $pictureUrl = "https://php-projekt.000webhostapp.com/images/"; // When running on 000webhostapp.com

foreach ($array as $key => $value) {
    $array[$key]['picture'] = $pictureUrl . $value['picture'];
}

// TEST PURPOSE ONLY - print array and see that picture value has the new URL
/*
echo "<pre>";
print_r($array);
echo "</pre>";
*/

// Create a JSON string with json_encode()
$json_string = json_encode($array, JSON_PRETTY_PRINT);

// Print the JSON string
echo $json_string;

?>