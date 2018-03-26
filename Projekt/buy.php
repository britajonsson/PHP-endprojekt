<?php
// includes html, head, body etc.
include "header.php";

// Print post-array for test purposes
/* 
echo "<pre>";
print_r($_POST);
echo "</pre>";
 */

// Variable that holds info if all $_POST data has arrived
$allDataArrived = (empty($_POST['articleID']) || empty($_POST['title']) || empty($_POST['description']) || empty($_POST['picture']) || empty($_POST['price']));


// If all $_POST data is OK, save the data in variables
if (!($allDataArrived)) {    
    $articleID = $_POST['articleID'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $picture = $_POST['picture'];
    $price = $_POST['price'];
} else {
    // If not all data is set, error message is shown
    echo "Error, all data is not sent. Go back and try again.<br>";
    include "footer.php"; // shows "back to start"-button and closes html-tags
    exit; // Makes sure the rest of the page doesn't load
}
?>

<div id="buy">    
    <h2>Ditt val</h2>
    <hr>
    <img class='img-fluid float-right' id='picture' src='images/<?= $picture ; ?>'>
    <h4><?= $title ; ?></h4><p><?= $description ; ?></p><p>Pris: <?= $price ; ?> kr</p>
    
</div>
<hr>
    <form class="pb-5" action="order.php" method="post">
<div class="row">
    <div class="col-md-3">
        Förnamn:
    </div>
    <div class="col-md-3">
        <input class="container-fluid" type="text" name="firstname" required>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        Efternamn:
    </div>
    <div class="col-md-3">
        <input class="container-fluid" type="text" name="lastname" required>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        E-post:
    </div>
    <div class="col-md-3">
    <input class="container-fluid" type="email" name="email" required>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        Mobilnummer:
    </div>
    <div class="col-md-3">
        <input class="container-fluid" type="phone" name="phone" required>
    </div>
</div>
<h4>Leveransadress:</h4>

<div class="row">
    <div class="col-md-3">
        Gata:
        </div>
    <div class="col-md-3">
        <input class="container-fluid" type="text" name="street" required>
        </div>
</div>
<div class="row">
    <div class="col-md-3">
        Postnummer:
        </div>
    <div class="col-md-3">
        <input class="container-fluid" type="text" name="zipcode" required>
        </div>
</div>
        <div class="row">
    <div class="col-md-3">
        Ort:
        </div>
    <div class="col-md-3">
        <input class="container-fluid" type="text" name="city" required><br><br>
        </div>
</div>

        Meddelande: <br>
        <textarea name="message" cols="43" rows="10"></textarea>
        
        <!-- // Add the chosen product to the order -->
        <input type="hidden" name="articleID" value="<?= $articleID; ?>">
        <input type="hidden" name="title" value="<?= $title; ?>">
        <input type="hidden" name="description" value="<?= $description; ?>">
        <input type="hidden" name="picture" value="<?= $picture; ?>">
        <input type="hidden" name="price" value="<?= $price; ?>">
        <br><br>
        <input class="btn btn-success" type="submit" value="Beställ">
    </form>

    

<?php 
include "tostart.php";
include "footer.php";
?>