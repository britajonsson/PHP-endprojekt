<?php
// includes html, head, body etc.
include "header.php";

// Connection to database
require_once("connect.php");

// Print post-array for test purposes
/* 
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

// Variable that holds info if all $_POST data of the product has arrived
$allProductDataArrived = (empty($_POST['articleID']) || empty($_POST['title']) || empty($_POST['description']) || empty($_POST['picture']) || empty($_POST['price']));

// Variable that holds info if all $_POST data of the customer has arrived, except the message (optional info)
$allCustomerDataArrived = (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['street']) || empty($_POST['zipcode']) || empty($_POST['city']));

// If all $_POST data is OK, save the data in variables
if (!($allProductDataArrived || $allCustomerDataArrived)) {

    // Save info about order
    $articleID = $_POST['articleID'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $picture = $_POST['picture'];
    $price = $_POST['price'];

    // Save customer info (correctly formatted)
    $firstname = ucwords(strtolower($_POST['firstname']));
    $lastname = ucwords(strtolower($_POST['lastname']));
    $email = strtolower($_POST['email']);
    $phone = $_POST['phone'];
    $street = ucwords(strtolower($_POST['street']));
    $zipcode = $_POST['zipcode'];
    $city = strtoupper($_POST['city']);
    $message = $_POST['message'];
} else {
    // If not all data is set, error message is shown
    echo "Error, all data is not sent. Go back and try again.<br>";
    include "footer.php"; // shows "back to start"-button and closes html-tags
    exit; // Makes sure the rest of the page doesn't load
}

// The SQL-query to add order to database table "orderlist" 
$addOrderQuery = "INSERT INTO orderlist VALUES (NULL, '$firstname', '$lastname', '$email', '$phone', '$street', '$zipcode', '$city', $articleID)";

// Run the SQL query
mysqli_query($connection, $addOrderQuery) or die(mysqli_error($connection));

// Save data to be used by email
$to = 'britajonsson$gmail.com';
$subject = 'Order från ' . $firstname . ' ' . $lastname;
$mailcontent = '
                <html>
                <head>
                <title>' . $subject . '</title>
                </head>
                <body>
                <h2>' . $subject . '</h2>
                <h4>' . $title . '</h4>
                <p>' . $description . '</p>
                ' . $price . ' kr<br>
                <hr>
                <h3>Kundens kontaktuppgifter</h3>
                ' . $firstname . " " . $lastname . '<br>
                ' . $email . '<br>
                ' . $phone . '<br>
                
                <hr>
                <h4>Adress:</h4>
                ' . $street . '<br>
                ' . $zipcode . " " . $city . '<br><br>
                <hr>
                <h4>Kundens meddelande:</h4>
                ' . $message . '<br>
                </body>
                </html>
                ';

    // For test purpose - to see the mail
    // echo $mailcontent;

    // Content-type header must be "text/html" to send the mail in HTML
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // headers is saved as an array in order to use them all in the mail-function
    $headers[] = "From: $email";
    $headers[] = "Cc: $email";
    
    // Send the order.
    // implode() sends all data in headers-array and separates it with line breaks
    mail($to, $subject, $mailcontent, implode("\r\n", $headers));
?>

<h2>Tack för din beställning!</h2>
<h5><?= $title;?></h5>
<p><?= $description;?></p>
<?= $price;?> kr<br>
<hr>
<h3>Dina kontaktuppgifter</h3>
<?= $firstname . " " . $lastname;?><br>
<?= $email;?><br>
<?= $phone;?><br>

<hr>
<h4>Adress:</h4>
<?= $street;?><br>
<?= $zipcode . " " . $city;?><br><br>
<hr>
<h4>Ditt meddelande:</h4>
<?= $message;?><br>
<hr>

<?php 
include "tostart.php";
include "footer.php";
?>